<?php
session_start();
include '../../database.php';


if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: ../dashboard.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Invalid username!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | MirzaTechnology</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ---- Background ---- */
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #001F54, #004AAD, #00B4D8, #6C63FF);
            background-size: 300% 300%;
            animation: gradientShift 10s ease infinite;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ---- Login Card ---- */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.2);
            padding: 2rem 2.5rem;
            width: 100%;
            max-width: 420px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.25);
        }

        /* ---- Brand ---- */
        .brand {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            color: #004AAD;
            margin-bottom: 1rem;
        }

        .brand span {
            color: #00B4D8;
        }

        /* ---- Input ---- */
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #00B4D8;
            box-shadow: 0 0 8px rgba(0, 180, 216, 0.4);
        }

        /* ---- Button ---- */
        .btn-primary {
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 600;
            background: linear-gradient(90deg, #004AAD, #00B4D8);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #00B4D8, #6C63FF);
            box-shadow: 0 5px 15px rgba(0, 180, 216, 0.5);
        }

        /* ---- Footer ---- */
        .footer-text {
            text-align: center;
            margin-top: 1rem;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand">Jkew<span>Trust</span></div>
    <h5 class="text-center text-muted mb-4">Admin Panel Login</h5>

    <?php if(isset($error)) echo "<div class='alert alert-danger text-center'>$error</div>"; ?>

    <form method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>

    <div class="footer-text">
        &copy; <?= date('Y'); ?> Jkewtrust. All rights reserved.
    </div>
</div>

</body>
</html>
