<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Benedicto College</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
   
</head>
<body>
    <div class="header">
        <div class="header-logo-container">
            <img src="https://edukasyon-production.s3.amazonaws.com/uploads/school/avatar/1790/bc.jpg" alt="Benedicto College Logo" class="header-logo">
                <div class="college-name">BENEDICTO<br>COLLEGE</div>
            </div>
        </div>
    
    <div class="page-content">
        <!-- Text on the left side, matching the image -->
        <div class="text-overlay">
            Your Education...<br>Our Mission
        </div>

        <div class="login-container">
            <div class="login-header">
                <h1>Welcome!</h1>
            </div>
            
            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="login-btn">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
