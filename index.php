<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Neura - Learn Live</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .hero { margin-top: 100px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Neura</a>
            <div>
                <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                <a href="register.php" class="btn btn-light">Sign Up</a>
            </div>
        </div>
    </nav>
    <div class="container text-center hero">
        <h1 class="display-3">Learn Live, Grow Fast</h1>
        <p class="lead">Live lectures & notes download.</p>
        <a href="register.php" class="btn btn-lg btn-warning text-dark px-5">Start Free</a>
    </div>
</body>
</html>