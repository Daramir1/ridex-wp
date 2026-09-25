<?php get_header(); ?>

<main class="section single-bike">
    <div class="container">
        <a class="single-bike__back"
            href="<?php echo esc_url(home_url('/#bikes')); ?>">
            ← Вернуться к мотоциклам
        </a>
        <?php while (have_posts()) { ?>
            <?php the_post(); ?>
            <?php
            $price = get_field('bike_price');
            $engine = get_field('bike_engine');
            $level = get_field('bike_level');
            $type = get_field('bike_type');
            $power = get_field('bike_power');
            $weight = get_field('bike_weight');
            $feature = get_field('bike_feature');
            ?>

            <article class="single-bike__content">

                <div class="single-bike__image">
                    <?php if (has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php } ?>
                </div>

                <div class="single-bike__details">
                    <p class="eyebrow">
                        <?php echo esc_html($type); ?> ·
                        <?php echo esc_html($engine); ?> см³
                    </p>

                    <h1><?php the_title(); ?></h1>

                    <p class="single-bike__level">
                        Уровень: <?php echo esc_html($level); ?>
                    </p>

                    <ul class="single-bike__specs">
                        <li>Мощность: <?php echo esc_html($power); ?> л.с.</li>
                        <li>Вес: <?php echo esc_html($weight); ?> кг</li>
                        <li>Особенность: <?php echo esc_html($feature); ?></li>
                    </ul>

                    <div class="single-bike__price">
                        от <?php echo esc_html(number_format($price, 0, ',', ' ')); ?> ₴ / день
                    </div>

                    <a class="button button--dark"
                        href="<?php echo esc_url(home_url('/#booking')); ?>">
                        Записаться на заезд <span>↗</span>
                    </a>
                </div>

            </article>
        <?php } ?>

    </div>
</main>

<?php get_footer(); ?>