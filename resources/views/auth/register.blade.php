<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Register - Cafeteria System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-brown: #8B4513;
            --dark-brown: #5D2F0A;
            --light-brown: #D2B48C;
            --cream: #F5F5DC;
            --gold: #DAA520;
            --coffee-dark: #3C2414;
            --warm-white: #FFFEF7;
        }

        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        html,
        body {
            overflow-x: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        html {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            touch-action: manipulation;
        }

        body {
            background: linear-gradient(135deg,
                    var(--cream) 0%,
                    #F0E68C 25%,
                    var(--light-brown) 50%,
                    #DEB887 75%,
                    var(--cream) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 20px 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }


        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(circle at 20% 80%, rgba(139, 69, 19, 0.08) 2px, transparent 2px),
                radial-gradient(circle at 80% 20%, rgba(218, 165, 32, 0.08) 1px, transparent 1px),
                radial-gradient(circle at 40% 40%, rgba(139, 69, 19, 0.05) 1px, transparent 1px);
            background-size: 60px 60px, 40px 40px, 80px 80px;
            animation: float 25s ease-in-out infinite;
            z-index: -1;
            pointer-events: none;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(180deg);
            }
        }

        .register-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 500px;
        }

        .card {
            border-radius: 24px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.1),
                0 15px 30px rgba(139, 69, 19, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            border: 2px solid rgba(218, 165, 32, 0.2);
            backdrop-filter: blur(15px);
            background: rgba(255, 254, 247, 0.95);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card:hover {
            box-shadow:
                0 35px 70px rgba(0, 0, 0, 0.15),
                0 20px 40px rgba(139, 69, 19, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg,
                    var(--coffee-dark) 0%,
                    var(--dark-brown) 30%,
                    var(--primary-brown) 70%,
                    var(--gold) 100%);
            color: var(--warm-white);
            text-align: center;
            position: relative;
            padding: 2.5rem 2rem;
            border: none;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 2px,
                    rgba(255, 255, 255, 0.05) 2px,
                    rgba(255, 255, 255, 0.05) 4px);
            animation: shimmer 20s linear infinite;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .card-header h4 {
            font-weight: 700;
            margin: 0;
            font-size: 1.75rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 2;
        }

        .header-icon {
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2.5rem;
            color: var(--gold);
            animation: pulse 2s ease-in-out infinite;
            z-index: 2;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: translateY(-50%) scale(1);
                opacity: 0.8;
            }

            50% {
                transform: translateY(-50%) scale(1.1);
                opacity: 1;
            }
        }

        .card-body {
            padding: 2.5rem;
            background: var(--warm-white);
        }

        .form-label {
            font-weight: 600;
            color: var(--coffee-dark);
            margin-bottom: 0.75rem;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }

        .form-control {
            border: 2px solid rgba(139, 69, 19, 0.2);
            border-radius: 16px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 254, 247, 0.8);
            font-weight: 400;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.25rem rgba(218, 165, 32, 0.25);
            background: var(--warm-white);
            transform: translateY(-3px);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(139, 69, 19, 0.5);
            font-weight: 400;
        }

        .btn-cafeteria {
            background: linear-gradient(135deg, var(--primary-brown), var(--gold));
            color: var(--warm-white);
            border: none;
            border-radius: 16px;
            padding: 1.25rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn-cafeteria::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .btn-cafeteria:hover::before {
            left: 100%;
        }

        .btn-cafeteria:hover {
            background: linear-gradient(135deg, var(--gold), var(--primary-brown));
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(139, 69, 19, 0.3);
        }

        .btn-cafeteria:active {
            transform: translateY(-2px);
        }

        .social-btn {
            border-radius: 16px;
            padding: 0.875rem 1rem;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid;
            position: relative;
            overflow: hidden;
            font-size: 0.95rem;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .social-btn.google {
            border-color: #db4437;
            color: #db4437;
        }

        .social-btn.google:hover {
            background: #db4437;
            color: white;
        }

        .social-btn.facebook {
            border-color: #1877f2;
            color: #1877f2;
        }

        .social-btn.facebook:hover {
            background: #1877f2;
            color: white;
        }

        .social-btn.github {
            border-color: #333;
            color: #333;
        }

        .social-btn.github:hover {
            background: #333;
            color: white;
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 2rem 0;
            color: rgba(139, 69, 19, 0.6);
            font-weight: 500;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(to right,
                    transparent,
                    rgba(139, 69, 19, 0.2),
                    rgba(218, 165, 32, 0.3),
                    rgba(139, 69, 19, 0.2),
                    transparent);
        }

        .divider span {
            background: var(--warm-white);
            padding: 0 1.5rem;
            position: relative;
            z-index: 1;
            font-size: 0.9rem;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
            animation: shake 0.6s ease-in-out;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-8px);
            }

            75% {
                transform: translateX(8px);
            }
        }

        .login-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(139, 69, 19, 0.1);
        }

        .login-link a {
            color: var(--primary-brown);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: var(--gold);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-text {
            color: rgba(139, 69, 19, 0.6);
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }


        .card,
        .form-control,
        .btn,
        label {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .form-control {
            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }


        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .card-body {
                padding: 2rem 1.5rem;
            }

            .card-header {
                padding: 2rem 1.5rem;
            }

            .card-header h4 {
                font-size: 1.5rem;
            }

            .header-icon {
                font-size: 2rem;
                right: 1.5rem;
            }

            .register-container {
                max-width: 100%;
                margin: 0 10px;
            }
        }

        @media (max-width: 480px) {
            .card-header h4 {
                font-size: 1.3rem;
            }

            .social-btn {
                font-size: 0.85rem;
                padding: 0.75rem 0.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="container register-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-user-plus me-3"></i>Join Our Cafeteria</h4>
                        <i class="fas fa-mug-hot header-icon"></i>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user me-2 text-warning"></i>Full Name
                                </label>
                                <input id="name" type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autofocus placeholder="Enter your full name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2 text-warning"></i>Email Address
                                </label>
                                <input id="email" type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required placeholder="your.email@example.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2 text-warning"></i>Password
                                </label>
                                <input id="password" type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    placeholder="Create a strong password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Password must be at least 8 characters long</div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">
                                    <i class="fas fa-lock me-2 text-warning"></i>Confirm Password
                                </label>
                                <input id="password-confirm" type="password" name="password_confirmation"
                                    class="form-control" required placeholder="Repeat your password">
                            </div>

                            <!-- Register Button -->
                            <button type="submit" class="btn btn-cafeteria w-100 mb-3">
                                <i class="fas fa-user-plus me-2"></i>Create Account
                            </button>

                            <!-- Divider -->
                            <div class="divider">
                                <span>or sign up with</span>
                            </div>

                            <!-- Social Buttons -->
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <a href="{{ route('auth.google') }}" class="btn social-btn google w-100">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('auth.facebook') }}" class="btn social-btn facebook w-100">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ url('auth/github') }}" class="btn social-btn github w-100">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Login Link -->
                            <div class="login-link">
                                <p class="mb-0">Already have an account?
                                    <a href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt me-1"></i>Sign in here
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('gesturestart', function (e) {
            e.preventDefault();
        });

        document.addEventListener('gesturechange', function (e) {
            e.preventDefault();
        });

        document.addEventListener('gestureend', function (e) {
            e.preventDefault();
        });

        document.addEventListener('wheel', function (e) {
            if (e.ctrlKey) {
                e.preventDefault();
            }
        }, { passive: false });

        document.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && (e.key === '+' || e.key === '-' || e.key === '0')) {
                e.preventDefault();
            }
        });

        const form = document.querySelector('form');
        const inputs = document.querySelectorAll('.form-control');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');

        inputs.forEach(input => {
            input.addEventListener('focus', function () {
                this.parentElement.style.transform = 'scale(1.02)';
                this.parentElement.style.transition = 'transform 0.3s ease';
            });

            input.addEventListener('blur', function () {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        confirmPasswordInput.addEventListener('input', function () {
            if (passwordInput.value !== this.value) {
                this.setCustomValidity('Passwords do not match');
                this.classList.add('is-invalid');
            } else {
                this.setCustomValidity('');
                this.classList.remove('is-invalid');
            }
        });


        passwordInput.addEventListener('input', function () {
            const password = this.value;
            const minLength = 8;

            if (password.length < minLength) {
                this.setCustomValidity(`Password must be at least ${minLength} characters long`);
            } else {
                this.setCustomValidity('');
            }

            if (confirmPasswordInput.value) {
                confirmPasswordInput.dispatchEvent(new Event('input'));
            }
        });

        form.addEventListener('submit', function (e) {
            const submitBtn = this.querySelector('.btn-cafeteria');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
            submitBtn.disabled = true;
            setTimeout(() => {
                if (document.querySelector('.is-invalid')) {
                    submitBtn.innerHTML = '<i class="fas fa-user-plus me-2"></i>Create Account';
                    submitBtn.disabled = false;
                    const card = document.querySelector('.card');
                    card.style.animation = 'shake 0.6s ease-in-out';
                    setTimeout(() => {
                        card.style.animation = '';
                    }, 600);
                }
            }, 100);
        });
    </script>

</body>

</html>