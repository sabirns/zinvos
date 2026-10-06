<?php
/**
 * Zinvos V2 Homepage Template
 *
 * @package Zinvos_V2
 */

get_header();
?>

<!-- HERO SECTION (FULL WIDTH) -->
<section class="hero reveal in">
    
    <div class="container">
        <div class="hero-grid">
            <div class="hero-copy">
                <div class="eyebrow">Event technology, connected</div>
                <h1 class="display">Run your entire event <span>from one platform.</span></h1>
                <p class="sub">Registration, attendee communication, onsite operations, engagement and certificates &mdash; connected across web, WhatsApp and mobile.</p>
                <div class="hero-actions">
                    <a class="btn primary" href="<?php echo home_url('/contact-us'); ?>">Book a Demo <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span></a>
                </div>
                <div class="micro-proof">
                    <div class="avatar-stack">
                        <div class="avatar"></div>
                        <div class="avatar"></div>
                        <div class="avatar"></div>
                        <div class="avatar"></div>
                    </div>
                    <div><strong>One attendee journey</strong><br>from registration to certificate.</div>
                </div>
            </div>

            <div class="hero-stage" aria-label="Zinvos product ecosystem illustration">
                <!-- Dashboard Desktop Screen Mockup -->
                <div class="dashboard">
                    <div class="dash-head">
                        <div class="dash-title">
                            <div class="dot" style="background:var(--green)"></div>
                            Zinvos Event Console
                        </div>
                        <div class="dots">
                            <div class="dot" style="background:#ff5f56"></div>
                            <div class="dot" style="background:#ffbd2e"></div>
                            <div class="dot" style="background:#27c93f"></div>
                        </div>
                    </div>
                    <div class="dash-screen">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/desktop-screen.png" alt="Zinvos Desktop Event Console" class="desktop-screen-img">
                    </div>
                </div>

                <!-- Phone App Screen Slideshow -->
                <div class="phone">
                    <div class="phone-screen">
                        <div class="island"></div>
                        <div class="phone-slideshow">
                            <?php
                            $images_dir = get_template_directory() . '/images/';
                            $all_files = is_dir( $images_dir ) ? scandir( $images_dir ) : array();
                            $screen_files = array();
                            if ( ! empty( $all_files ) ) {
                                foreach ( $all_files as $file ) {
                                    if ( preg_match( '/^zinvos-screen.*\.(png|jpg|jpeg|webp)$/i', $file ) ) {
                                        $screen_files[] = $file;
                                    }
                                }
                            }
                            if ( ! empty( $screen_files ) ) :
                                usort( $screen_files, function( $a, $b ) {
                                    if ( $a === 'zinvos-screen.png' ) return -1;
                                    if ( $b === 'zinvos-screen.png' ) return 1;
                                    return strnatcmp( $a, $b );
                                });
                                $first = true;
                                foreach ( $screen_files as $file ) :
                                    $img_url = get_template_directory_uri() . '/images/' . $file;
                                    $active_class = $first ? ' active' : '';
                                    ?>
                                    <img src="<?php echo esc_url( $img_url ); ?>" alt="Zinvos Mobile App Screen" class="phone-slide<?php echo $active_class; ?>">
                                    <?php
                                    $first = false;
                                endforeach;
                            else :
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/zinvos-screen.png" alt="Zinvos Mobile Screen 1" class="phone-slide active">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/zinvos-screen-2.png" alt="Zinvos Mobile Screen 2" class="phone-slide">
                            <?php endif; ?>
                        </div>
                        <div class="phone-dots"></div>
                    </div>
                </div>

                <!-- WhatsApp Notification Widget -->
                <div class="whatsapp">
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri(); ?>/images/zinvos-whatsapp-screenshot.webp" type="image/webp">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/zinvos-whatsapp-screenshot.png" alt="Zinvos WhatsApp Pass & Notification" class="wa-screen-img">
                    </picture>
                </div>

                <!-- Floating Animated Status Chips -->
                <div class="float-chip fc1">Web registration &check;</div>
                <div class="float-chip fc2">QR verified &middot; Badge ready</div>
                <div class="float-chip fc3">Certificate generated</div>
            </div>
        </div>
    </div>
</section>

<main class="site-main">

    <!-- TRUST LOGOS BAR CAROUSEL -->
    <section class="trust reveal">
        <div class="container">
            <div class="trust-line">
                <span>Trusted to power conferences and professional communities</span>
                <span style="height:1px; background:var(--line); flex:1;"></span>
            </div>
            <div class="logo-carousel-container">
                <div class="logo-track">
                    <?php
                    $clients_query = new WP_Query( array(
                        'post_type'      => 'client',
                        'posts_per_page' => 12,
                    ) );

                    $client_items = array();
                    if ( $clients_query->have_posts() ) :
                        while ( $clients_query->have_posts() ) : $clients_query->the_post();
                            ob_start();
                            ?>
                            <div class="logo-item">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) ); ?>
                                <?php else : ?>
                                    <?php the_title(); ?>
                                <?php endif; ?>
                            </div>
                            <?php
                            $client_items[] = ob_get_clean();
                        endwhile;
                        wp_reset_postdata();
                    else :
                        $default_clients = array( 'IFASCON', 'ISNCON', 'KASICON', 'AFPI', 'WONCA', 'NATIONAL FORUM', 'IEEE Global', 'TechCon', 'BioPharma' );
                        foreach ( $default_clients as $client_name ) :
                            $client_items[] = '<div class="logo-item">' . esc_html( $client_name ) . '</div>';
                        endforeach;
                    endif;

                    // Render items twice for continuous infinite carousel loop
                    $all_items = array_merge( $client_items, $client_items );
                    foreach ( $all_items as $item ) {
                        echo $item;
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- JOURNEY SHOWCASE -->
    <section class="section reveal" id="platform">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">One connected journey</div>
                    <h2 class="display" style="margin-top:18px">From registration <strong>to certificates.</strong></h2>
                </div>
                <p>Zinvos brings the attendee journey into one system &mdash; before the event, at the venue, inside sessions, and after the event is over.</p>
            </div>

            <div class="journey-wrap">
                <div class="journey-tabs">
                    <button class="journey-tab active" data-stage="0"><span>01</span><b>Register</b></button>
                    <button class="journey-tab" data-stage="1"><span>02</span><b>Communicate/Promote</b></button>
                    <button class="journey-tab" data-stage="2"><span>03</span><b>Operate</b></button>
                    <button class="journey-tab" data-stage="3"><span>04</span><b>Engage</b></button>
                    <button class="journey-tab" data-stage="4"><span>05</span><b>Complete</b></button>
                </div>
                <div class="journey-content">
                    <div class="journey-copy">
                        <div class="eyebrow" id="journeyEyebrow">Before the event</div>
                        <h3 id="journeyTitle">Registration without friction.</h3>
                        <p id="journeyText">Let attendees register through web, WhatsApp or mobile and keep every registration connected to the same attendee record.</p>
                        <div class="feature-list" id="journeyFeatures">
                            <div>Web registration</div>
                            <div>WhatsApp registration</div>
                            <div>Payments</div>
                            <div>QR confirmation</div>
                        </div>
                    </div>
                    <div class="journey-visual">
                        <div class="stack-card stack-a">
                            <div class="stack-card-head">
                                <div class="kicker">Web</div>
                                <span class="card-badge badge-green"><i class="pulse-dot"></i> Live</span>
                            </div>
                            <b>Registration</b>
                            <div class="card-meta">
                                <div class="card-avatar-group">
                                    <span class="avatar-dot" style="background:#4a99c8"></span>
                                    <span class="avatar-dot" style="background:#23aa69"></span>
                                    <span class="avatar-dot" style="background:#f59e0b"></span>
                                </div>
                                <small class="card-meta-text">+1,280 delegates online</small>
                            </div>
                            <div class="card-progress">
                                <div class="card-bar" style="width: 82%;"></div>
                            </div>
                        </div>
                        <div class="stack-card stack-b">
                            <div class="stack-card-head">
                                <div class="kicker">WhatsApp</div>
                                <span class="card-badge badge-blue">Instant</span>
                            </div>
                            <b>Confirmed &check;</b>
                            <div class="card-wa-bubble">
                                <div class="wa-msg-icon">✓✓</div>
                                <span>QR Pass sent to attendee</span>
                            </div>
                        </div>
                        <div class="stack-card stack-c">
                            <div class="stack-card-head">
                                <div class="kicker">Attendee profile</div>
                                <span class="card-badge badge-amber">Verified</span>
                            </div>
                            <b>QR Pass Ready</b>
                            <div class="card-qr-row">
                                <div class="card-c-icon-wrap">
                                    <div class="card-mini-icon icon-qr">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><path d="M14 14h3v3h-3z"/><path d="M18 18h3v3h-3z"/><path d="M14 21h3"/><path d="M21 14v3"/></svg>
                                    </div>
                                </div>
                                <div class="card-qr-info">
                                    <span class="qr-code-id">#ZV-9824</span>
                                    <small class="card-c-sub">Entry Gate Authorized</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WAYS TO WORK WITH US -->
    <section class="section reveal" id="partners">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">Choose your path</div>
                    <h2 class="display" style="margin-top:18px">Use Zinvos <strong>your way.</strong></h2>
                </div>
                <p>Start independently, bring Zinvos in for larger conferences, or offer the platform under your own brand.</p>
            </div>
            <div class="ways-grid">
                <a class="way" href="<?php echo esc_url( home_url( '/partners' ) ); ?>">
                    <div>
                        <small>Self-Serve</small>
                        <h3>Run it yourself.</h3>
                        <p>Create your event, configure the experience and launch without waiting for a sales process.</p>
                    </div>
                    <div class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></div>
                </a>
                <a class="way" href="<?php echo esc_url( home_url( '/partners' ) ); ?>">
                    <div>
                        <small>Managed</small>
                        <h3>We power the complexity.</h3>
                        <p>For larger conferences that need implementation, onsite support and coordinated event operations.</p>
                    </div>
                    <div class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></div>
                </a>
                <a class="way" href="<?php echo esc_url( home_url( '/partners' ) ); ?>">
                    <div>
                        <small>Partner / White Label</small>
                        <h3>Your brand. Our platform.</h3>
                        <p>Offer event technology to your own clients with your branding and your commercial model.</p>
                    </div>
                    <div class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></div>
                </a>
            </div>
        </div>
    </section>
    <?php include get_template_directory() . '/template-parts/why-zinvos.php'; ?>
    <!-- UPCOMING CONFERENCES -->
    <section class="section reveal" id="conferences">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">Happening on Zinvos</div>
                    <h2 class="display" style="margin-top:18px">Upcoming <strong>conferences.</strong></h2>
                </div>
                <p>Turn public events running on Zinvos into a discoverable conference directory with direct registration access.</p>
            </div>
            <div class="conference-row">
                <?php
                // Fetch events prioritizing upcoming ones
                $today_str = date('Ymd');
                $events_query = new WP_Query( array(
                    'post_type'      => 'event',
                    'posts_per_page' => 3,
                    'meta_key'       => 'event_start_date',
                    'orderby'        => 'meta_value',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        array(
                            'key'     => 'event_start_date',
                            'value'   => $today_str,
                            'compare' => '>=',
                        ),
                    ),
                ) );

                // Fallback to latest events if fewer than 3 upcoming
                if ( ! $events_query->have_posts() ) {
                    $events_query = new WP_Query( array(
                        'post_type'      => 'event',
                        'posts_per_page' => 3,
                    ) );
                }

                if ( $events_query->have_posts() ) :
                    while ( $events_query->have_posts() ) : $events_query->the_post();
                        $event_dates    = get_post_meta( get_the_ID(), 'event_dates', true );
                        $event_start    = get_post_meta( get_the_ID(), 'event_start_date', true );
                        $event_location = get_post_meta( get_the_ID(), 'event_location', true );

                        // Robust date timestamp conversion
                        $ts = null;
                        if ( $event_start ) {
                            $raw = trim( $event_start );
                            if ( preg_match( '/^\d{8}$/', $raw ) ) {
                                $y = substr( $raw, 0, 4 );
                                $m = substr( $raw, 4, 2 );
                                $d = substr( $raw, 6, 2 );
                                $ts = strtotime( "{$y}-{$m}-{$d} 23:59:59" );
                            } else {
                                $ts = strtotime( $raw );
                            }
                        }

                        $is_upcoming = ( $ts === null || $ts >= strtotime( 'today 00:00:00' ) );
                        $date_display = $event_dates ?: ( $ts ? date( 'M d, Y', $ts ) : '' );
                        ?>
                        <article class="conf <?php echo $is_upcoming ? '' : 'conf--past'; ?>">
                            <div>
                                <div class="conf-top">
                                    <?php if ( $is_upcoming ) : ?>
                                        <span class="tag tag--upcoming">Upcoming</span>
                                    <?php else : ?>
                                        <span class="tag tag--past">Past</span>
                                    <?php endif; ?>
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="event-logo">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail( 'medium', array('class'=> 'event-logo-img') ); ?>
                                            </a>
                                        </div>
                                    <?php else : ?>
                                        <div class="event-logo">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/zinvos-2.webp" alt="Event Placeholder">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <div class="event-meta">
                                    <?php if ( $date_display ) : ?>
                                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> <?php echo esc_html($date_display); ?></span>
                                    <?php endif; ?>
                                    <?php if ( $event_location ) : ?>
                                        <span class="meta-item"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($event_location); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="conf-bottom">
                                <span><?php echo esc_html( wp_trim_words( get_the_excerpt(), 25 ) ); ?></span>
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo $is_upcoming ? 'Register' : 'View Details'; ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img">
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <article class="conf">
                        <div>
                            <div class="conf-top"><span class="tag tag--upcoming">Upcoming</span><span class="date">NOV 26&ndash;28</span></div>
                            <h3>Annual Scientific Conference 2027</h3>
                        </div>
                        <div class="conf-bottom"><span>Kollam, Kerala</span><a href="#register">Register <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></a></div>
                    </article>
                    <article class="conf">
                        <div>
                            <div class="conf-top"><span class="tag tag--upcoming">Upcoming</span><span class="date">JAN 18&ndash;20</span></div>
                            <h3>Research &amp; Innovation Summit</h3>
                        </div>
                        <div class="conf-bottom"><span>Dubai, UAE</span><a href="#register">Register <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></a></div>
                    </article>
                    <article class="conf">
                        <div>
                            <div class="conf-top"><span class="tag tag--past">Past</span><span class="date">MAR 06&ndash;08</span></div>
                            <h3>National Professional Congress</h3>
                        </div>
                        <div class="conf-bottom"><span>Bengaluru, India</span><a href="#register">Register <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></a></div>
                    </article>
                    <?php
                endif;
                ?>
            </div>
            <div class="all-events-btn">
                <a href="<?php echo esc_url( get_post_type_archive_link('event') ); ?>" class="btn primary">View All Events</a>
            </div>
        </div>
    </section>

    <!-- LATEST BLOG POSTS / INSIGHTS -->
    <section class="section reveal" id="blog">
        <div class="container">
            <div class="section-head">
                <div>
                    <div class="eyebrow">Insights &amp; News</div>
                    <h2 class="display" style="margin-top:18px">Latest <strong>from our blog.</strong></h2>
                </div>
                <p>Read the latest industry insights, event management tips, and technical updates from the Zinvos team.</p>
            </div>
            <div class="blog-row">
                <?php
                $blog_query = new WP_Query( array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ) );

                if ( $blog_query->have_posts() ) :
                    while ( $blog_query->have_posts() ) : $blog_query->the_post();
                        ?>
                        <article class="blog-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="blog-card-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'medium_large' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="blog-card-body">
                                <div class="blog-meta">
                                    <span class="blog-cat">
                                        <?php 
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo esc_html( $categories[0]->name );
                                        } else {
                                            echo 'Insight';
                                        }
                                        ?>
                                    </span>
                                    <span class="blog-date"><?php echo get_the_date( 'M d, Y' ); ?></span>
                                </div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="blog-read-more">Read Article &rarr;</a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <article class="blog-card">
                        <div class="blog-card-body">
                            <div class="blog-meta"><span class="blog-cat">Event Tech</span><span class="blog-date">AUG 24, 2026</span></div>
                            <h3><a href="#">How WhatsApp Integration Streamlines Onsite Registrations</a></h3>
                            <p>Discover how instant messaging automation reduces check-in queues and keeps attendees informed in real-time.</p>
                            <a href="#" class="blog-read-more">Read Article &rarr;</a>
                        </div>
                    </article>
                    <article class="blog-card">
                        <div class="blog-card-body">
                            <div class="blog-meta"><span class="blog-cat">Conferences</span><span class="blog-date">AUG 15, 2026</span></div>
                            <h3><a href="#">The Future of Medical &amp; CME Conference Management</a></h3>
                            <p>Key strategies for managing complex multi-hall scientific tracks, speaker schedules, and instant credit tracking.</p>
                            <a href="#" class="blog-read-more">Read Article &rarr;</a>
                        </div>
                    </article>
                    <article class="blog-card">
                        <div class="blog-card-body">
                            <div class="blog-meta"><span class="blog-cat">Product Update</span><span class="blog-date">JUL 30, 2026</span></div>
                            <h3><a href="#">Automating Post-Event Certificate Distribution with QR Verification</a></h3>
                            <p>Generate and distribute tamper-proof digital certificates automatically upon session completion.</p>
                            <a href="#" class="blog-read-more">Read Article &rarr;</a>
                        </div>
                    </article>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-cta reveal" id="contact">
        <div class="container">
            <div class="final-inner">
                <div class="eyebrow">Ready when your event is</div>
                <h2 style="margin-top:20px">Build the event.<br><strong>Zinvos connects the rest.</strong></h2>
                <p>Start with self-serve, talk to us about a managed conference, or explore Zinvos for your event company.</p>
                <div class="hero-actions">
                    <a class="btn primary" href="<?php echo home_url('/contact-us'); ?>">Book a Demo <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
