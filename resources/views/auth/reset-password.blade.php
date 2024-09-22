<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Incluindo o CSS do Bootstrap -->
    @include('home.css')
    <style>
        body {
            background-color: #f8f9fa;
            /* Cor de fundo clara */
        }

        .reset-password-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .reset-password-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        .reset-password-card h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #4CAF50;
            /* Cor personalizada */
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
            /* Cor ao passar o mouse */
        }

        .forgot-password {
            text-align: right;
        }

        .text-danger {
            color: #dc3545;
            /* Cor vermelha para erros */
        }

        .reset-password-card .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .reset-password-card .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        .btn-primary {
            background-color: #28a745;
            /* Verde para o botão */
        }

        .btn-primary:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header section -->
        @include('home.header')
        <!-- End header section -->

        <div class="reset-password-container">
            <div class="reset-password-card">
                <h2>Reset Password</h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-2" />
                    </div>

                    <!-- Reset Password Button -->
                    <div class="d-grid mt-4">
                        <x-primary-button class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>