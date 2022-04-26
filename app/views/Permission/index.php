<!DOCTYPE html>
<html lang="en">
	 <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
			<div class="content__body _container-main">
				<div class="content__buttons">
					<form action="" method="post" class="content__form">
						<input type="submit" class="content__button-checkout content__button-checkout_active" value="Оперативные"  name="operative-permissions">
					</form>
					<form action="" method="post" class="content__form">
						<input type="submit" class="content__button-checkout" value="Архив" name="archive-permissions">
					</form>
				</div>
				<div class="filter-content__funcs">
					<div class="input button button-content filter">Фильтры</div>
					<form method="post" class="content-search">
						<input type="text" class="input input-search" name="search_info" placeholder="Поиск...">
						<span class="icon-search"></span>
						<input type="submit" hidden name="search_permission" class="permission-search">
					</form>
					<form action="http://trans/permission/add" method="post">
						<input type="submit" class="input button button-content" name="create-permission" value="Создать">
					</form>
					<form action="" method="post">
						<input type="submit" class="input button button-content" value="Создать на основе">
						<input type="text" class="row-id-process" hidden name="id" id="">
					</form>
					<form action="" method="post">
						<input type="submit" class="input button button-content" value="Править">
						<input type="text" class="row-id-process" hidden name="id" id="">
					</form>
					<form action="" method="post">
						<input type="submit" class="input button button-content" value="Удаление">
						<input type="text" class="row-id-process" hidden name="id" id="">
					</form>
				</div>
				<div class="content__filter filter-content">
					<div class="filter-content__block filter-block">
						<div class="filter-content__list">
							<div class="filter-content__item">
								<div class="filter-content__date date-filter">
									<div class="date-filter__block">
										<span class="filter-content__span">Начальная дата</span> <input type="date">
									</div>
									<div class="date-filter__block">
										<span class="filter-content__span">Конечная дата</span> <input type="date">
									</div>
								</div>
							</div>
							<div class="filter-content__item">
								<div class="filter-content__buttons">
									<form action="" method="post">
										<input type="submit" class="input button filter-content__button" value="Применить">
									</form>
									<div class="input button filter-content__button close-filter">Закрыть</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                {% if permissions|length == 0 %}
                    <div class="table_error_message">{{message}}</div>
                {% else %}
				<div class="content__table">
					<div class="content__table table-content table-permission">
						<div class="table-content__row table-content__row_head table-permission__row_head">
                            <div class="table-content__col table-content__head table-permission__head">№</div>
                            <div class="table-content__col table-content__head table-permission__head">Дата создания</div>
                            <div class="table-content__col table-content__head table-permission__head">Статус</div>
                            <div class="table-content__col table-content__head table-permission__head">Подразделение</div>
                            <div class="table-content__col table-content__head table-permission__head">Автор</div>
                            <div class="table-content__col table-content__head table-permission__head">Ответственные за подготовку работ</div>
                            <div class="table-content__col table-content__head table-permission__head">Ответственные за выполнение работ</div>
                            <div class="table-content__col table-content__head table-permission__head">Периоды работ</div>
                            <div class="table-content__col table-content__head table-permission__head">Виды работ</div>
                            <div class="table-content__col table-content__head table-permission__head">Описание</div>
                            <div class="table-content__col table-content__head table-permission__head">Дополнительно</div>
						</div>
                        {% for permission in permissions %}
						<div class="table-content__row table-permission__row">
							<div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell">
                                    {{permission.number}}
                                </div>
							</div>
							<div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell">
                                    {{permission.date_create}}
                                </div>
							</div>
							<div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell">
                                    {{permission.status_name}}
                                </div>
							</div>
							<div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell">
                                    {{permission.subdivision_name}}
                                </div>
                            </div>
							<div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell">
                                {% for author in authors %}
                                    {% if author.permissionid == permission.id %}
                                            {{author.lastname}} {{author.name}} {{author.patronymic}}
                                    {% endif %}
                                {% endfor %}
                                    {{author.lastname}} {{author.name}} {{author.patronymic}}
                                </div>
							</div>
							<div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell table-permission__cell_several">
                                    {% for responsible in responsiblesForPreparation %}
                                        {% if responsible.permissionid == permission.id %}
                                            <div class="table-permission__subname">
                                                {{responsible.lastname}} {{responsible.name}} {{responsible.patronymic}}
                                            </div>
                                        {% endif %}
                                    {% endfor %}
                                </div>
							</div>
                            <div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell table-permission__cell_several">
                                    {% for responsible in responsiblesForExecute %}
                                    {% if responsible.permissionid == permission.id %}
                                    <div class="table-permission__subname">
                                        {{responsible.lastname}} {{responsible.name}} {{responsible.patronymic}}
                                    </div>
                                    {% endif %}
                                    {% endfor %}
                                </div>
                            </div>
                            <div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell table-permission__cell_several">
                                    {% for date in dates %}
                                    {% if date.permissionid == permission.id %}
                                    <div class="table-permission__subname">
                                        {{date.date}} {{date.from_time}}-{{date.to_time}}
                                    </div>
                                    {% endif %}
                                    {% endfor %}
                                </div>
                            </div>
                            <div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell table-permission__cell_several">
                                    {% for work in typesWorks %}
                                    {% if work.permissionid == permission.id %}
                                    <div class="table-permission__subname">
                                        {{work.name}}
                                    </div>
                                    {% endif %}
                                    {% endfor %}
                                </div>
                            </div>
                            <div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell">
                                    {{permission.description}}
                                </div>
                            </div>
                            <div class="table-content__col table-col table-permission__col">
                                <div class="table-permission__cell">
                                    {{permission.addition}}
                                </div>
                            </div>
							<input type="text" class="row-id" name="id" hidden readonly value="1">
						</div>
                        {% endfor %}
					</div>
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