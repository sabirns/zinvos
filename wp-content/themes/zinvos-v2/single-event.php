<?php
/**
 * Zinvos V2 — Single Event Template (single-event.php)
 * Displays detailed event information including metadata, dates, location,
 * status badge, event logo, full post content, and other upcoming events sidebar.
 *
 * @package Zinvos_V2
 */

get_header();

/**
 * Helper to convert ACF event_start_date (YYYYMMDD, YYYY-MM-DD or date string) into a unix timestamp.
 */
if ( ! function_exists( 'zinvos_get_event_timestamp' ) ) {
    function zinvos_get_event_timestamp( $post_id ) {
        $raw = get_post_meta( $post_id, 'event_start_date', true );
        if ( ! $raw ) {
            return null;
        }
        $raw = trim( $raw );
        if ( preg_match( '/^\d{8}$/', $raw ) ) {
            $y = substr( $raw, 0, 4 );
            $m = substr( $raw, 4, 2 );
            $d = substr( $raw, 6, 2 );
            return strtotime( "{$y}-{$m}-{$d} 23:59:59" );
        }
        $ts = strtotime( $raw );
        return ( $ts !== false ) ? $ts : null;
    }
}

while ( have_posts() ) :
    the_post();

    $event_id       = get_the_ID();
    $event_dates    = get_post_meta( $event_id, 'event_dates', true );
    $event_start    = get_post_meta( $event_id, 'event_start_date', true );
    $event_location = get_post_meta( $event_id, 'event_location', true );
    $ts             = zinvos_get_event_timestamp( $event_id );
    $today_ts       = strtotime( 'today 00:00:00' );

    $is_upcoming = ( $ts === null || $ts >= $today_ts );
    $status_label = $is_upcoming ? 'Upcoming Event' : 'Past Event';
    $status_class = $is_upcoming ? 'status-badge--upcoming' : 'status-badge--past';

    $date_display = $event_dates;
    if ( ! $date_display && $ts ) {
        $date_display = date( 'M d, Y', $ts );
    }
?>

<main id="primary" class="site-main single-event-page">

    <!-- ── Full Cover Event Hero ── -->
    <section class="inner-hero single-event-hero">

        <div class="container inner-hero-inner">
            <!-- Breadcrumb -->
            <div class="breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i style="font-style:normal;opacity:.45">→</i>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>">Conferences</a>
                <i style="font-style:normal;opacity:.45">→</i>
                <span><?php the_title(); ?></span>
            </div>

            <!-- Header Grid: Logo & Event Hero Details -->
            <div class="single-event-hero-grid">
                <div class="single-event-logo">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php echo esc_url( get_the_post_thumbnail_url( $event_id, 'full' ) ); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/zinvos-logo.svg' ); ?>" alt="Zinvos Event">
                    <?php endif; ?>
                </div>

                <div class="single-event-hero-details">
                    <div class="event-status-badge <?php echo esc_attr( $status_class ); ?>">
                        <span class="status-dot"></span>
                        <?php echo esc_html( $status_label ); ?>
                    </div>

                    <h1><?php the_title(); ?></h1>

                    <div class="single-event-quick-meta">
                        <?php if ( $date_display ) : ?>
                            <div class="meta-pill">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span><?php echo esc_html( $date_display ); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ( $event_location ) : ?>
                            <div class="meta-pill">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <span><?php echo esc_html( $event_location ); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Main Event Content & Sidebar ── -->
    <section class="single-event-body">
        <div class="container">
            <div class="single-event-layout">

                <!-- Main Content Column -->
                <div class="single-event-content-col">
                    <div class="event-main-card">
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <aside class="single-event-sidebar-col">
                    
                    <!-- Event Summary Card -->
                    <div class="event-sidebar-card">
                        <h3 class="sidebar-title">Event Overview</h3>

                        <ul class="sidebar-details-list">
                            <?php if ( $date_display ) : ?>
                                <li>
                                    <div class="detail-icon">
                                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    </div>
                                    <div>
                                        <small>Date &amp; Schedule</small>
                                        <strong><?php echo esc_html( $date_display ); ?></strong>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if ( $event_location ) : ?>
                                <li>
                                    <div class="detail-icon">
                                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    </div>
                                    <div>
                                        <small>Venue Location</small>
                                        <strong><?php echo esc_html( $event_location ); ?></strong>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <li>
                                <div class="detail-icon">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                </div>
                                <div>
                                    <small>Platform Features</small>
                                    <strong>App, Registration &amp; Onsite</strong>
                                </div>
                            </li>
                        </ul>

                        <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn primary sidebar-cta">
                            Inquire for Your Event <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span>
                        </a>
                    </div>

                    <!-- Other Conferences / Related Events Card -->
                    <?php
                    $other_events = new WP_Query( array(
                        'post_type'      => 'event',
                        'post__not_in'   => array( $event_id ),
                        'posts_per_page' => 4,
                        'post_status'    => 'publish',
                    ) );

                    if ( $other_events->have_posts() ) :
                    ?>
                        <div class="event-sidebar-card other-events-card">
                            <h3 class="sidebar-title">Other Conferences</h3>
                            <div class="other-events-list">
                                <?php
                                while ( $other_events->have_posts() ) :
                                    $other_events->the_post();
                                    $other_id    = get_the_ID();
                                    $other_dates = get_post_meta( $other_id, 'event_dates', true );
                                    $other_ts    = zinvos_get_event_timestamp( $other_id );
                                    $other_date_display = $other_dates ? $other_dates : ( $other_ts ? date( 'M d, Y', $other_ts ) : '' );
                                ?>
                                    <a href="<?php the_permalink(); ?>" class="other-event-item">
                                        <div class="other-event-thumb">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/zinvos-logo.svg' ); ?>" alt="<?php the_title_attribute(); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="other-event-info">
                                            <h4><?php the_title(); ?></h4>
                                            <?php if ( $other_date_display ) : ?>
                                                <span><?php echo esc_html( $other_date_display ); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </aside>

            </div>
        </div>
    </section>

</main>

<?php
endwhile;
get_footer();
