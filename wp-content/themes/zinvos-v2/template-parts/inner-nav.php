<?php
/**
 * Reusable inner-page navigation block.
 * Included inside each page's banner hero section.
 *
 * @package Zinvos_V2
 */

$current_req_path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$site_home_path   = trim( (string) wp_parse_url( home_url(), PHP_URL_PATH ), '/' );
if ( ! empty( $site_home_path ) && strpos( $current_req_path, $site_home_path ) === 0 ) {
    $current_req_path = trim( substr( $current_req_path, strlen( $site_home_path ) ), '/' );
}

$is_home_active      = is_front_page() || empty( $current_req_path );
$is_platform_active  = ! $is_home_active && ( is_page( 'platform' ) || strpos( $current_req_path, 'platform' ) === 0 );
$is_solutions_active = ! $is_home_active && ( is_page( 'solutions' ) || strpos( $current_req_path, 'solutions' ) === 0 );
$is_partners_active  = ! $is_home_active && ( is_page( 'partners' ) || strpos( $current_req_path, 'partners' ) === 0 );
$is_blog_active      = ! $is_home_active && ( is_home() || is_singular( 'post' ) || is_category() || is_tag() || is_page( array( 'blog', 'page-blog' ) ) || strpos( $current_req_path, 'blog' ) === 0 );
$is_contact_active   = ! $is_home_active && ( is_page( array( 'contact-us', 'contact' ) ) || strpos( $current_req_path, 'contact' ) === 0 );
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
                <li class="<?php echo $is_home_active ? 'current-menu-item active' : ''; ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo $is_home_active ? 'class="active" aria-current="page"' : ''; ?>>Home</a>
                </li>
                <li class="menu-item-has-children <?php echo $is_platform_active ? 'current-menu-item active' : ''; ?>">
                    <a href="<?php echo esc_url( home_url( '/platform' ) ); ?>" <?php echo $is_platform_active ? 'class="active" aria-current="page"' : ''; ?>>Platform</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo esc_url( home_url( '/platform#registration' ) ); ?>">Registration &amp; Attendee Management</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/platform#communication' ) ); ?>">Communication &amp; Campaigns</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/platform#mobile-app' ) ); ?>">Mobile Event App</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/platform#onsite' ) ); ?>">Onsite Operations</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/platform#certificates' ) ); ?>">Certificates &amp; Analytics</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children <?php echo $is_solutions_active ? 'current-menu-item active' : ''; ?>">
                    <a href="<?php echo esc_url( home_url( '/solutions' ) ); ?>" <?php echo $is_solutions_active ? 'class="active" aria-current="page"' : ''; ?>>Solutions</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo esc_url( home_url( '/solutions#academic' ) ); ?>">Academic &amp; Scientific Conferences</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/solutions#medical' ) ); ?>">Medical &amp; CME Conferences</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/solutions#corporate' ) ); ?>">Corporate Events</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/solutions#associations' ) ); ?>">Associations &amp; Societies</a></li>
                    </ul>
                </li>
                <li class="<?php echo $is_partners_active ? 'current-menu-item active' : ''; ?>">
                    <a href="<?php echo esc_url( home_url( '/partners' ) ); ?>" <?php echo $is_partners_active ? 'class="active" aria-current="page"' : ''; ?>>Partners</a>
                </li>
                <!-- <li><a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>">Pricing</a></li> -->
                <li class="<?php echo $is_blog_active ? 'current-menu-item active' : ''; ?>">
                    <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" <?php echo $is_blog_active ? 'class="active" aria-current="page"' : ''; ?>>Blog</a>
                </li>
                <li class="<?php echo $is_contact_active ? 'current-menu-item active' : ''; ?>">
                    <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" <?php echo $is_contact_active ? 'class="active" aria-current="page"' : ''; ?>>Contact</a>
                </li>
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
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo $is_home_active ? 'active current-menu-item' : ''; ?>" <?php echo $is_home_active ? 'aria-current="page"' : ''; ?>>Home</a>
        <a href="<?php echo esc_url( home_url( '/platform' ) ); ?>" class="<?php echo $is_platform_active ? 'active current-menu-item' : ''; ?>" <?php echo $is_platform_active ? 'aria-current="page"' : ''; ?>>Platform</a>
        <a href="<?php echo esc_url( home_url( '/solutions' ) ); ?>" class="<?php echo $is_solutions_active ? 'active current-menu-item' : ''; ?>" <?php echo $is_solutions_active ? 'aria-current="page"' : ''; ?>>Solutions</a>
        <a href="<?php echo esc_url( home_url( '/partners' ) ); ?>" class="<?php echo $is_partners_active ? 'active current-menu-item' : ''; ?>" <?php echo $is_partners_active ? 'aria-current="page"' : ''; ?>>Partners</a>
        <!-- <a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>">Pricing</a> -->
        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="<?php echo $is_blog_active ? 'active current-menu-item' : ''; ?>" <?php echo $is_blog_active ? 'aria-current="page"' : ''; ?>>Blog</a>
        <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" class="<?php echo $is_contact_active ? 'active current-menu-item' : ''; ?>" <?php echo $is_contact_active ? 'aria-current="page"' : ''; ?>>Contact</a>
        <a href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>" style="color:var(--blue);">
            Book a Demo <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="" class="arrow-img">
        </a>
    </div>
</header>
