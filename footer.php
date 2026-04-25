</main> <!-- end .main-content -->

<footer class="footer">
    <div class="container">
        <div class="footer-widgets">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <?php if (is_active_sidebar('footer-' . $i)) : ?>
                    <?php dynamic_sidebar('footer-' . $i); ?>
                <?php else : ?>
                    <div class="footer-widget">
                        <h3><?php _e('Widget Area', 'newsportal'); ?> <?php echo $i; ?></h3>
                        <p><?php _e('Add widgets in Appearance > Widgets', 'newsportal'); ?></p>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved.', 'newsportal'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
