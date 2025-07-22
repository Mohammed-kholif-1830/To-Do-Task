<?php
session_start();

$host = "localhost";
$dbname = "todo_task";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if (!empty($email) && !empty($pass)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $pass === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            header("Location: home.php");
            exit();
        } else {
            $error = "البريد الإلكتروني أو كلمة المرور غير صحيحة.";
        }
    } else {
        $error = "يرجى ملء جميع الحقول.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>To Do Task - تسجيل الدخول</title>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
body {
    font-family: 'Tajawal', sans-serif;
    background-color: #121212;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 10px;
}
.login-box {
    background-color: #1e1e1e;
    padding: 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 0 15px #00ff88;
    width: 90%;
    max-width: 420px;
}
.logo {
    font-size: 50px;
    color: #00ff88;
    margin-bottom: 5px;
}
h1 {
    color: #00ff88;
    margin: 0 0 10px;
    font-size: 26px;
}
.subtitle {
    font-size: 14px;
    margin-bottom: 20px;
    color: #bbb;
}
.input-group {
    position: relative;
    width: 90%;
    margin: 0 auto 15px;
}
.input-group i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #00ff88;
}
input {
    width: 85%;
    padding-left: 40px;
    padding: 12px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #00ff88;
    background: transparent;
    color: white;
    text-align: right;
    outline: none;
}
input:focus {
    box-shadow: none;
    background: transparent;
}
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px #1e1e1e inset !important;
    -webkit-text-fill-color: white !important;
    caret-color: white;
}
button {
    width: 90%;
    padding: 12px;
    background-color: #00ff88;
    color: black;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}
button:hover {
    background-color: #00cc70;
}
a {
    color: #00ff88;
    text-decoration: none;
    font-size: 13px;
}
a:hover {
    text-decoration: underline;
}
.footer {
    margin-top: 20px;
    font-size: 11px;
    color: #777;
    text-align: center;
}
.error {
    color: red;
    font-size: 13px;
    margin-bottom: 10px;
}

@media (max-width: 400px) {
    .login-box {
        padding: 20px;
    }

    h1 {
        font-size: 22px;
    }

    .subtitle {
        font-size: 12px;
    }

    button {
        font-size: 13px;
    }
}
</style>
</head>
<body>

<div class="login-box">
    <div class="logo"><i class="fas fa-list-check"></i></div>
    <h1>To Do Task</h1>
    <div class="subtitle">ابدأ بتنظيم مهامك بسهولة</div>

    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

    <form method="post" autocomplete="off">
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="كلمة المرور" required>
        </div>
        <button type="submit">تسجيل الدخول</button>
    </form>

    <p>ليس لديك حساب؟ <a href="register.php">إنشاء حساب جديد</a></p>
</div>

<div class="footer">© Mohammed Magdy</div>

</body>
</html>