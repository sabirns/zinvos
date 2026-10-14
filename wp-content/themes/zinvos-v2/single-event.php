<?php
/**
 * Zinvos V2 — Single Event Template (single-event.php)
 * Displays detailed event information including metadata, dates, location,
 * status badge, event logo, full post content, overview sidebar, and related events section.
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

	$is_upcoming  = ( $ts === null || $ts >= $today_ts );
	$status_label = $is_upcoming ? 'Upcoming Event' : 'Past Event';
	$status_class = $is_upcoming ? 'ze-status-badge--upcoming' : 'ze-status-badge--past';

	$date_display = $event_dates;
	if ( ! $date_display && $ts ) {
		$date_display = date( 'M d, Y', $ts );
	}
?>

<main class="ze-page ze-single-page">

	<!-- HERO SECTION -->
	<section class="ze-single-hero">
		<div class="ze-container">

			<!-- Breadcrumb -->
			<nav class="ze-breadcrumb" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
				<span class="ze-breadcrumb-sep">/</span>
				<a href="<?php echo esc_url( home_url( '/events' ) ); ?>">Events</a>
				<span class="ze-breadcrumb-sep">/</span>
				<span class="ze-breadcrumb-current"><?php the_title(); ?></span>
			</nav>

			<!-- Hero Grid: Left Content & Right Showcase Card -->
			<div class="ze-single-hero__grid">
				<div class="ze-single-hero__content">
					<!-- Status Badge -->
					<div class="ze-status-badge <?php echo esc_attr( $status_class ); ?>">
						<span class="ze-status-dot"></span>
						<?php echo esc_html( $status_label ); ?>
					</div>

					<!-- Event Title -->
					<h1><?php the_title(); ?></h1>

					<!-- Quick Meta Bar -->
					<div class="ze-quick-meta">
						<?php if ( $date_display ) : ?>
							<div class="ze-meta-pill">
								<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
									<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
									<line x1="16" y1="2" x2="16" y2="6"></line>
									<line x1="8" y1="2" x2="8" y2="6"></line>
									<line x1="3" y1="10" x2="21" y2="10"></line>
								</svg>
								<span><?php echo esc_html( $date_display ); ?></span>
							</div>
						<?php endif; ?>

						<?php if ( $event_location ) : ?>
							<div class="ze-meta-pill">
								<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
									<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
									<circle cx="12" cy="10" r="3"></circle>
								</svg>
								<span><?php echo esc_html( $event_location ); ?></span>
							</div>
						<?php endif; ?>
					</div>

				</div>

				<!-- Hero Visual Card (Event Logo / Image Showcase) -->
				<div class="ze-single-hero__visual">
					<div class="ze-single-logo-box">
						<?php if ( has_post_thumbnail() ) : ?>
							<img src="<?php echo esc_url( get_the_post_thumbnail_url( $event_id, 'full' ) ); ?>" alt="<?php the_title_attribute(); ?>">
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/zinvos-logo.svg' ); ?>" alt="Zinvos Event">
						<?php endif; ?>
					</div>
					<div class="ze-single-hero__badge">
						<span>Powered by Zinvos</span>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- MAIN EVENT CONTENT -->
	<section class="ze-single-body">
		<div class="ze-container">
			<article class="ze-main-card">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		</div>
	</section>

	<!-- OTHER CONFERENCES SECTION (HOME PAGE DESIGN & GRID) -->
	<?php
	$other_events = new WP_Query( array(
		'post_type'      => 'event',
		'post__not_in'   => array( $event_id ),
		'posts_per_page' => 3,
		'post_status'    => 'publish',
	) );

	if ( $other_events->have_posts() ) :
	?>
	<section class="section ze-other-conferences-section" id="other-conferences" style="padding-top: 20px; padding-bottom: 80px;">
		<div class="ze-container">
			<div class="section-head" style="margin-bottom: 40px;">
				<div>
					<div class="eyebrow">Happening on Zinvos</div>
					<h2 class="display" style="margin-top:14px">Other <strong>Conferences.</strong></h2>
				</div>
				<p>Explore other upcoming and featured conferences running on the Zinvos platform.</p>
			</div>

			<div class="conference-row">
				<?php
				while ( $other_events->have_posts() ) :
					$other_events->the_post();
					$other_id       = get_the_ID();
					$other_dates    = get_post_meta( $other_id, 'event_dates', true );
					$other_start    = get_post_meta( $other_id, 'event_start_date', true );
					$other_location = get_post_meta( $other_id, 'event_location', true );
					$other_ts       = zinvos_get_event_timestamp( $other_id );

					$other_is_upcoming  = ( $other_ts === null || $other_ts >= strtotime( 'today 00:00:00' ) );
					$other_date_display = $other_dates ?: ( $other_ts ? date( 'M d, Y', $other_ts ) : '' );
				?>
					<article class="conf <?php echo $other_is_upcoming ? '' : 'conf--past'; ?>">
						<div>
							<div class="conf-top">
								<?php if ( $other_is_upcoming ) : ?>
									<span class="tag tag--upcoming">Upcoming</span>
								<?php else : ?>
									<span class="tag tag--past">Past</span>
								<?php endif; ?>
								<div class="event-logo">
									<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail( $other_id ) ) : ?>
											<?php echo get_the_post_thumbnail( $other_id, 'medium', array( 'class' => 'event-logo-img' ) ); ?>
										<?php else : ?>
											<img src="<?php echo esc_url( get_template_directory_uri() . '/images/zinvos-2.webp' ); ?>" alt="Event Logo" class="event-logo-img">
										<?php endif; ?>
									</a>
								</div>
							</div>
							<h3><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a></h3>
							<div class="event-meta">
								<?php if ( $other_date_display ) : ?>
									<span class="meta-item"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $other_date_display ); ?></span>
								<?php endif; ?>
								<?php if ( $other_location ) : ?>
									<span class="meta-item"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $other_location ); ?></span>
								<?php endif; ?>
							</div>
						</div>
						<div class="conf-bottom">
							<span><?php echo esc_html( wp_trim_words( get_the_excerpt(), 25 ) ); ?></span>
							<a href="<?php the_permalink(); ?>">
								View Details
								<img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img">
							</a>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

			<div class="all-events-btn" style="margin-top: 36px;">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>" class="btn primary">
					View All Events <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span>
				</a>
			</div>
		</div>
	</section>
	<?php endif; ?>

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

<?php
endwhile;
get_footer();
