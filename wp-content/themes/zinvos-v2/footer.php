<footer>
    <div class="container">
        <div class="footer-grid">
            <div>
                <?php if ( file_exists( get_template_directory() . '/images/zinvos-logo.svg' ) ) : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/zinvos-logo.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                <?php else : ?>
                    <span style="font-weight:800; font-size:20px; color:var(--ink);"><?php bloginfo( 'name' ); ?></span>
                <?php endif; ?>
                <p style="margin-top: 14px; font-size: 13px; color: #68747b; max-width: 260px;">
                    The complete conference technology platform connecting web, WhatsApp, and mobile.
                </p>
            </div>

            <div class="foot-col">
                <h4>Platform</h4>
                <a href="<?php echo esc_url( home_url( '/platform#registration' ) ); ?>">Registration</a>
                <a href="<?php echo esc_url( home_url( '/platform#communication' ) ); ?>">Communication</a>
                <a href="<?php echo esc_url( home_url( '/platform#onsite' ) ); ?>">Onsite Operations</a>
                <a href="<?php echo esc_url( home_url( '/platform#mobile-app' ) ); ?>">Session Engagement</a>
                <a href="<?php echo esc_url( home_url( '/platform#certificates' ) ); ?>">Certificates</a>
            </div>

            <div class="foot-col">
                <h4>Solutions</h4>
                <a href="<?php echo esc_url( home_url( '/solutions#academic' ) ); ?>">Academic &amp; Scientific</a>
                <a href="<?php echo esc_url( home_url( '/solutions#medical' ) ); ?>">Medical &amp; CME</a>
                <a href="<?php echo esc_url( home_url( '/solutions#corporate' ) ); ?>">Corporate Events</a>
                <a href="<?php echo esc_url( home_url( '/solutions#associations' ) ); ?>">Associations &amp; Societies</a>
            </div>

            <div class="foot-col">
                <h4>Company</h4>
                <a href="<?php echo esc_url( home_url( '/#stories' ) ); ?>">Case Studies</a>
                <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a>
                <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Contact Us</a>
                <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Book a Demo</a>
            </div>

            <div class="foot-col">
                <h4>Contact</h4>
                <a href="tel:+917994286660">+91 799 428 66 60</a>
                <a href="mailto:hello@sprdh.com">hello@sprdh.com</a>
                <a href="https://sprdh.com" target="_blank" rel="noopener">SPRDH Solutions Pvt Ltd</a>
            </div>
        </div>

        <div style="text-align: center; font-size: 13px; color: #879299; margin-top: 36px; padding-top: 20px; border-top: 1px solid var(--line);">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved. Developed by <a href="https://sprdh.com" target="_blank" rel="noopener" style="color: var(--blue);">SPRDH Solutions Pvt Ltd</a>.
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
