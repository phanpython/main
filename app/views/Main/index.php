<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{meta.title}}</title>
    <link rel="stylesheet" href="/public/css/style.min.css">
</head>
<body>
<div class="wrap">
    <header class="header">
        <div class="header__body _container">
            <img class="header__logo" src="/public/img/logo.png" alt="">
            <div class="header__icons">
                <div class="header__icon icon_reg_auth">
                    <span class="icon-user"></span>
                    <span class="header__subtitle">
                    Войти
                </span>
                </div>
            </div>
        </div>
    </header>
    <main class="content">
        <div class="content__body _container">
            <p class="content__text content__purpose">
                Данный сайт предназначен для сотрудников компании ПАО "Транснефть"
            </p>
            <div class="content__form content__auth-reg">
                <div class="input button block-button content__button-auth">Войти</div>
                <div class="input button block-button content__button-reg">Регистрация</div>
            </div>
        </div>
        <div class="window window-authorization">
            <div class="window__body window-authorization__body">
                <div class="window__top window-authorization__top">
                    <div class="window__clear window-authorization__clear">
                        <span class="icon-clear"></span>
                    </div>
                </div>
                <div class="window-authorization__titles">
                    <div class="window__title window-authorization__title window-authorization__title-in  window-authorization__title_active">
                        Войти
                    </div>
                    <div class="window__title window-authorization__title window-authorization__title-reg">
                        Регистрация
                    </div>
                </div>
                <form method="post" class="window-authorization__form window-authorization__form-in window-authorization__form_active">
                    <input name="auth_email" type="email" value="{{auth_email}}" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*)@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" class="input" required placeholder="Email">
                    <div class="window-authorization__password">
                        <input name="password" type="password" pattern="(?=.*[A-ZА-Я])(?=.*[a-zа-я])(?=.*[0-9])(?=.*[!@#$%^&*])[А-Яа-яa-zA-Z0-9!@#$%^&*]{8,100}"  title="Пароль должен содержать буквы и хотя бы одну цифру,специальный символ и букву в верхнем регистре. Длина ввода от 8 до 100 символов" class="input input-password password" required class="input input-password" placeholder="Пароль">
                        <span class="window-authorization__icon icon-password"></span>
                    </div>
<!--                    <div class="window-authorization__question">Забыли пароль?</div>-->
                    <div class="window-authorization__remember">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Запомнить меня</label>
                    </div>
                    <input name="auth" type="submit" class="input button" value="Войти">
                    <div class="error">{{auth_error}}</div>
                </form>
                <form method="post" class="window-authorization__form window-authorization__form-reg">
                    <input name="reg_name" value="{{reg_name}}" type="text" pattern="[А-Яа-я]{2,100}" class="input" required placeholder="Имя"  title="Имя пользователя должно содержать только кириллические символы. Длина ввода от 2 до 100 символов">
                    <input name="reg_lastname" value="{{reg_lastname}}" type="text" pattern="[А-Яа-я]{2,100}" class="input" required placeholder="Фамилия"  title="Фамилия пользователя должно содержать только кириллические символы. Длина ввода от 2 до 100 символов">
                    <input name="reg_patronymic" value="{{reg_patronymic}}" type="text" pattern="^[А-Яа-я]{2,100}$" class="input" required placeholder="Отчество" title="Отчество пользователя должно содержать только кириллические символы. Длина ввода от 2 до 100 символов">
                    <input name="reg_department"  value="{{reg_department}}" type="text" hidden class="input input-department">
                    <div class="custom-select">
                        <select class="select-department">
                            {% if reg_department == '' %}
                                <option>Отдел</option>
                            {% else %}
                                <option>{{reg_department}}</option>
                            {% endif %}
                            {% for department in departments %}
                                <option>{{ department.name }}</option>
                            {% endfor %}
                        </select>
                    </div>
                    <input name="reg_subdivision" value="{{reg_subdivision}}" type="text" hidden class="input input-subdivision">
                    <div class="custom-select">
                        <select class="select-subdivision">
                            {% if reg_subdivision == '' %}
                                <option>Подразделение</option>
                            {% else %}
                                <option>{{reg_subdivision}}</option>
                            {% endif %}
                            {% for subdivision in subdivisions %}
                                <option>{{ subdivision.name }}</option>
                            {% endfor %}
                        </select>
                    </div>
                    <input name="reg_position" value="{{reg_position}}" type="text" pattern="[А-Яа-я]{5,100}" class="input" required placeholder="Должность" title="Должность должна содержать только кириллические символы и (или) пробелы. Длина ввода от 5 до 100 символов">
                    <input name="reg_email" value="{{reg_email}}" type="email" pattern="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*)@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])" class="input" required placeholder="Email">
                    <div class="window-authorization__password">
                        <input name="reg_password" type="password" pattern="(?=.*[A-ZА-Я])(?=.*[a-zа-я])(?=.*[0-9])(?=.*[!@#$%^&*])[А-Яа-яa-zA-Z0-9!@#$%^&*]{8,100}"  title="Пароль должен содержать буквы и хотя бы одну цифру,специальный символ и букву в верхнем регистре. Длина ввода от 8 до 100 символов" class="input input-password password" required placeholder="Пароль">
                        <span class="window-authorization__icon icon-password"></span>
                    </div>
                    <div class="window-authorization__password">
                        <input type="password" pattern="(?=.*[A-ZА-Я])(?=.*[a-zа-я])(?=.*[0-9])(?=.*[!@#$%^&*])[А-Яа-яa-zA-Z0-9!@#$%^&*]{8,100}"  title="Пароль должен содержать буквы и хотя бы одну цифру,специальный символ и букву в верхнем регистре. Длина ввода от 8 до 100 символов"  class="input input-password" required placeholder="Подтвердите пароль">
                        <span class="window-authorization__icon icon-password"></span>
                    </div>
                    <input name="reg" type="submit" class="input button" value="Регистрация">
                    <div class="error">{{reg_error}}</div>
                </form>
            </div>
        </div>
        <input type="text" hidden class="content__ad" value="{{reg_ad}}">
        <div class="window window-ad">
            <div class="window__body window__body">
                <div class="window__top">
                    <div class="window__clear window-ad__clear">
                        <span class="icon-clear"></span>
                    </div>
                </div>
                <div class="window__title window-ad__title">
                    Оповещение
                </div>
                <div class="window__text">
                    <div class="window__subtext">Ваша заявка на регистрацию успешно отправлена! </div>
                    <div class="window__subtext"> В случае, если заявка будет одобрена, мы оповестим Вас по указанной Вами почте.</div>
                </div>
                <input type="submit" class="input button window-ad__button" value="Ясно">
            </div>
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