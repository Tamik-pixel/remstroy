<?php
    require_once 'components/remstroy_db.php';

session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: reg.php');
    exit;
}

$tab = $_GET['tab'] ?? 'contacts';
$status_filter = $_GET['status'] ?? 'new';

// Изменение статуса заявки с главной
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_contact'])) {
    $contact_id = $_POST['contact_id'] ?? 0;
    $new_status = $_POST['new_status'] ?? '';
    if ($contact_id && in_array($new_status, ['new', 'in_progress', 'done'])) {
        $stmt = $pdo->prepare("UPDATE contacts SET status = ? WHERE id = ?");
        $stmt->execute([$new_status, $contact_id]);
        header("Location: admin.php?tab=contacts&status=$status_filter");
        exit;
    }
}

// Ответ на анонимный вопрос
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_faq_answer'])) {
    $faq_id = $_POST['faq_id'] ?? 0;
    $answer = trim($_POST['answer'] ?? '');
    if ($faq_id && $answer) {
        $stmt = $pdo->prepare("UPDATE faq SET answer = ? WHERE id = ?");
        $stmt->execute([$answer, $faq_id]);
        header("Location: admin.php?tab=faq");
        exit;
    }
}

// Удаление анонимного вопроса
if (isset($_GET['delete_faq'])) {
    $faq_id = $_GET['delete_faq'];
    $stmt = $pdo->prepare("DELETE FROM faq WHERE id = ?");
    $stmt->execute([$faq_id]);
    header("Location: admin.php?tab=faq");
    exit;
}

// Список заявок по статусу
$stmt = $pdo->prepare("SELECT * FROM contacts WHERE status = ? ORDER BY created_at DESC");
$stmt->execute([$status_filter]);
$contacts = $stmt->fetchAll();

// Все анонимные вопросы
$faq_all = $pdo->query("SELECT * FROM faq ORDER BY created_at DESC")->fetchAll();

    include "components/header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Админ панель</title>
    <meta charset="utf-8">
</head>
<body>
    <div class="container">
        <div class="admin__inner">
            <div class="admin__inner-title">
                <h1>Административная панель</h1>
            </div>
            <div class="admin__inner-nav">
                <a href="?tab=contacts&status=new" class="tab <?= $tab === 'contacts' ? 'active' : '' ?>">Вопросы с главной</a>
                <a href="?tab=faq" class="tab <?= $tab === 'faq' ? 'active' : '' ?>">Анонимные вопросы</a>
            </div>
        
            <?php if ($tab === 'contacts'): ?>
                <div class="admin__inner__title-h2">
                    <h2>Вопросы с главной страницы</h2>
                </div>
                <div class="admin__inner-nav2">
                    <a href="?tab=contacts&status=new" class="tab <?= $status_filter === 'new' ? 'active' : '' ?>">Новые</a>
                    <a href="?tab=contacts&status=in_progress" class="tab <?= $status_filter === 'in_progress' ? 'active' : '' ?>">В работе</a>
                    <a href="?tab=contacts&status=done" class="tab <?= $status_filter === 'done' ? 'active' : '' ?>">Выполненные</a>
                </div>
                <?php if (empty($contacts)): ?>
                    <div class="admin__inner-status">
                        <p>Нет вопросов в этом статусе.</p>
                    </div>
                <?php else: ?>
                    <table class="contacts-table">
                            <thead class="table">
                                <tr><th>ID</th><th>ФИО</th><th>Телефон</th><th>Вопрос</th><th>Дата</th><th>Действия</th></tr>
                            </thead>

                        <tbody>
                            <?php foreach ($contacts as $c): ?>
                            <tr>
                                <td><?= $c['id'] ?></td>
                                <td><?= htmlspecialchars($c['name']) ?></td>
                                <td><?= htmlspecialchars($c['phone']) ?></td>
                                <td><?= nl2br(htmlspecialchars($c['question'])) ?></td>
                                <td><?= $c['created_at'] ?></td>
                                <td>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="contact_id" value="<?= $c['id'] ?>">
                                        <input type="hidden" name="new_status" value="new">
                                        <button type="submit" name="action_contact" <?= $c['status'] === 'new' ? 'disabled' : '' ?>>Новый</button>
                                    </form>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="contact_id" value="<?= $c['id'] ?>">
                                        <input type="hidden" name="new_status" value="in_progress">
                                        <button type="submit" name="action_contact" <?= $c['status'] === 'in_progress' ? 'disabled' : '' ?>>В работу</button>
                                    </form>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="contact_id" value="<?= $c['id'] ?>">
                                        <input type="hidden" name="new_status" value="done">
                                        <button type="submit" name="action_contact" <?= $c['status'] === 'done' ? 'disabled' : '' ?>>Выполнен</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            <?php elseif ($tab === 'faq'): ?>
                <div class="admin__inner__title-h2">
                    <h2>Анонимные вопросы</h2>
                </div>
                <?php if (empty($faq_all)): ?>
                    <p>Нет анонимных вопросов.</p>
                <?php else: ?>
                    <table class="faq-table">
                        <thead>
                            <tr><th>ID</th><th>Вопрос</th><th>Ответ</th><th>Дата</th><th>Действия</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($faq_all as $f): ?>
                                <tr>
                                    <td><?= $f['id'] ?></td>
                                    <td><?= htmlspecialchars($f['question']) ?></td>
                                    <td>
                                        <?php if ($f['answer']): ?>
                                            <?= nl2br(htmlspecialchars($f['answer'])) ?>
                                            <?php else: ?>
                                                <form class="faq__form" method="post">
                                                    <input type="hidden" name="faq_id" value="<?= $f['id'] ?>">
                                                    <textarea class="faq__textarea" name="answer" rows="2" cols="40" placeholder="Введите ответ..."></textarea>
                                                    <button type="submit" name="action_faq_answer">Ответить</button>
                                                </form>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $f['created_at'] ?></td>
                                    <td>
                                        <a href="?tab=faq&delete_faq=<?= $f['id'] ?>" onclick="return confirm('Удалить вопрос?');" class="delete-btn">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php endif; ?>

                    <p><a class="admin__inner-logout-p" href="logout.php">Выйти</a></p>
                    </div>
                    </div>
                    <?php 
    include "components/footer.php"; 
    ?>
</body>
</html>