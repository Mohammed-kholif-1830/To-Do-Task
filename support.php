<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>الدعم والتواصل - To Do Task</title>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
body {
    font-family: 'Tajawal', sans-serif;
    background-color: #121212;
    color: white;
    margin: 0;
    direction: rtl;
    text-align: center;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
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
    align-items: center;
    padding: 20px;
}

.message {
    font-size: 24px;
    color: #ccc;
    max-width: 90%;
    line-height: 1.8;
}
.message i {
    color: #00ff88;
    font-size: 28px;
    margin-left: 10px;
    vertical-align: middle;
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
    .message {
        font-size: 20px;
    }
}

@media (max-width: 480px) {
    .message {
        font-size: 18px;
    }
    .footer {
        font-size: 10px;
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
    <div class="message">
        <i class="fas fa-spinner"></i>
        الصفحة مازالت قيد التطوير، وسيتم تحديثها قريبًا.
    </div>
</div>

<footer class="footer">
    <p>© 2025 To Do Task — تم التطوير بكل حب بواسطة <strong>Mohammed Magdy</strong></p>
</footer>

</body>
</html>