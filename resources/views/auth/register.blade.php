<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <!-- Incluindo o CSS do Bootstrap -->
    @include('home.css')
    <style>
        body {
            background-color: #f8f9fa;
            /* Cor de fundo clara */
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 450px;
        }

        .register-card h2 {
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

        .login-link {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header section -->
        @include('home.header')
        <!-- End header section -->

        <div class="register-container">
            <div class="register-card">
                <h2>Register</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <x-input-label for="address" :value="__('Address')" />
                        <x-text-input id="address" class="form-control" type="text" name="address" :value="old('address')" required autocomplete="address" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Already Registered? -->
                    <div class="login-link mb-3">
                        <a class="text-sm text-primary" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>

                    <!-- Register Button -->
                    <div class="d-grid">
                        <x-primary-button class="btn" style="background-color: skyblue; border: none;">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

            </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>