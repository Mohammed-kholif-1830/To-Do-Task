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

<style>
.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: #1e1e1e;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}
.logo {
    font-size: 22px;
    color: #00ff88;
}
.chip {
    background-color: #2c2c2c;
    color: #00ff88;
    padding: 6px 14px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 14px;
}
.chip:hover {
    background-color: #00ff88;
    color: #121212;
}
</style>