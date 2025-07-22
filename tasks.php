<?php    
session_start();    
include 'db.php';    
    
if (!isset($_SESSION['user_id'])) {    
    header("Location: login.php");    
    exit();    
}    
    
$user_id = $_SESSION['user_id'];    
$filter = $_GET['filter'] ?? 'all';    
    
// إضافة مهمة    
if (!empty($_POST['task'])) {    
    $task = trim($_POST['task']);    
    $stmt = $conn->prepare("INSERT INTO tasks (user_id, title) VALUES (?, ?)");    
    $stmt->execute([$user_id, $task]);    
}    
    
// إتمام مهمة    
if (!empty($_GET['done'])) {    
    $done_id = intval($_GET['done']);    
    $conn->prepare("UPDATE tasks SET status='done' WHERE id=? AND user_id=?")    
         ->execute([$done_id, $user_id]);    
}    
    
// حذف مهمة    
if (!empty($_GET['delete'])) {    
    $del_id = intval($_GET['delete']);    
    $conn->prepare("DELETE FROM tasks WHERE id=? AND user_id=?")    
         ->execute([$del_id, $user_id]);    
}    
    
// استعلام حسب الفلتر    
$query = "SELECT * FROM tasks WHERE user_id=?";    
if ($filter == 'pending') {    
    $query .= " AND status='pending'";    
} elseif ($filter == 'done') {    
    $query .= " AND status='done'";    
}    
$query .= " ORDER BY created_at DESC";    
    
$stmt = $conn->prepare($query);    
$stmt->execute([$user_id]);    
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);    
?>  <!DOCTYPE html>  <html lang="ar">    <head>    
<meta charset="UTF-8">    
<meta name="viewport" content="width=device-width, initial-scale=1.0">    
<title>مهامي - To Do Task</title>    
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">    
<style>    
body {    
    font-family: 'Tajawal', sans-serif;    
    margin: 0;    
    background-color: #121212;    
    color: white;    
    direction: rtl;    
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
    max-width: 1000px;    
    margin: 30px auto;    
    text-align: center;    
}    
.add-task {    
    margin-bottom: 30px;    
    display: flex;    
    justify-content: center;    
}  .add-task-box {  
display: flex;  
align-items: center;  
gap: 10px;  
width: 80%;  
max-width: 600px;  
}  .add-task-box input {
flex: 1;
padding: 10px 5px;
border: none;
border-bottom: 2px solid #444;
outline: none;
background-color: transparent;
color: #fff;
font-size: 14px;
transition: border-color 0.3s, background-color 0.3s;
}

.add-task-box input:focus {
border-color: #00ff88;
background-color: transparent;
}

.add-task-box input:active {
background-color: transparent;
}

.add-task-box input:-webkit-autofill {
background-color: transparent !important;
-webkit-box-shadow: 0 0 0px 1000px transparent inset !important;
-webkit-text-fill-color: #fff !important;
}

.add-task-box button {
padding: 8px 16px;
background-color: #00ff88;
color: #121212;
font-size: 13px;
font-weight: bold;
border: none;
cursor: pointer;
border-radius: 20px;
transition: 0.3s;
}

.add-task-box button:hover {
background-color: #00cc70;
}
.filters {
margin: 20px 0;
}
.tasks-grid {
display: grid;
grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
gap: 20px;
}
.task-card {
background-color: #1e1e1e;
padding: 15px;
border-radius: 10px;
box-shadow: 0 0 5px rgba(0,0,0,0.5);
text-align: right;
position: relative;
}
.task-card.done {
opacity: 0.6;
text-decoration: line-through;
}
.task-card h3 {
margin: 0;
font-size: 16px;
color: #00ff88;
}
.task-card p {
font-size: 12px;
color: #aaa;
margin: 10px 0;
word-break: break-word;
}
.task-card .actions {
margin-top: 10px;
}
.task-card .btn {
display: inline-block;
padding: 5px 10px;
border-radius: 5px;
font-size: 12px;
color: #121212;
background-color: #00ff88;
text-decoration: none;
margin-right: 5px;
transition: 0.3s;
}
.task-card .btn:hover {
opacity: 0.8;
}
.task-card .btn.delete {
background-color: #f55;
}
.task-card .btn.delete:hover {
background-color: #d33;
}
.footer {
    text-align: center;
    font-size: 12px;
    color: #888;
    margin-top: 20px;
    padding: 10px 0;
}

.footer hr {
    border: none;
    border-top: 1px solid #333;
    margin-bottom: 10px;
    width: 80%;
}

.task-card h3 {
    word-break: break-word;
}

/* navbar والفلتر على الموبايل */
@media (max-width: 600px) {

    .add-task-box {
        flex-direction: column;
        width: 95%;
    }

    .add-task-box input {
        width: 100%;
    }

    .add-task-box button {
        width: 100%;
    }

    .filters {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        justify-content: center;
    }
}

@media (max-width: 600px) {
  .footer hr {
    width: 70%;
  }

  .footer {
    font-size: 11px;
  }
}

/* تحسين الهوامش على شاشات كبيرة */
@media (min-width: 1200px) {
    .container {
        padding: 0 20px;
    }
}

</style>    
</head>    
<body>  <div class="navbar">
    <div class="logo">
        <i class="fas fa-list-check"></i> To Do Task
    </div>
    <div class="chips">
        <a href="home.php" class="chip"><i class="fas fa-home"></i> الرئيسية</a>
        <a href="support.php" class="chip"><i class="fas fa-headset"></i> الدعم والتواصل</a>
        <a href="logout.php" class="chip"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج</a>
    </div>
</div>  <div class="container">    
   <h2 class="page-title">    
    <i class="fas fa-clipboard-list"></i>    
    مهامك في انتظارك.. أنجزها على راحتك    
</h2>  <form method="POST" class="add-task">    
<div class="add-task-box">    
    <input type="text" name="task" placeholder="أكتب مهمتك هنا..." required>    
    <button type="submit"><i class="fas fa-paper-plane"></i> إضافة</button>    
</div>  </form>    
    <div class="filters">    
        <a href="?filter=all" class="chip">الكل</a>    
        <a href="?filter=pending" class="chip">غير منتهية</a>    
        <a href="?filter=done" class="chip">منتهية</a>    
    </div>  <div class="tasks-grid">    
    <?php foreach ($tasks as $task): ?>    
        <div class="task-card <?= $task['status']=='done' ? 'done' : '' ?>">    
            <h3><i class="fas fa-tasks"></i> <?= htmlspecialchars($task['title']) ?></h3>    
            <p><i class="fas fa-calendar-alt"></i> <?= $task['created_at'] ?></p>    
            <div class="actions">    
                <?php if ($task['status']=='pending'): ?>    
                    <a href="?done=<?= $task['id'] ?>" class="btn"><i class="fas fa-check"></i> إنهاء</a>    
                <?php endif; ?>    
                <a href="?delete=<?= $task['id'] ?>" class="btn delete"><i class="fas fa-trash"></i> حذف</a>    
            </div>    
        </div>    
    <?php endforeach; ?>    
</div>  </div>    
<footer class="footer">
    <hr>
    <p>© 2025 To Do Task — تم التطوير بكل حب بواسطة <strong>Mohammed Magdy</strong></p>
</footer> </body>    
</html>