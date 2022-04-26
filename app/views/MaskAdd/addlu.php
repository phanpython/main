<!DOCTYPE html>
<html lang="en">
	 <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="css/style.min.css">
	<title>ТУ1</title>
</head>
	<body>
		<div class="wrap">
			<header class="header">
    <div class="header__body _container">
        <img class="header__logo" src="img/logo.png" alt="">
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
			<main class="content-mask">
                <div class="content-mask__body">
					<div class="content-mask__search-box">
						<div class="content-mask__search">
							<!-- <div class="input button button-content ">Фильтры</div> -->
							<form method="post" class="filter-content-mask__search">
								<input type="text" class="input" placeholder="Поиск по названию защиты...">
								<span class="icon-search"></span>
								<input type="submit" hidden name="search__permission" class="permission-search">
							</form>
						</div>
					</div>
					<div class="form-mask">
						<form method="post" class="content-mask__table table-content-mask table-systems">
                            <div class="table-content-mask__rows table-content-mask__row_header">
								<div class="table-content-mask__col table-content-mask__head" name="tu-1">ЛУ1</div>
							</div>
							<div class="table-content-mask__rows table-content-mask__row_head">
								<div class="table-content-mask__col table-content-mask__head" name="add-system">Выбрать защиту</div>
								<div class="table-content-mask__col table-content-mask__head" name="protection">Защита</div>
								<div class="table-content-mask__col table-content-mask__head" name="entrance">Вход</div>
								<div class="table-content-mask__col table-content-mask__head" name="exit">Выход</div>
								<div class="table-content-mask__col table-content-mask__head entrance-on" name="location">Локация</div>
								<div class="table-content-mask__col table-content-mask__head entrance-on" name="vtor">Втор</div>
							</div>
							<!---->
							<div class="table-content-mask__rows table-row">
								<div class="table-content-mask__col table-col" >
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input add-system" name="add-system-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<input type="text" name="protection-1" class="table-mask-col__input protection input-row" value="Защита" required="required" readonly>
								</div>

								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input entrance-1 input-row" name="entrance_exit-1" value="extrance-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input exit-1 input-row" name="entrance_exit-1" value="exit-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col col-first entrance-on" >
									<input type="text" name="location-1" class="table-col__input location input-row" value="Локация" required="required" >
								</div>
								<div class="table-content-mask__col table-col entrance-on">
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input vtor" name="vtor-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
							</div>
							<!---->
							<!---->
							<div class="table-content-mask__rows table-row">
								<div class="table-content-mask__col table-col" >
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input add-system" name="add-system-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<input type="text" name="protection-1" class="table-mask-col__input protection input-row" value="Защита" required="required" readonly>
								</div>

								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input entrance-2 input-row" name="entrance_exit-2" value="extrance-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input exit-2 input-row" name="entrance_exit-2" value="exit-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col col-first entrance-on" >
									<input type="text" name="location-1" class="table-col__input location input-row" value="Локация" required="required" >
								</div>
								<div class="table-content-mask__col table-col entrance-on">
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input vtor" name="vtor-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
							</div>
							<!---->
							<!---->
							<div class="table-content-mask__rows table-row">
								<div class="table-content-mask__col table-col" >
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input add-system" name="add-system-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<input type="text" name="protection-1" class="table-mask-col__input protection input-row" value="Защита" required="required" readonly>
								</div>

								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input entrance-3 input-row" name="entrance_exit-3" value="extrance-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input exit-3 input-row" name="entrance_exit-3" value="exit-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col col-first entrance-on" >
									<input type="text" name="location-1" class="table-col__input location input-row" value="Локация" required="required" >
								</div>
								<div class="table-content-mask__col table-col entrance-on">
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input vtor" name="vtor-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
							</div>
							<!---->
                            							<!---->
							<div class="table-content-mask__rows table-row">
								<div class="table-content-mask__col table-col" >
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input add-system" name="add-system-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<input type="text" name="protection-1" class="table-mask-col__input protection input-row" value="Защита" required="required" readonly>
								</div>

								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input entrance-4 input-row" name="entrance_exit-4" value="extrance-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input exit-4 input-row" name="entrance_exit-4" value="exit-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col col-first entrance-on" >
									<input type="text" name="location-1" class="table-col__input location input-row" value="Локация" required="required" >
								</div>
								<div class="table-content-mask__col table-col entrance-on">
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input vtor" name="vtor-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
							</div>
							<!---->
                            <!---->
							<div class="table-content-mask__rows table-row">
								<div class="table-content-mask__col table-col" >
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input add-system" name="add-system-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<input type="text" name="protection-1" class="table-mask-col__input protection input-row" value="Защита" required="required" readonly>
								</div>

								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input entrance-5 input-row" name="entrance_exit-5" value="extrance-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col">
									<label class="check-entrance">
										<input type="radio" class="check-entrance__input exit-5 input-row" name="entrance_exit-5" value="exit-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
								<div class="table-content-mask__col table-col col-first entrance-on" >
									<input type="text" name="location-1" class="table-col__input location input-row" value="Локация" required="required" >
								</div>
								<div class="table-content-mask__col table-col entrance-on">
									<label class="check-entrance">
										<input type="checkbox" class="check-entrance__input vtor" name="vtor-1">
										<span class="check-entrance__span"></span>
									</label>
								</div>
							</div>
							<!---->
						</form>

					</div>
                    <div class="button-add">
                        <div class="input button buttonmask-content button-add-row">
                            Добавить в разрешение
                        </div>
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
		<script src="js/app.min.js"></script>
	</body>	
</html>