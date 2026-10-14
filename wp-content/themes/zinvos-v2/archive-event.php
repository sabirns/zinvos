<?php
/**
 * Zinvos V2 — Event Archive & Listing Template (archive-event.php)
 * Displays all published events categorized into Upcoming and Past events.
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

		$date_display = $event_dates;
		if ( ! $date_display && $ts ) {
			$date_display = date( 'M d, Y', $ts );
		}
		?>
		<article class="conf <?php echo $is_upcoming ? '' : 'conf--past'; ?>">
			<div>
				<div class="conf-top">
					<?php if ( $is_upcoming ) : ?>
						<span class="tag tag--upcoming">Upcoming</span>
					<?php else : ?>
						<span class="tag tag--past">Past</span>
					<?php endif; ?>
					<div class="event-logo">
						<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
							<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
								<?php echo get_the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'event-logo-img' ) ); ?>
							<?php else : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/images/zinvos-2.webp' ); ?>" alt="Event Logo" class="event-logo-img">
							<?php endif; ?>
						</a>
					</div>
				</div>
				<h3><a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( get_the_title( $post ) ); ?></a></h3>
				<div class="event-meta">
					<?php if ( $date_display ) : ?>
						<span class="meta-item"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $date_display ); ?></span>
					<?php endif; ?>
					<?php if ( $event_location ) : ?>
						<span class="meta-item"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $event_location ); ?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="conf-bottom">
				<span><?php echo esc_html( wp_trim_words( get_the_excerpt( $post ), 25 ) ); ?></span>
				<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
					View Details
					<img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img">
				</a>
			</div>
		</article>
		<?php
		wp_reset_postdata();
	}
}
?>

<main class="ze-page">

	<!-- HERO SECTION -->
	<section class="ze-hero">
		<div class="ze-container ze-hero__grid">
			<div>
				<div class="ze-eyebrow"><span class="ze-dots"></span>Zinvos Events</div>
				<h1>All Conferences <strong>&amp; Industry Events</strong></h1>
				<p class="ze-hero__copy">
					Browse upcoming and past academic congresses, medical summits, corporate expos, and association conventions running on the Zinvos platform.
				</p>
				<div class="ze-actions">
					<a class="ze-btn ze-btn--dark" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Book a Demo ↗</a>
					<a class="ze-btn ze-btn--light" href="<?php echo esc_url( home_url( '/platform' ) ); ?>">Explore Platform</a>
				</div>
			</div>

			<div class="ze-hero__visual" aria-label="Zinvos Platform Ecosystem">
				<div class="ze-hero__center"><span>Zinvos Event Network</span></div>
				<div class="ze-float ze-float--a"><small>Metric 01</small><strong>200+ Conferences</strong></div>
				<div class="ze-float ze-float--b"><small>Metric 02</small><strong>500k+ Delegates</strong></div>
				<div class="ze-float ze-float--c"><small>Performance</small><strong>&lt; 1.8s Fast Scan</strong></div>
				<div class="ze-float ze-float--d"><small>Delivery</small><strong>98% WhatsApp Open</strong></div>
			</div>
		</div>
	</section>

	<!-- STICKY TAB FILTER BAR -->
	<div class="ze-tab-bar">
		<div class="ze-container">
			<div class="ze-tabs">
				<button class="ze-tab active" data-tab="upcoming" id="tab-upcoming">
					Upcoming Events
					<span class="ze-tab-count"><?php echo count( $upcoming ); ?></span>
				</button>
				<button class="ze-tab" data-tab="past" id="tab-past">
					Past Events
					<span class="ze-tab-count"><?php echo count( $past ); ?></span>
				</button>
			</div>
		</div>
	</div>

	<!-- EVENT LISTINGS -->
	<section class="ze-section">
		<div class="ze-container">

			<!-- UPCOMING EVENTS PANEL -->
			<div class="ze-event-panel" id="ze-panel-upcoming">
				<?php if ( ! empty( $upcoming ) ) : ?>
					<div class="conference-row">
						<?php foreach ( $upcoming as $post ) : ?>
							<?php zinvos_render_event_card( $post, true ); ?>
						<?php endforeach; ?>
					</div>
				<?php else : ?>
					<div class="ze-empty-state">
						<svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
							<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
							<line x1="16" y1="2" x2="16" y2="6"></line>
							<line x1="8" y1="2" x2="8" y2="6"></line>
							<line x1="3" y1="10" x2="21" y2="10"></line>
						</svg>
						<p>No upcoming events scheduled at the moment. Check back soon!</p>
					</div>
				<?php endif; ?>
			</div>

			<!-- PAST EVENTS PANEL -->
			<div class="ze-event-panel" id="ze-panel-past" style="display:none;">
				<?php if ( ! empty( $past ) ) : ?>
					<div class="conference-row">
						<?php foreach ( $past as $post ) : ?>
							<?php zinvos_render_event_card( $post, false ); ?>
						<?php endforeach; ?>
					</div>
				<?php else : ?>
					<div class="ze-empty-state">
						<svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
							<circle cx="12" cy="12" r="10"></circle>
							<polyline points="12 6 12 16 14"></polyline>
						</svg>
						<p>No past events recorded yet.</p>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</section>

	<!-- CTA BANNER (EXACT ZINVOS STYLE) -->
	<section class="za-section za-cta-section">
		<div class="za-container">
			<div class="za-cta-card">
				<h2>Ready to Elevate <strong>Your Next Conference?</strong></h2>
				<p>Book a live demo with our team and discover how Zinvos connects registration, onsite check-in, WhatsApp updates, and engagement.</p>
				<div class="za-cta-actions">
					<a class="za-btn za-btn--dark" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Book a Demo ↗</a>
					<a class="za-btn za-btn--light" href="<?php echo esc_url( home_url( '/partners' ) ); ?>">Partner With Us</a>
				</div>
			</div>
		</div>
	</section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const tabs = document.querySelectorAll('.ze-tab');
	const panels = document.querySelectorAll('.ze-event-panel');

	tabs.forEach(tab => {
		tab.addEventListener('click', function() {
			const target = this.getAttribute('data-tab');

			tabs.forEach(t => t.classList.remove('active'));
			this.classList.add('active');

			panels.forEach(panel => {
				panel.style.display = (panel.id === 'ze-panel-' + target) ? 'block' : 'none';
			});
		});
	});
});
</script>

<?php
get_footer();
