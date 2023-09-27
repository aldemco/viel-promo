<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">

	<title>Центр массажа и остеопрактики в Краснодаре - Виэль</title>
	<meta name="description" content="Виэль">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="icon" href="medical/images/logo.png">
	<meta property="og:image" content="medical/images/prof-illustration.png">
	
	<link rel="stylesheet" href="medical/css/app.min.css?v={BUILD_ID}">

</head>

<body>

<div id="application">
<header>
    <div class="container">
        <div class="site-header">
            <div class="logo">
                <a href="#" class="logo__image">
                    <img src="medical/images/logo.png" alt="logo">
                </a>
                <div class="logo__label">
                    <span class="logo__desc">
                        Центр массажа и остеопрактики</span>
                    <span class="logo__org">ВИЭЛЬ</span>
                </div>
            </div>
            <nav class="header-navigation"> 
                <ul class="header-menu">
                    <li class="header-menu__item">
                        <a class="header-menu__link" href="#promo">Акции</a>
                    </li>
                    <li class="header-menu__item">
                        <a class="header-menu__link" href="#services">Услуги</a>
                    </li>
                    <li class="header-menu__item">
                        <a class="header-menu__link" href="#cert">Подарочный сертификат</a>
                    </li>
                    <li class="header-menu__item">
                        <a class="header-menu__link" href="#employees">Специалисты</a>
                    </li>
                </ul>
                <a class="header-navigation__menu-toggle" href="#">
                </a>
            </nav>
            <div class="header-actions">
                <a href="tel:+79615000039" class="header-actions__phone">+7 (961) 500-00-39</a>
                <a href="#contacts" class="header-actions__address">
                    Краснодар,  <br> Кожевенная, 24
                </a>
                <a href="#callback" @click="openPopup('callback')" class="popup_btn header-actions__btn btn btn_success btn_small">
                    Обратный звонок
                </a>
            </div>
     </div>
    </div>
</header>

<main>
    <section class="main-section main-section_gradient" id="main">
        <div class="container main-section-container">
            <div class="main-section__bg-video">
                <video loop="" muted="" autoplay="" poster="medical/images/main-bg.jpg" class="">
                    <source src="videos/massage.mp4" type="video/mp4">
                </video>
            </div>
            <h2 class="main-section__subtitle heading heading_small"> Центр массажа и остеопрактики в Краснодаре</h2>
            <h1 class="main-section__title heading heading_large "> <span class="main-section__accent"> 134 </span> техники массажа для вашего здоровья и релаксации </h1>
            <a href="#get-price" @click="openPopup('getprice')" class="main-section__btn btn btn_warning btn_medium popup_btn">
                Получить прайс
            </a>
            <div class="main-section__price-label price-label price-label_success">
                <span class="price-label__from">От</span>
                <span class="price-label__cost">800₽</span>
            </div>
        </div>
    </section>

    <section class="stat-section">
        <div class="container stat-section-container">
            <div class="stat-list">
                <div class="stat-card drop-shadow">
                    <div class="stat-card__num"> <span class="countUp">10</span> лет</div>
                    <div class="stat-card__desc">На рынке услуг</div>
                </div>
                <div class="stat-card drop-shadow">
                    <div class="stat-card__num"><span class="countUp">7</span>-<span class="countUp">29</span></div>
                    <div class="stat-card__desc">Лет опыт специалистов</div>
                </div>
                <div class="stat-card drop-shadow">
                    <div class="stat-card__num"><span class="countUp">3500</span>+</div>
                    <div class="stat-card__desc">Клиентов</div>
                </div>
                <div class="stat-card drop-shadow">
                    <div class="stat-card__num"><span class="countUp">17</span></div>
                    <div class="stat-card__desc">География клиентов</div>
                </div>
            </div>
        </div>
    </section>

    <section class="promo-section" id="promo">
        <div class="container">
            <div class="text-center promo-section__heading">
                <h2 class="heading heading_medium heading_underline heading_center">
                    АКЦИИ
                </h2>
            </div>
            <div class="swiper promo-slider promo-section__promo-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide promo-slider__slide">
                        <a href="#get-promo" @click="openPopup('getpromo')" class="popup_btn">
                            <img class="promo-slider__banner" src="medical/images/promo/ac-09.jpg" alt="ac">
                        </a>
                    </div>
                    <div class="swiper-slide promo-slider__slide">
                        <a href="#get-promo"  @click="openPopup('getpromo')" class="popup_btn">
                            <img class="promo-slider__banner" src="medical/images/promo/family-09.jpg" alt="pr">
                        </a>
                    </div>
                    <div class="swiper-slide promo-slider__slide">
                        <a href="#get-promo"  @click="openPopup('getpromo')" class="popup_btn">
                            <img class="promo-slider__banner" src="medical/images/promo/press-09.jpg" alt="pt">
                        </a>
                    </div>
                    <div class="swiper-slide promo-slider__slide">
                        <a href="#get-promo"  @click="openPopup('getpromo')" class="popup_btn">
                            <img class="promo-slider__banner" src="medical/images/promo/stelki.jpg" alt="st">
                        </a>
                    </div>
                    <div class="swiper-slide promo-slider__slide">
                        <a href="#get-promo"  @click="openPopup('getpromo')" class="popup_btn">
                            <img class="promo-slider__banner" src="medical/images/promo/site-meditation-09.jpg" alt="st">
                        </a>
                    </div>
                </div>
                <div class="swiper-button-prev promo-slider__prev">
                    <img src="medical/images/left-arrow.svg" alt="prev">
                </div>
                <div class="swiper-button-next promo-slider__next">
                    <img src="medical/images/right-arrow.svg" alt="next">
                </div>
            </div>

            <div class="promo-section__actions">
                <a href="#get-promo"  @click="openPopup('getpromo')" class="promo-section__btn btn btn_warning btn_medium popup_btn">
                    Купить по акции
                </a>
            </div>

        </div>
    </section>


    <section class="health-section">
        <div class="container health-section__container">
            <div class="health-section__left-col">
                <h2 class="health-section__heading heading heading_medium ">
                    Оздоровительные процедуры
                </h2>
                <p class="health-section__desc">
                    Комплекс оздоровительных процедур для Вас и ваших близких
                </p>
                <div class="list-columns">
                    <ul class="list-columns__column list-hexagon">
                        <li class="list-hexagon__item list-hexagon_success">Остеопрактика</li>
                        <li class="list-hexagon__item list-hexagon_success">Кинезиология</li>
                        <li class="list-hexagon__item list-hexagon_success">Мануальная терапия</li>
                        <li class="list-hexagon__item list-hexagon_success">Тейпы</li>
                    </ul>
                    <ul class="list-columns__column health-section__list">
                        <li class="list-hexagon__item list-hexagon_success">Общий массаж</li>
                        <li class="list-hexagon__item list-hexagon_success">Реабилитология</li>
                        <li class="list-hexagon__item list-hexagon_success">Лфк</li>
                        <li class="list-hexagon__item list-hexagon_success">Реабилитация (микс техник)</li>
                    </ul>
                </div>
                <a href="#get-price"  @click="openPopup('getprice')" class="popup_btn popup_btn health-section__btn btn btn_success btn_large" data-popup-from="Оздоровительные процедуры">
                    Узнать стоимость
                </a>
            </div>
            <div class="health-section__right-col ">
                <div class="health-section__picture">
                    <div class="health-section__front">
                        <img src="medical/images/health-front.png" alt="Оздоровительные процедуры">
                    </div>
                    <div class="health-section__back drop-shadow">
                        <img src="medical/images/health-back.svg" alt="Оздоровительные процедуры">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="children-section" id="services">
        <div class="container children-section__container">
            <div class="children-section__left-col">
                <div class="children-section__picture">
                    <div class="children-section__back"></div>
                    <div class="children-section__front drop-shadow">
                        <img src="medical/images/children.png" alt="Оздоровительные процедуры">
                    </div>
                </div>
            </div>
            <div class="children-section__right-col">
                <h2 class="children-section__heading heading heading_medium">
                    Детям
                </h2>
                <p class="children-section__desc">
                    Для детей от 2 месяцев до 17 лет
                </p>
                <div class="list-columns">
                    <ul class="list-columns__column list-hexagon">
                        <li class="list-hexagon__item list-hexagon_success">Коррекция осанки</li>
                        <li class="list-hexagon__item list-hexagon_success">Логомассаж</li>
                        <li class="list-hexagon__item list-hexagon_success">Коррекция плоскостопия</li>
                    </ul>
                    <ul class="list-columns__column health-section__list">
                        <li class="list-hexagon__item list-hexagon_success">Коррекция вальгусной
                            деформации</li>
                        <li class="list-hexagon__item list-hexagon_success">Ортопедичиеские стельки</li>
                        <li class="list-hexagon__item list-hexagon_success">Массаж для грудничков</li>
                    </ul>
                </div>
                <a href="#get-price" @click="openPopup('getprice')" class="popup_btn children-section__btn btn btn_warning btn_large" data-popup-from="Детям">
                    Узнать стоимость
                </a>
            </div>
        </div>
    </section>


    <section class="reability-section">
        <div class="container reability-section__container">
            <div class="reability-section__left-col">
                <h2 class="reability-section__heading heading heading_medium ">
                    Реабилитология
                </h2>
                <p class="reability-section__desc">
                    Моно- и Комбинированные техники реабилитации после травм и операций
                </p>
                <div class="list-columns">
                    <ul class="list-columns__column list-columns__column_100 list-hexagon">
                        <li class="list-hexagon__item list-hexagon_success">Посттравматичекая реабилитация</li>
                        <li class="list-hexagon__item list-hexagon_success">После инсультов</li>
                    </ul>
                </div>
                <a href="#get-price" @click="openPopup('getprice')" class="popup_btn reability-section__btn btn btn_success btn_large" data-popup-from="Реабилитология">
                    Узнать стоимость
                </a>
            </div>
            <div class="reability-section__right-col">
                <div class="reability-section__picture">
                    <div class="reability-section__back">
                        <img src="medical/images/reability-back.png" alt="Реабилитология">
                    </div>
                    <div class="reability-section__front">
                        <img src="medical/images/reability.jpg" alt="Реабилитология">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="body-section">
        <div class="container body-section__container">
            <div class="body-section__left-col">
                <div class="body-section__picture">
                    <div class="body-section__back">
                        <img src="medical/images/body-back.svg" alt="Оздоровительные процедуры">
                    </div>
                    <div class="body-section__front">
                        <img src="medical/images/body.png" alt="Оздоровительные процедуры">
                    </div>
                </div>
            </div>
            <div class="body-section__right-col">
                <h2 class="body-section__heading heading heading_medium">
                    Коррекция фигуры
                </h2>
                <p class="body-section__desc">
                    Комплекс эффективных процедур для борьбы с лишним весом, целлюлитом
                </p>
                <div class="list-columns">
                    <ul class="list-columns__column list-columns__column_100 list-hexagon">
                        <li class="list-hexagon__item list-hexagon_success">Эстетический массаж</li>
                        <li class="list-hexagon__item list-hexagon_success">Тайский SLIM-Массаж</li>
                        <li class="list-hexagon__item list-hexagon_success">Антицеллюлитный массаж</li>
                        <li class="list-hexagon__item list-hexagon_success">Лимфодренажный массаж тела</li>
                    </ul>
                </div>
                <a href="#get-price" @click="openPopup('getprice')" class="popup_btn body-section__btn btn btn_warning btn_large" data-popup-from="Коррекция фигуры">
                    Узнать стоимость
                </a>
            </div>
        </div>
    </section>

    <section class="spa-section">
        <div class="container spa-section__container">
            <div class="spa-section__left-col">
                <h2 class="spa-section__heading heading heading_medium ">
                    Spa-процедуры
                </h2>
                <div class="list-columns">
                    <ul class="list-columns__column list-hexagon">
                        <li class="list-hexagon__item list-hexagon_success">Багуа и Ломи-Ломи</li>
                        <li class="list-hexagon__item list-hexagon_success">
                            Обертывания <span class="list-hexagon__small-text">(имбирь с корицей,
                            апельсиновый прамине,  шоколадные,
                            водорослевые, грязевые)</span>
                        </li>
                        <li class="list-hexagon__item list-hexagon_success">Stone-терапия
                            <span class="list-hexagon__small-text">(массаж камнями)</span>
                        </li>
                        <li class="list-hexagon__item list-hexagon_success">Фитобочка</li>
                    </ul>
                    <ul class="list-columns__column list-hexagon">
                        <li class="list-hexagon__item list-hexagon_success">
                            Обертывания 
                        </li>
                        <li class="list-hexagon__item list-hexagon_success">
                            Spa-массаж для двоих 
                        </li>
                        <li class="list-hexagon__item list-hexagon_success">
                            Тайский фут-массаж
                        </li>
                        <li class="list-hexagon__item list-hexagon_success">
                            Аювердический массаж Чампи
                        </li>
                        <li class="list-hexagon__item list-hexagon_success">
                            Массаж лица
                        </li>
                    </ul>
                </div>
                <a href="#get-price" @click="openPopup('getprice')" class="popup_btn spa-section__btn btn btn_warning btn_large" data-popup-from="Spa-процедуры">
                    Узнать стоимость
                </a>
            </div>
            <div class="spa-section__right-col">
                <div class="spa-section__picture">
                    <div class="spa-section__back">
                        <img src="medical/images/spa-back.svg" alt="Spa-процедуры">
                    </div>
                    <div class="spa-section__front">
                        <img src="medical/images/spa-front.jpg" alt="Spa-процедуры">
                    </div>
                    <div class="spa-section__leaf">
                        <img src="medical/images/spa-green-leafs.png" alt="Spa-процедуры">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="face-section">
        <div class="container face-section__container">
            <div class="face-section__left-col">
                <div class="face-section__picture">
                    <div class="face-section__back">
                        <img src="medical/images/face-back.png" alt="Техники по лицу">
                    </div>
                    <div class="face-section__front">
                        <img src="medical/images/face-front.jpg" alt="Техники по лицу">
                    </div>
                </div>
            </div>
            <div class="face-section__right-col">
                <h2 class="face-section__heading heading heading_medium ">
                    Техники по лицу
                </h2>
                <div class="list-columns">
                    <ul class="list-columns__column list-hexagon">
                        <li class="list-hexagon__item list-hexagon_success">Буккально-скульптурная
                            техника (аналог круговой подтяжки)</li>
                        <li class="list-hexagon__item list-hexagon_success">Лимфодренажный массаж</li>
                        <li class="list-hexagon__item list-hexagon_success">ПИРМ лица</li>
                    </ul>
                    <ul class="list-columns__column list-hexagon">
                        <li class="list-hexagon__item list-hexagon_success">Скульптурирующий массаж</li>
                        <li class="list-hexagon__item list-hexagon_success">Миофасциальный массаж</li>
                    </ul>
                </div>
                <a href="#get-price" @click="openPopup('getprice')" class="popup_btn face-section__btn btn btn_warning btn_large" data-popup-from="Spa-процедуры">
                    Узнать стоимость
                </a>
            </div>
        </div>
    </section>

    <section class="sertificate-section" id="cert">
        <div class="container sertificate-section__container">
            <div class="sertificate-section__left-col">
                <h2 class="sertificate-section__heading heading heading_large ">
                    Лучший подарок - процедуры массажа от центра “ВИЭЛЬ”
                </h2>
                <h2 class="sertificate-section__subtitle heading heading_small"> 
                    Приобретите подарочный сертификат, порадуйте ваших близких
                </h2>
            </div>
            <div class="sertificate-section__right-col">
                <div class="sertificate-section__picture drop-shadow">
                    <img src="medical/images/gift-sertificate.jpg" alt="Лучший подарок - процедуры массажа">
                </div>
            </div>
            <a href="#get-sert" @click="openPopup('getsert')" class="popup_btn sertificate-section__btn btn btn_light btn_large" data-popup-from="Приобрести сертификат">
                Приобрести сертификат
            </a>
        </div>
    </section>

    <section class="cons-section">
        <div class="container cons-section__container">
            <h2 class="cons-section__heading heading heading_large">
                Запишитесь на массаж и получите первый сеанс <br> <span class="heading__success">со скидкой 20%</span>
            </h2>
            <formwrapper site="МЦ" class="cons-section__form" from="Запишитесь на массаж и получите первый сеанс со скидкой 20%" method="POST"  goal="seance">
                <template #default="{ form }">
                    <div>
                        <div class="message"></div>
                        <input type="text" name="phone" required class="cons-section__input form-input form-input_success form-input_line" placeholder="Телефон" v-model="form.phone">
                    </div>
                    <div>
                        <input class="cons-section__input form-input form-input_success form-input_line" type="email" name="email" placeholder="Email" v-model="form.email">
                    </div>
                    <div>
                        <input type="hidden" name="from" value="Запишитесь на массаж и получите первый сеанс со скидкой 20%">
                        <input type="hidden" name="site" value="МЦ">
                        <button type="submit" class="cons-section__btn btn btn_warning btn_medium" data-popup-from="Получить консультацию">
                            &nbsp; Записаться на массаж &nbsp; 
                        </button>
                    </div>
                    <div class="cons-section__agree">
                        <input type="checkbox" name="agree" checked required> 
                        <span>Я принимаю условия и соглашаюсь на обработку персональных данных в соответствии с <a href="privacy-edu.pdf" target="_blank">Политикой в отношении обработки персональных данных </a> в ООО «ВИЭЛЬ» </span>    
                    </div>
                </template>
             </formwrapper>
        </div>
    </section>

    <section class="employee-section" id="employees">
        <div class="container employee-section__container">
            <h2 class="employee-section__heading heading heading_medium heading_underline">
                Наши специалисты
            </h2>
            <div class="employee-section__list">
                <div class="employer">
                    <div class="employer__photo drop-shadow">
                        <img src="medical/images/person/violetta-empl.png" alt="Бычик Виолетта ">
                    </div>
                    <div class="employer__info">
                        <span class="employer__name">Бычик Виолетта 
                            Вячеславовна</span>
                        <span class="employer__job">Остепат, 
                            Стаж работы: 29 лет </span>
                    </div>
                    <div class="employer__actions">
                        <a href="#empl1" @click="openPopup('empl1')" class="popup_btn employer__btn btn btn_line btn_success btn_small">
                            Подробнее
                        </a>
                        <a href="#empl1" @click="openPopup('empl1')" class="popup_btn employer__btn btn btn_warning btn_small">
                            Записаться на прием
                        </a>
                    </div>
                </div>
                <div class="employer">
                    <div class="employer__photo drop-shadow">
                        <img src="medical/images/person/drozdov-empl.png" alt="Дроздов Игорь">
                    </div>
                    <div class="employer__info">
                        <span class="employer__name">Дроздов 
                            Игорь Юрьевич</span>
                        <span class="employer__job"> Остеопат,
                            Стаж работы: 26 лет </span>
                    </div>
                    <div class="employer__actions">
                        <a href="#empl2"  @click="openPopup('empl2')" class="popup_btn employer__btn btn btn_line btn_success btn_small">
                            Подробнее
                        </a>
                        <a href="#empl2" @click="openPopup('empl2')" class="popup_btn employer__btn btn btn_warning btn_small">
                            Записаться на прием
                        </a>
                    </div>
                </div>
                <div class="employer">
                    <div class="employer__photo drop-shadow">
                        <img src="medical/images/person/elvira-empl.png" alt="Бычик Эльвира">
                    </div>
                    <div class="employer__info">
                        <span class="employer__name">Бычик Эльвира
                            Игоревна</span>
                        <span class="employer__job">Специалист по аппаратным техникам. Стаж работы: 7 лет </span>
                    </div>
                    <div class="employer__actions">
                        <a href="#empl3" @click="openPopup('empl3')" class="popup_btn employer__btn btn btn_line btn_success btn_small">
                            Подробнее
                        </a>
                        <a href="#empl3" @click="openPopup('empl3')" class="popup_btn employer__btn btn btn_warning btn_small">
                            Записаться на прием
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials-section  testimonials-section_gray">
        <div class="container testimonials-section__container">
            <h2 class="testimonials-section__heading heading heading_medium heading_underline">
                Отзывы клиентов
            </h2>
            <div style="display: flex; justify-content: center; margin-top: 20px; border-radius: 20px; width: 100%;">
                <iframe style="width: 100%;height: 100%;max-width: 1170px;border: none;outline: none;padding: 0;margin: 0" id="myReviews__block-widget">
                  </iframe>
            </div> 
        </div>
    </section>

    <section class="question-section">
        <div class="container question-section__container">
            <div class="question-section__left-col">
                <div class="question-section__picture">
                    <img  src="medical/images/elvira-official.png" alt=" Эльвира Бычик, руководитель Центра “Виэль”">
                </div>
            </div>
            <div class="question-section__right-col">
                <h2 class="question-section__heading heading heading_large ">
                    Остались вопросы? Проконсультируем вас!
                </h2>
                <h2 class="question-section__subtitle heading heading_small"> 
                    Эльвира Бычик, руководитель Центра “Виэль”
                </h2>
                <a href="#callback" @click="openPopup('callback')" class="popup_btn question-section__btn btn btn_light btn_large" data-popup-from="Вопрос руководителю">
                    Заказать обратный звонок
                </a>
            </div>

        </div>
    </section>
    
    <section class="contacts-section" id="contacts">
        <div class="contacts-section__map">
            <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3A9db132641effa614181e32aeb5cb61712ab4a42f4e8cb7ef92613b2f0d403973" frameborder="0" allowfullscreen="" width="100%" height="640px" style="display: block;" loading="lazy"></iframe>        
        </div>
        <div class="container contacts-section__container">
            <div class="contacts-section__right-col">
                <div class="contacts-section__about">
                    <h2 class="contacts-section__heading heading heading_small ">
                        Центр ВИЭЛЬ
                    </h2>
                    <p class="contacts-section__addr">
                        Краснодар, ул. Кожевенная, 24 <br>
                        Режим работы: 09:00–21:00
                    </p>
                    <a href="mailto:info@viel-center.ru" class="contacts-section__email">info@viel-center.ru</a>
                    <a href="tel:+79615000039" class="contacts-section__phone" >+7 (961) 500-00-39</a>
                    <a href="#callback" @click="openPopup('callback')" class="popup_btn contacts-section__btn btn btn_success btn_medium" data-popup-from="Контакты">
                        Заказать обратный звонок
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="footer-section">
    <div class="container footer-section__container">
        <div class="footer-section__left-col">
            © ООО "ВИЭЛЬ"  ИНН 2311164816 ОГРН 1132311013328
            Имеются противопоказания, необходима консультация специалиста.
            Лицензия № ЛО-23-01-008444 от 24.03.2015г.
        </div>
        <div class="footer-section__right-col">
            Информация, размещенная на сайте, не является публичной офертой.
            Разработка сайта AlDem
        </div>
    </div>
</footer>


<popup ref="getprice">
    <h3 class="popup__heading heading heading_medium">Получить прайс</h3>
    <p class="popup__message">Оставьте заявку и получите полный прайс</p>
    <formwrapper site="МЦ" from="Получить прайс (popup)" method="POST" class="popup__form"  goal="price">
        <template #default="{ form }">
            <div class="popup__form-row">
                <span class="popup__form-label" >Ваш телефон: * </span>
                <input class="popup__input form-input" type="text" name="phone" v-model="form.phone"  placeholder="" required>
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label">Email:</span>
                <input class="popup__input form-input" type="email" name="email" v-model="form.email">
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label" >Ваше имя:</span>
                <input class="popup__input form-input" type="text" name="name" v-model="form.name">
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label" >Сообщение:  </span>
                <textarea maxlength="499" class="popup__textarea form-textarea" name="message" v-model="form.message"></textarea>
            </div>
            <div class="popup__form-row popup__agree">
                <input type="checkbox" name="agree" checked required> 
                <span>Я принимаю условия и соглашаюсь на обработку персональных данных в соответствии с <a href="privacy-med.pdf" target="_blank">Политикой в отношении обработки персональных данных </a> в ООО «ВИЭЛЬ» </span>
            </div>
            <div class="popup__form-row">
                <button type="submit" class="contacts-section__btn btn btn_warning btn_medium">Получить прайс</button>
            </div>
        </template>
    </formwrapper>
</popup>

<popup ref="callback">
    <h3 class="popup__heading heading heading_medium">Обратный звонок</h3>
    <p class="popup__message">Оставьте Ваши контакты и наш специалист  свяжется с Вами в самое ближайшее время</p>
    <formwrapper site="МЦ" from="Обратный звонок" method="POST" class="popup__form"  goal="zvonok">
        <template #default="{ form }">
            <div class="popup__form-row">
                <span class="popup__form-label" >Ваш телефон: *  </span>
                <input class="popup__input form-input" type="text" name="phone" v-model="form.phone" required>
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label" >Email:</span>
                <input class="popup__input form-input"  name="email" v-model="form.email">
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label" >Ваше имя: </span>
                <input class="popup__input form-input" type="text" name="name" v-model="form.name">
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label" >Сообщение: </span>
                <textarea maxlength="499" class="popup__textarea form-textarea" name="message" v-model="form.message"></textarea>
            </div>
            <div class="popup__form-row popup__agree">
                <input type="checkbox" name="agree" checked required> 
                <span>Я принимаю условия и соглашаюсь на обработку персональных данных в соответствии с 
                    <a href="privacy-med.pdf" target="_blank">Политикой в отношении обработки персональных данных </a> 
                    в ООО «ВИЭЛЬ» 
                </span>
            </div>
            <div class="popup__form-row">
                <button type="submit" class="contacts-section__btn btn btn_warning btn_medium"> Отправить </button>
            </div>
         </template>
    </formwrapper>
</popup>


<popup ref="getpromo">
    <h3 class="popup__heading heading heading_medium">Акции</h3>
    <p class="popup__message">Участвуйте в акциях Центра массажа и остеопрактики "Виэль", получите скидку прямо сейчас</p>
    <formwrapper site="МЦ" from="Акции (popup)" method="POST" class="popup__form"  goal="skidka">
        <template #default="{ form }">
            <div class="popup__form-row">
                <select name="promo" class="popup__select form-select" v-model="form.promo">
                    <option value="Не выбрано">Выберите акцию</option>
                    <option value="С семьей">Посещение с семьей</option>
                    <option value="Антицеллюлитный массаж">Антицеллюлитный массаж - 2 подарка</option>
                    <option value="Прессотерапия">Прессотерапия - Абонемент на 12 процедур</option>
                    <option value="Стельки">Стельки</option>
                    <option value="Медитация">Медитация</option>
                </select>
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label" >Ваш телефон:*  </span>
                <input class="popup__input form-input" type="text" name="phone" v-model="form.phone" required>
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label" >Email:</span>
                <input class="popup__input form-input" type="email" name="email" v-model="form.email">
            </div>
            <div class="popup__form-row">
                <span class="popup__form-label" >Ваше имя:</span>
                <input class="popup__input form-input" type="text" name="name" v-model="form.name">
            </div>
            <div class="popup__form-row popup__agree">
                <input type="checkbox" name="agree" checked required> 
                <span>Я принимаю условия и соглашаюсь на обработку персональных данных в соответствии с <a href="privacy-med.pdf" target="_blank">Политикой в отношении обработки персональных данных </a> в ООО «ВИЭЛЬ» </span>
            </div>
            <div class="popup__form-row">
                <button type="submit" class="contacts-section__btn btn btn_warning btn_medium">Купить по скидке</button>
            </div>
        </template>
    </formwrapper>
</popup>

<popup ref="getsert">
    <h3 class="popup__heading heading heading_medium">Выпуск сертификата</h3>
    <p class="popup__message"></p>
    <form action="https://viel-center.ru/onlinepayment" method="GET" class="popup__form"  goal="price">
        <div class="popup__form-row">
            <span class="popup__form-label" >Имя плательщика: * </span>
            <input class="popup__input form-input" type="text" name="name"  placeholder="" required>
        </div>
        <div class="popup__form-row">
            <span class="popup__form-label" >Фамилия плательщика: *  </span>
            <input class="popup__input form-input" type="text" name="lastname"  placeholder="" required>
        </div>
        <div class="popup__form-row">
            <span class="popup__form-label" >Ваш телефон:* </span>
            <span>На этот номер придет номер и ссылка на электронный сертификат (без +7)</span>
            <input class="popup__input form-input" type="text" name="phone"  placeholder=""  required>
        </div>
        <div class="popup__form-row">
            <span class="popup__form-label" >Email *:</span>
            <span>На этот адрес придет номер и ссылка на электронный сертификат</span>
            <input class="popup__input form-input" type="email" name="email">
        </div>
        <div class="popup__form-row">
            <span class="popup__form-label" >Имя владельца сертификата:</span>
            <span>Eсли вы покупаете для себя то пропустите этот шаг</span>
            <input class="popup__input form-input" type="text" name="ownername">
        </div>
        <div class="popup__form-row">
            <span class="popup__form-label" >Фамилия владельца сертификата:</span>
            <input class="popup__input form-input" type="text" name="ownerlastname">
        </div>
        <div class="popup__form-row">
            <span class="popup__form-label" >Номинал сертификата:</span>
            <input class="popup__input form-input" type="number" name="cost" value="5000">
        </div>
        <div class="popup__form-row">
            <span class="popup__form-label" >Сообщение:  </span>
            <textarea maxlength="499" class="popup__textarea form-textarea" name="message"></textarea>
        </div>
        <div class="popup__form-row popup__agree">
            <input type="checkbox" name="agree" checked required> 
            <span>Я принимаю условия и соглашаюсь на обработку своих персональных данных в соответствии с <a href="privacy-med.pdf" target="_blank">Политикой в отношении обработки персональных данных </a> в ООО «ВИЭЛЬ», а также принимаю <a href="https://viel-center.ru/onlinepayment/" target="_blank"> условия 
                выпуска, использования и аннулирования подарочных сертификатов</a>
            </span>
        </div>
        <div class="popup__form-row message">
        </div>
        <div class="popup__form-row">
            <input type="hidden" name="service" value="0">
            <input type="submit" class="contacts-section__btn btn btn_warning btn_medium"  value="Перейти к оплате">
        </div>
    </form>
</popup>

<popup class="popup-employment" ref="empl1">
    <div class="popup-employment__body">
        <div class="popup-employment__left-col">
            <h3 class="popup-employment__heading heading heading_small">Бычик Виолетта Вячеславовна</h3>
            <p class="popup-employment__message">Остепат,  Стаж работы: 29 лет  </p>
            <div class="popup-employment__about">
                В индустрии массажа с 1994 года. Преподаватель лечебных техник и SPA методик, 
                «Виртуоз России» - призер V-го Чемпионата SPA массажа. 
                Член жюри VI-го Чемпионата России «Лучший SPA-мастер 2014».
                <br>
                Занимается:
                - коррекцией костной системы,
                - подбором Лечебной гимнастики, 
                - выстраивает программы по коррекции фигуры, 
                - висцеральный массаж, 
            </div>
        </div>
        <div class="popup-employment__right-col">
            <div class="popup-employment__employer-photo">
                <img src="medical/images/person/violetta-empl.png" alt="Бычик Виолетта ">
            </div>
        </div>
    </div>
    <div class="popup__footer popup-employment__footer">
        <formwrapper site="МЦ" from="Запись Бычик Виолетта Вячеславовна (popup)" method="POST" class="popup-employment__form"  goal="zapis">
            <template #default="{ form }">
                <div class="popup-employment__form-row">
                    <input class="popup-employment__input form-input form-input_line form-input_success" placeholder="Имя" type="text" name="name" v-model="form.name">
                </div>
                <div class="popup-employment__form-row">
                    <input class="popup__input form-input form-input form-input_line form-input_success" type="text" name="phone"  placeholder="Телефон" v-model="form.phone" required>
                </div>
                <div class="popup-employment__form-row">
                    <input class="popup__input form-input form-input form-input_line form-input_success" type="email" name="email"  placeholder="Email" v-model="form.email">
                </div>
                <div class="popup-employment__form-row">
                    <button type="submit" class="contacts-section__btn btn btn_warning btn_medium">Записаться</button>
                </div>
                <div class="popup-employment__form-row popup__agree">
                    <input type="checkbox" name="agree" checked required> 
                    <span>Я принимаю условия и соглашаюсь на обработку персональных данных в соответствии с <a href="privacy-med.pdf" target="_blank">Политикой в отношении обработки персональных данных </a> в ООО «ВИЭЛЬ» </span>
                </div>
            </template>
        </formwrapper>
    </div>
</popup>

<popup class="popup-employment" ref="empl2">
    <div class="popup-employment__body">
        <div class="popup-employment__left-col">
            <h3 class="popup-employment__heading heading heading_small">Дроздов Игорь Юрьевич</h3>
            <p class="popup-employment__message">Остеопат, Стаж работы: 26 лет  </p>
            <div class="popup-employment__about">
                Игорь владеет различными биодинамическими и медитативными техниками, которые помогают ему диагностировать и устранять проблемы со здоровьем на основе индивидуальных особенностей каждого пациента.

                Он также предлагает услуги по созданию ортопедических стелек, которые позволяют улучшить осанку, снизить нагрузку на суставы и предотвратить развитие различных заболеваний.
                
                Игорь является профессионалом своего дела и всегда стремится к достижению наилучших результатов для своих пациентов.    
            </div>
        </div>
        <div class="popup-employment__right-col">
            <div class="popup-employment__employer-photo">
                <img src="medical/images/person/drozdov-empl.png" alt="Дроздов ">
            </div>
        </div>
    </div>

    <div class="popup__footer popup-employment__footer">
        <formwrapper site="МЦ" from="Запись Дроздов Игорь Юрьевич (popup)" method="POST" class="popup-employment__form"  goal="zapis">
            <template #default="{ form }">
                <div class="popup-employment__form-row message">
                </div>
                <div class="popup-employment__form-row">
                    <input class="popup-employment__input form-input form-input_line form-input_success" placeholder="Имя" type="text" name="name" v-model="form.name">
                </div>
                <div class="popup-employment__form-row">
                    <input class="popup__input form-input form-input form-input_line form-input_success" type="text" name="phone"  placeholder="Телефон" v-model="form.phone" required>
                </div>
                <div class="popup-employment__form-row">
                    <input class="popup__input form-input form-input form-input_line form-input_success" type="email" name="email"  placeholder="Email" v-model="form.email">
                </div>
                <div class="popup-employment__form-row">
                    <button type="submit" class="contacts-section__btn btn btn_warning btn_medium">Записаться</button>
                </div>
                <div class="popup-employment__form-row popup__agree">
                    <input type="checkbox" name="agree" checked required> 
                    <span>Я принимаю условия и соглашаюсь на обработку персональных данных в соответствии с <a href="privacy-med.pdf" target="_blank">Политикой в отношении обработки персональных данных </a> в ООО «ВИЭЛЬ» </span>
                </div>
            </template>
        </formwrapper>
    </div>

</popup>

<popup class="popup-employment" ref="empl3">
    <div class="popup-employment__body">
        <div class="popup-employment__left-col">
            <h3 class="popup-employment__heading heading heading_small">Бычик Эльвира Игоревна</h3>
            <p class="popup-employment__message">Специалист по аппаратным техникам. Стаж работы: 7 лет </p>
            <div class="popup-employment__about">
                Эльвира - профессиональный массажист. Она специализируется на аппаратном массаже, который включает в себя различные техники и методики. Эльвира использует современное оборудование и инновационные методы для достижения максимального эффекта от массажа. Она работает с клиентами разных возрастов и состояний здоровья, помогая им улучшить свое физическое и эмоциональное состояние. Эльвира является экспертом в области аппаратного массажа и всегда готова помочь своим клиентам достичь желаемых результатов.
            </div>
        </div>
        <div class="popup-employment__right-col">
            <div class="popup-employment__employer-photo">
                <img src="medical/images/person/elvira-empl.png" alt="Дроздов ">
            </div>
        </div>
    </div>
    <div class="popup__footer popup-employment__footer">
        <formwrapper site="МЦ" from="Запись Бычик Эльвира (popup)" method="POST" class="popup-employment__form"  goal="zapis">
            <div class="popup-employment__form-row message">
            </div>
            <div class="popup-employment__form-row">
                <input class="popup-employment__input form-input form-input_line form-input_success" placeholder="Имя" type="text" name="name" v-model="form.name">
            </div>
            <div class="popup-employment__form-row">
                <input class="popup__input form-input form-input form-input_line form-input_success" type="text" name="phone"  placeholder="Телефон" v-model="form.phone" required>
            </div>
            <div class="popup-employment__form-row">
                <input class="popup__input form-input form-input form-input_line form-input_success" type="email" name="email"  placeholder="Email" v-model="form.email">
            </div>
            <div class="popup-employment__form-row">
                <button type="submit" class="contacts-section__btn btn btn_warning btn_medium">Записаться</button>
            </div>
            <div class="popup-employment__form-row popup__agree">
                <input type="checkbox" name="agree" checked required> 
                <span>Я принимаю условия и соглашаюсь на обработку персональных данных в соответствии с <a href="privacy-med.pdf" target="_blank">Политикой в отношении обработки персональных данных </a> в ООО «ВИЭЛЬ» </span>
            </div>
        </formwrapper>
    </div>
</popup>


<div class="static-widgets">
    <a href="https://t.me/VielCenter" class="static-widgets__link" target="_blank">
            <img src="medical/images/tg.png">
    </a>
    <a href="https://wa.me/79615000039?text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5%2C%20%D0%BC%D0%B5%D0%BD%D1%8F%20%D0%B8%D0%BD%D1%82%D0%B5%D1%80%D0%B5%D1%81%D1%83%D0%B5%D1%82" class="static-widgets__link" target="_blank" >
            <img  src="medical/images/whatsapp-logo.png">
    </a>
    <a href="https://vk.com/vielcenter" class="static-widgets__link" target="_blank">
            <img src="medical/images/vk.png">
    </a>
</div>

</div>
<!-- End  Application -->


<script src="https://myreviews.dev/widget/dist/index.js" defer></script>
<script defer>
    (function (){
      let myReviewsInit = function () {
        new window.myReviews.BlockWidget({
        uuid: "b1a53951-7ae6-4a80-8664-bf0bc09aa0a3",
        name: "g8926696",
        additionalFrame:"none",
        lang:"ru",
        widgetId: "0"
        }).init();

      };
    if (document.readyState === "loading") {
      document.addEventListener('DOMContentLoaded', function () {
          myReviewsInit()
      })
    } else {
      myReviewsInit()
    }
    })()
</script>


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();
    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
 
    ym(34575640, "init", {
         clickmap:true,
         trackLinks:true,
         accurateTrackBounce:true,
         webvisor:true
    });
 </script>

 <noscript><div><img src="https://mc.yandex.ru/watch/34575640" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
 <!-- /Yandex.Metrika counter -->

<script src="medical/js/app.min.js?v={BUILD_ID}"></script>

</body>
</html>