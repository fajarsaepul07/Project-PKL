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
        width: 80px;
        height: 80px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .shape:nth-child(2) {
        width: 120px;
        height: 120px;
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }

    .shape:nth-child(3) {
        width: 60px;
        height: 60px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .login-container {
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
        max-width: 450px;
        border: 1px solid rgba(206, 212, 218, 0.3);
        animation: slideUp 0.8s ease-out;
        transition: all 0.4s ease;
        margin: 0 auto;
    }

    .login-container:hover {
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
        background: linear-gradient(135deg, #6c757d, #495057);
        border-radius: 20px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 16px 32px rgba(108, 117, 125, 0.2),
            0 8px 16px rgba(108, 117, 125, 0.15);
        animation: pulse 2s infinite;
        transition: all 0.3s ease;
    }

    .logo:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 
            0 20px 40px rgba(108, 117, 125, 0.25),
            0 10px 20px rgba(108, 117, 125, 0.2);
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .logo::before {
        content: "🛍️";
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
        border-color: #6c757d !important;
        background: white !important;
        transform: translateY(-3px);
        box-shadow: 
            0 12px 24px rgba(108, 117, 125, 0.15),
            0 6px 12px rgba(108, 117, 125, 0.1),
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
        color: #6c757d;
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
        color: #6c757d;
        transform: translateY(-50%) scale(1.1);
    }

    .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .remember-me input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #6c757d;
        transition: all 0.3s ease;
    }

    .remember-me input[type="checkbox"]:hover {
        transform: scale(1.1);
    }

    .remember-me label {
        color: #2c3e50;
        font-size: 14px;
        margin: 0;
        cursor: pointer;
    }

    .forgot-password {
        color: #6c757d;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
    }

    .forgot-password:hover {
        color: #495057;
        text-decoration: none;
        transform: translateY(-1px);
    }

    .forgot-password::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #6c757d;
        transition: width 0.3s ease;
    }

    .forgot-password:hover::after {
        width: 100%;
    }

    .btn-login {
        width: 100%;
        background: linear-gradient(135deg, #6c757d, #495057) !important;
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
            0 8px 16px rgba(108, 117, 125, 0.2),
            0 4px 8px rgba(108, 117, 125, 0.15);
    }

    .btn-login:hover {
        transform: translateY(-3px) !important;
        box-shadow: 
            0 16px 32px rgba(108, 117, 125, 0.25),
            0 8px 16px rgba(108, 117, 125, 0.2) !important;
        background: linear-gradient(135deg, #495057, #343a40) !important;
    }

    .btn-login:active {
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
</style>

<div class="custom-container">
    <div class="bg-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-container">
        <div class="logo-section">
            <div class="logo"></div>
            <h1 class="store-name">{{ config('app.name', 'ShopMart') }}</h1>
            <p class="store-tagline">Belanja mudah, harga terjangkau</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <div class="input-container">
                    <input id="email" type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="email" 
                           autofocus>
                    <span class="input-icon">📧</span>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <div class="input-container">
                    <input id="password" type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           name="password" 
                           required 
                           autocomplete="current-password">
                    <span class="input-icon">🔒</span>
                    <button type="button" class="password-toggle" onclick="togglePassword()">👁️</button>
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" 
                           name="remember" 
                           id="remember" 
                           {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">{{ __('Remember Me') }}</label>
                </div>
                
                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="btn btn-login">
                {{ __('Login') }}
            </button>
        </form>

        @if (Route::has('register'))
            <div style="text-align: center; margin-top: 30px; color: #7f8c8d; font-size: 14px;">
                Belum punya akun? 
                <a href="{{ route('register') }}" style="color: #6c757d; text-decoration: none; font-weight: 600;">
                    Daftar sekarang
                </a>
            </div>
        @endif
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.querySelector('.password-toggle');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtn.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            toggleBtn.textContent = '👁️';
        }
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
                this.style.borderColor = '#6c757d';
            } else {
                this.style.backgroundColor = '#f8f9fa';
                this.style.borderColor = '#e9ecef';
            }
        });
    });
</script>
@endsection