<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | PT Kontragtor Indonesia</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&family=Barlow+Condensed:wght@700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * { font-family: 'Barlow', sans-serif; }
        .font-display { font-family: 'Barlow Condensed', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex">

    {{-- Left panel --}}
    <div class="hidden lg:flex w-1/2 bg-yellow-500 flex-col items-center justify-center p-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background: repeating-linear-gradient(-45deg,#000 0,#000 1px,transparent 0,transparent 16px);"></div>
        <div class="relative z-10 text-center">
            <div class="w-20 h-20 bg-black rounded-2xl flex items-center justify-center font-display font-black text-yellow-400 text-3xl mx-auto mb-8 shadow-2xl">KI</div>
            <h1 class="font-display text-5xl font-black text-black uppercase mb-4 leading-none">PT KONTRAGTOR<br>INDONESIA TBK.</h1>
            <p class="text-black/60 text-lg font-semibold">Panel Manajemen Website</p>
            <div class="mt-10 grid grid-cols-2 gap-4 max-w-xs mx-auto">
                @foreach(['200+ Unit Armada','19+ Tahun','500+ Proyek','34 Provinsi'] as $stat)
                <div class="bg-black/10 rounded-xl p-4 text-center">
                    <div class="font-display font-black text-black text-lg leading-none">{{ $stat }}</div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- Decorative gears --}}
        <svg class="absolute -bottom-10 -right-10 w-48 h-48 text-black/10 animate-spin" style="animation-duration:40s" fill="currentColor" viewBox="0 0 24 24"><path d="M12 15.5a3.5 3.5 0 110-7 3.5 3.5 0 010 7zm7.43-1.32c.04-.32.07-.64.07-.97s-.03-.66-.07-1l2.08-1.63c.19-.15.24-.42.12-.64l-1.97-3.41c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22L2.37 8.68c-.12.22-.07.49.12.64l2.08 1.63c-.04.34-.07.67-.07 1s.03.65.07.97l-2.08 1.66c-.19.15-.24.42-.12.64l1.97 3.41c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.58 1.69-.98l2.49 1c.23.09.49 0 .61-.22l1.97-3.41c.12-.22.07-.49-.12-.64l-2.09-1.66z"/></svg>
    </div>

    {{-- Right panel / Form --}}
    <div class="flex-1 flex items-center justify-center p-8">
        <div class="w-full max-w-md">
            {{-- Mobile logo --}}
            <div class="flex items-center gap-3 mb-10 lg:hidden">
                <div class="w-10 h-10 bg-yellow-500 rounded-xl flex items-center justify-center font-display font-black text-black">KI</div>
                <div>
                    <div class="font-display font-black text-gray-900 uppercase text-lg leading-none">PT KONTRAGTOR</div>
                    <div class="text-xs text-yellow-600 font-bold">Admin Panel</div>
                </div>
            </div>

            <h2 class="font-display text-3xl font-black text-gray-900 uppercase mb-1">Selamat Datang!</h2>
            <p class="text-gray-500 text-sm mb-8">Masukkan kredensial administrator Anda untuk melanjutkan.</p>

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl px-4 py-3 mb-5 text-sm flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}" id="loginForm" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" id="emailInput" value="{{ old('email') }}" required autofocus
                        class="w-full border border-gray-200 bg-white rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition shadow-sm"
                        placeholder="admin@kontragtor.com">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="passwordInput" required
                            class="w-full border border-gray-200 bg-white rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition shadow-sm pr-11"
                            placeholder="••••••••">
                        <button type="button" id="togglePassword" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="eyeIcon"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="accent-yellow-500 w-4 h-4">
                    <label for="remember" class="text-gray-600 text-sm">Ingat saya</label>
                </div>
                <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-black py-3.5 rounded-xl transition-all duration-200 font-display text-lg uppercase tracking-wide shadow-lg hover:shadow-yellow-300/50">
                    Masuk ke Dashboard
                </button>
            </form>

            {{-- Auto FILL button (bukan auto login) --}}
            <div class="mt-6 pt-6 border-t border-gray-100">
                <div class="flex items-center gap-2 mb-3">
                    <span class="flex-1 h-px bg-gray-200"></span>
                    <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Testing</span>
                    <span class="flex-1 h-px bg-gray-200"></span>
                </div>
                <button type="button" onclick="autoFillAdmin()"
                    class="w-full flex items-center justify-center gap-2.5 bg-gray-100 hover:bg-yellow-100 border border-gray-200 hover:border-yellow-400 text-gray-700 hover:text-yellow-800 font-bold py-3 rounded-xl text-sm transition-all duration-200">
                    <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    🔘 Auto Isi Form Admin (Testing)
                </button>
                <p class="text-center text-xs text-gray-400 mt-2">Akan mengisi email & password — login tetap manual</p>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-600 text-sm flex items-center justify-center gap-1 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Kembali ke Website
                </a>
            </div>
        </div>
    </div>
</body>

<script>
// Toggle password visibility
document.getElementById('togglePassword').addEventListener('click', function() {
    const pw = document.getElementById('passwordInput');
    pw.type = pw.type === 'password' ? 'text' : 'password';
});

// Auto-fill form (NOT auto-login)
function autoFillAdmin() {
    const emailInput = document.getElementById('emailInput');
    const passwordInput = document.getElementById('passwordInput');

    // Animate typing effect
    emailInput.focus();
    emailInput.value = '';
    const email = 'admin@kontragtor.com';
    let i = 0;
    const typeEmail = setInterval(() => {
        emailInput.value += email[i++];
        if (i >= email.length) {
            clearInterval(typeEmail);
            setTimeout(() => {
                passwordInput.value = 'admin123';
                // Highlight the login button
                const submitBtn = document.querySelector('button[type="submit"]');
                submitBtn.classList.add('ring-4', 'ring-yellow-400', 'ring-offset-2');
                submitBtn.textContent = '▶ Klik untuk Masuk!';
                setTimeout(() => {
                    submitBtn.classList.remove('ring-4', 'ring-yellow-400', 'ring-offset-2');
                    submitBtn.textContent = 'Masuk ke Dashboard';
                }, 3000);
            }, 100);
        }
    }, 40);

    Swal.fire({
        icon: 'info',
        title: 'Form Sudah Diisi!',
        text: 'Email dan password admin sudah terisi otomatis. Klik tombol "Masuk" untuk login.',
        confirmButtonColor: '#F59E0B',
        confirmButtonText: 'OK, Siap Login!',
        timer: 4000,
        timerProgressBar: true,
    });
}
</script>
</html>
