<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('pages.admin.messages.index', compact('messages'));
    }

    public function show(ContactMessage $message): View
    {
        $message->update(['is_read' => true]);
        return view('pages.admin.messages.show', compact('message'));
    }

    public function destroy(ContactMessage $message): RedirectResponse
    {
        $message->delete();
        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
