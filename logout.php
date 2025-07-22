<?php
session_start();
session_unset(); // مسح جميع بيانات السيشن
session_destroy(); // إنهاء السيشن

// رجوع لصفحة تسجيل الدخول
header("Location: login.php");
exit();
?>