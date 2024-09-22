<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include necessary CSS files -->
    @include('home.css')

    <!-- Custom styles -->
    <style>
        body {
            background-color: #f4f6f9;
        }

        .password-reset-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-reset-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 450px;
            width: 100%;
        }

        .password-reset-card h2 {
            margin-bottom: 15px;
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 5px;
            height: 45px;
        }

        .btn-primary {
            background-color: #1e90ff;
            border-color: #1e90ff;
            height: 45px;
        }

        .btn-primary:hover {
            background-color: #1c86ee;
            border-color: #1c86ee;
        }

        .text-muted {
            color: #6c757d;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header section starts -->
        @include('home.header')
        <!-- Header section ends -->

        <!-- Main Content Area -->
        <div class="password-reset-container">
            <div class="password-reset-card">
                <!-- Password Reset Information -->
                <h2>{{ __('Forgot Password') }}</h2>
                <p class="text-muted">
                    {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>

                <!-- Session Status -->
                @if(session('status'))
                <div class="alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <!-- Password Reset Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>