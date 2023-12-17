<footer id="colophon" class="main_footer">
    <div class="main_footer-container">
        <div class="main_footer-info">
            <ul class="main_footer-info-ul">
                <li class="main_footer-info-li">Allo</li>
                <li class="main_footer-info-li">les</li>
                <li class="main_footer-info-li">gens</li>
                <li class="main_footer-info-li">les infos</li>
            </ul>
        </div>
        <div class="main_footer-small">
            <?php
            /* translators: 1: Year, 2: Site title */
            printf(esc_html__('&copy; %1$s %2$s. All rights reserved.', 'your-theme-textdomain'), date('Y'), get_bloginfo('name'));
            ?>
        </div>
    </div>
</footer>
</body>