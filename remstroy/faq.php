<?php
    require_once 'components/remstroy_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['anon_question'])) {
    $question = trim($_POST['anon_question']);
    if ($question) {
        $stmt = $pdo->prepare("INSERT INTO faq (question) VALUES (?)");
        $stmt->execute([$question]);
        $faq_success = "Ваш вопрос отправлен. Ответ появится после обработки. (в течение 2х часов)";
    } else {
        $faq_error = "Введите вопрос.";
    }
}

$stmt = $pdo->query("SELECT * FROM faq WHERE answer IS NOT NULL ORDER BY created_at DESC");
$faq_list = $stmt->fetchAll();

include "components/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/faq.css">
    <title>Document</title>
</head>
<body>
    <section class="faq">
        <div class="container">
            <div class="faq__inner">
                <div class="faq__inner-titel">
                    <h1>Часто задаваемые вопросы</h1>
                </div>
            </div>
            <div class="faq__item-question">
                <?php if (empty($faq_list)): ?>
                    <p class="faq__text-p">Пока нет опубликованных вопросов.</p>
                <?php else: ?>
                <?php foreach ($faq_list as $item): ?>
                <div class="faq-accordion-item">
                    <div class="faq-question">
                        <span class="question-text"><?= htmlspecialchars($item['question']) ?></span>
                        <button class="faq-toggle-btn">Показать ответ</button>
                    </div>
                    <div class="faq-answer" style="display: none">
                        <span class="answer-text">
                        <span class="answer-span"></span>
                            <?= nl2br(htmlspecialchars($item['answer'])) ?>
                        </span>
                    </div>
                </div>
                <span class="span"></span>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>      
        </div>
    </section>

<section class="faq__question">
    <div class="container">
        <div class="faq__question-titel">
            <h2 class="faq__question-titel-h2">Задать свой вопрос (анонимно)</h2>
        </div>
        <div class="faq__question-form">
            <form method="post">
                <div class="faq__question__form-windowtext">
                    <textarea class="faq__question__form-textarea" name="anon_question" rows="4" cols="80" minlength="10" maxlength="200" placeholder="Ваш вопрос" required></textarea>
                </div>
                <div class="faq__question-error">
                    <?php if (isset($faq_error)) echo "<p class='error'>$faq_error</p>"; ?>
                    <?php if (isset($faq_success)) echo "<p class='success'>$faq_success</p>"; ?>
                </div>
                <div class="faq__question-button">
                    <button type="submit" class="faq__question-btn">Отправить вопрос</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include "components/footer.php"; ?>
<script src="js/faqbtn.js"></script>
</body>
</html>
