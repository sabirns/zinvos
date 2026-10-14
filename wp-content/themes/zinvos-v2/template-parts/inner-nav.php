<?php
/**
 * Reusable inner-page navigation block.
 * Included inside each page's banner hero section.
 *
 * @package Zinvos_V2
 */
?>
<header class="site-header top-wrap container">
    <nav class="main-nav-bar" id="inner-nav-bar" aria-label="Inner Main Navigation">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } elseif ( file_exists( get_template_directory() . '/images/zinvos-logo.svg' ) ) {
                echo '<img src="' . esc_url( get_template_directory_uri() . '/images/zinvos-logo.svg' ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
            } else {
                echo '<span style="font-weight:800;font-size:22px;">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
            }
            ?>
        </a>

        <div class="nav-links">
            <ul class="nav-links-ul">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li class="menu-item-has-children">
                    <a href="<?php echo esc_url( home_url( '/platform' ) ); ?>">Platform</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo esc_url( home_url( '/platform#registration' ) ); ?>">Registration &amp; Attendee Management</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/platform#communication' ) ); ?>">Communication &amp; Campaigns</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/platform#mobile-app' ) ); ?>">Mobile Event App</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/platform#onsite' ) ); ?>">Onsite Operations</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/platform#certificates' ) ); ?>">Certificates &amp; Analytics</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="<?php echo esc_url( home_url( '/solutions' ) ); ?>">Solutions</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo esc_url( home_url( '/solutions#academic' ) ); ?>">Academic &amp; Scientific Conferences</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/solutions#medical' ) ); ?>">Medical &amp; CME Conferences</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/solutions#corporate' ) ); ?>">Corporate Events</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/solutions#associations' ) ); ?>">Associations &amp; Societies</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo esc_url( home_url( '/partners' ) ); ?>">Partners</a></li>
                <!-- <li><a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>">Pricing</a></li> -->
                <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
                <li><a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Contact</a></li>
            </ul>
        </div>

        <div class="nav-actions">
            <a class="btn primary" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Book a Demo
                <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="" class="arrow-img">
            </a>
            <button class="menu-btn" id="inner-menu-btn" aria-label="Open menu">&#9776;</button>
        </div>
    </nav>

    <!-- Mobile Dropdown -->
    <div class="mobile-nav" id="inner-mobile-nav">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <a href="<?php echo esc_url( home_url( '/platform' ) ); ?>">Platform</a>
        <a href="<?php echo esc_url( home_url( '/solutions' ) ); ?>">Solutions</a>
        <a href="<?php echo esc_url( home_url( '/partners' ) ); ?>">Partners</a>
        <a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>">Upcoming Conferences</a>
        <!-- <a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>">Pricing</a> -->
        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a>
        <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Contact</a>
        <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" style="color:var(--blue);">
            Book a Demo <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="" class="arrow-img">
        </a>
        <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" style="color:var(--pink);">
            Start Free <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="" class="arrow-img">
        </a>
    </div>
</header>
