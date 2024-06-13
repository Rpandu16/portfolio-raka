<?php
session_start();

// Fungsi untuk memeriksa email Google
function isGoogleEmail($email) {
    $domain = substr(strrchr($email, "@"), 1);
    return $domain === 'gmail.com' || $domain === 'googlemail.com';
}

// Variabel untuk menyimpan pesan error atau sukses
$message = "";

// Proses form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        // Proses registrasi
        $email = $_POST['register-email'];
        $password = $_POST['register-password'];

        if (isGoogleEmail($email)) {
            $conn = new mysqli("localhost", "root", "", "login_system");
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                $message = "Registrasi berhasil! Silakan login.";
            } else {
                $message = "Registrasi gagal: " . $conn->error;
            }

            $conn->close();
        } else {
            $message = "Maaf, hanya email Google yang diperbolehkan.";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'login') {
        // Proses login
        $email = $_POST['login-email'];
        $password = $_POST['login-password'];

        $conn = new mysqli("localhost", "root", "", "login_system");
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                header("Location: portfolio.php");
                exit;
            } else {
                $message = "Password salah!";
            }
        } else {
            $message = "Email belum ke daftar";
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .toggle-link {
            text-align: center;
            margin-top: 10px;
        }
        .toggle-link a {
            color: #007BFF;
            text-decoration: none;
        }
        .toggle-link a:hover {
            text-decoration: underline;
        }
        .register-form {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 id="form-title">Login</h2>
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form id="login-form" class="login-form" method="post" action="">
            <div class="form-group">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="login-email" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="login-password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <input type="hidden" name="action" value="login">
        </form>
        <form id="register-form" class="register-form" method="post" action="">
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" id="register-email" name="register-email" required>
            </div>
            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" id="register-password" name="register-password" required>
            </div>
            <button type="submit" class="btn">Register</button>
            <input type="hidden" name="action" value="register">
        </form>
        <div class="toggle-link">
            <p id="toggle-text">Don't have an account? <a href="#" onclick="toggleForm()">Register here</a></p>
        </div>
    </div>

    <script>
        function toggleForm() {
            var loginForm = document.getElementById('login-form');
            var registerForm = document.getElementById('register-form');
            var formTitle = document.getElementById('form-title');
            var toggleText = document.getElementById('toggle-text');

            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                formTitle.textContent = 'Login';
                toggleText.innerHTML = 'Don\'t have an account? <a href="#" onclick="toggleForm()">Register here</a>';
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                formTitle.textContent = 'Register';
                toggleText.innerHTML = 'Already have an account? <a href="#" onclick="toggleForm()">Login here</a>';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
        });
    </script>
</body>
</html>
