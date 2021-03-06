<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/public/css/style.min.css">
    <title>Главная</title>
</head>
<body>
<div class="wrap">
    <header class="header">
        <div class="header__body _container">
            <img class="header__logo" src="/public/img/logo.png" alt="">
            <div class="header__icons">
                <div class="header__icon">
                    <a href="permission.html" class="header__link">
                        <span class="icon-user"></span>
                        <span class="header__subtitle">
                        Разрешения
                    </span>
                    </a>
                </div>
                <div class="header__icon icon_reg_auth">
                    <span class="icon-user"></span>
                    <span class="header__subtitle">
                    Войти
                </span>
                </div>
            </div>
        </div>
    </header>
    <main class="content respobsible">
        <div class="content__body _container-main">
            <div class="navigation-chain _container">
                <div class="navigation-chain__item"><a href="http://trans/permission">Разрешения / </a></div>
                <div class="navigation-chain__item"><a href="http://trans/permission/add">Добавление разрешения /</a></div>
                <div class="navigation-chain__item navigation-chain__item_active">Ответственные</div>
            </div>
            <div class="responsible__top _container">
                <form method="post" class="content-search">
                    <input type="text" class="input" name="search_author" placeholder="Поиск ответственного по ФИО...">
                    <span class="icon-search"></span>
                    <input type="submit" hidden class="responsible-search">
                </form>
                <div class="responsible__button responsible__button-filter input button">Список подразделений</div>
            </div>
            <div class="responsible__filter">
                <form method="post" class="responsible__subdivisions">
                    <div class="responsible__subdivision">
                        <div class="responsible__text">
                            Подразделение1.Подразделение2.Подразделение3
                        </div>
                    </div>
                    <div class="responsible__subdivision">
                        <div class="responsible__text">
                            Подразделение1.Подразделение2.Подразделение3
                        </div>
                    </div>
                    <div class="responsible__subdivision">
                        <div class="responsible__text">
                            Подразделение1.Подразделение2.Подразделение3
                        </div>
                    </div>
                    <div class="responsible__subdivision">
                        <div class="responsible__text">
                            Подразделение1.Подразделение2.Подразделение3
                        </div>
                    </div>
                    <div class="responsible__subdivision">
                        <div class="responsible__text">
                            Подразделение1.Подразделение2.Подразделение3
                        </div>
                    </div>
                    <input type="text" hidden class="responsible-choice">
                </form>
                <div class="responsible__block">
                    <div class="responsible__button responsible__button-close input button">Закрыть</div>
                </div>
            </div>
            {% if responsibles_preparation|length > 0 %}
            <div class="content__table table-content">
                <div class="table-content__row table-content__row_head responsible-table-head">
                    <div class="table-content__col table-content__head">Фамилия</div>
                    <div class="table-content__col table-content__head">Имя</div>
                    <div class="table-content__col table-content__head">Отчество</div>
                    <div class="table-content__col table-content__head">Подразделение</div>
                </div>
                {% for responsible_preparation in responsibles_preparation %}
                <div class="table-content__row table-row table-responsibles">
                    <input type="text" hidden class="responsible-id" value="{{loop.index}}">
                    <div class="table-content__col table-col">
                        <input type="text" value="{{responsible_preparation.lastname}}" name="date-{{loop.index}}" readonly class="table-col__input">
                    </div>
                    <div class="table-content__col table-col">
                        <input type="text" value="{{responsible_preparation.name}}" name="time-from-{{loop.index}}" readonly class="table-col__input">
                    </div>
                    <div class="table-content__col table-col">
                        <input type="text" value="{{responsible_preparation.patronymic}}" name="time-to-{{loop.index}}" readonly class="table-col__input">
                    </div>
                    <div class="table-content__col table-col">
                        <input type="text" value="{{responsible_preparation.subdivision}}" name="time-to-{{loop.index}}" readonly class="table-col__input">
                    </div>
                </div>
                {% endfor %}
                <form method="post" class="choice-responsible">
                    <input type="text" hidden class="responsible">
                </form>
            </div>
            {% endif %}
        </div>
    </main>
    <footer class="footer">
        <div class="footer__body _container">
            <address class="footer__mail">admin@gmail.com</address>
            <div class="footer__copy">&copy; ПАО "Транснефть" 2022</div>
            <div class="footer__links">
                <a href="https://vk.com/transneftofficial" target="_blank" class="icon-vk footer__link"></a>
                <a href="https://www.facebook.com/TRANSNEFT" target="_blank" class="icon-facebook footer__link"></a>
                <a href="https://twitter.com/transneftRu" target="_blank" class="icon-twitter footer__link"></a>
                <a href="https://www.instagram.com/transneftru/" target="_blank" class="icon-instagram-second footer__link"></a>
                <a href="https://t.me/transneftofficial" target="_blank" class="icon-telegram footer__link"></a>
                <a href="https://invite.viber.com/?g2=AQAJmjbSlaVw3kiGiek7m4%2BbhLm0X01ggdP5DAoiuQUSUvejqFEpi8Rp5Wy6uqI7&lang=ru" target="_blank" class="icon-viber footer__link"></a>
                <a href="https://www.youtube.com/user/transneftru" target="_blank" class="icon-youtube footer__link"></a>
            </div>
        </div>
    </footer>
</div>
<script src="/public/js/app.min.js"></script>
</body>
</html>