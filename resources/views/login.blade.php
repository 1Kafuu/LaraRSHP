<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('image/logo unair.png') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login Page</title>
</head>

<body>
    <div class="login-page">
        <div class="login-container">
            <h2>Login</h2>
            <form method="POST" action="">
                <?php if (!empty($error_message)): ?>
                <div class="error"><?php    echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="signin">Sign In</button>
            </form>
        </div>
    </div>
</body>

</html>