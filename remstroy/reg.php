<?php
    require_once 'components/remstroy_db.php';

session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin.php');
    exit;
}
// ... остальной код формы входа
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch();
    
    if ($user && $password == 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_login'] = $login;
        header('Location: admin.php');
        exit;
    } else {
        $error = "Неверный логин или пароль.";
    }
}
    include "components/header.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Вход в админ панель</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reg.css">
</head>
<body>
   <main class="main">
        <div class="container">
            <div class="reg__inner">
                <div class="reg__inner-block">
                    <h1 class="reg__inner-title">Вход <br>для администратора</h1>
                    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                    <form class="reg__inner-form" method="post">
                        <div class="reg__inner__form-group">
                            <label></label>
                            <input class="reg__inner__form__group-input" type="text" name="login" placeholder="Логин" required>
                        </div>
                        <div class="reg__inner__form-group">
                            <label></label>
                            <input class="reg__inner__form__group-input" type="password" name="password" placeholder="Пароль" required>
                        </div>
                        <div class="reg__inner-form-button">
                            <button class="reg__inner-form-btn" type="submit">Войти</button>
                        </div>
                    </form>
                    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>