<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Login - Cafeteria System</title>
    <style>
        :root {
            --primary-gold: #f54a00;
            --coffee-brown: #6f4e37;
            --medium-brown: #a47551;
            --light-brown: #dab49d;
            --cream: #f5f1ea;
            --success: #27ae60;
            --reject: #e74c3c;
            --warm-white: #FFFEF7;
            --coffee-dark: #3C2414;
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
            overflow-x: hidden;
            font-family: "Poppins", sans-serif;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(circle at 20% 80%, rgba(139, 69, 19, 0.1) 2px, transparent 2px),
                radial-gradient(circle at 80% 20%, rgba(218, 165, 32, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 40% 40%, rgba(139, 69, 19, 0.05) 1px, transparent 1px);
            background-size: 50px 50px, 30px 30px, 70px 70px;
            background-attachment: fixed;
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(180deg); }
        }

        .login-container {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            border-radius: 20px;
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 10px 20px rgba(139, 69, 19, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(218, 165, 32, 0.2);
            backdrop-filter: blur(10px);
            background: rgba(255, 254, 247, 0.95);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow:
                0 30px 60px rgba(0, 0, 0, 0.15),
                0 15px 30px rgba(139, 69, 19, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg,
                var(--coffee-dark) 0%,
                var(--medium-brown) 30%,
                var(--coffee-brown) 70%,
                var(--primary-gold) 100%);
            color: var(--warm-white);
            text-align: center;
            position: relative;
            padding: 2rem;
            border: none;
            border-radius: 20px 20px 0 0 !important;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="30" cy="25" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="60" cy="15" r="0.8" fill="rgba(255,255,255,0.08)"/><circle cx="80" cy="30" r="0.3" fill="rgba(255,255,255,0.04)"/></svg>');
            background-size: 100px 100px;
            animation: sparkle 15s linear infinite;
        }

        @keyframes sparkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
        }

        .card-header h4 {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 2;
        }

        .header-icon {
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 3rem;
            color: var(--primary-gold);
            animation: steam 3s ease-in-out infinite;
            z-index: 2;
        }

        @keyframes steam {
            0%, 100% { transform: translateY(-50%) rotate(0deg) scale(1); }
            25% { transform: translateY(-55%) rotate(-5deg) scale(1.05); }
            50% { transform: translateY(-45%) rotate(5deg) scale(0.95); }
            75% { transform: translateY(-55%) rotate(-3deg) scale(1.02); }
        }

        .card-body {
            padding: 2.5rem;
            background: var(--warm-white);
        }

        .form-label {
            font-weight: 600;
            color: var(--coffee-dark);
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }

        .form-control {
            border: 2px solid rgba(139, 69, 19, 0.2);
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 254, 247, 0.8);
        }

        .form-control:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.25rem rgba(218, 165, 32, 0.25);
            background: var(--warm-white);
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: rgba(139, 69, 19, 0.5);
        }

        .btn-cafeteria {
            background: linear-gradient(135deg, var(--coffee-brown), var(--primary-gold));
            color: var(--warm-white);
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-cafeteria::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-cafeteria:hover::before {
            left: 100%;
        }

        .btn-cafeteria:hover {
            background: linear-gradient(135deg, var(--primary-gold), var(--coffee-brown));
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(139, 69, 19, 0.3);
        }

        .social-btn {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 2px solid;
            position: relative;
            overflow: hidden;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .social-btn.google:hover {
            background: #db4437;
            color: white;
            border-color: #db4437;
        }

        .social-btn.facebook:hover {
            background: #1877f2;
            color: white;
            border-color: #1877f2;
        }

        .social-btn.github:hover {
            background: #333;
            color: white;
            border-color: #333;
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
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(139, 69, 19, 0.3), transparent);
        }

        .divider span {
            background: var(--warm-white);
            padding: 0 1rem;
            position: relative;
            z-index: 1;
        }

        .form-text-error {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .login-footer {
            text-align: center;
            margin-top: 2rem;
        }

        .login-footer a {
            color: var(--coffee-brown);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-footer a:hover {
            color: var(--primary-gold);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-check-input:checked {
            background-color: var(--primary-gold);
            border-color: var(--primary-gold);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
        }

        .floating-cup {
            position: absolute;
            font-size: 2rem;
            color: rgba(139, 69, 19, 0.1);
            animation: float-cup 15s linear infinite;
        }

        .floating-cup:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-cup:nth-child(2) {
            top: 20%;
            right: 15%;
            animation-delay: 5s;
        }

        .floating-cup:nth-child(3) {
            bottom: 15%;
            left: 20%;
            animation-delay: 10s;
        }

        @keyframes float-cup {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.1; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 0.3; }
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }

            .card-header {
                padding: 1.5rem;
            }

            .card-header h4 {
                font-size: 1.5rem;
            }

            .header-icon {
                font-size: 2rem;
                right: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <i class="fas fa-coffee floating-cup"></i>
        <i class="fas fa-mug-hot floating-cup"></i>
        <i class="fas fa-coffee-bean floating-cup"></i>
    </div>

    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Welcome to Golden Bean</h4>
                        <i class="fas fa-mug-hot header-icon"></i>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2 text-warning"></i>Email Address
                                </label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Enter your email" required>
                                <div class="form-text-error" id="email-error"></div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2 text-warning"></i>Password
                                </label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Enter your password" required>
                                <div class="form-text-error" id="password-error"></div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-cafeteria w-100 mb-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>

                            <div class="divider">
                                <span>Or login with</span>
                            </div>

                            <div class="row g-2">
                                <div class="col-4">
                                    <a href="{{ route('auth.google') }}" class="btn btn-outline-danger social-btn google w-100">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('auth.facebook') }}" class="btn btn-outline-primary social-btn facebook w-100">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ url('auth/github') }}" class="btn btn-outline-dark social-btn github w-100">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="login-footer">
                                <p class="mb-0">Don't have an account?
                                    <a href="{{ route('register') }}">Create a new account</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const loginForm = document.querySelector('form');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');

        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
                this.parentElement.style.transition = 'transform 0.3s ease';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        loginForm.addEventListener('submit', function (e) {
            emailError.textContent = '';
            passwordError.textContent = '';
            let isValid = true;

            emailInput.classList.remove('is-invalid');
            passwordInput.classList.remove('is-invalid');

            if (!emailInput.value.trim()) {
                emailError.textContent = 'Email is required';
                emailInput.classList.add('is-invalid');
                isValid = false;
            } else if (!isValidEmail(emailInput.value)) {
                emailError.textContent = 'Please enter a valid email address';
                emailInput.classList.add('is-invalid');
                isValid = false;
            }

            if (!passwordInput.value.trim()) {
                passwordError.textContent = 'Password is required';
                passwordInput.classList.add('is-invalid');
                isValid = false;
            } else if (passwordInput.value.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters';
                passwordInput.classList.add('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                const card = document.querySelector('.card');
                card.style.animation = 'shake 0.5s ease-in-out';
                setTimeout(() => {
                    card.style.animation = '';
                }, 500);
            }
        });

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        const style = document.createElement('style');
        style.textContent = `
            .form-control.is-invalid {
                border-color: #dc3545;
                box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
                animation: shake 0.5s ease-in-out;
            }
        `;
        document.head.appendChild(style);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
