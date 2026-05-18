<?php 
require_once 'components/remstroy_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $question = trim($_POST['question'] ?? '');
    if ($name && $phone && $question) {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, phone, question) VALUES (?, ?, ?)");
        $stmt->execute([$name, $phone, $question]);
        // РЕДИРЕКТ с параметром success и якорем
        header('Location: index.php?success=1#form_anchor');
        exit;
    } else {
        // Редирект с ошибкой
        header('Location: index.php?error=1#form_anchor');
        exit;
    }
}

// Если пришли с параметром success или error, показываем сообщение
$success_msg = isset($_GET['success']) ? "Спасибо! Ваш вопрос отправлен." : '';
$error_msg = isset($_GET['error']) ? "Заполните все поля!" : '';

include "components/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <main class="main">
        <section class="about">
            <div class="about__top">
                <div class="container">
                    <div class="about__top-info">
                        <div class="about__top__info-title">
                            <h2 class="about__top__info__title-h2">СТРОИТЕЛЬНАЯ КОМПАНИЯ</h2>
                            <h1 class="about__top__info__title-h1">РЕМСТРОЙ</h1>
                        </div>
                        <div class="about__top__info-text">
                            <p class="about__top__info__text-1">Вид деятельности</p>
                            <p class="about__top__info__text-2">Строительство и ремонт жилых и нежилых зданий</p>
                        </div>
                    </div>
                 </div>
            </div>
        </section>
        <div class="decor"></div>
            <div class="container">
                <section class="experience">
                    <div class="main__experience">                   
                            <h2 class="main__experience-title">Наш опыт работы</h2>
                        <div class="main__experience-info">
                            <p class="main__experience__info-text">
                                Мы обладаем 15-летним опытом в строительной сфере. За это время <br>
                                успешно реализовали проекты разного уровня сложности, масштаба и назначения. <br> 
                                Специализируемся на следующих направлениях:
                            </p>
                        </div>
                        <div class="main__experience-list">
    
                            <!-- 1 -->
                            <div class="experience-item">
                                <img src="images/icons/experience/roof.png" alt="" class="main__experience__list-img" width="60">
                                <p class="main__experience__list-text">Кровельные работы всех типов (мягкая, <br>металлочерепица, фальцевая кровля)</p>
                            </div>
    
                            <!-- 2 -->
                            <div class="experience-item">
                                <img src="images/icons/experience/siding.png" alt="" class="main__experience__list-img" width="60">
                                <p class="main__experience__list-text">Монтаж сайдинга и фасадных систем</p>
                            </div>
    
                            <!-- 3 -->
                            <div class="experience-item">
                                <img src="images/icons/experience/foundation.png" alt="" class="main__experience__list-img" width="60">
                                <p class="main__experience__list-text">Устройство фундаментов (ленточные, <br>плитные, свайные)</p>
                            </div>
    
                            <!-- 4 -->
                            <div class="experience-item">
                                <img src="images/icons/experience/concrete.png" alt="" class="main__experience__list-img" width="60">
                                <p class="main__experience__list-text">Железобетонные работы (монолитные <br>конструкции, армирование)</p>
                            </div>
    
                            <!-- 5 -->
                            <div class="experience-item">
                                <img src="images/icons/experience/interior.png" alt="" class="main__experience__list-img" width="60">
                                <p class="main__experience__list-text">Внутренняя отделка под ключ (штукатурка, <br>стяжка, плитка, покраска)</p>
                            </div>
    
                            <!-- 6 -->
                            <div class="experience-item">
                                <img src="images/icons/experience/job.png" alt="" class="main__experience__list-img" width="60">
                                <p class="main__experience__list-text">И многие другие виды работ</p>
                            </div>
    
                        </div>
                    </div>
                </section>
            </div>
            <span class="span"></span>
            <div class="container">
                <section class="advantages">
                    <div class="main__advantages">
                        <h2 class="main__advantages-title">Преимущества работы с нами</h2>
                        <div class="main__advantages-list">
                            
                            <!-- 1 -->
                            <div class="advantages-item">
                                <img src="images/icons/advantages/garant.png" alt="" class="main__advantages__list-img" width="60">
                                <p class="main__advantages__list-text">100% Гарантии качества</p>
                            </div>
    
                            <!-- 2 -->
                            <div class="advantages-item">
                                <img src="images/icons/advantages/calendar.png" alt="" class="main__advantages__list-img" width="60">
                                <p class="main__advantages__list-text">Кратчайшие сроки</p>
                            </div>
    
                            <!-- 3 -->
                            <div class="advantages-item">
                                <img src="images/icons/advantages/money.png" alt="" class="main__advantages__list-img" width="60">
                                <p class="main__advantages__list-text">Экономие ваших средств</p>
                            </div>
    
                            <!-- 4 -->
                            <div class="advantages-item">
                                <img src="images/icons/advantages/worker.png" alt="" class="main__advantages__list-img" width="60">
                                <p class="main__advantages__list-text">Профессиональные специалисты</p>
                            </div>
    
                            <!-- 5 -->
                            <div class="advantages-item">
                                <img src="images/icons/advantages/drawing.png" alt="" class="main__advantages__list-img" width="60">
                                <p class="main__advantages__list-text">Индивидуальное проектирование</p>
                            </div>
    
                        </div>
                    </div>
                </section>
            </div>

            <span id="form_anchor"></span>
            <section class="question">
                <div class="question__block">
                    <div class="container__question">
                        <div class="question__inner">
                            <div class="question__inner-title">
                                <h2>Остались вопросы? <br>Мы готовы на них ответить!</h2>
                            </div>
                            <div class="question__inner-text">
                                <p>Хотите подробнее обсудить детали, рассчитать смету или подобрать оптимальные материалы? 
                                    <br>Оставьте свои контакты — наш специалист свяжется с вами, расскажет о наших возможностях, 
                                    <br>продемонстрирует готовые решения и поможет превратить ваш проект в реальность.
                                </p>
                            </div>
                            
                            <form class="feedback-form" action="" method="post" id="feedback-form">
                                <div class="feedback__form-info">
                                    <div class="form-group">
                                        <input class="form__group-input" type="text" id="name" name="name" placeholder="ФИО" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input class="form__group-input" type="tel" id="phone" name="phone"  placeholder="Телефон" required>
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <textarea class="form__group__input-full" id="question" name="question" maxlength="500" placeholder="Ваш вопрос"></textarea>
                                    </div>
                                </div>
                                <div class="question__inner-error">
                                    <?php if ($success_msg): ?>
                                    <p class="success"><?= htmlspecialchars($success_msg) ?></p>
                                    <?php elseif ($error_msg): ?>
                                    <p class="error"><?= htmlspecialchars($error_msg) ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="feedback-form-button">
                                    <button class="feedback-form-btn" type="submit">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
    </main>
    <?php include "components/footer.php"; ?>
</body>
</html>