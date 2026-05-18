<?php 
    include "components/header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contacts.css">
    <title>Document</title>
</head>
<body>
    <section class="contacts">
        <div class="container">
            <div class="main__contacts">
                <h2 class="main__contacts-title">Наши контакты</h2>
                <div class="main__contacts-list">
                    <!-- 1 -->
                    <div class="contacts-item">
                        <div class="contacts__item-blocktop">
                            <img src="images/icons/contacts/meta.png" alt="" class="main__contacts__list-img" width="40">
                        </div>
                        <div class="contacts__item-block">
                            <p class="main__contacts__list-title">Адрес</p>
                            <p class="main__contacts__list-text">г. Омск, 644007, ул. 10-лет октября, д. 113</p>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="contacts-item">
                        <div class="contacts__item-blocktop">
                            <img src="images/icons/contacts/email.png" alt="" class="main__contacts__list-img" width="40">
                        </div>
                        <div class="contacts__item-block">
                            <p class="main__contacts__list-title">E-mail</p>
                            <p class="main__contacts__list-text">remstroy095@mail.ru</p>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="contacts-item">
                        <div class="contacts__item-blocktop">
                            <img src="images/icons/contacts/phone.png" alt="" class="main__contacts__list-img" width="40">
                        </div>
                        <div class="contacts__item-block">
                            <p class="main__contacts__list-title">Телефон</p>
                            <div class="main__contacts__title-phone">
                                <a class="main__contacts__list-text" href="tel:+73815721486">+7 (3815) 72-14-86</a>
                            </div>
                            <a class="main__contacts__list-text" href="tel:+73815721486">+7 (8381) 52-14-86</a>
                        </div>
                    </div>
                    <!-- 4 -->
                    <div class="contacts-item">
                        <div class="contacts__item-blocktop">
                            <img src="images/icons/contacts/time.png" alt="" class="main__contacts__list-img" width="40">
                        </div>
                        <div class="contacts__item-block">
                            <p class="main__contacts__list-title">Режим работы</p>
                            <p class="main__contacts__list-text">
                                Пн-Пт 9-00 - 18-00, <br>Обед 13-00 - 14-00, <br>Выходной - Сб, Вс
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "components/footer.php"; ?>
</body>
</html>