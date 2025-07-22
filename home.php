<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>To Do Task - الرئيسية</title>
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
.page-title {
    font-size: 18px;
    color: #ccc;
    margin-bottom: 25px;
    letter-spacing: 0.5px;
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.page-title i {
    color: #00ff88;
    font-size: 20px;
}
.container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 50px;
    flex-wrap: wrap;
}
.section {
    margin: 50px auto;
    width: 90%;
    text-align: center;
}
.section-title {
    color: #00ff88;
    margin-bottom: 30px;
    font-size: 17px;
}

/* الأنيميشن للكروت فقط */
.card {
    background: #1e1e1e;
    border-radius: 10px;
    padding: 20px;
    width: 260px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    text-decoration: none;
    color: white;
    transition: transform 0.3s;
    opacity: 0;
    transform: translateY(20px);
    animation: slideUp 1s forwards;
}
.card:nth-child(1) { animation-delay: 0.3s; }
.card:nth-child(2) { animation-delay: 0.6s; }
.card:nth-child(3) { animation-delay: 0.9s; }

@keyframes slideUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card:hover {
    transform: scale(1.05);
}
.card i {
    font-size: 36px;
    color: #00ff88;
    margin-bottom: 10px;
}
.card h2 {
    margin: 10px 0;
    color: #00ff88;
    font-size: 18px;
}
.card p {
    font-size: 13px;
    color: #ccc;
    line-height: 1.6;
}
.section-cards {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}
.footer {
    margin-top: 50px;
    font-size: 11px;
    color: #777;
    text-align: center;
    padding: 10px;
}

/* تعديل container الرئيسي */
.container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 50px;
    flex-wrap: wrap;
}

/* تعديل section-cards */
.section-cards {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

/* الكارت */
.card {
    background: #1e1e1e;
    border-radius: 10px;
    padding: 15px;
    width: 200px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    text-decoration: none;
    color: white;
    transition: transform 0.3s;
    opacity: 0;
    transform: translateY(20px);
    animation: slideUp 1s forwards;
    flex: 0 1 180px; /* مهم */
    margin: 5px;
}
.card:hover {
    transform: scale(1.05);
}

/* تعديل container */
.container, .section-cards {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 10px;
    margin: 20px auto;
}

/* Media Queries */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }
    .logo {
        margin-bottom: 10px;
    }
    .chips {
        width: 100%;
        justify-content: center;
    }


/* Media Queries */
@media (max-width: 768px) {
    .card {
        width: 160px;
        flex: 0 1 150px;
    }
}

@media (max-width: 576px) {
    .card {
        width: 140px;
        flex: 0 1 130px;
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
    <a href="profile.php" class="card">
        <i class="fas fa-user-circle"></i>
        <h2>الملف الشخصي</h2>
        <p>صفحة تعرض بياناتك الشخصية وإعدادات حسابك.</p>
    </a>

    <a href="tasks.php" class="card">
        <i class="fas fa-clipboard-list"></i>
        <h2>مهامي</h2>
        <p>تابع وأدِر مهامك اليومية بسهولة ونظام.</p>
    </a>
</div>

<div class="section">
    <div class="section-title">خدمات الموقع</div>
    <div class="section-cards">
        <div class="card">
            <i class="fas fa-tasks"></i>
            <h2>إدارة المهام</h2>
            <p>تنظيم المهام اليومية بشكل مرتب لزيادة إنتاجيتك.</p>
        </div>
        <div class="card">
            <i class="fas fa-stopwatch"></i>
            <h2>متابعة الوقت</h2>
            <p>رصد أوقات تنفيذ المهام لتخطيط أفضل.</p>
        </div>
        <div class="card">
            <i class="fas fa-chart-bar"></i>
            <h2>تحليل الأداء</h2>
            <p>تقييم تقدمك باستمرار وتحقيق أهدافك بسهولة.</p>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">فكرة وتصميم الموقع</div>
    <div class="section-cards">
        <div class="card">
            <i class="fab fa-php"></i>
            <h2>لغة البرمجة</h2>
            <p>تم تطوير الموقع باستخدام PHP و MySQL.</p>
        </div>
        <div class="card">
            <i class="fas fa-pencil-ruler"></i>
            <h2>التصميم</h2>
            <p>واجهة استخدام بسيطة وألوان مريحة وتجربة مستخدم مثالية.</p>
        </div>
        <div class="card">
            <i class="fas fa-user-shield"></i>
            <h2>المطور</h2>
            <p>تم برمجة وتطوير الموقع بواسطة Mohammed Magdy.</p>
        </div>
    </div>
</div>

<footer class="footer">
    <p>© 2025 To Do Task — تم التطوير بكل حب بواسطة <strong>Mohammed Magdy</strong></p>
</footer>

</body>
</html>