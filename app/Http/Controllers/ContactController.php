<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as MailException;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function send(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Save to DB first
        ContactMessage::create($data);

        // Send email via PHPMailer
        $mailSent = $this->sendEmail($data);

        if ($mailSent) {
            return back()->with('success', 'Pesan Anda telah berhasil terkirim! Tim kami akan menghubungi Anda segera.');
        }

        // Still success for user even if email fails (message saved to DB)
        return back()->with('success', 'Pesan Anda telah berhasil tersimpan. Tim kami akan segera menghubungi Anda.');
    }

    private function sendEmail(array $data): bool
    {
        try {
            $mail = new PHPMailer(true);

            // Server settings — use env values
            $mail->SMTPDebug  = 0; // 0 = off, 2 = verbose debug
            $mail->isSMTP();
            $mail->Host       = env('MAIL_HOST', 'smtp.hostinger.com');
            $mail->SMTPAuth   = true;
            $mail->Username   = env('MAIL_USERNAME', 'noreply@arifsiddikm.com');
            $mail->Password   = env('MAIL_PASSWORD', 'SatuDua345!!');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL
            $mail->Port       = (int) env('MAIL_PORT', 465);

            // Extra SSL options to avoid cert issues on some servers
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ],
            ];

            // Sender
            $fromAddress = env('MAIL_FROM_ADDRESS', 'noreply@arifsiddikm.com');
            $fromName    = env('MAIL_FROM_NAME', 'PT Kontragtor Indonesia Tbk.');
            $mail->setFrom($fromAddress, $fromName);

            // Recipient — admin
            $adminEmail = env('ADMIN_EMAIL', 'arifsiddikmuharam@gmail.com');
            $mail->addAddress($adminEmail, 'Admin PT Kontragtor Indonesia');

            // Reply-To sender
            $mail->addReplyTo($data['email'], $data['name']);

            // Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = '📩 Pesan Baru dari Website: ' . ($data['subject'] ?? 'Tidak ada subjek');
            $mail->Body    = $this->buildHtmlBody($data);
            $mail->AltBody = $this->buildTextBody($data);

            $mail->send();
            return true;

        } catch (MailException $e) {
            \Log::error('PHPMailer Error: ' . $e->getMessage());
            return false;
        } catch (\Exception $e) {
            \Log::error('Mail Exception: ' . $e->getMessage());
            return false;
        }
    }

    private function buildHtmlBody(array $data): string
    {
        $name    = htmlspecialchars($data['name']);
        $email   = htmlspecialchars($data['email']);
        $phone   = htmlspecialchars($data['phone'] ?? '-');
        $subject = htmlspecialchars($data['subject'] ?? '-');
        $message = nl2br(htmlspecialchars($data['message']));
        $time    = now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') . ' WIB';

        return <<<HTML
        <!DOCTYPE html>
        <html>
        <head><meta charset="UTF-8"><style>
          body { font-family: Arial, sans-serif; color: #333; margin: 0; padding: 0; background: #f5f5f5; }
          .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,.1); }
          .header { background: #F59E0B; padding: 24px 30px; }
          .header h2 { color: #000; margin: 0; font-size: 20px; font-weight: 900; letter-spacing: 1px; }
          .header p { color: #000; margin: 4px 0 0; font-size: 13px; opacity: .7; }
          .body { padding: 30px; }
          .field { display: flex; border-bottom: 1px solid #f0f0f0; padding: 10px 0; }
          .field:last-child { border: 0; }
          .label { font-weight: bold; color: #555; min-width: 110px; font-size: 13px; }
          .value { color: #222; font-size: 13px; }
          .message-box { background: #fffbeb; border: 1px solid #fde68a; border-radius: 6px; padding: 16px; margin-top: 20px; }
          .message-box p { margin: 0; font-size: 14px; line-height: 1.6; color: #333; }
          .footer { background: #f9f9f9; padding: 14px 30px; text-align: center; font-size: 11px; color: #aaa; border-top: 1px solid #eee; }
        </style></head>
        <body>
        <div class="container">
          <div class="header">
            <h2>📩 PESAN BARU DARI WEBSITE</h2>
            <p>PT Kontragtor Indonesia Tbk. — {$time}</p>
          </div>
          <div class="body">
            <div class="field"><span class="label">Nama</span><span class="value">{$name}</span></div>
            <div class="field"><span class="label">Email</span><span class="value"><a href="mailto:{$email}" style="color:#F59E0B">{$email}</a></span></div>
            <div class="field"><span class="label">Telepon</span><span class="value">{$phone}</span></div>
            <div class="field"><span class="label">Subjek</span><span class="value">{$subject}</span></div>
            <div class="message-box">
              <strong style="font-size:13px;color:#555;display:block;margin-bottom:8px;">PESAN:</strong>
              <p>{$message}</p>
            </div>
          </div>
          <div class="footer">Dikirim otomatis dari website PT Kontragtor Indonesia Tbk. | <a href="mailto:{$email}" style="color:#F59E0B">Balas ke {$email}</a></div>
        </div>
        </body></html>
        HTML;
    }

    private function buildTextBody(array $data): string
    {
        return "Pesan Baru dari Website PT Kontragtor Indonesia\n\n"
            . "Nama    : {$data['name']}\n"
            . "Email   : {$data['email']}\n"
            . "Telepon : " . ($data['phone'] ?? '-') . "\n"
            . "Subjek  : " . ($data['subject'] ?? '-') . "\n\n"
            . "Pesan:\n{$data['message']}\n\n"
            . "---\nDikirim pada: " . now()->setTimezone('Asia/Jakarta')->format('d M Y H:i') . " WIB";
    }
}
