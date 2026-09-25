<?php
$front_page_id = get_option('page_on_front');

$instagram_url = get_field('instagram_url', $front_page_id);
$telegram_url = get_field('telegram_url', $front_page_id);
$youtube_url = get_field('youtube_url', $front_page_id);
?>
<footer class="footer">
    <div class="container footer__inner">
        <a class="logo logo--footer" href="<?php echo esc_url(home_url('/#top')); ?>">
            ride<span>X</span>
        </a>
        <p>Эндуро-прокат для тех,<br>кому мало асфальта.</p>
        <div class="footer__links">
            <a href="<?php echo esc_url(home_url('/#bikes')); ?>">Мотоциклы</a>
            <a href="<?php echo esc_url(home_url('/#prices')); ?>">Цены</a>
            <a href="<?php echo esc_url(home_url('/#certificate')); ?>">Сертификаты</a>
            <a href="<?php echo esc_url(home_url('/#location')); ?>">Контакты</a>
        </div>
        <div class="footer__socials">
            <a href="<?php echo esc_url($instagram_url); ?>"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Instagram">INST</a>
            <a href="<?php echo esc_url($telegram_url); ?>" target="_blank"
                rel="noopener noreferrer"
                aria-label="Telegram">TG</a>
            <a href="<?php echo esc_url($youtube_url); ?>" target="_blank"
                rel="noopener noreferrer"
                aria-label="YouTube">YT</a>
        </div>
    </div>
    <div class="container footer__bottom"><span>© <?php echo esc_html(wp_date('Y')); ?> rideX</span><span>Катание на эндуро связано с риском.
            Соблюдайте инструкции.</span></div>
</footer>
<?php wp_footer(); ?>
</body>

</html>