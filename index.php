<?php get_header(); ?>

<main class="section">
    <div class="container">
        <?php if (have_posts()) { ?>

            <?php while (have_posts()) { ?>
                <?php the_post(); ?>

                <article>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </article>

            <?php } ?>

        <?php } else { ?>

            <p>Материалы не найдены.</p>

        <?php } ?>
    </div>
</main>

<?php get_footer(); ?>