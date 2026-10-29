<?php
/**
 * Single Feature Template
 *
 * Dedicated detail template for single feature post type entries.
 *
 * @package Zinvos_V2
 */

get_header();

// Canonical metadata mapping for conference features
$feature_meta_map = array(
	577 => array( 'cat_name' => 'AI & Intelligence', 'color' => 'blue', 'highlights' => array( '24/7 Attendee Q&A', 'Session & Hall Guidance', 'Personalized Agendas' ), 'impact' => 'Reduces onsite helpdesk inquiries by over 80% while giving delegates instant multilingual answers about speakers, hall locations, and session timings.' ),
	578 => array( 'cat_name' => 'AI & Intelligence', 'color' => 'pink', 'highlights' => array( 'Specialty Matchmaking', '1-on-1 Meeting Scheduler', 'In-App Secure Chat' ), 'impact' => 'Connects clinicians, research faculty, and industry leaders based on sub-specialties, interests, and collaborative clinical research tracks.' ),
	579 => array( 'cat_name' => 'Registration & Access', 'color' => 'green', 'highlights' => array( 'Multi-Channel Onboarding', 'Instant WhatsApp Confirmation', 'Custom Form Fields' ), 'impact' => 'Eliminates friction with rapid web & WhatsApp registration, instant payment reconciliation, and automated confirmation passes delivered in seconds.' ),
	580 => array( 'cat_name' => 'Registration & Access', 'color' => 'orange', 'highlights' => array( 'Sub-2s QR Scanning', 'Live Gate Sync', 'Zero Queue Delays' ), 'impact' => 'Validates and admits thousands of delegates seamlessly at conference counters with offline-ready local cache fallback.' ),
	581 => array( 'cat_name' => 'Agenda & Scientific', 'color' => 'pink', 'highlights' => array( 'Multi-Track Schedule', 'Personalized Bookmarks', 'Live Hall Changes' ), 'impact' => 'Keeps delegates informed of concurrent scientific halls, workshop rooms, and live schedule adjustments without paper program booklets.' ),
	582 => array( 'cat_name' => 'Agenda & Scientific', 'color' => 'blue', 'highlights' => array( 'Speaker Biographies', 'Session Disclosures', 'Direct Q&A Integration' ), 'impact' => 'Spotlights national & international faculty with their credentials, presentation abstracts, and assigned session timetables.' ),
	583 => array( 'cat_name' => 'Attendee Engagement', 'color' => 'blue', 'highlights' => array( 'Live Moderated Q&A', 'Instant Polling Heatmaps', 'Scientific Quizzes' ), 'impact' => 'Transforms passive audiences into active participants with real-time screen projections, audience polls, and competitive session quizzes.' ),
	584 => array( 'cat_name' => 'Agenda & Scientific', 'color' => 'pink', 'highlights' => array( 'In-Session Note Taking', 'Cloud Synchronized', 'Post-Event PDF Export' ), 'impact' => 'Allows delegates and scholars to record session insights and presentation takeaways, automatically organized by session track.' ),
	585 => array( 'cat_name' => 'AI & Intelligence', 'color' => 'green', 'highlights' => array( 'Facial Recognition Search', 'Private Delegate Gallery', 'Instant Photo Delivery' ), 'impact' => 'Delegates snap a quick selfie and receive high-resolution conference photographs where they appear, delivered automatically via WhatsApp and mobile.' ),
	586 => array( 'cat_name' => 'Registration & Access', 'color' => 'blue', 'highlights' => array( 'Encrypted Mobile QR Pass', 'Zone Access Control', '100% Plastic-Free' ), 'impact' => 'Replaces plastic lanyard badges with secure, verifiable digital credentials stored in mobile wallets and WhatsApp with hall admission verification.' ),
	587 => array( 'cat_name' => 'Agenda & Scientific', 'color' => 'orange', 'highlights' => array( 'Interactive Venue Maps', 'Exhibition Booth Locator', 'Session Proximity Alerts' ), 'impact' => 'Guides attendees through sprawling convention centers, workshop suites, poster display galleries, and dining halls effortlessly.' ),
	588 => array( 'cat_name' => 'Attendee Engagement', 'color' => 'pink', 'highlights' => array( 'High-Priority Alerts', 'WhatsApp Push Channels', 'Segmented Audiences' ), 'impact' => 'Reaches 98%+ of delegates instantly with hall announcements, keynote reminders, gala dinner notifications, and schedule revisions.' ),
	589 => array( 'cat_name' => 'Attendee Engagement', 'color' => 'blue', 'highlights' => array( 'Lead Retrieval Scanners', 'Digital Product Collateral', 'Sponsor ROI Analytics' ), 'impact' => 'Empowers pharma, biotech, and medical device exhibitors to capture verified delegate leads with QR badge scans and instant digital brochures.' ),
	590 => array( 'cat_name' => 'Certificates & Analytics', 'color' => 'green', 'highlights' => array( 'Hall Attendance Heatmaps', 'Peak Check-In Metrics', 'Instant CSV/PDF Export' ), 'impact' => 'Provides organizing committees and association leaders real-time visibility into delegate footfalls, hall densities, and session ratings.' ),
	591 => array( 'cat_name' => 'Certificates & Analytics', 'color' => 'pink', 'highlights' => array( 'Automated CME Credit Hours', 'Tamper-Proof QR Code', 'Self-Serve Delegate Download' ), 'impact' => 'Issues verified digital attendance certificates and accredited CME credits automatically based on track attendance compliance.' ),
	592 => array( 'cat_name' => 'Certificates & Analytics', 'color' => 'green', 'highlights' => array( '100% Digital Programs', 'Zero Paper Waste', 'Verified Carbon Reduction' ), 'impact' => 'Replaces printed souvenir booklets, paper tickets, and disposable plastic pouches with an eco-certified digital conference experience.' ),
	593 => array( 'cat_name' => 'Registration & Access', 'color' => 'pink', 'highlights' => array( 'Custom Association Branding', 'Dedicated App Store Listing', 'Tailored Design Tokens' ), 'impact' => 'Delivers a tailor-made mobile application matching your conference or society visual identity, fonts, colors, and committee styling.' ),
);

while ( have_posts() ) :
	the_post();
	$feature_id = get_the_ID();
	$meta = isset( $feature_meta_map[ $feature_id ] ) ? $feature_meta_map[ $feature_id ] : null;

	$color_token = get_post_meta( $feature_id, 'icon_color', true );
	if ( empty( $color_token ) && $meta ) {
		$color_token = $meta['color'];
	}
	if ( empty( $color_token ) ) {
		$color_token = 'blue';
	}

	$cat_name = $meta ? $meta['cat_name'] : 'Conference Technology Feature';
	$highlights = $meta ? $meta['highlights'] : array( 'Connected Module', 'Real-Time Sync', 'Mobile Ready' );
	$impact = $meta ? $meta['impact'] : 'Engineered to streamline conference execution and improve delegate satisfaction.';

	$icon_id = get_post_meta( $feature_id, 'icon', true );
	$icon_url = $icon_id ? wp_get_attachment_url( $icon_id ) : '';
	if ( empty( $icon_url ) && has_post_thumbnail() ) {
		$icon_url = get_the_post_thumbnail_url( $feature_id, 'large' );
	}
	?>

	<main class="zf-page zf-single-page" id="primary">
		<!-- Single Feature Hero -->
		<section class="zf-single-hero">
			<div class="zf-container">
				<!-- Breadcrumb -->
				<div class="zf-breadcrumb" aria-label="Breadcrumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
					<span class="zf-breadcrumb-sep">/</span>
					<a href="<?php echo esc_url( home_url( '/features' ) ); ?>">Features</a>
					<span class="zf-breadcrumb-sep">/</span>
					<span class="zf-breadcrumb-current"><?php the_title(); ?></span>
				</div>

				<div class="zf-single-hero__grid">
					<div>
						<div class="zf-eyebrow">
							<span class="zf-dots"></span>
							<?php echo esc_html( $cat_name ); ?>
						</div>

						<h1><?php the_title(); ?></h1>

						<p class="zf-single-hero__copy">
							Part of the Zinvos unified conference platform. Synchronized across web, WhatsApp, and mobile to deliver a seamless delegate experience and zero onsite friction.
						</p>

						<div class="zf-actions">
							<a class="zf-btn zf-btn--dark" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">
								Book a Demo for This Feature ↗
							</a>
							<a class="zf-btn zf-btn--light" href="<?php echo esc_url( home_url( '/features' ) ); ?>">
								← View All Features
							</a>
						</div>
					</div>

					<div class="zf-single-hero__badge-card zf-single-hero__badge-card--<?php echo esc_attr( $color_token ); ?>">
						<div class="zf-single-icon-wrap zf-single-icon-wrap--<?php echo esc_attr( $color_token ); ?>">
							<?php if ( ! empty( $icon_url ) ) : ?>
								<img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php the_title_attribute(); ?>" class="zf-single-icon-img" />
							<?php else : ?>
								<i class="fa-solid fa-star zf-single-icon-fallback"></i>
							<?php endif; ?>
						</div>
						<h3><?php the_title(); ?></h3>
						<span class="zf-card__badge zf-card__badge--<?php echo esc_attr( $color_token ); ?>">
							<?php echo esc_html( $cat_name ); ?>
						</span>
					</div>
				</div>
			</div>
		</section>

		<!-- Single Feature Content Body -->
		<section class="zf-single-body">
			<div class="zf-container zf-single-body__grid">
				<div class="zf-single-content">
					<div class="zf-single-card">
						<h2>Feature Overview</h2>
						<div class="zf-content-text">
							<?php
							$content = get_the_content();
							if ( ! empty( $content ) ) {
								echo wpautop( $content );
							} else {
								the_excerpt();
							}
							?>
						</div>

						<hr class="zf-divider" />

						<h2>Why Conferences Need This</h2>
						<p class="zf-impact-text"><?php echo esc_html( $impact ); ?></p>

						<hr class="zf-divider" />

						<h2>Key Technical Capabilities</h2>
						<div class="zf-single-pills">
							<?php foreach ( $highlights as $pill ) : ?>
								<div class="zf-single-pill-item">
									<i class="fa-solid fa-circle-check"></i>
									<strong><?php echo esc_html( $pill ); ?></strong>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<!-- Sidebar -->
				<aside class="zf-single-sidebar">
					<div class="zf-sidebar-card">
						<h3>Connected Platform</h3>
						<p>This feature is natively integrated into Zinvos. No third-party connectors or CSV exports required.</p>
						<ul class="zf-sidebar-specs">
							<li><small>Module Type</small> <strong>Core Capability</strong></li>
							<li><small>Channels</small> <strong>Web, WhatsApp &amp; App</strong></li>
							<li><small>Onsite Failover</small> <strong>Offline-First Cache</strong></li>
							<li><small>Compliance</small> <strong>Medical &amp; CME Ready</strong></li>
						</ul>
						<a class="zf-btn zf-btn--dark zf-btn--block" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">
							Schedule a Live Demo ↗
						</a>
					</div>
				</aside>
			</div>
		</section>

		<!-- Related Features -->
		<section class="zf-related-section">
			<div class="zf-container">
				<div class="zf-section-head">
					<h2>Other Platform Features</h2>
					<p>Explore more capabilities designed to power conferences end-to-end.</p>
				</div>

				<div class="zf-grid zf-grid--related">
					<?php
					$related_args = array(
						'post_type'      => 'feature',
						'posts_per_page' => 3,
						'post__not_in'   => array( $feature_id ),
						'orderby'        => 'rand',
					);
					$related_query = new WP_Query( $related_args );

					if ( $related_query->have_posts() ) :
						while ( $related_query->have_posts() ) :
							$related_query->the_post();
							$rel_id = get_the_ID();
							$rel_meta = isset( $feature_meta_map[ $rel_id ] ) ? $feature_meta_map[ $rel_id ] : null;
							$rel_color = get_post_meta( $rel_id, 'icon_color', true ) ?: ( $rel_meta ? $rel_meta['color'] : 'blue' );
							$rel_icon_id = get_post_meta( $rel_id, 'icon', true );
							$rel_icon_url = $rel_icon_id ? wp_get_attachment_url( $rel_icon_id ) : '';
							?>
							<article class="zf-card zf-card--<?php echo esc_attr( $rel_color ); ?>">
								<div class="zf-card__head">
									<div class="zf-card__icon zf-card__icon--<?php echo esc_attr( $rel_color ); ?>" aria-hidden="true">
										<?php if ( ! empty( $rel_icon_url ) ) : ?>
											<img src="<?php echo esc_url( $rel_icon_url ); ?>" alt="" class="zf-card__icon-img" loading="lazy" />
										<?php else : ?>
											<i class="fa-solid fa-star zf-card__icon-fallback"></i>
										<?php endif; ?>
									</div>
									<h3 class="zf-card__title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
								</div>
								<div class="zf-card__body">
									<p class="zf-card__desc"><?php echo esc_html( wp_trim_words( get_the_content() ?: get_the_excerpt(), 20 ) ); ?></p>
								</div>
								<div class="zf-card__footer">
									<a href="<?php the_permalink(); ?>" class="zf-btn zf-btn--light zf-btn--sm">
										Read More ↗
									</a>
								</div>
							</article>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>
	</main>

	<?php
endwhile;

get_footer();
