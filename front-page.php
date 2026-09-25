<?php

get_header();

$site_phone = get_field('site_phone');
$site_email = get_field('site_email');

$site_phone_link = preg_replace(
    '/[^0-9+]/',
    '',
    $site_phone
);

$hero_city = get_field('hero_city');
$hero_title = get_field('hero_title');
$hero_accent = get_field('hero_accent');
$hero_description = get_field('hero_description');
$hero_image = get_field('hero_image');
$hero_price = get_field('hero_price');
$hero_next_start = get_field('hero_next_start');
?>
<main>
    <section class="hero" id="top">
        <header class="header">
            <a class="logo" href="#top" aria-label="rideX — на главную">ride<span>X</span></a>

            <nav class="header__nav" id="main-nav" aria-label="Основная навигация">
                <a href="#bikes">Мотоциклы</a>
                <a href="#prices">Цены</a>
                <a href="#certificate">Сертификаты</a>
                <a href="#location">Как нас найти</a>
            </nav>

            <div class="header__actions">
                <a class="header__phone" href="<?php echo esc_url('tel:' . $site_phone_link); ?>">
                    <?php echo esc_html($site_phone); ?>
                </a>
                <a class="button button--small button--white" href="#booking">Записаться</a>
            </div>

            <button class="header__menu-toggle" type="button" aria-label="Открыть меню" aria-expanded="false" aria-controls="main-nav">
                <span></span>
                <span></span>
            </button>
        </header>

        <div class="hero__inner container">
            <div class="hero__content">
                <p class="eyebrow eyebrow--light">
                    <span><?php echo esc_html($hero_city); ?></span> · эндуро-прокат
                </p>
                <h1>
                    <?php echo esc_html($hero_title); ?>
                    <em><?php echo esc_html($hero_accent); ?></em>
                </h1>
                <p class="hero__lead">
                    <?php echo esc_html($hero_description); ?>
                </p>
                <div class="hero__actions">
                    <a class="button button--white" href="#booking">Выбрать заезд <span>↗</span></a>
                    <a class="text-link text-link--light" href="#bikes">Смотреть парк <span>↓</span></a>
                </div>
                <div class="hero__stats" aria-label="Преимущества rideX">
                    <div><strong>12</strong><span>мотоциклов</span></div>
                    <div><strong>7</strong><span>маршрутов</span></div>
                    <div><strong>0</strong><span>опыта нужно</span></div>
                </div>
            </div>

            <div class="hero__visual" aria-label="Эндуро-райдер на лесной трассе">
                <?php if ($hero_image) { ?>
                    <div class="hero__photo">
                        <img
                            src="<?php echo esc_url($hero_image['sizes']['large']); ?>"
                            alt="<?php echo esc_attr($hero_image['alt']); ?>">
                    </div>
                <?php } ?>
                <div class="hero__badge">
                    <span>от</span>
                    <strong><?php echo esc_html(number_format($hero_price, 0, ',', ' ')); ?></strong>
                    <span>₴ / заезд</span>
                </div>
                <div class="hero__route">
                    <span class="hero__pulse"></span>
                    Ближайший старт: <?php echo esc_html($hero_next_start); ?>
                </div>
                <div class="hero__decoration" aria-hidden="true">X</div>
            </div>
        </div>

        <div class="hero__ticker" aria-hidden="true">
            <span>Экипировка включена</span><b>✦</b><span>Подходит новичкам</span><b>✦</b><span>Инструктор рядом</span><b>✦</b><span>Настоящие маршруты</span>
        </div>
    </section>

    <section class="bikes section" id="bikes">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="eyebrow">Парк rideX · 2026</p>
                    <h2>Выбери свой<br><span>характер</span></h2>
                </div>
                <p class="section-heading__intro">От понятного четырёхтактника для первого старта до лёгкого двухтактного аппарата для хардовых подъёмов.</p>
            </div>

            <?php
            $bikes = new WP_Query([
                'post_type' => 'bike',
                'posts_per_page' => 3
            ]);
            ?>
            <div class="bikes__grid">
                <?php if ($bikes->have_posts()) { ?>
                    <?php $bike_number = 1; ?>
                    <?php while ($bikes->have_posts()) { ?>
                        <?php $bikes->the_post(); ?>
                        <?php
                        $type = get_field('bike_type');
                        $engine = get_field('bike_engine');
                        $level = get_field('bike_level');
                        $power = get_field('bike_power');
                        $weight = get_field('bike_weight');
                        $feature = get_field('bike_feature');
                        ?>
                        <article class="bike-card">
                            <div class="bike-card__photo">
                                <?php if (has_post_thumbnail()) { ?>
                                    <?php the_post_thumbnail('large', ['loading' => 'lazy']); ?>
                                <?php } ?>
                                <span class="bike-card__number">
                                    <?php echo esc_html(sprintf('%02d', $bike_number)); ?>
                                </span>
                                <span class="bike-card__level"><?php echo esc_html($level); ?></span>
                            </div>
                            <div class="bike-card__info">
                                <div>
                                    <p>
                                        <?php echo esc_html($type); ?> ·
                                        <?php echo esc_html($engine); ?> см³
                                    </p>
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <a href="<?php the_permalink(); ?>"
                                    aria-label="Подробнее о <?php echo esc_attr(get_the_title()); ?>">
                                    ↗
                                </a>
                            </div>
                            <ul class="bike-card__specs">
                                <li><?php echo esc_html($power); ?> л.с.</li>
                                <li><?php echo esc_html($weight); ?> кг</li>
                                <li><?php echo esc_html($feature); ?></li>
                            </ul>
                        </article>
                        <?php $bike_number++; ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
    <section class="benefits">
        <div class="benefits__photo">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/bike-pro.jpg'); ?>"
                alt="Райдер выполняет прыжок на эндуро-мотоцикле"
                loading="lazy">
        </div>
        <div class="benefits__content">
            <p class="eyebrow eyebrow--light">Включено в каждый заезд</p>
            <h2>Тебе —<br>эмоции.<br><span>Остальное — нам.</span></h2>
            <ul class="benefits__list">
                <li><b>01</b><span><strong>Исправная техника</strong>Мотоцикл проходит проверку перед каждым стартом.</span></li>
                <li><b>02</b><span><strong>Защита с головы до ног</strong>Экипировка включена в тариф и подбирается по размеру.</span></li>
                <li><b>03</b><span><strong>Инструктор на маршруте</strong>Держит темп группы и помогает на сложных участках.</span></li>
            </ul>
        </div>
    </section>
    <section class="prices section" id="prices">
        <div class="container">
            <div class="section-heading section-heading--light">
                <div>
                    <p class="eyebrow eyebrow--light">Цены без сюрпризов</p>
                    <h2>Сколько<br><span>огня?</span></h2>
                </div>
                <p class="section-heading__intro">Во всех тарифах уже есть мотоцикл, бензин, экипировка, инструктаж и
                    сопровождение.</p>
            </div>
            <?php
            $tariffs = new WP_Query([
                'post_type' => 'tariff',
                'posts_per_page' => -1,
                'order' => 'ASC'
            ]);
            ?>
            <div class="prices__grid">
                <?php if ($tariffs->have_posts()) { ?>
                    <?php while ($tariffs->have_posts()) { ?>
                        <?php $tariffs->the_post(); ?>
                        <?php
                        $tariff_duration = get_field('tariff_duration');
                        $tariff_description = get_field('tariff_description');
                        $tariff_price = get_field('tariff_price');
                        $tariff_features = get_field('tariff_features');
                        $tariff_badge = get_field('tariff_badge');

                        $tariff_features_list = array_filter(
                            array_map('trim', explode("\n", $tariff_features))
                        );
                        $tariff_button_class = $tariff_badge
                            ? 'button--dark'
                            : 'button--outline';
                        ?>
                        <article class="price-card<?php echo $tariff_badge ? ' price-card--featured' : ''; ?>">
                            <div class="price-card__header">
                                <span><?php the_title(); ?></span>

                                <?php if ($tariff_badge) { ?>
                                    <b><?php echo esc_html($tariff_badge); ?></b>
                                <?php } ?>
                            </div>
                            <h3><?php echo esc_html($tariff_duration); ?></h3>
                            <p><?php echo esc_html($tariff_description); ?></p>
                            <div class="price-card__value">
                                <?php echo esc_html(number_format($tariff_price, 0, ',', ' ')); ?> ₴
                            </div>
                            <ul>
                                <?php foreach ($tariff_features_list as $feature) { ?>
                                    <li>✓ <?php echo esc_html($feature); ?></li>
                                <?php } ?>
                            </ul>
                            <a class="button <?php echo esc_attr($tariff_button_class); ?> button--full" href="#booking">Выбрать тариф <span>↗</span></a>
                        </article>
                    <?php } ?>
                <?php } ?>
            </div>
            <p class="prices__note">* Финальная стоимость зависит от выбранной модели и индивидуального формата.</p>
        </div>
        <?php wp_reset_postdata(); ?>
    </section>
    <section class="steps section">
        <div class="container">
            <div class="steps__title">
                <p class="eyebrow eyebrow--light">Как всё проходит</p>
                <h2>От заявки<br>до старта</h2>
            </div>
            <div class="steps__grid">
                <article class="step-card"><span>01</span>
                    <h3>Оставь заявку</h3>
                    <p>Выбери дату, формат и оставь контакты — ответим в течение 15 минут.</p>
                </article>
                <article class="step-card"><span>02</span>
                    <h3>Подбери экипировку</h3>
                    <p>На базе выдадим шлем, защиту, форму, перчатки и мотоботы по размеру.</p>
                </article>
                <article class="step-card"><span>03</span>
                    <h3>Пройди инструктаж</h3>
                    <p>Объясним управление, стойку и безопасно потренируемся на площадке.</p>
                </article>
                <article class="step-card"><span>04</span>
                    <h3>Жми на газ</h3>
                    <p>Инструктор поведёт по маршруту под твой уровень — от лайта до хард-эндуро.</p>
                </article>
            </div>
        </div>
    </section>
    <?php
    $certificate_image = get_field('certificate_image');
    $certificate_values = get_field('certificate_values');
    $certificate_values_list = array_filter(
        array_map('trim', explode("\n", $certificate_values))
    );
    ?>
    <section class="certificate section" id="certificate">
        <div class="container certificate__inner">
            <div class="certificate__content">
                <p class="eyebrow">Подарок, который не пылится</p>
                <h2>Сертификат<br>на <span>драйв</span></h2>
                <p>Выбирай номинал или конкретный заезд. Пришлём электронный сертификат на почту — можно подарить даже
                    сегодня.</p>
                <div class="certificate__values">
                    <?php foreach ($certificate_values_list as $value) { ?>
                        <a href="<?php echo esc_url(
                                        'mailto:hello@ridex.ua?subject=' .
                                            rawurlencode('Сертификат rideX на ' . $value . ' грн')
                                    ); ?>">
                            <?php echo esc_html(number_format((float) $value, 0, ',', ' ')); ?> ₴
                        </a>
                    <?php } ?>
                </div>
                <a class="button button--dark"
                    href="mailto:hello@ridex.ua?subject=Хочу%20подарочный%20сертификат%20rideX">Заказать сертификат
                    <span>↗</span></a>
            </div>

            <div class="certificate__visual">
                <?php if ($certificate_image) { ?>
                    <div class="certificate__photo">
                        <img
                            src="<?php echo esc_url($certificate_image['sizes']['large']); ?>"
                            alt="<?php echo esc_attr($certificate_image['alt']); ?>"
                            loading="lazy">
                    </div>
                <?php } ?>
                <div class="gift-card">
                    <div class="gift-card__logo">ride<span>X</span></div>
                    <p>ПОДАРОЧНЫЙ<br>СЕРТИФИКАТ</p>
                    <small>НА ЭНДУРО-ПРИКЛЮЧЕНИЕ</small>
                    <b>5 500 ₴</b>
                    <i>ЭМОЦИИ ВНУТРИ →</i>
                </div>
            </div>
        </div>
    </section>
    <?php
    $location_description = get_field('location_description');
    $location_parking = get_field('location_parking');
    $location_schedule = get_field('location_schedule');
    $location_map_url = get_field('location_map_url');
    ?>
    <section class="location" id="location">
        <div class="location__map" aria-label="Схематичная карта проезда к базе rideX">
            <div class="location__map-grid"></div>
            <div class="location__road location__road--one"></div>
            <div class="location__road location__road--two"></div>
            <div class="location__pin"><span>X</span><b>rideX</b></div>
            <div class="location__label location__label--city">КИЕВ</div>
            <div class="location__label location__label--forest">ГОЛОСЕЕВСКИЙ ЛЕС</div>
        </div>
        <div class="location__content">
            <p class="eyebrow eyebrow--light">Как нас найти</p>
            <h2>20 минут<br>от <span>Теремков</span></h2>
            <p><?php echo esc_html($location_description); ?></p>
            <div class="location__facts">
                <div>
                    <b>ПАРКОВКА</b>
                    <span><?php echo esc_html($location_parking); ?></span>
                </div>
                <div>
                    <b>ГРАФИК</b>
                    <span><?php echo esc_html($location_schedule); ?></span>
                </div>
            </div>
            <a class="button button--white" href="<?php echo esc_url($location_map_url); ?>" target="_blank"
                rel="noopener noreferrer">Открыть район на карте <span>↗</span></a>
        </div>
    </section>
    <section class="booking section" id="booking">
        <div class="container booking__inner">
            <div class="booking__content">
                <p class="eyebrow">Запись на заезд</p>
                <h2>Готов<br><span>испачкаться?</span></h2>
                <p>Оставь контакты. Подберём мотоцикл и маршрут под твой опыт, подтвердим свободное время по телефону или
                    почте.</p>
                <a class="booking__phone" href="<?php echo esc_url('tel:' . $site_phone_link); ?>">
                    <?php echo esc_html($site_phone); ?>
                </a>
                <a class="booking__email" href="<?php echo esc_url('mailto:' . $site_email); ?>">
                    <?php echo esc_html($site_email); ?>
                </a>
            </div>

            <div class="booking-form">
                <?php echo do_shortcode('[contact-form-7 id="f8165c9" title="Запись на заезд RideX"]'); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>