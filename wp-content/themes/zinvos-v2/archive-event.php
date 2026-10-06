<?php
/**
 * Zinvos V2 — Event Archive Template (archive-event.php)
 * Displays all events split into Upcoming and Past groups.
 * Robustly parses ACF event_start_date (YYYYMMDD or date string).
 *
 * @package Zinvos_V2
 */

get_header();

/**
 * Helper to convert ACF event_start_date (YYYYMMDD, YYYY-MM-DD or date string) into a unix timestamp.
 *
 * @param int $post_id
 * @return int|null
 */
if ( ! function_exists( 'zinvos_get_event_timestamp' ) ) {
    function zinvos_get_event_timestamp( $post_id ) {
        $raw = get_post_meta( $post_id, 'event_start_date', true );
        if ( ! $raw ) {
            return null;
        }
        $raw = trim( $raw );
        // Handle ACF 8-digit format: YYYYMMDD e.g. 20260911
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

// ── Fetch ALL published events ──────────────────────────────────
$all_events = new WP_Query( array(
    'post_type'      => 'event',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
) );

$upcoming = array();
$past     = array();
$today_ts = strtotime( 'today 00:00:00' );

if ( $all_events->have_posts() ) {
    while ( $all_events->have_posts() ) {
        $all_events->the_post();
        $ts = zinvos_get_event_timestamp( get_the_ID() );
        if ( $ts === null || $ts >= $today_ts ) {
            $upcoming[] = get_post();
        } else {
            $past[] = get_post();
        }
    }
    wp_reset_postdata();
}

// Sort Upcoming events chronologically (soonest first)
usort( $upcoming, function( $a, $b ) {
    $ts_a = zinvos_get_event_timestamp( $a->ID ) ?? 9999999999;
    $ts_b = zinvos_get_event_timestamp( $b->ID ) ?? 9999999999;
    return $ts_a <=> $ts_b;
} );

// Sort Past events reverse-chronologically (most recent past event first)
usort( $past, function( $a, $b ) {
    $ts_a = zinvos_get_event_timestamp( $a->ID ) ?? 0;
    $ts_b = zinvos_get_event_timestamp( $b->ID ) ?? 0;
    return $ts_b <=> $ts_a;
} );

/**
 * Helper: render a .conf card for an event post.
 *
 * @param WP_Post $post
 * @param bool    $is_upcoming
 */
if ( ! function_exists( 'zinvos_render_event_card' ) ) {
    function zinvos_render_event_card( $post, $is_upcoming ) {
        setup_postdata( $post );

        $event_dates    = get_post_meta( $post->ID, 'event_dates', true );
        $event_location = get_post_meta( $post->ID, 'event_location', true );
        $ts             = zinvos_get_event_timestamp( $post->ID );

        // Date display: use human-friendly event_dates or format event_start_date
        $date_display = $event_dates;
        if ( ! $date_display && $ts ) {
            $date_display = date( 'M d, Y', $ts );
        }

        $tag_class = $is_upcoming ? 'tag tag--upcoming' : 'tag tag--past';
        $tag_label = $is_upcoming ? 'Upcoming'          : 'Past';
        $card_cls  = 'conf reveal' . ( $is_upcoming ? '' : ' conf--past' );
        ?>
        <article class="<?php echo esc_attr( $card_cls ); ?>">
            <div>
                <!-- Top: badge + date -->
                <div class="conf-top">
                    <span class="<?php echo esc_attr( $tag_class ); ?>"><?php echo esc_html( $tag_label ); ?></span>
                    <?php if ( $date_display ) : ?>
                        <span class="date"><?php echo esc_html( $date_display ); ?></span>
                    <?php endif; ?>
                </div>

                <!-- Event logo / thumbnail -->
                <div class="conf-logo-wrap">
                    <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
                            <?php echo get_the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'conf-logo-img' ) ); ?>
                        </a>
                    <?php else : ?>
                        <div class="conf-logo-placeholder">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Title -->
                <h3><?php echo esc_html( get_the_title( $post ) ); ?></h3>

                <!-- Location meta -->
                <?php if ( $event_location ) : ?>
                    <p class="conf-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <?php echo esc_html( $event_location ); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Bottom: excerpt + CTA -->
            <div class="conf-bottom">
                <span><?php echo esc_html( wp_trim_words( get_the_excerpt( $post ), 18 ) ); ?></span>
                <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
                    <?php echo $is_upcoming ? 'Register' : 'View Details'; ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="" class="arrow-img">
                </a>
            </div>
        </article>
        <?php
        wp_reset_postdata();
    }
}
?>

<main id="primary" class="site-main">

    <!-- ── Archive hero ── -->
    <section class="archive-hero">

        <div class="container archive-hero-inner">
            <!-- Breadcrumb -->
            <div class="breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i style="font-style:normal;opacity:.45">→</i>
                <span>Events</span>
            </div>

            <div class="eyebrow">Happening on Zinvos</div>
            <h1 style="margin-top:18px">All <strong>events.</strong></h1>
            <p class="archive-hero-lead">Browse upcoming and past conferences running on the Zinvos platform.</p>

            <div class="hero-actions">
                <a class="btn primary" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact Us <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span></a>
                <a class="btn soft" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Book a Demo <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span></a>
            </div>
        </div>

    </section>

    <!-- ── Tab filter bar ── -->
    <div class="event-tab-bar">
        <div class="container">
            <div class="event-tabs">
                <button class="event-tab active" data-tab="upcoming" id="tab-upcoming">
                    Upcoming
                    <span class="tab-count"><?php echo count( $upcoming ); ?></span>
                </button>
                <button class="event-tab" data-tab="past" id="tab-past">
                    Past
                    <span class="tab-count"><?php echo count( $past ); ?></span>
                </button>
            </div>
        </div>
    </div>

    <!-- ── Event listings ── -->
    <section class="section" style="padding-top: 48px;">
        <div class="container">

            <!-- UPCOMING EVENTS PANEL -->
            <div class="event-panel" id="panel-upcoming">
                <?php if ( ! empty( $upcoming ) ) : ?>
                    <div class="conference-row">
                        <?php foreach ( $upcoming as $post ) : ?>
                            <?php zinvos_render_event_card( $post, true ); ?>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="event-empty">
                        <i class="fas fa-calendar-plus"></i>
                        <p>No upcoming events at the moment. Check back soon!</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- PAST EVENTS PANEL -->
            <div class="event-panel" id="panel-past" style="display:none;">
                <?php if ( ! empty( $past ) ) : ?>
                    <div class="conference-row">
                        <?php foreach ( $past as $post ) : ?>
                            <?php zinvos_render_event_card( $post, false ); ?>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="event-empty">
                        <i class="fas fa-history"></i>
                        <p>No past events recorded yet.</p>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>

</main>

<script>
(function() {
    var tabs   = document.querySelectorAll('.event-tab');
    var panels = document.querySelectorAll('.event-panel');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var target = this.dataset.tab;

            tabs.forEach(function(t) { t.classList.remove('active'); });
            this.classList.add('active');

            panels.forEach(function(panel) {
                panel.style.display = (panel.id === 'panel-' + target) ? '' : 'none';
            });
        });
    });
})();
</script>

<?php
get_footer();
