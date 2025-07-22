<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$password = $_SESSION['password']; 
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>To Do Task - الملف الشخصي</title>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
body {
    font-family: 'Tajawal', sans-serif;
    margin: 0;
    background-color: #121212;
    color: white;
    direction: rtl;
    unicode-bidi: plaintext;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: #1e1e1e;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    flex-wrap: wrap;
    gap: 10px;
}

.logo {
    font-size: 22px;
    color: #00ff88;
}

.chips {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
}

.chip {
    background-color: #2c2c2c;
    color: #00ff88;
    padding: 6px 12px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 13px;
}

.chip:hover {
    background-color: #00ff88;
    color: #121212;
}

@media (max-width: 600px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .logo {
        margin-bottom: 5px;
    }

    .chips {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        width: 100%;
        justify-content: flex-start;
    }
}

.container {
    flex: 1;
    display: flex;
    justify-content: center;
    margin-top: 30px;
    flex-direction: column;
    align-items: center;
    padding: 10px;
}

.notice {
    margin-bottom: 15px;
    color: #00ff88;
    font-size: 16px;
    text-align: center;
}

.card {
    background: #1e1e1e;
    border-radius: 10px;
    padding: 20px;
    width: 100%;
    max-width: 450px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

.card h2 {
    margin: 10px 0 10px;
    color: #00ff88;
    font-size: 22px;
}

.card i {
    font-size: 40px;
    color: #00ff88;
}

.info {
    text-align: right;
    margin: 10px 0;
    font-size: 15px;
    border-bottom: 1px solid #333;
    padding-bottom: 5px;
}

.info strong {
    color: #fff;
}

.info span {
    color: #777;
}

button {
    margin-top: 15px;
    padding: 6px 12px;
    background-color: #2c2c2c;
    color: #00ff88;
    border-radius: 20px;
    border: none;
    font-size: 14px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background-color: #00ff88;
    color: #121212;
}

.footer {
    background: transparent;
    color: #888;
    font-size: 12px;
    padding: 8px 10px;
    text-align: center;
    z-index: 999;
    margin-top: auto;
}

.hidden {
    display: none;
}

/* Responsive */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }
    .logo {
        margin-bottom: 10px;
    }
    .chips {
        justify-content: center;
    }
    .card {
        width: 85%;
    }
}
</style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <i class="fas fa-list-check"></i> To Do Task
    </div>
    <div class="chips">
        <a href="home.php" class="chip"><i class="fas fa-home"></i> الرئيسية</a>
        <a href="support.php" class="chip"><i class="fas fa-headset"></i> الدعم والتواصل</a>
        <a href="logout.php" class="chip"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج</a>
    </div>
</div>

<div class="container">
    <div class="notice">
        <i class="fas fa-tools"></i> هذه الصفحة ما زالت قيد التطوير
    </div>

    <div class="card">
        <i class="fas fa-user-circle"></i>
        <h2>الملف الشخصي</h2>

        <div class="info"><strong>الاسم:</strong> <span id="name"><?= htmlspecialchars($name) ?></span></div>
        <div class="info"><strong>البريد الإلكتروني:</strong> <span id="email"><?= htmlspecialchars($email) ?></span></div>
        <div class="info"><strong>كلمة المرور:</strong> <span id="password"><?= htmlspecialchars($password) ?></span></div>

        <button onclick="toggleInfo()">إظهار / إخفاء البيانات</button>
    </div>
</div>

<script>
function toggleInfo() {
    const fields = ['name', 'email', 'password'];
    fields.forEach(id => {
        const el = document.getElementById(id);
        el.classList.toggle('hidden');
    });
}
</script>

<footer class="footer">
    <p>© 2025 To Do Task — تم التطوير بكل حب بواسطة <strong>Mohammed Magdy</strong></p>
</footer>

</body>
</html>