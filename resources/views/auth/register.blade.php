@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    .bg-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }

    .shape {
        position: absolute;
        background: rgba(108, 117, 125, 0.08);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
        transition: all 0.3s ease;
    }

    .shape:nth-child(1) {
        width: 100px;
        height: 100px;
        top: 15%;
        left: 8%;
        animation-delay: 0s;
    }

    .shape:nth-child(2) {
        width: 140px;
        height: 140px;
        top: 70%;
        right: 10%;
        animation-delay: 2s;
    }

    .shape:nth-child(3) {
        width: 75px;
        height: 75px;
        bottom: 15%;
        left: 25%;
        animation-delay: 4s;
    }

    .shape:nth-child(4) {
        width: 50px;
        height: 50px;
        top: 35%;
        right: 30%;
        animation-delay: 1s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .register-container {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 40px;
        box-shadow: 
            0 32px 64px rgba(0, 0, 0, 0.12),
            0 16px 32px rgba(0, 0, 0, 0.08),
            0 8px 16px rgba(0, 0, 0, 0.04);
        width: 100%;
        max-width: 500px;
        border: 1px solid rgba(206, 212, 218, 0.3);
        animation: slideUp 0.8s ease-out;
        transition: all 0.4s ease;
        margin: 0 auto;
    }

    .register-container:hover {
        transform: translateY(-8px);
        box-shadow: 
            0 40px 80px rgba(0, 0, 0, 0.16),
            0 20px 40px rgba(0, 0, 0, 0.12),
            0 10px 20px rgba(0, 0, 0, 0.08);
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .logo-section {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #28a745, #20c997);
        border-radius: 20px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 16px 32px rgba(40, 167, 69, 0.2),
            0 8px 16px rgba(40, 167, 69, 0.15);
        animation: pulse 2s infinite;
        transition: all 0.3s ease;
    }

    .logo:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 
            0 20px 40px rgba(40, 167, 69, 0.25),
            0 10px 20px rgba(40, 167, 69, 0.2);
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .logo::before {
        content: "👋";
        font-size: 35px;
    }

    .store-name {
        color: #2c3e50;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .store-tagline {
        color: #7f8c8d;
        font-size: 14px;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 25px;
        position: relative;
    }

    .form-group label {
        display: block;
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .input-container {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 15px 20px 15px 50px !important;
        border: 2px solid #e9ecef !important;
        border-radius: 14px !important;
        font-size: 16px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: #f8f9fa !important;
        box-shadow: 
            inset 0 2px 4px rgba(0, 0, 0, 0.03),
            0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .form-control:focus {
        outline: none !important;
        border-color: #28a745 !important;
        background: white !important;
        transform: translateY(-3px);
        box-shadow: 
            0 12px 24px rgba(40, 167, 69, 0.15),
            0 6px 12px rgba(40, 167, 69, 0.1),
            inset 0 2px 4px rgba(0, 0, 0, 0.03) !important;
    }

    .form-control:hover {
        border-color: #adb5bd !important;
        transform: translateY(-1px);
        box-shadow: 
            0 6px 12px rgba(0, 0, 0, 0.08),
            inset 0 2px 4px rgba(0, 0, 0, 0.03);
    }

    .input-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
        font-size: 18px;
        transition: all 0.4s ease;
        z-index: 3;
    }

    .form-control:focus + .input-icon {
        color: #28a745;
        transform: translateY(-50%) scale(1.1);
    }

    .password-toggle {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #95a5a6;
        cursor: pointer;
        font-size: 18px;
        transition: all 0.3s ease;
        z-index: 3;
    }

    .password-toggle:hover {
        color: #28a745;
        transform: translateY(-50%) scale(1.1);
    }

    .password-strength {
        margin-top: 8px;
        height: 4px;
        background: #e9ecef;
        border-radius: 2px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .strength-bar {
        height: 100%;
        width: 0%;
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    .strength-weak { background: #dc3545; width: 25%; }
    .strength-fair { background: #fd7e14; width: 50%; }
    .strength-good { background: #ffc107; width: 75%; }
    .strength-strong { background: #28a745; width: 100%; }

    .strength-text {
        font-size: 12px;
        margin-top: 4px;
        transition: all 0.3s ease;
    }

    .btn-register {
        width: 100%;
        background: linear-gradient(135deg, #28a745, #20c997) !important;
        color: white !important;
        border: none !important;
        padding: 16px;
        border-radius: 14px !important;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 8px 16px rgba(40, 167, 69, 0.2),
            0 4px 8px rgba(40, 167, 69, 0.15);
    }

    .btn-register:hover {
        transform: translateY(-3px) !important;
        box-shadow: 
            0 16px 32px rgba(40, 167, 69, 0.25),
            0 8px 16px rgba(40, 167, 69, 0.2) !important;
        background: linear-gradient(135deg, #218838, #1e7e34) !important;
    }

    .btn-register:active {
        transform: translateY(-1px) !important;
        transition: all 0.1s ease;
    }

    .invalid-feedback {
        display: block !important;
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 0.25rem;
    }

    .is-invalid {
        border-color: #dc3545 !important;
        background-color: #fff5f5 !important;
    }

    .custom-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 20px;
    }

    .terms-checkbox {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 25px;
        padding: 16px;
        background: rgba(40, 167, 69, 0.05);
        border-radius: 12px;
        border: 1px solid rgba(40, 167, 69, 0.1);
    }

    .terms-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #28a745;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .terms-text {
        font-size: 14px;
        color: #495057;
        line-height: 1.4;
    }

    .terms-text a {
        color: #28a745;
        text-decoration: none;
        font-weight: 600;
    }

    .terms-text a:hover {
        text-decoration: underline;
    }

    .login-link {
        text-align: center;
        margin-top: 30px;
        color: #7f8c8d;
        font-size: 14px;
    }

    .login-link a {
        color: #28a745;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .login-link a:hover {
        color: #20c997;
        text-decoration: none;
    }
</style>

<div class="custom-container">
    <div class="bg-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="register-container">
        <div class="logo-section">
            <div class="logo"></div>
            <h1 class="store-name">{{ config('app.name', 'ShopMart') }}</h1>
            <p class="store-tagline">Bergabunglah dengan jutaan pembeli</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Nama Lengkap') }}</label>
                <div class="input-container">
                    <input id="name" type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autocomplete="name" 
                           autofocus>
                    <span class="input-icon">👤</span>
                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">{{ __('Alamat Email') }}</label>
                <div class="input-container">
                    <input id="email" type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="email">
                    <span class="input-icon">📧</span>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Kata Sandi') }}</label>
                <div class="input-container">
                    <input id="password" type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           name="password" 
                           required 
                           autocomplete="new-password">
                    <span class="input-icon">🔒</span>
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">👁️</button>
                    
                    <div class="password-strength">
                        <div class="strength-bar" id="strengthBar"></div>
                    </div>
                    <div class="strength-text" id="strengthText"></div>
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Konfirmasi Kata Sandi') }}</label>
                <div class="input-container">
                    <input id="password-confirm" type="password" 
                           class="form-control" 
                           name="password_confirmation" 
                           required 
                           autocomplete="new-password">
                    <span class="input-icon">🔐</span>
                    <button type="button" class="password-toggle" onclick="togglePassword('password-confirm')">👁️</button>
                </div>
            </div>

            <div class="terms-checkbox">
                <input type="checkbox" id="terms" name="terms" required>
                <div class="terms-text">
                    <label for="terms">
                        Saya setuju dengan <a href="#" target="_blank">Syarat & Ketentuan</a> 
                        dan <a href="#" target="_blank">Kebijakan Privasi</a> ShopMart
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-register">
                {{ __('Daftar Sekarang') }}
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun? 
            <a href="{{ route('login') }}">
                Masuk di sini
            </a>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId) {
        const passwordInput = document.getElementById(inputId);
        const toggleBtn = passwordInput.parentElement.querySelector('.password-toggle');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtn.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            toggleBtn.textContent = '👁️';
        }
    }

    // Password strength checker
    function checkPasswordStrength(password) {
        let strength = 0;
        let feedback = '';
        
        if (password.length >= 8) strength += 1;
        if (password.match(/[a-z]/)) strength += 1;
        if (password.match(/[A-Z]/)) strength += 1;
        if (password.match(/[0-9]/)) strength += 1;
        if (password.match(/[^a-zA-Z0-9]/)) strength += 1;
        
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');
        
        strengthBar.className = 'strength-bar';
        
        switch (strength) {
            case 0:
            case 1:
                strengthBar.classList.add('strength-weak');
                feedback = 'Kata sandi sangat lemah';
                strengthText.style.color = '#dc3545';
                break;
            case 2:
                strengthBar.classList.add('strength-fair');
                feedback = 'Kata sandi lemah';
                strengthText.style.color = '#fd7e14';
                break;
            case 3:
            case 4:
                strengthBar.classList.add('strength-good');
                feedback = 'Kata sandi cukup kuat';
                strengthText.style.color = '#ffc107';
                break;
            case 5:
                strengthBar.classList.add('strength-strong');
                feedback = 'Kata sandi sangat kuat';
                strengthText.style.color = '#28a745';
                break;
        }
        
        strengthText.textContent = password.length > 0 ? feedback : '';
    }

    // Enhanced input animations
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
            this.parentElement.style.transition = 'transform 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });

        input.addEventListener('input', function() {
            if (this.value.length > 0) {
                this.style.backgroundColor = '#ffffff';
                if (this.id === 'password') {
                    this.style.borderColor = '#28a745';
                    checkPasswordStrength(this.value);
                } else {
                    this.style.borderColor = '#28a745';
                }
            } else {
                this.style.backgroundColor = '#f8f9fa';
                this.style.borderColor = '#e9ecef';
                if (this.id === 'password') {
                    checkPasswordStrength('');
                }
            }
        });
    });

    // Real-time password confirmation check
    document.getElementById('password-confirm').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;
        
        if (confirmPassword.length > 0) {
            if (password === confirmPassword) {
                this.style.borderColor = '#28a745';
                this.style.backgroundColor = '#ffffff';
            } else {
                this.style.borderColor = '#dc3545';
                this.style.backgroundColor = '#fff5f5';
            }
        }
    });
</script>
@endsection