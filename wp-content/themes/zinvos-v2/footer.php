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
                <a href="<?php echo esc_url( home_url( '/features' ) ); ?>">Features</a>
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
                <a href="<?php echo esc_url( home_url( '/about-zinvos' ) ); ?>">About Us</a>
                <a href="<?php echo esc_url( home_url( '/events' ) ); ?>">Upcoming Events</a>
                <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a>
                <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Contact Us</a>
                <a href="<?php echo esc_url( home_url( '/partners' ) ); ?>">Partnership</a>
                <a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>">Terms and Conditions</a>
                <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>
            </div>

            <div class="foot-col foot-col-contact">
                <h4>Contact</h4>
                <a href="tel:+917994286660">+91 799 428 66 60</a>
                <a href="mailto:hello@sprdh.com">hello@sprdh.com</a>
                <a href="https://sprdh.com" target="_blank" rel="noopener">SPRDH Solutions Pvt Ltd</a>
                <div class="footer-social-wrap">
                    <span class="footer-social-label">Follow Us</span>
                    <div class="footer-social-icons">
                        <a href="https://in.linkedin.com/company/sprdh-technologies" target="_blank" rel="noopener" aria-label="LinkedIn" title="LinkedIn" class="foot-social-link foot-social-linkedin">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sprdh" target="_blank" rel="noopener" aria-label="Facebook" title="Facebook" class="foot-social-link foot-social-facebook">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95C18.05 21.45 22 17.19 22 12z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/917994286660?text=Hi" target="_blank" rel="noopener" aria-label="WhatsApp" title="WhatsApp" class="foot-social-link foot-social-whatsapp">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M9.11 7.44C8.94 7.44 8.68 7.5 8.46 7.74C8.24 7.97 7.6 8.57 7.6 9.79C7.6 11 8.5 12.18 8.62 12.35C8.75 12.51 10.36 15 12.83 16.07C14.78 16.92 15.31 16.81 15.84 16.73C16.54 16.62 17.39 15.93 17.65 15.2C17.91 14.47 17.91 13.84 17.83 13.71C17.75 13.58 17.55 13.5 17.26 13.35C16.97 13.2 15.54 12.5 15.28 12.4C15.02 12.3 14.84 12.25 14.65 12.54C14.46 12.83 13.93 13.47 13.78 13.65C13.62 13.82 13.46 13.85 13.17 13.7C12.88 13.55 11.94 13.25 10.82 12.25C9.95 11.47 9.36 10.51 9.21 10.26C9.07 10.01 9.2 9.87 9.34 9.73C9.47 9.6 9.63 9.38 9.78 9.21C9.92 9.04 9.97 8.91 10.07 8.71C10.17 8.51 10.12 8.34 10.05 8.19C9.97 8.05 9.41 6.66 9.17 6.1C8.94 5.56 8.71 5.64 8.54 5.63L8.06 5.63C7.88 5.63 7.6 5.7 7.37 5.94C7.14 6.17 6.5 6.77 6.5 7.99C6.5 9.2 7.4 10.38 7.52 10.55"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/sprdh" target="_blank" rel="noopener" aria-label="Instagram" title="Instagram" class="foot-social-link foot-social-instagram">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.13-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>
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
