<?php
require 'config.php';

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = hashPassword($_POST['password']);
    $role = $_POST['role'];

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $password, $role])) {
        header('Location: login.php?success=1');
    } else {
        $error = "User exists!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Neura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Sign Up</h2>
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <input type="text" class="form-control mb-2" name="name" placeholder="Name" required>
                    <input type="email" class="form-control mb-2" name="email" placeholder="Email" required>
                    <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>
                    <select class="form-control mb-2" name="role">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Register</button>
                </form>
                <a href="login.php">Already have account? Login</a>
            </div>
        </div>
    </div>
</body>
</html>