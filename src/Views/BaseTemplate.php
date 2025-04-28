<?php 
namespace App\Views;
class BaseTemplate 
{
    public static function getTemplate(): string {
        global $user_id, $username;

        $template = <<<HTML
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> %s </title>
            <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
            <script src="/assets/js/bootstrap.bundle.js"></script>
            <!-- Подключение шрифтов -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Winky+Rough:wght@300..900&display=swap" rel="stylesheet">
            <style>
                /* Основной шрифт для всего документа */
                body {
                    font-family: 'Winky Rough', cursive;
                    font-weight: 400;
                    
                }
                
                /* Дополнительные шрифты для специфических элементов */
                .navbar-brand {
                    font-family: 'Winky Rough', cursive;
                    font-weight: 700;
                }
                
                /* Стиль шапки */
                header {
                    background-color: #ffffff; /* Белый фон */
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Легкая тень для разделения [[4]] */
                    
                }
                .navbar-brand {
                    font-size: 1.5rem; /* Крупный размер текста */
                    color: #333333; /* Темно-серый цвет текста */
                    text-decoration: none; /* Убираем подчеркивание */
                }
                .navbar-brand img {
                    width: 50px; /* Размер логотипа */
                    height: 50px;
                    
                }
                 
                .navbar-brand:hover {
                color: rgb(166, 63, 63) !important; /* Красный цвет при наведении */
                }
                .navbar-nav .nav-link:hover {
                    color:rgb(166, 63, 63); /* Синий цвет при наведении */
                }
                .dropdown-menu {
                    border: none; /* Убираем границу выпадающего меню */
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Легкая тень */
                    border-radius: 8px; /* Закругленные углы */
                }
                
                .dropdown-item:hover {
                    background-color: #f8f9fa; /* Легкий серый фон при наведении */
                }
                .btn-close {
                    font-size: 1rem; /* Уменьшаем размер кнопки закрытия */
                }
                
                footer {
                    background-color: rgb(133, 34, 34)!important; 
                    color: #fff; /* Белый текст для контраста */
                    padding: 20px; /* Внутренние отступы */
                    text-align: center; 
                    font-family: 'Winky Rough', cursive;
                }

                .nav-item{
                    font-family: 'Winky Rough', cursive;
                }
                .nav-link p-3 {
                    font-family: 'Winky Rough', cursive;
                }
            </style>
        </head>
        <body>
            <header>
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="/assets/images/10.png" alt="Логотип компании" width="64" height="64">
                        IScream 221
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/products">Каталог</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/about">О нас</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/order">Заказ</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/register">Регистрация</a>
                        </li>
                        
                    </ul>
                    </div>
        HTML;

if ($user_id > 0) {
        $template .= <<<HTML
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {$username}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profile">Профиль</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Выход</a></li>
                        </ul>
                    </li>
                </ul>
        HTML;
} else {
    $template .= <<<HTML
        <a class="nav-link p-3" href="/login">
        Вход
        </a>
    HTML;    
}
        $template .= "</nav></header>";

        // Добавим flash сообщение
        if (isset($_SESSION['flash'])) {
            $template .= <<<END
                <div id="liveAlertBtn" class="alert alert-info alert-dismissible" role="alert">
                    <div>{$_SESSION['flash']}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    onclick="this.parentNode.style.display='none';"></button>
                </div>
            END;
            unset($_SESSION['flash']);
        }

        $template.= <<<LINE
            %s
            <footer class="mt-3 p-3">
                <p>© 2025 «Кемеровский кооперативный техникум»</p>
                <p>(*) Сайт разработан в рамках обучения в "Кузбасском кооперативном техникуме" по специальности "Специалист по информационным технологиям".</p>
            </footer>
        </body>
        </html>
        LINE;

        return $template;
    }
}