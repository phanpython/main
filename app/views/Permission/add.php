{% if ajax == true %}
{% else %}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" >
    <link rel="stylesheet" href="/public/css/style.min.css">
    <title>{{meta.title}}</title>
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
    <main class="content">
        <div class="content__body _container">
<!--            <p><b>Start typing a name in the input field below:</b></p>-->
<!--            <form action="" method="post">-->
<!--                <label for="fname">First name:</label>-->
<!--                <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">-->
<!--            </form>-->
<!--            <p>Suggestions: <span id="txtHint"></span></p>-->
            <div class="navigation-chain">
                <div class="navigation-chain__item"><a href="http://trans/permission">Разрешения / </a></div>
                <div class="navigation-chain__item navigation-chain__item_active">Добавление разрешения</div>
            </div>
            <div class="content__add-permission permission-add">
                <form method="post" class="permission-add__top">
                    <div class="permission-add__title">
                        Разрешение № <input type="text" class="permission-add__input" placeholder="Номер" value="1">
                    </div>
                    <input type="submit" class="permission-add__button input button" value="Изменить">
                </form>
                <div class="permission-add__list">
                    <div class="permission-add__item">
                        <div class="permission-add__subtitle">
                            1. Выдал начальнику Иванов Иван Иванович для выполнения следующих работ:
                        </div>
                        <div class="permission-add__types">
                            {% for current_typical_work in current_typical_works %}
                            <form method="post" class="permission-add__type">
                                <div class="permission-add__type-name">
                                    - {{current_typical_work.name}}
                                </div>
                                <input type="text" name="typical_work_id" class="current_typical_work_id" value="{{current_typical_work.id}}" hidden>
                                <span class="icon-clear permission-add__clear current_typical_work_del"></span>
                            </form>
                            {% endfor %}
                        </div>
                        <div class="permission-add__block">
                            <textarea readonly class="permission-add__textarea textarea" name="untypical_works" id="untypical_works" cols="30" rows="10" placeholder="Введите нетиповые работы...">{{untypical_work}}</textarea>
                        </div>
                        <a href="http://trans/type-work" class="permission-add__button permission-add__button-margin input button" style="width: 350px">Выбрать типы работ</a>
                    </div>
                    <div class="permission-add__item">
                        <div class="permission-add__subtitle">
                            2. В период:
                        </div>
                        <div class="permission-add__block">
                            <div class="permission-add__dates">
                                <div class="permission-add__date">
                                    <div class="permission-add__col">
                                        Дата
                                    </div>
                                    <div class="permission-add__col">
                                        Время начала
                                    </div>
                                    <div class="permission-add__col">
                                        Время окончания
                                    </div>
                                </div>
                                {% for current_date in current_dates %}
                                <div class="permission-add__date">
                                    <div class="permission-add__col">
                                        {{current_date.date}}
                                        <input type="text" hidden value="{{current_date.date}}">
                                    </div>
                                    <div class="permission-add__col">
                                        {{current_date.from_time}}
                                        <input type="text" hidden value="{{current_date.from_time}}">
                                    </div>
                                    <div class="permission-add__col">
                                        {{current_date.to_time}}
                                        <input type="text" hidden value="{{current_date.to_time}}">
                                    </div>
                                </div>
                                {% endfor %}
                            </div>
                            <a href="http://trans/date" class="permission-add__button input button sticky">Изменить</a>
                        </div>
                    </div>
                    <div class="permission-add__item">
                        <div class="permission-add__subtitle">
                            3. Описание:
                        </div>
                        <textarea class="permission-add__textarea textarea" name="description" id="description" cols="30" rows="10" placeholder="Введите описание...">{{description}}</textarea>
                    </div>

                    <div class="permission-add__item">

                        <div class="permission-add__subtitle">
                            4. Защиты:
                        </div>
                        <div class="table-content-mask__rows table-content-mask__row_head">
                            <div class="table-content-mask__col table-content-mask__head" name="system">Система</div>
                            <div class="table-content-mask__col table-content-mask__head" name="protection">Защита</div>
                            <div class="table-content-mask__col table-content-mask__head" name="entrance">Вход</div>
                            <div class="table-content-mask__col table-content-mask__head" name="exit">Выход</div>
                            <div class="table-content-mask__col table-content-mask__head entrance-on" name="location">Объект</div>
                            <div class="table-content-mask__col table-content-mask__head entrance-on" name="vtor">Втор</div>
                            <div class="table-content-mask__col table-content-mask__head entrance-on" name="delete-mask">Удалить</div>  
                        </div>
                        {% set i = 0 %}
                        {% for protection in protections %}
                        {% set i = i + 1 %}
                        <form action="" method="post" class="form__del-masks">
                            <div class="table-content-mask__rows table-row">
                                <div class="table-content-mask__col table-col col-first">
                                        <input type="text" name="ty-1" class="table-mask-col__input protection input-ty input-row" value="{{protection.system_apcs_name}}" required="required" readonly>
                                </div>
                                <div class="table-content-mask__col table-col">
                                    <input type="text" class="protection_id-{{i}} input-row" name="protection_id-{{i}}" value="{{protection.protection_id}}" hidden>
                                    <input type="text" name="protection-{{i}}" class="table-mask-col__input protection input-row" value="{{protection.protection_name}}" required="required" readonly>
                                </div>
                                {% if protection.entrance_name == 'Вход' %}
                                <div class="table-content-mask__col table-col">
                                    <label class="check-entrance">
                                        <input type="radio" class="check-entrance__input entrance-{{i}} input-row" name="entrance_exit-{{i}}" value="entrance-{{i}}" checked hidden>
                                        <span class="check-entrance__span"></span>
                                    </label>
                                </div>
                                <div class="table-content-mask__col table-col">
                                    <label class="check-entrance">
                                        <input type="radio" class="check-entrance__input exit-{{i}} input-row" name="entrance_exit-{{i}}" value="exit-{{i}}" hidden>
                                        <span class="check-entrance__span"></span>
                                    </label>
                                </div>
                                <div class="table-content-mask__col table-col col-first entrance-on" >
                                    <input type="text" name="location-{{i}}" readonly class="table-col__input location input-row" value="{{protection.object_name}}">
                                </div>
                                {% elseif protection.entrance_name == 'Выход' %}
                                <div class="table-content-mask__col table-col">
                                    <label class="check-entrance">
                                        <input type="radio" class="check-entrance__input entrance-{{i}} input-row" name="entrance_exit-{{i}}" value="entrance-{{i}}" hidden>
                                        <span class="check-entrance__span"></span>
                                    </label>
                                </div>
                                <div class="table-content-mask__col table-col">
                                    <label class="check-entrance">
                                        <input type="radio" class="check-entrance__input exit-{{i}} input-row" name="entrance_exit-{{i}}" value="exit-{{i}}" checked hidden>
                                        <span class="check-entrance__span"></span>
                                    </label>
                                </div>
                                <div class="table-content-mask__col table-col col-first entrance-on" >
                                    <input type="text" name="location-{{i}}" readonly class="table-col__input location input-row" value="{{protection.object_name}}">
                                </div>
                                {% endif %}
                                {% if protection.vtor_name == 'Втор' %}
                                <div class="table-content-mask__col table-col entrance-on"> 
                                    <label class="check-entrance">
                                        <input type="checkbox" class="check-entrance__input vtor" name="vtor-{{i}}" checked hidden>
                                        <span class="check-entrance__span"></span>
                                    </label>
                                </div>
                                {% elseif protection.vtor_name == 'Невтор' %}
                                <div class="table-content-mask__col table-col entrance-on"> 
                                    <label class="check-entrance">
                                        <input type="checkbox" class="check-entrance__input vtor" name="vtor-{{i}}" hidden>
                                        <span class="check-entrance__span"></span>
                                    </label>
                                </div>
                                {% endif %}
                                <div class="table-content-mask__col table-col">
                                    <label class="check-entrance">
                                    <input type="submit" name="del-masks" value="Удалить" hidden>
                                    <span class="icon-clear permission-add__clear"></span>
                                    </label>
                                </div>
                            </div>
                        </form>
                        {% endfor %}
                    </div>

                    <a href="http://trans/mask-add" class="permission-add__button-mask input button">Добавить маскирование защиты</a>

                    <div class="permission-add__item">
                        <div class="permission-add__subtitle">
                            5. Ответственные за подготовку работ:
                        </div>
                        <div class="permission-add__responsibles">
                            <form method="post" method="post" class="permission-add__responsible">
                                <div class="permission-add__name">
                                    5.1. Иванов Иван Иванович
                                </div>
                                <span class="icon-clear permission-add__clear"></span>
                            </form>
                            <form method="post" class="permission-add__responsible">
                                <div class="permission-add__name">
                                    5.2. Иванов Иван Иванович
                                </div>
                                <span class="icon-clear permission-add__clear"></span>
                            </form>
                            <form method="post" class="permission-add__responsible">
                                <div class="permission-add__name">
                                    5.3. Иванов Иван Иванович
                                </div>
                                <span class="icon-clear permission-add__clear"></span>
                            </form>
                            <form method="post">
                                <input type="text" value="Иванов Иван Иванович" hidden>
                                <input type="text" value="Иванов Иван Иванович" hidden>
                                <input type="text" value="Иванов Иван Иванович" hidden>
                                <a href="http://trans/responsible-preparation" class="permission-add__button input button" style="width: 400px">Добавить ответсвенного за подготовку работ</a>
                            </form>
                        </div>
                    </div>
                    <div class="permission-add__item">
                        <div class="permission-add__subtitle">
                            6. Ответственные за выполнение работ:
                        </div>
                        <div class="permission-add__responsibles">
                            <form method="post" class="permission-add__responsible">
                                <div class="permission-add__name">
                                    6.1. Иванов Иван Иванович
                                    <input type="text" value="Иванов Иван Иванович" hidden>
                                </div>
                                <span class="icon-clear permission-add__clear"></span>
                            </form>
                            <form method="post" class="permission-add__responsible">
                                <div class="permission-add__name">
                                    6.2. Иванов Иван Иванович
                                    <input type="text" value="Иванов Иван Иванович" hidden>
                                </div>
                                <span class="icon-clear permission-add__clear"></span>
                            </form>
                            <form method="post" class="permission-add__responsible">
                                <div class="permission-add__name">
                                    6.3. Иванов Иван Иванович
                                    <input type="text" value="Иванов Иван Иванович" hidden>
                                </div>
                                <span class="icon-clear permission-add__clear"></span>
                            </form>
                            <form method="post">
                                <input type="text" value="Иванов Иван Иванович" hidden>
                                <input type="text" value="Иванов Иван Иванович" hidden>
                                <input type="text" value="Иванов Иван Иванович" hidden>
                                <a href="http://trans/responsible" class="permission-add__button input button"  style="width: 400px">Добавить ответсвенного за проведение работ</a>
                            </form>
                            </а>
                        </div>
                    </div>
                    <div class="permission-add__item">
                        <div class="permission-add__subtitle">
                            7. Дополнительно:
                        </div>
                        <textarea class="permission-add__textarea textarea" name="addition" id="addition" cols="30" rows="10" placeholder="Введите дополнительную информацию...">{{addition}}</textarea>
                    </div>
                </div>
                <form method="post" class="permission-add__bottom">
                    <textarea class="permission-add__textarea" name="untypical_works" hidden id="untypical_works_form" cols="30" rows="10" placeholder="Введите нетиповые работы..."></textarea>
                    <textarea class="permission-add__textarea" name="description" hidden id="description_form" cols="30" rows="10" placeholder="Введите описание..."></textarea>
                    <textarea class="permission-add__textarea" name="addition" hidden id="addition_form" cols="30" rows="10" placeholder="Введите дополнительную информацию..."></textarea>
                    <input type="submit" value="Сохранить" name="save_permission" class="permission-add__button input button">
                    <input type="submit" value="Выгрузить в PDF" class="permission-add__button input button">
                </form>
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
{% endif %}
<script src="/public/js/app.min.js"></script>
<script src="/public/js/ajax.js"></script>
</body>
</html>