<?php
/**
 * Template Name: Features
 *
 * Zinvos V2 Features Showcase Page Template
 * Displays complete conference technology capabilities with rich categorization,
 * live interactive search, SVG iconography, and deep conference benefit drawers.
 *
 * @package Zinvos_V2
 */

get_header();

// Canonical metadata mapping for core conference features
$feature_meta_map = array(
	577 => array(
		'cat_key'    => 'ai',
		'cat_name'   => 'AI & Intelligence',
		'badge'      => 'AI Assistant',
		'color'      => 'blue',
		'highlights' => array( '24/7 Attendee Q&A', 'Session & Hall Guidance', 'Personalized Agendas' ),
		'impact'     => 'Reduces onsite helpdesk inquiries by over 80% while giving delegates instant multilingual answers about speakers, hall locations, and session timings.'
	),
	578 => array(
		'cat_key'    => 'ai',
		'cat_name'   => 'AI & Intelligence',
		'badge'      => 'Smart Match',
		'color'      => 'pink',
		'highlights' => array( 'Specialty Matchmaking', '1-on-1 Meeting Scheduler', 'In-App Secure Chat' ),
		'impact'     => 'Connects clinicians, research faculty, and industry leaders based on sub-specialties, interests, and collaborative clinical research tracks.'
	),
	579 => array(
		'cat_key'    => 'registration',
		'cat_name'   => 'Registration & Access',
		'badge'      => 'Digital Reg',
		'color'      => 'green',
		'highlights' => array( 'Multi-Channel Onboarding', 'Instant WhatsApp Confirmation', 'Custom Form Fields' ),
		'impact'     => 'Eliminates friction with rapid web & WhatsApp registration, instant payment reconciliation, and automated confirmation passes delivered in seconds.'
	),
	580 => array(
		'cat_key'    => 'registration',
		'cat_name'   => 'Registration & Access',
		'badge'      => 'Rapid Check-In',
		'color'      => 'orange',
		'highlights' => array( 'Sub-2s QR Scanning', 'Live Gate Sync', 'Zero Queue Delays' ),
		'impact'     => 'Validates and admits thousands of delegates seamlessly at conference counters with offline-ready local cache fallback.'
	),
	581 => array(
		'cat_key'    => 'agenda',
		'cat_name'   => 'Agenda & Scientific',
		'badge'      => 'Smart Agenda',
		'color'      => 'pink',
		'highlights' => array( 'Multi-Track Schedule', 'Personalized Bookmarks', 'Live Hall Changes' ),
		'impact'     => 'Keeps delegates informed of concurrent scientific halls, workshop rooms, and live schedule adjustments without paper program booklets.'
	),
	582 => array(
		'cat_key'    => 'agenda',
		'cat_name'   => 'Agenda & Scientific',
		'badge'      => 'Faculty Profiles',
		'color'      => 'blue',
		'highlights' => array( 'Speaker Biographies', 'Session Disclosures', 'Direct Q&A Integration' ),
		'impact'     => 'Spotlights national & international faculty with their credentials, presentation abstracts, and assigned session timetables.'
	),
	583 => array(
		'cat_key'    => 'engagement',
		'cat_name'   => 'Attendee Engagement',
		'badge'      => 'Interactive Tools',
		'color'      => 'blue',
		'highlights' => array( 'Live Moderated Q&A', 'Instant Polling Heatmaps', 'Scientific Quizzes' ),
		'impact'     => 'Transforms passive audiences into active participants with real-time screen projections, audience polls, and competitive session quizzes.'
	),
	584 => array(
		'cat_key'    => 'agenda',
		'cat_name'   => 'Agenda & Scientific',
		'badge'      => 'Knowledge Capture',
		'color'      => 'pink',
		'highlights' => array( 'In-Session Note Taking', 'Cloud Synchronized', 'Post-Event PDF Export' ),
		'impact'     => 'Allows delegates and scholars to record session insights and presentation takeaways, automatically organized by session track.'
	),
	585 => array(
		'cat_key'    => 'ai',
		'cat_name'   => 'AI & Intelligence',
		'badge'      => 'Moments AI',
		'color'      => 'green',
		'highlights' => array( 'Facial Recognition Search', 'Private Delegate Gallery', 'Instant Photo Delivery' ),
		'impact'     => 'Delegates snap a quick selfie and receive high-resolution conference photographs where they appear, delivered automatically via WhatsApp and mobile.'
	),
	586 => array(
		'cat_key'    => 'registration',
		'cat_name'   => 'Registration & Access',
		'badge'      => 'Digital E-Badge',
		'color'      => 'blue',
		'highlights' => array( 'Encrypted Mobile QR Pass', 'Zone Access Control', '100% Plastic-Free' ),
		'impact'     => 'Replaces plastic lanyard badges with secure, verifiable digital credentials stored in mobile wallets and WhatsApp with hall admission verification.'
	),
	587 => array(
		'cat_key'    => 'agenda',
		'cat_name'   => 'Agenda & Scientific',
		'badge'      => 'Wayfinding',
		'color'      => 'orange',
		'highlights' => array( 'Interactive Venue Maps', 'Exhibition Booth Locator', 'Session Proximity Alerts' ),
		'impact'     => 'Guides attendees through sprawling convention centers, workshop suites, poster display galleries, and dining halls effortlessly.'
	),
	588 => array(
		'cat_key'    => 'engagement',
		'cat_name'   => 'Attendee Engagement',
		'badge'      => 'Live Broadcasts',
		'color'      => 'pink',
		'highlights' => array( 'High-Priority Alerts', 'WhatsApp Push Channels', 'Segmented Audiences' ),
		'impact'     => 'Reaches 98%+ of delegates instantly with hall announcements, keynote reminders, gala dinner notifications, and schedule revisions.'
	),
	589 => array(
		'cat_key'    => 'engagement',
		'cat_name'   => 'Attendee Engagement',
		'badge'      => 'Exhibition Suite',
		'color'      => 'blue',
		'highlights' => array( 'Lead Retrieval Scanners', 'Digital Product Collateral', 'Sponsor ROI Analytics' ),
		'impact'     => 'Empowers pharma, biotech, and medical device exhibitors to capture verified delegate leads with QR badge scans and instant digital brochures.'
	),
	590 => array(
		'cat_key'    => 'analytics',
		'cat_name'   => 'Certificates & Analytics',
		'badge'      => 'Live Analytics',
		'color'      => 'green',
		'highlights' => array( 'Hall Attendance Heatmaps', 'Peak Check-In Metrics', 'Instant CSV/PDF Export' ),
		'impact'     => 'Provides organizing committees and association leaders real-time visibility into delegate footfalls, hall densities, and session ratings.'
	),
	591 => array(
		'cat_key'    => 'analytics',
		'cat_name'   => 'Certificates & Analytics',
		'badge'      => 'Accreditation',
		'color'      => 'pink',
		'highlights' => array( 'Automated CME Credit Hours', 'Tamper-Proof QR Code', 'Self-Serve Delegate Download' ),
		'impact'     => 'Issues verified digital attendance certificates and accredited CME credits automatically based on track attendance compliance.'
	),
	592 => array(
		'cat_key'    => 'analytics',
		'cat_name'   => 'Certificates & Analytics',
		'badge'      => 'Sustainability',
		'color'      => 'green',
		'highlights' => array( '100% Digital Programs', 'Zero Paper Waste', 'Verified Carbon Reduction' ),
		'impact'     => 'Replaces printed souvenir booklets, paper tickets, and disposable plastic pouches with an eco-certified digital conference experience.'
	),
	593 => array(
		'cat_key'    => 'registration',
		'cat_name'   => 'Registration & Access',
		'badge'      => 'White-Label',
		'color'      => 'pink',
		'highlights' => array( 'Custom Association Branding', 'Dedicated App Store Listing', 'Tailored Design Tokens' ),
		'impact'     => 'Delivers a tailor-made mobile application matching your conference or society visual identity, fonts, colors, and committee styling.'
	),
);

// Query all features from database
$feature_query_args = array(
	'post_type'      => 'feature',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'post_status'    => 'publish',
);
$features_query = new WP_Query( $feature_query_args );
?>

<main class="zf-page" id="primary">

	<!-- ── HERO SECTION ── -->
	<section class="zf-hero">
		<div class="zf-container zf-hero__grid">
			<div class="zf-hero__content">
				<!-- Breadcrumb -->
				<div class="zf-breadcrumb" aria-label="Breadcrumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
					<span class="zf-breadcrumb-sep">/</span>
					<span class="zf-breadcrumb-current">Platform Features</span>
				</div>

				<!-- Eyebrow -->
				<div class="zf-eyebrow">
					<span class="zf-dots"></span>
					Zinvos Capability Suite &bull; Connected Platform
				</div>

				<!-- Display Headline -->
				<h1>
					Specialized Features.
					<strong>Built for Seamless Conferences.</strong>
				</h1>

				<!-- Subtext -->
				<p class="zf-hero__copy">
					From AI-powered attendee matchmaking and sub-2-second QR badge check-ins to automated CME certificates and real-time session polling — discover how Zinvos powers world-class medical, scientific, and corporate congresses from one unified technology engine.
				</p>

				<!-- Hero CTAs -->
				<div class="zf-actions">
					<a class="zf-btn zf-btn--dark" href="#all-features">
						Explore All Features
						<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left:6px;"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
					</a>
					<a class="zf-btn zf-btn--light" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">
						Book a Live Demo ↗
					</a>
				</div>

				<!-- Trust Pills -->
				<div class="zf-trust-pills">
					<span class="zf-trust-pill"><i class="fa-solid fa-check"></i> Multi-Channel Sync</span>
					<span class="zf-trust-pill"><i class="fa-solid fa-check"></i> Offline-First Cache</span>
					<span class="zf-trust-pill"><i class="fa-solid fa-check"></i> Medical &amp; CME Ready</span>
					<span class="zf-trust-pill"><i class="fa-solid fa-check"></i> 100% Paperless</span>
				</div>
			</div>

			<!-- Hero Visual Mesh Canvas -->
			<div class="zf-hero__visual" aria-label="Zinvos Features Ecosystem">
				<div class="zf-hero__pulse-ring"></div>
				<div class="zf-hero__center">
					<span>Connected Event Engine</span>
				</div>

				<div class="zf-float zf-float--a">
					<small>Capability Suite</small>
					<strong>Complete Modules</strong>
				</div>
				<div class="zf-float zf-float--b">
					<small>Onsite Speed</small>
					<strong>&lt; 1.8s QR Scan</strong>
				</div>
				<div class="zf-float zf-float--c">
					<small>Sustainability</small>
					<strong>100% Paperless</strong>
				</div>
				<div class="zf-float zf-float--d">
					<small>Reliability</small>
					<strong>Offline Fallback</strong>
				</div>
			</div>
		</div>
	</section>

	<!-- ── ARCHITECTURAL PILLARS STRIP ── -->
	<section class="zf-pillars-section">
		<div class="zf-container">
			<div class="zf-pillars-grid">
				<div class="zf-pillar-item">
					<div class="zf-pillar-icon zf-pillar-icon--blue">
						<i class="fa-solid fa-network-wired"></i>
					</div>
					<div>
						<h4>Zero Data Disconnection</h4>
						<p>Registration, passes, session attendance, and certificates write to one central delegate ID.</p>
					</div>
				</div>
				<div class="zf-pillar-item">
					<div class="zf-pillar-icon zf-pillar-icon--orange">
						<i class="fa-solid fa-qrcode"></i>
					</div>
					<div>
						<h4>Sub-2-Second Onsite Flow</h4>
						<p>Rapid QR scanning with local offline caching ensures gate counters never stall or freeze.</p>
					</div>
				</div>
				<div class="zf-pillar-item">
					<div class="zf-pillar-icon zf-pillar-icon--pink">
						<i class="fa-solid fa-certificate"></i>
					</div>
					<div>
						<h4>Medical &amp; CME Compliance</h4>
						<p>Native tracking for faculty disclosures, CME credit hour minimums, and tamper-proof verification.</p>
					</div>
				</div>
				<div class="zf-pillar-item">
					<div class="zf-pillar-icon zf-pillar-icon--green">
						<i class="fa-brands fa-whatsapp"></i>
					</div>
					<div>
						<h4>WhatsApp &amp; Mobile Unified</h4>
						<p>Automate badges, schedules, and urgent alerts with 98%+ delivery to delegates' favorite apps.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── INTERACTIVE FEATURE SHOWCASE SECTION ── -->
	<section class="zf-showcase-section" id="all-features">
		<div class="zf-container">
			<!-- Showcase Header -->
			<div class="zf-section-head">
				<div class="zf-eyebrow" style="justify-content:center;">
					<span class="zf-dots"></span>
					Explore Platform Features
				</div>
				<h2>Engineered for High-Impact Conferences</h2>
				<p>Browse our complete feature suite below or filter by category to see how Zinvos handles every phase of the attendee and organizer journey.</p>
			</div>

			<!-- Filter & Search Toolbar -->
			<div class="zf-toolbar-card">
				<!-- Search Input -->
				<div class="zf-search-wrap">
					<i class="fa-solid fa-magnifying-glass zf-search-icon"></i>
					<input
						type="text"
						id="zfSearchInput"
						class="zf-search-input"
						placeholder="Search features (e.g., QR, AI, Certificate, Agenda, Notes)..."
						aria-label="Search conference features"
						autocomplete="off"
					/>
					<button type="button" id="zfSearchClear" class="zf-search-clear" aria-label="Clear search">
						<i class="fa-solid fa-xmark"></i>
					</button>
				</div>

				<!-- Category Tabs -->
				<div class="zf-filter-tabs" role="tablist" aria-label="Feature Categories">
					<button type="button" class="zf-cat-btn is-active" data-cat="all" role="tab" aria-selected="true">
						All Features
					</button>
					<button type="button" class="zf-cat-btn" data-cat="ai" role="tab" aria-selected="false">
						AI &amp; Intelligence
					</button>
					<button type="button" class="zf-cat-btn" data-cat="registration" role="tab" aria-selected="false">
						Registration &amp; Access
					</button>
					<button type="button" class="zf-cat-btn" data-cat="agenda" role="tab" aria-selected="false">
						Agenda &amp; Scientific
					</button>
					<button type="button" class="zf-cat-btn" data-cat="engagement" role="tab" aria-selected="false">
						Attendee Engagement
					</button>
					<button type="button" class="zf-cat-btn" data-cat="analytics" role="tab" aria-selected="false">
						Certificates &amp; Analytics
					</button>
				</div>

				<!-- Live Counter Bar -->
				<div class="zf-counter-bar">
					<div class="zf-counter-text">
						<i class="fa-solid fa-layer-group" style="margin-right:6px;color:var(--blue);"></i> Showing active capabilities
					</div>
					<div class="zf-counter-actions">
						<button type="button" id="zfExpandAllBtn" class="zf-text-btn">
							<i class="fa-solid fa-arrows-up-down"></i> Expand All Details
						</button>
					</div>
				</div>
			</div>

			<!-- Features Cards Grid -->
			<div class="zf-grid" id="zfFeaturesGrid">
				<?php
				$card_counter = 1;

				if ( $features_query->have_posts() ) :
					while ( $features_query->have_posts() ) :
						$features_query->the_post();
						$feature_id = get_the_ID();

						// Metadata lookup with intelligent fallbacks
						$meta = isset( $feature_meta_map[ $feature_id ] ) ? $feature_meta_map[ $feature_id ] : null;

						// Determine color token
						$color_token = get_post_meta( $feature_id, 'icon_color', true );
						if ( empty( $color_token ) && $meta ) {
							$color_token = $meta['color'];
						}
						if ( empty( $color_token ) ) {
							$color_token = 'blue';
						}

						// Determine category
						$cat_key  = $meta ? $meta['cat_key'] : 'agenda';
						$cat_name = $meta ? $meta['cat_name'] : 'Conference Capability';
						$badge    = $meta ? $meta['badge'] : 'Feature';
						$highlights = $meta ? $meta['highlights'] : array( 'Connected Module', 'Real-Time Sync', 'Mobile Ready' );
						$impact   = $meta ? $meta['impact'] : 'Engineered to streamline conference execution and improve delegate satisfaction.';

						// Determine icon URL
						$icon_id = get_post_meta( $feature_id, 'icon', true );
						$icon_url = $icon_id ? wp_get_attachment_url( $icon_id ) : '';
						if ( empty( $icon_url ) && has_post_thumbnail() ) {
							$icon_url = get_the_post_thumbnail_url( $feature_id, 'thumbnail' );
						}

						// Title and Description
						$title = get_the_title();
						$content_raw = get_the_content();
						$desc = ! empty( $content_raw ) ? wp_strip_all_tags( $content_raw ) : get_the_excerpt();
						if ( empty( $desc ) ) {
							$desc = 'Deliver a premium digital conference experience with real-time attendee management and connected workflows.';
						}

						$formatted_num = str_pad( $card_counter, 2, '0', STR_PAD_LEFT );
						$search_index = strtolower( $title . ' ' . $desc . ' ' . $cat_name . ' ' . implode( ' ', $highlights ) );
						?>
						<article
							class="zf-card zf-card--<?php echo esc_attr( $color_token ); ?>"
							data-category="<?php echo esc_attr( $cat_key ); ?>"
							data-search="<?php echo esc_attr( $search_index ); ?>"
							id="<?php echo esc_attr( sanitize_title( $title ) ); ?>"
						>
							<!-- Card Top Meta -->
							<div class="zf-card__top">
								<span class="zf-card__badge zf-card__badge--<?php echo esc_attr( $color_token ); ?>">
									<?php echo esc_html( $badge ); ?>
								</span>
								<span class="zf-card__cat-label"><?php echo esc_html( $cat_name ); ?></span>
							</div>

							<!-- Card Header: Icon + Title -->
							<div class="zf-card__head">
								<div class="zf-card__icon zf-card__icon--<?php echo esc_attr( $color_token ); ?>" aria-hidden="true">
									<?php if ( ! empty( $icon_url ) ) : ?>
										<img
											src="<?php echo esc_url( $icon_url ); ?>"
											alt="<?php echo esc_attr( $title ); ?> icon"
											class="zf-card__icon-img"
											loading="lazy"
										/>
									<?php else : ?>
										<i class="fa-solid fa-star zf-card__icon-fallback"></i>
									<?php endif; ?>
								</div>

								<h3 class="zf-card__title">
									<a href="<?php the_permalink(); ?>"><?php echo esc_html( $title ); ?></a>
								</h3>
							</div>

							<!-- Card Body -->
							<div class="zf-card__body">
								<p class="zf-card__desc"><?php echo esc_html( $desc ); ?></p>
							</div>

							<!-- Feature Highlights Pills -->
							<div class="zf-card__pills">
								<?php foreach ( $highlights as $pill ) : ?>
									<span class="zf-card__pill">
										<i class="fa-solid fa-circle-check"></i>
										<?php echo esc_html( $pill ); ?>
									</span>
								<?php endforeach; ?>
							</div>

							<!-- Expandable Detail Drawer -->
							<div class="zf-card__drawer" id="drawer-<?php echo esc_attr( $feature_id ); ?>" aria-hidden="true">
								<div class="zf-card__drawer-inner">
									<div class="zf-drawer-heading">
										<i class="fa-solid fa-bolt zf-drawer-icon"></i>
										<strong>Conference Impact</strong>
									</div>
									<p class="zf-drawer-copy"><?php echo esc_html( $impact ); ?></p>
									<div class="zf-drawer-actions">
										<a class="zf-drawer-btn" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">
											Request Demo for <?php echo esc_html( wp_trim_words( $title, 3, '' ) ); ?> ↗
										</a>
									</div>
								</div>
							</div>

							<!-- Card Footer / Accordion Trigger -->
							<div class="zf-card__footer">
								<button
									type="button"
									class="zf-card__toggle-btn"
									aria-expanded="false"
									aria-controls="drawer-<?php echo esc_attr( $feature_id ); ?>"
								>
									<span class="zf-toggle-label">Why Conferences Need This</span>
									<span class="zf-toggle-icon"><i class="fa-solid fa-chevron-down"></i></span>
								</button>
							</div>
						</article>
						<?php
						$card_counter++;
					endwhile;
					wp_reset_postdata();
				else :
					// Fallback when no posts in database
					echo '<div class="zf-empty-state"><p>No features currently published. Please check back soon.</p></div>';
				endif;
				?>
			</div>

			<!-- Search Zero State -->
			<div class="zf-zero-state" id="zfZmrState" style="display:none;">
				<div class="zf-zero-icon">
					<i class="fa-solid fa-magnifying-glass"></i>
				</div>
				<h3>No matching features found</h3>
				<p>We couldn't find any capability matching your search term. Try checking for keywords like "QR", "AI", "Badge", "CME", or "Agenda".</p>
				<button type="button" id="zfResetSearchBtn" class="zf-btn zf-btn--dark">
					Reset All Filters
				</button>
			</div>
		</div>
	</section>

	<!-- ── DEEP DIVE ARCHITECTURE COMPARISON ── -->
	<section class="zf-deepdive-section">
		<div class="zf-container">
			<div class="zf-section-head">
				<div class="zf-eyebrow" style="justify-content:center;">
					<span class="zf-dots"></span>
					Architecture Advantage
				</div>
				<h2>Why Conferences Choose Zinvos Over Disjointed Tools</h2>
				<p>Most conferences struggle by patching together separate vendors for ticketing, WhatsApp broadcasts, badge printing, and certificates. Zinvos brings all core capabilities into one synchronized database.</p>
			</div>

			<div class="zf-deepdive-grid">
				<div class="zf-deepdive-card">
					<div class="zf-deepdive-badge">01 &bull; Unification</div>
					<h3>Single Attendee Profile</h3>
					<p>From their first registration click to badge scanning, CME session tracking, and certificate downloads, every interaction ties back to one verifiable delegate profile.</p>
					<ul class="zf-deepdive-list">
						<li><i class="fa-solid fa-check"></i> No CSV export/import between gates</li>
						<li><i class="fa-solid fa-check"></i> Real-time payment reconciliation</li>
						<li><i class="fa-solid fa-check"></i> Live multi-gate capacity monitoring</li>
					</ul>
				</div>

				<div class="zf-deepdive-card zf-deepdive-card--highlight">
					<div class="zf-deepdive-badge zf-deepdive-badge--orange">02 &bull; Reliability</div>
					<h3>Onsite Zero-Panic Guarantee</h3>
					<p>Convention center Wi-Fi drops are the #1 cause of entry gate crises. Zinvos features operate with local edge caching, sub-2-second QR check-in, and instant badge auto-printing.</p>
					<ul class="zf-deepdive-list">
						<li><i class="fa-solid fa-check"></i> Fully functional even when internet drops</li>
						<li><i class="fa-solid fa-check"></i> Automatic bidirectional cloud re-sync</li>
						<li><i class="fa-solid fa-check"></i> Redundant fast thermal badge printing</li>
					</ul>
				</div>

				<div class="zf-deepdive-card">
					<div class="zf-deepdive-badge zf-deepdive-badge--pink">03 &bull; Compliance</div>
					<h3>Accredited Medical Standards</h3>
					<p>Purpose-built for scientific symposiums and medical associations requiring strict attendance verification, faculty disclosures, and automated credit calculations.</p>
					<ul class="zf-deepdive-list">
						<li><i class="fa-solid fa-check"></i> Multi-hall session tracking</li>
						<li><i class="fa-solid fa-check"></i> Tamper-proof QR certificate validation</li>
						<li><i class="fa-solid fa-check"></i> Automated delegate feedback collection</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- ── CALL TO ACTION BANNER ── -->
	<section class="zf-cta-section">
		<div class="zf-container">
			<div class="zf-cta-card">
				<div class="zf-eyebrow zf-eyebrow--light" style="justify-content:center;">
					<span class="zf-dots"></span>
					Ready For Your Next Conference?
				</div>
				<h2>Run Your Entire Event With the Complete Feature Suite</h2>
				<p>Schedule a customized 20-minute platform walkthrough with our conference technology specialists. See how these features work live with your event schedule, halls, and delegate scale.</p>
				<div class="zf-cta-actions">
					<a class="zf-btn zf-btn--primary" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">
						Book a Live Demo ↗
					</a>
					<a class="zf-btn zf-btn--secondary" href="tel:+917994286660">
						<i class="fa-solid fa-phone"></i>  +91 799 428 66 60
					</a>
					<a class="zf-btn zf-btn--whatsapp" href="https://wa.me/917994286660" target="_blank" rel="noopener">
						<i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
					</a>
				</div>
			</div>
		</div>
	</section>

</main>

<!-- ── CLIENT-SIDE INTERACTIVITY SCRIPT ── -->
<script>
(function() {
	document.addEventListener('DOMContentLoaded', function() {
		const searchInput   = document.getElementById('zfSearchInput');
		const clearBtn      = document.getElementById('zfSearchClear');
		const catButtons    = document.querySelectorAll('.zf-cat-btn');
		const featureCards  = document.querySelectorAll('.zf-card');
		const visibleCount  = document.getElementById('zfVisibleCount');
		const zeroState     = document.getElementById('zfZmrState');
		const resetBtn      = document.getElementById('zfResetSearchBtn');
		const expandAllBtn  = document.getElementById('zfExpandAllBtn');
		let activeCategory  = 'all';
		let allExpanded     = false;

		function filterCards() {
			const query = (searchInput ? searchInput.value : '').trim().toLowerCase();
			let count = 0;

			featureCards.forEach(function(card) {
				const cardCat    = card.getAttribute('data-category') || '';
				const cardSearch = card.getAttribute('data-search') || '';

				const matchesCat   = (activeCategory === 'all' || cardCat === activeCategory);
				const matchesQuery = (!query || cardSearch.indexOf(query) !== -1);

				if (matchesCat && matchesQuery) {
					card.style.display = '';
					count++;
				} else {
					card.style.display = 'none';
				}
			});

			if (visibleCount) {
				visibleCount.textContent = count;
			}

			if (zeroState) {
				zeroState.style.display = count === 0 ? 'block' : 'none';
			}

			if (clearBtn && searchInput) {
				clearBtn.style.display = searchInput.value.length > 0 ? 'inline-flex' : 'none';
			}
		}

		// Category pill clicks
		catButtons.forEach(function(btn) {
			btn.addEventListener('click', function() {
				catButtons.forEach(b => {
					b.classList.remove('is-active');
					b.setAttribute('aria-selected', 'false');
				});
				this.classList.add('is-active');
				this.setAttribute('aria-selected', 'true');
				activeCategory = this.getAttribute('data-cat') || 'all';
				filterCards();
			});
		});

		// Search input listener
		if (searchInput) {
			searchInput.addEventListener('input', filterCards);
		}

		// Clear search button
		if (clearBtn) {
			clearBtn.addEventListener('click', function() {
				if (searchInput) {
					searchInput.value = '';
					searchInput.focus();
				}
				filterCards();
			});
		}

		// Reset button on zero state
		if (resetBtn) {
			resetBtn.addEventListener('click', function() {
				if (searchInput) searchInput.value = '';
				activeCategory = 'all';
				catButtons.forEach((b, idx) => {
					b.classList.toggle('is-active', idx === 0);
					b.setAttribute('aria-selected', idx === 0 ? 'true' : 'false');
				});
				filterCards();
			});
		}

		// Accordion drawer toggle
		document.querySelectorAll('.zf-card__toggle-btn').forEach(function(btn) {
			btn.addEventListener('click', function() {
				const card = this.closest('.zf-card');
				const isExpanded = this.getAttribute('aria-expanded') === 'true';
				const label = this.querySelector('.zf-toggle-label');

				this.setAttribute('aria-expanded', !isExpanded);
				card.classList.toggle('is-expanded', !isExpanded);

				if (label) {
					label.textContent = !isExpanded ? 'Hide Conference Impact' : 'Why Conferences Need This';
				}
			});
		});

		// Expand / Collapse All Details
		if (expandAllBtn) {
			expandAllBtn.addEventListener('click', function() {
				allExpanded = !allExpanded;
				featureCards.forEach(function(card) {
					const btn = card.querySelector('.zf-card__toggle-btn');
					const label = card.querySelector('.zf-toggle-label');
					if (btn) {
						btn.setAttribute('aria-expanded', allExpanded);
						card.classList.toggle('is-expanded', allExpanded);
						if (label) {
							label.textContent = allExpanded ? 'Hide Conference Impact' : 'Why Conferences Need This';
						}
					}
				});
				this.innerHTML = allExpanded
					? '<i class="fa-solid fa-compress"></i> Collapse All Details'
					: '<i class="fa-solid fa-arrows-up-down"></i> Expand All Details';
			});
		}

		// Support direct hash navigation (e.g. /features/#qr-code-based-check-in or /features/#ai)
		function checkHash() {
			const hash = window.location.hash.replace('#', '');
			if (!hash) return;

			// Check if hash matches a category
			const matchingCatBtn = document.querySelector('.zf-cat-btn[data-cat="' + hash + '"]');
			if (matchingCatBtn) {
				matchingCatBtn.click();
				return;
			}

			// Check if hash matches a specific feature element ID
			const targetCard = document.getElementById(hash);
			if (targetCard) {
				// Ensure its category is shown
				const cardCat = targetCard.getAttribute('data-category');
				const cardCatBtn = document.querySelector('.zf-cat-btn[data-cat="' + cardCat + '"]');
				if (cardCatBtn && activeCategory !== 'all' && activeCategory !== cardCat) {
					cardCatBtn.click();
				}

				// Auto-expand drawer
				const toggleBtn = targetCard.querySelector('.zf-card__toggle-btn');
				if (toggleBtn) {
					toggleBtn.click();
				}

				// Smooth scroll with header offset
				setTimeout(function() {
					const header = document.querySelector('.top-wrap, .site-header');
					const offset = header ? header.offsetHeight + 24 : 110;
					const cardTop = targetCard.getBoundingClientRect().top + window.pageYOffset - offset;
					window.scrollTo({ top: Math.max(0, cardTop), behavior: 'smooth' });
					targetCard.classList.add('zf-card--targeted');
				}, 150);
			}
		}

		checkHash();
		window.addEventListener('hashchange', checkHash);
	});
})();
</script>

<?php
get_footer();
