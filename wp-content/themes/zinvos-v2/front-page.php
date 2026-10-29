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
                <!-- <div class="micro-proof">
                    <div class="avatar-stack">
                        <div class="avatar"></div>
                        <div class="avatar"></div>
                        <div class="avatar"></div>
                        <div class="avatar"></div>
                    </div>
                    <div><strong>One attendee journey</strong><br>from registration to certificate.</div>
                </div> -->
            </div>

            <div class="hero-stage" aria-label="Zinvos product ecosystem illustration">
                <!-- Dashboard Desktop Screen Mockup -->
                <div class="dashboard">
                    <div class="dash-head">
                        <div class="dash-title">
                            <div class="dot" style="background:var(--green)"></div>
                            <span class="dash-title-main">Zinvos Event Console</span>
                            <span class="dash-title-badge">Dashboard</span>
                        </div>
                        <div class="dots">
                            <div class="dot" style="background:#ff5f56"></div>
                            <div class="dot" style="background:#ffbd2e"></div>
                            <div class="dot" style="background:#27c93f"></div>
                        </div>
                    </div>
                    <div class="dash-screen">
                        <div class="desktop-slideshow">
                            <?php
                            $images_dir = get_template_directory() . '/images/';
                            $all_files = is_dir( $images_dir ) ? scandir( $images_dir ) : array();
                            $desktop_screen_files = array();
                            if ( ! empty( $all_files ) ) {
                                foreach ( $all_files as $file ) {
                                    if ( preg_match( '/^desktop-screen.*\.(png|jpg|jpeg|webp)$/i', $file ) ) {
                                        $desktop_screen_files[] = $file;
                                    }
                                }
                            }
                            if ( ! empty( $desktop_screen_files ) ) :
                                usort( $desktop_screen_files, function( $a, $b ) {
                                    if ( $a === 'desktop-screen.png' ) return -1;
                                    if ( $b === 'desktop-screen.png' ) return 1;
                                    return strnatcmp( $a, $b );
                                });
                                $first_desk = true;
                                $desk_meta = array(
                                    'desktop-screen.png'   => array( 'title' => 'Zinvos Event Management Dashboard', 'view' => 'Dashboard' ),
                                    'desktop-screen-2.png' => array( 'title' => 'Registration & Attendance Reports', 'view' => 'Reports' ),
                                    'desktop-screen-3.png' => array( 'title' => 'Event Operations & Messaging Hub',  'view' => 'Operations' ),
                                );
                                foreach ( $desktop_screen_files as $file ) :
                                    $img_url = get_template_directory_uri() . '/images/' . $file;
                                    $active_class = $first_desk ? ' active' : '';
                                    $info = isset( $desk_meta[ $file ] ) ? $desk_meta[ $file ] : array( 'title' => 'Zinvos Desktop Event Console', 'view' => 'Console' );
                                    ?>
                                    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $info['title'] ); ?>" data-view="<?php echo esc_attr( $info['view'] ); ?>" class="desktop-screen-img desktop-slide<?php echo $active_class; ?>">
                                    <?php
                                    $first_desk = false;
                                endforeach;
                            else :
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/desktop-screen.png" alt="Zinvos Desktop Event Console" data-view="Dashboard" class="desktop-screen-img desktop-slide active">
                            <?php endif; ?>
                        </div>
                        <div class="desktop-dots"></div>
                    </div>
                </div>

                <!-- Phone App Screen Slideshow -->
                <div class="phone">
                    <div class="phone-screen">
                        <div class="island"></div>
                        <div class="phone-slideshow">
                            <?php
                            $screen_files = array();
                            if ( ! empty( $all_files ) ) {
                                foreach ( $all_files as $file ) {
                                    if ( preg_match( '/^z(in|i)vos-screen.*\.(png|jpg|jpeg|webp)$/i', $file ) ) {
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

            <div class="journey-wrap" id="journeyWrap" style="--stage-accent: #3189CC;" data-active-stage="0">
                <div class="journey-tabs" role="tablist" aria-label="Event Lifecycle Stages">
                    <button class="journey-tab active" data-stage="0" id="journey-tab-0" role="tab" aria-selected="true" aria-controls="journey-panel-0"><span>01</span><b>Register</b></button>
                    <button class="journey-tab" data-stage="1" id="journey-tab-1" role="tab" aria-selected="false" aria-controls="journey-panel-1"><span>02</span><b>Communicate</b></button>
                    <button class="journey-tab" data-stage="2" id="journey-tab-2" role="tab" aria-selected="false" aria-controls="journey-panel-2"><span>03</span><b>Operate</b></button>
                    <button class="journey-tab" data-stage="3" id="journey-tab-3" role="tab" aria-selected="false" aria-controls="journey-panel-3"><span>04</span><b>Engage</b></button>
                    <button class="journey-tab" data-stage="4" id="journey-tab-4" role="tab" aria-selected="false" aria-controls="journey-panel-4"><span>05</span><b>Complete</b></button>
                </div>
                <div class="journey-content">
                    <div class="journey-copy">
                        <div class="journey-eyebrow-row">
                            <span class="journey-brand-dots" aria-hidden="true">
                                <span class="jdot-brand" style="background:#3189CC"></span>
                                <span class="jdot-brand" style="background:#4AA99C"></span>
                                <span class="jdot-brand" style="background:#7EBC2A"></span>
                            </span>
                            <span class="eyebrow" id="journeyEyebrow">Before the event</span>
                        </div>
                        <h3 id="journeyTitle">Registration without friction.</h3>
                        <p id="journeyText">Let attendees register through web, WhatsApp or mobile and keep every registration connected to the same attendee record.</p>
                        <div class="feature-list" id="journeyFeatures">
                            <div>Web registration</div>
                            <div>WhatsApp registration</div>
                            <div>Payments</div>
                            <div>QR confirmation</div>
                        </div>
                    </div>
                    <div class="journey-visual" id="journeyVisual">
                        <!-- Stage 0: Register (Creative Cards matching Web, WhatsApp, Payments, QR Confirmation) -->
                        <div class="journey-stage-panel active" data-stage="0" id="journey-panel-0" role="tabpanel" aria-labelledby="journey-tab-0">
                            <!-- Card 1: Web Registration -->
                            <div class="jcard jcard--web">
                                <div class="jcard-top">
                                    <div class="jbrowser-dots">
                                        <span class="jdot-red"></span>
                                        <span class="jdot-yellow"></span>
                                        <span class="jdot-green"></span>
                                        <span class="jbrowser-url">zinvos.io/register</span>
                                    </div>
                                    <span class="jbadge jbadge-teal"><span class="pulse-dot"></span> Live Portal</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Web Registration</b>
                                    <span class="jsub-tag">Self-Service</span>
                                </div>
                                <div class="jtier-selector">
                                    <span class="jtier-pill active">&#10003; Regular Pass</span>
                                    <span class="jtier-pill">Faculty / VIP</span>
                                </div>
                                <div class="jattendee-row">
                                    <div class="javatar-mini" style="background: linear-gradient(135deg, var(--teal), var(--blue));">AM</div>
                                    <div class="jattendee-meta">
                                        <span class="jattendee-name">Dr. Alex Morgan</span>
                                        <small class="jattendee-org">Harvard Med &bull; 1-Click Form</small>
                                    </div>
                                    <span class="jpill-status">Auto-filled</span>
                                </div>
                                <div class="jprogress-wrap">
                                    <div class="jprogress-info">
                                        <span>Capacity Filled</span>
                                        <b>84% (1,680 / 2,000)</b>
                                    </div>
                                    <div class="jprogress-track">
                                        <div class="jprogress-fill" style="width: 84%;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2: WhatsApp Registration -->
                            <div class="jcard jcard--wa">
                                <div class="jcard-top">
                                    <div class="jwa-header-info">
                                        <div class="jwa-logo-icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.png" alt="WhatsApp" class="jwa-logo-img">
                                        </div>
                                        <div>
                                            <div class="jwa-bot-name"><b>Zinvos Bot</b> <svg class="jwa-check" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#25a557" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
                                            <small class="jwa-status">Official Business</small>
                                        </div>
                                    </div>
                                    <span class="jbadge jbadge-wa">Instant</span>
                                </div>
                                <div class="jwa-bubble">
                                    <p>Hi Dr. Alex! &#128075; Confirm your delegate pass for <b>TechSummit 2026</b>.</p>
                                    <div class="jwa-quick-reply">
                                        <span class="jwa-btn">&#9889; 1-Tap Confirm</span>
                                    </div>
                                </div>
                                <div class="jwa-meta-row">
                                    <span class="jwa-confirmed-tag">&#10003; QR Pass Sent</span>
                                    <span class="jwa-time">10:42 AM <span class="wa-double-check">&#10003;&#10003;</span></span>
                                </div>
                            </div>

                            <!-- Card 3: Instant Payments -->
                            <div class="jcard jcard--pay">
                                <div class="jcard-top">
                                    <div class="jpay-header-info">
                                        <div class="jpay-icon">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                                        </div>
                                        <span class="jkicker">Payments</span>
                                    </div>
                                    <span class="jbadge jbadge-blue"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Paid</span>
                                </div>
                                <div class="jpay-amount-box">
                                    <div class="jpay-sum"><b>$199</b><small>.00</small></div>
                                    <div class="jpay-item">Early Bird Delegate</div>
                                </div>
                                <div class="jpay-card-row">
                                    <div class="jpay-method-pill">
                                        <span class="jpay-card-brand">VISA</span>
                                        <span>&bull;&bull;&bull;&bull; 4242</span>
                                    </div>
                                    <span class="jpay-receipt">Invoice #INV-8491</span>
                                </div>
                                <div class="jpay-connected-pill">
                                    <span class="jdot-connected"></span>
                                    <span>Connected to Attendee Record</span>
                                </div>
                            </div>

                            <!-- Card 4: QR Confirmation Pass -->
                            <div class="jcard jcard--qr">
                                <div class="jcard-top">
                                    <div class="jqr-header-left">
                                        <span class="jkicker">QR Confirmation</span>
                                        <span class="jevent-tag">GLOBAL MEDTECH 2026</span>
                                    </div>
                                    <span class="jbadge jbadge-orange">Pass Ready</span>
                                </div>
                                <div class="jpass-body">
                                    <div class="jpass-attendee">
                                        <div class="javatar-badge">AM</div>
                                        <div>
                                            <b>Dr. Alex Morgan</b>
                                            <span class="jrole-badge">Keynote</span>
                                        </div>
                                    </div>
                                    <div class="jqr-box">
                                        <div class="jqr-code-art">
                                            <svg width="66" height="66" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0" y="0" width="30" height="30" rx="4" fill="#11161a"/>
                                                <rect x="5" y="5" width="20" height="20" rx="2" fill="#ffffff"/>
                                                <rect x="9" y="9" width="12" height="12" rx="1.5" fill="#11161a"/>

                                                <rect x="70" y="0" width="30" height="30" rx="4" fill="#11161a"/>
                                                <rect x="75" y="5" width="20" height="20" rx="2" fill="#ffffff"/>
                                                <rect x="79" y="9" width="12" height="12" rx="1.5" fill="#11161a"/>

                                                <rect x="0" y="70" width="30" height="30" rx="4" fill="#11161a"/>
                                                <rect x="5" y="75" width="20" height="20" rx="2" fill="#ffffff"/>
                                                <rect x="9" y="79" width="12" height="12" rx="1.5" fill="#11161a"/>

                                                <rect x="36" y="6" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="48" y="6" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="58" y="10" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="36" y="18" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="46" y="24" width="8" height="6" rx="1" fill="#11161a"/>

                                                <rect x="6" y="36" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="18" y="36" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="28" y="42" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="10" y="48" width="8" height="6" rx="1" fill="#11161a"/>

                                                <circle cx="50" cy="50" r="14" fill="#4aa99c"/>
                                                <path d="M46 44h8l-8 12h8" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>

                                                <rect x="70" y="36" width="8" height="6" rx="1" fill="#11161a"/>
                                                <rect x="84" y="42" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="72" y="52" width="6" height="6" rx="1" fill="#11161a"/>

                                                <rect x="36" y="74" width="8" height="6" rx="1" fill="#11161a"/>
                                                <rect x="50" y="80" width="6" height="8" rx="1" fill="#11161a"/>
                                                <rect x="62" y="72" width="6" height="6" rx="1" fill="#11161a"/>
                                                <rect x="74" y="78" width="8" height="6" rx="1" fill="#11161a"/>
                                                <rect x="88" y="86" width="6" height="6" rx="1" fill="#11161a"/>
                                            </svg>
                                            <div class="jqr-laser-line"></div>
                                        </div>
                                        <div class="jqr-pass-meta">
                                            <span class="jqr-code-id">PASS #ZV-9824</span>
                                            <span class="jgate-text">Gate A &amp; B Authorized</span>
                                            <div class="jentry-speed">
                                                <span class="jentry-clock">&#9889; 1.8s Check-in</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stage 1: Communicate/Promote (Creative Cards matching WhatsApp Broadcast, Email Campaigns, SMS/Push Alerts, Promotion & Reminders) -->
                        <div class="journey-stage-panel" data-stage="1" id="journey-panel-1" role="tabpanel" aria-labelledby="journey-tab-1">
                            <!-- Card 1: WhatsApp Broadcasts -->
                            <div class="jcard jcard--comm-wa">
                                <div class="jcard-top">
                                    <div class="jcomm-header-info">
                                        <div class="jcomm-icon-wa">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.png" alt="WhatsApp" class="jwa-logo-img">
                                        </div>
                                        <span class="jkicker">WhatsApp Broadcast</span>
                                    </div>
                                    <span class="jbadge jbadge-teal"><span class="pulse-dot"></span> 98.4% Delivered</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Keynote Schedule Alert</b>
                                    <span class="jsub-tag">1,450 Delegates</span>
                                </div>
                                <div class="jwa-bubble">
                                    <p>&#128227; Day 1 Keynote begins in 30 mins at Hall A! Tap for live seat &amp; hall navigation.</p>
                                    <div class="jwa-quick-reply">
                                        <span class="jwa-btn">&#128506;&#65039; Hall A Seating Map</span>
                                    </div>
                                </div>
                                <div class="jprogress-wrap">
                                    <div class="jprogress-info">
                                        <span>1,428 / 1,450 Delivered</span>
                                        <b><span class="wa-double-check">&#10003;&#10003;</span> 1,390 Read</b>
                                    </div>
                                    <div class="jprogress-track">
                                        <div class="jprogress-fill" style="width: 98.4%;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2: Email Campaigns & Newsletters -->
                            <div class="jcard jcard--comm-email">
                                <div class="jcard-top">
                                    <div class="jcomm-header-info">
                                        <div class="jcomm-icon-email">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                        </div>
                                        <span class="jkicker">Email Campaign</span>
                                    </div>
                                    <span class="jbadge jbadge-blue"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> 72% Opens</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Event Guide &amp; Agenda</b>
                                    <span class="jemail-pill">3.2k Sent</span>
                                </div>
                                <div class="jemail-grid">
                                    <div class="jemail-stat">
                                        <b>72.4%</b>
                                        <small>Open Rate</small>
                                    </div>
                                    <div class="jemail-stat">
                                        <b>48.1%</b>
                                        <small>Click Rate</small>
                                    </div>
                                    <div class="jemail-stat">
                                        <b>0.02%</b>
                                        <small>Bounces</small>
                                    </div>
                                </div>
                                <div class="jemail-footer">
                                    <span class="jdot-connected"></span>
                                    <span>DKIM &amp; SPF Verified &bull; Zero Spam</span>
                                </div>
                            </div>

                            <!-- Card 3: Mobile Push & SMS Alerts -->
                            <div class="jcard jcard--comm-push">
                                <div class="jcard-top">
                                    <div class="jcomm-header-info">
                                        <div class="jcomm-icon-push">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                                        </div>
                                        <span class="jkicker">Mobile Push &amp; SMS</span>
                                    </div>
                                    <span class="jbadge jbadge-orange">Live Alert</span>
                                </div>
                                <div class="jpush-bubble">
                                    <div class="jpush-app-row">
                                        <span class="jpush-app-badge">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/zinvos-logo.svg" alt="Zinvos" class="jpush-app-logo">
                                        </span>
                                        <span class="jpush-time">Just now</span>
                                    </div>
                                    <b>&#9889; Session Room Change</b>
                                    <p>'AI in Medicine' moved to Main Hall. Doors open now.</p>
                                </div>
                                <div class="jpush-channels">
                                    <span class="jpush-pill">&#128241; 2.4k Push</span>
                                    <span class="jpush-pill">&#128172; 850 SMS</span>
                                    <span class="jpush-speed">&#9889; 0.8s Latency</span>
                                </div>
                            </div>

                            <!-- Card 4: Ticket Promotion & Reminders -->
                            <div class="jcard jcard--comm-promo">
                                <div class="jcard-top">
                                    <div class="jcomm-header-info">
                                        <div class="jcomm-icon-promo">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
                                        </div>
                                        <span class="jkicker">Ticket Promotion</span>
                                    </div>
                                    <span class="jbadge jbadge-pink"><span class="pulse-dot pulse-dot--pink"></span> Flash 24h</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Early Bird Closing Tonight</b>
                                    <span class="jsub-tag">Automated Blast</span>
                                </div>
                                <div class="jpromo-code-row">
                                    <span class="jpromo-code">EARLYBIRD20</span>
                                    <span class="jdiscount-pill">20% OFF</span>
                                </div>
                                <div class="jpromo-metrics">
                                    <div class="jpromo-metric-item">
                                        <b>+340 Tickets</b>
                                        <span>Sold Today</span>
                                    </div>
                                    <div class="jpromo-metric-item">
                                        <b>18.6% CTR</b>
                                        <span>Conversion</span>
                                    </div>
                                </div>
                                <div class="jpromo-footer">
                                    <span class="jcheck-icon">&#10003;</span>
                                    <span>Automated Abandoned Cart &amp; WhatsApp Reminder</span>
                                </div>
                            </div>
                        </div>

                        <!-- Stage 2: Operate / Onsite Operations -->
                        <div class="journey-stage-panel" data-stage="2" id="journey-panel-2" role="tabpanel" aria-labelledby="journey-tab-2">
                            <!-- Card 1: QR Scan Check-in -->
                            <div class="jcard jcard--ops-scan">
                                <div class="jcard-top">
                                    <div class="jops-header-info">
                                        <div class="jops-icon-scan">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/><line x1="7" y1="12" x2="17" y2="12"/></svg>
                                        </div>
                                        <span class="jkicker">QR Scan Check-in</span>
                                    </div>
                                    <span class="jbadge jbadge-teal"><span class="pulse-dot"></span> 1.8s Fast Scan</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Gate Check-in</b>
                                    <span class="jops-verified-tag">&#10003; Verified</span>
                                </div>
                                <div class="jops-scan-body">
                                    <div class="jops-scan-visual">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/operate (4).png" alt="QR Scan Check-in" class="jops-scan-photo">
                                        <div class="jops-laser-beam"></div>
                                    </div>
                                    <div class="jops-attendee-meta">
                                        <div class="jops-name">Dr. John Doe</div>
                                        <div class="jops-badge-id">#ZV-1034 &bull; Delegate</div>
                                        <div class="jops-gate-time">Main Gate A &bull; 9:54 AM</div>
                                    </div>
                                </div>
                                <div class="jops-status-pill">
                                    <span class="jops-dot-ok"></span>
                                    <span>Zero Queue Check &bull; Gate Cleared</span>
                                </div>
                            </div>

                            <!-- Card 2: Instant Badge Printing -->
                            <div class="jcard jcard--ops-print">
                                <div class="jcard-top">
                                    <div class="jops-header-info">
                                        <div class="jops-icon-print">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                                        </div>
                                        <span class="jkicker">Badge Printing</span>
                                    </div>
                                    <span class="jbadge jbadge-blue"><span class="jprint-pulse"></span> Auto-Print</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Thermal Lanyard Badge</b>
                                    <span class="jops-latency-tag">&#9889; 2.4s</span>
                                </div>
                                <div class="jops-printer-slot">
                                    <div class="jops-slot-bar">
                                        <span class="jops-slot-led"></span>
                                        <span class="jops-slot-model">Zebra ZD620 &bull; Lane 01</span>
                                    </div>
                                    <div class="jops-printed-badge">
                                        <div class="jops-badge-photo-wrap">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/operate (2).png" alt="Badge Printing" class="jops-badge-photo">
                                        </div>
                                        <div class="jops-badge-details">
                                            <div class="jops-badge-holder">Rielle Martin</div>
                                            <div class="jops-badge-company">McKinsey &amp; Company</div>
                                            <div class="jops-badge-tier">All-Access Pass</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jops-print-footer">
                                    <span class="jops-dispensed-text">&#10003; 1,420 Badges Printed Without Jam</span>
                                </div>
                            </div>

                            <!-- Card 3: Session Gate Control -->
                            <div class="jcard jcard--ops-gate">
                                <div class="jcard-top">
                                    <div class="jops-header-info">
                                        <div class="jops-icon-gate">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M12 4v16"/><circle cx="12" cy="12" r="2"/></svg>
                                        </div>
                                        <span class="jkicker">Gate &amp; Hall Control</span>
                                    </div>
                                    <span class="jbadge jbadge-teal">Entry Allowed &#10003;</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Main Hall</b>
                                    <span class="jops-rate-pill">42 scans/min</span>
                                </div>
                                <div class="jops-gate-capacity">
                                    <div class="jops-cap-row">
                                        <span>Capacity Utilization</span>
                                        <b>412 / 500 Seats (82%)</b>
                                    </div>
                                    <div class="jprogress-track">
                                        <div class="jprogress-fill" style="width: 82%;"></div>
                                    </div>
                                </div>
                                <div class="jops-gate-indicators">
                                    <div class="jops-indicator-chip optimal">
                                        <span class="jops-mini-dot"></span>
                                        <span>Gate A: Fast</span>
                                    </div>
                                    <div class="jops-indicator-chip optimal">
                                        <span class="jops-mini-dot"></span>
                                        <span>Gate B: Optimal</span>
                                    </div>
                                    <div class="jops-indicator-chip security">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                        <span>Anti-Passback</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4: Live Attendance Dashboard -->
                            <div class="jcard jcard--ops-dash">
                                <div class="jcard-top">
                                    <div class="jops-header-info">
                                        <div class="jops-icon-dash">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/></svg>
                                        </div>
                                        <span class="jkicker">Attendance Dashboard</span>
                                    </div>
                                    <span class="jbadge jbadge-orange"><span class="pulse-dot"></span> Live Sync</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Real-time Inflow</b>
                                    <span class="jops-dash-live">Online</span>
                                </div>
                                <div class="jops-dash-grid">
                                    <div class="jops-stat-item">
                                        <b>790</b>
                                        <small>Registered</small>
                                    </div>
                                    <div class="jops-stat-item highlight">
                                        <b>384</b>
                                        <small>Checked In</small>
                                    </div>
                                    <div class="jops-stat-item">
                                        <b>0</b>
                                        <small>Queues</small>
                                    </div>
                                </div>
                                <div class="jprogress-wrap">
                                    <div class="jprogress-info">
                                        <span>Turnout Progress</span>
                                        <b>48.6% Onsite</b>
                                    </div>
                                    <div class="jprogress-track">
                                        <div class="jprogress-fill" style="width: 48.6%; background: linear-gradient(90deg, var(--teal) 0%, var(--orange) 100%);"></div>
                                    </div>
                                </div>
                                <div class="jops-dash-footer">
                                    <span class="jops-sync-dot"></span>
                                    <span>Cloud Sync Active &bull; Offline Fallback Ready</span>
                                </div>
                            </div>
                        </div>

                        <!-- Stage 3: Engage / Session Engagement -->
                        <div class="journey-stage-panel" data-stage="3" id="journey-panel-3" role="tabpanel" aria-labelledby="journey-tab-3">
                            <!-- Card 1: Live Audience Polling -->
                            <div class="jcard jcard--eng-poll">
                                <div class="jcard-top">
                                    <div class="jeng-header-info">
                                        <div class="jeng-icon-poll">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                                        </div>
                                        <span class="jkicker">Live Audience Polling</span>
                                    </div>
                                    <span class="jbadge jbadge-teal"><span class="pulse-dot"></span> Voting Open</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Keynote Live Poll</b>
                                    <span class="jeng-live-pill">Live</span>
                                </div>
                                <div class="jeng-poll-question">"Will AI assist or replace clinical triage by 2030?"</div>
                                <div class="jeng-poll-options">
                                    <div class="jeng-poll-item winner">
                                        <div class="jeng-poll-label">
                                            <span>Assist Clinicians</span>
                                            <b>76%</b>
                                        </div>
                                        <div class="jeng-poll-bar">
                                            <div class="jeng-poll-fill" style="width: 76%;"></div>
                                        </div>
                                    </div>
                                    <div class="jeng-poll-item">
                                        <div class="jeng-poll-label">
                                            <span>Replace Routine Triage</span>
                                            <b>24%</b>
                                        </div>
                                        <div class="jeng-poll-bar">
                                            <div class="jeng-poll-fill secondary" style="width: 24%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jeng-poll-footer">
                                    <span>&#9889; 1,248 Votes &bull; 18 votes/sec</span>
                                </div>
                            </div>

                            <!-- Card 2: Speaker Q&A -->
                            <div class="jcard jcard--eng-qa">
                                <div class="jcard-top">
                                    <div class="jeng-header-info">
                                        <div class="jeng-icon-qa">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                                        </div>
                                        <span class="jkicker">Speaker Q&amp;A</span>
                                    </div>
                                    <span class="jbadge jbadge-blue"><span class="jeng-upvote-icon">&#9650;</span> 142 Upvotes</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Top Voted Question</b>
                                    <span class="jeng-status-mod">&#10003; Screen Ready</span>
                                </div>
                                <div class="jeng-qa-bubble">
                                    <div class="jeng-qa-author">
                                        <b>Dr. Maya Joseph</b>
                                        <span class="jeng-author-badge">Delegate</span>
                                    </div>
                                    <p class="jeng-qa-text">"How do we handle model bias across varied demographic datasets?"</p>
                                </div>
                                <div class="jeng-qa-footer">
                                    <span class="jeng-mic-pulse">&#127908;</span>
                                    <span>Live on Main Stage Screen</span>
                                </div>
                            </div>

                            <!-- Card 3: Session Feedback & Star Rating -->
                            <div class="jcard jcard--eng-rating">
                                <div class="jcard-top">
                                    <div class="jeng-header-info">
                                        <div class="jeng-icon-star">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                        </div>
                                        <span class="jkicker">Session Feedback</span>
                                    </div>
                                    <span class="jbadge jbadge-orange">&#9733; 4.9 / 5.0</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Audience Rating</b>
                                    <span class="jeng-score-pill">1.1k Ratings</span>
                                </div>
                                <div class="jeng-rating-box">
                                    <div class="jeng-stars-row">
                                        <span class="jeng-star filled">&#9733;</span>
                                        <span class="jeng-star filled">&#9733;</span>
                                        <span class="jeng-star filled">&#9733;</span>
                                        <span class="jeng-star filled">&#9733;</span>
                                        <span class="jeng-star filled">&#9733;</span>
                                        <span class="jeng-rating-num">4.92</span>
                                    </div>
                                    <div class="jeng-rating-metrics">
                                        <div class="jeng-metric-item">
                                            <span>Content:</span>
                                            <b>98% Positive</b>
                                        </div>
                                        <div class="jeng-metric-item">
                                            <span>Speaker:</span>
                                            <b>96% Superb</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="jeng-rating-quote">
                                    "&ldquo;Actionable benchmarks and exceptional delivery.&rdquo;"
                                </div>
                            </div>

                            <!-- Card 4: Gamified Leaderboard & Points -->
                            <div class="jcard jcard--eng-leaderboard">
                                <div class="jcard-top">
                                    <div class="jeng-header-info">
                                        <div class="jeng-icon-trophy">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.45 1-1 1H7v4h10v-4h-2c-.55 0-1-.45-1-1v-2.34"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2z"/></svg>
                                        </div>
                                        <span class="jkicker">Leaderboard Points</span>
                                    </div>
                                    <span class="jbadge jbadge-pink"><svg class="jeng-cup-anim" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg> Top 3</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Delegate Challenge</b>
                                    <span class="jeng-rank-pill">Active</span>
                                </div>
                                <div class="jeng-leader-list">
                                    <div class="jeng-leader-row first">
                                        <span class="jeng-rank-badge gold"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m2 4 3 12h14l3-12-6 7-4-7-4 7-6-7z"/><path d="M5 20h14"/></svg> 1</span>
                                        <span class="jeng-leader-name">Priya Sharma</span>
                                        <b class="jeng-leader-pts">2,850 pts</b>
                                    </div>
                                    <div class="jeng-leader-row">
                                        <span class="jeng-rank-badge silver"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg> 2</span>
                                        <span class="jeng-leader-name">Dr. John M.</span>
                                        <b class="jeng-leader-pts">2,640 pts</b>
                                    </div>
                                    <div class="jeng-leader-row">
                                        <span class="jeng-rank-badge bronze"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg> 3</span>
                                        <span class="jeng-leader-name">Alex Chen</span>
                                        <b class="jeng-leader-pts">2,410 pts</b>
                                    </div>
                                </div>
                                <div class="jeng-leader-footer">
                                    <span class="jeng-pts-earn"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg> +150 pts for session poll participation</span>
                                </div>
                            </div>
                        </div>

                        <!-- Stage 4: Complete / Post-Event Completion -->
                        <div class="journey-stage-panel" data-stage="4" id="journey-panel-4" role="tabpanel" aria-labelledby="journey-tab-4">
                            <!-- Card 1: Instant Certificates -->
                            <div class="jcard jcard--comp-cert">
                                <div class="jcard-top">
                                    <div class="jcomp-header-info">
                                        <div class="jcomp-icon-cert">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                                        </div>
                                        <span class="jkicker">Instant Certificates</span>
                                    </div>
                                    <span class="jbadge jbadge-teal"><span class="pulse-dot"></span> 100% Issued</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Digital Certificate</b>
                                    <span class="jcomp-cme-pill">16 CME Credits</span>
                                </div>
                                <div class="jcomp-cert-mockup">
                                    <div class="jcomp-cert-seal">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="#ffc21c"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    </div>
                                    <div class="jcomp-cert-info">
                                        <div class="jcomp-cert-title">CERTIFICATE OF ATTENDANCE</div>
                                        <div class="jcomp-cert-name">Dr. Rajan Janardhanan</div>
                                        <div class="jcomp-cert-event">Global Tech Summit 2026</div>
                                    </div>
                                </div>
                                <div class="jcomp-cert-footer">
                                    <span>&#10003; 1,200 PDFs Sent via WhatsApp &amp; Email</span>
                                </div>
                            </div>

                            <!-- Card 2: Verification Links -->
                            <div class="jcard jcard--comp-verify">
                                <div class="jcard-top">
                                    <div class="jcomp-header-info">
                                        <div class="jcomp-icon-verify">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                        </div>
                                        <span class="jkicker">Verification Links</span>
                                    </div>
                                    <span class="jbadge jbadge-blue">SHA-256 Valid</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Tamper-Proof Link</b>
                                    <span class="jcomp-secure-tag">Secured</span>
                                </div>
                                <div class="jcomp-verify-box">
                                    <div class="jcomp-url-row">
                                        <span class="jcomp-url-lock">&#128274;</span>
                                        <span class="jcomp-url-text">zinvos.io/verify/ZV-9824</span>
                                    </div>
                                    <div class="jcomp-hash-row">
                                        <span>HASH: 7f8a9...b4c2</span>
                                        <b>&#10003; Verified</b>
                                    </div>
                                </div>
                                <div class="jcomp-verify-checks">
                                    <div class="jcomp-check-item">&#10003; Attendance Minimum Met</div>
                                    <div class="jcomp-check-item">&#10003; Accredited Body Validated</div>
                                </div>
                            </div>

                            <!-- Card 3: Analytics Export -->
                            <div class="jcard jcard--comp-analytics">
                                <div class="jcard-top">
                                    <div class="jcomp-header-info">
                                        <div class="jcomp-icon-analytics">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/></svg>
                                        </div>
                                        <span class="jkicker">Analytics &amp; Insights</span>
                                    </div>
                                    <span class="jbadge jbadge-orange">&#128202; Executive Ready</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Conference ROI &amp; Metrics</b>
                                    <span class="jcomp-export-pill">&#128229; Export</span>
                                </div>

                                <!-- Key Metrics Row -->
                                <div class="jcomp-analytics-grid">
                                    <div class="jcomp-stat-cell">
                                        <b>94.8%</b>
                                        <small>Turnout</small>
                                    </div>
                                    <div class="jcomp-stat-cell highlight">
                                        <b>4.92&#9733;</b>
                                        <small>Rating</small>
                                    </div>
                                    <div class="jcomp-stat-cell">
                                        <b>1,450</b>
                                        <small>Delegates</small>
                                    </div>
                                </div>

                                <!-- Visual Graphs & Diagrams Grid -->
                                <div class="jcomp-visual-diagrams">
                                    <!-- Diagram 1: Donut Distribution (Channel Breakdown) -->
                                    <div class="jcomp-donut-card">
                                        <div class="jcomp-donut-wrap">
                                            <svg width="38" height="38" viewBox="0 0 36 36" class="jdonut-svg">
                                                <circle class="jdonut-bg" cx="18" cy="18" r="14" fill="none" stroke="rgba(17,22,26,0.06)" stroke-width="4"/>
                                                <!-- Web (62%) -->
                                                <circle class="jdonut-seg seg-web" cx="18" cy="18" r="14" fill="none" stroke="var(--teal)" stroke-width="4" stroke-dasharray="55 45" stroke-dashoffset="25"/>
                                                <!-- WhatsApp (26%) -->
                                                <circle class="jdonut-seg seg-wa" cx="18" cy="18" r="14" fill="none" stroke="var(--blue)" stroke-width="4" stroke-dasharray="23 77" stroke-dashoffset="70"/>
                                                <!-- Mobile App (12%) -->
                                                <circle class="jdonut-seg seg-app" cx="18" cy="18" r="14" fill="none" stroke="var(--orange)" stroke-width="4" stroke-dasharray="11 89" stroke-dashoffset="47"/>
                                            </svg>
                                            <span class="jdonut-center-val">95%</span>
                                        </div>
                                        <div class="jcomp-donut-legend">
                                            <div class="jleg-item"><span class="jleg-dot teal"></span> Web 62%</div>
                                            <div class="jleg-item"><span class="jleg-dot blue"></span> WA 26%</div>
                                            <div class="jleg-item"><span class="jleg-dot orange"></span> App 12%</div>
                                        </div>
                                    </div>

                                    <!-- Diagram 2: Inflow Bar Histogram -->
                                    <div class="jcomp-barchart-card">
                                        <div class="jbarchart-header">
                                            <span>Session Inflow</span>
                                            <span class="jbar-peak-badge">&#9889; Peak 13h</span>
                                        </div>
                                        <div class="jbarchart-bars">
                                            <div class="jbar-col">
                                                <div class="jbar-track"><div class="jbar-fill" style="height: 48%;"></div></div>
                                                <small>09h</small>
                                            </div>
                                            <div class="jbar-col">
                                                <div class="jbar-track"><div class="jbar-fill" style="height: 75%;"></div></div>
                                                <small>11h</small>
                                            </div>
                                            <div class="jbar-col peak">
                                                <div class="jbar-track"><div class="jbar-fill peak" style="height: 98%;"></div></div>
                                                <small>13h</small>
                                            </div>
                                            <div class="jbar-col">
                                                <div class="jbar-track"><div class="jbar-fill" style="height: 82%;"></div></div>
                                                <small>15h</small>
                                            </div>
                                            <div class="jbar-col">
                                                <div class="jbar-track"><div class="jbar-fill" style="height: 60%;"></div></div>
                                                <small>17h</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Diagram 3: Engagement Trend Spline Wave -->
                                <div class="jcomp-trend-row">
                                    <div class="jcomp-trend-meta">
                                        <span>Engagement Velocity</span>
                                        <b>+38% vs prev</b>
                                    </div>
                                    <div class="jcomp-trend-graph">
                                        <svg viewBox="0 0 200 24" preserveAspectRatio="none" class="jtrend-svg">
                                            <defs>
                                                <linearGradient id="jtrendGrad" x1="0" y1="0" x2="0" y2="1">
                                                    <stop offset="0%" stop-color="#4aa99c" stop-opacity="0.35"/>
                                                    <stop offset="100%" stop-color="#3189cc" stop-opacity="0.02"/>
                                                </linearGradient>
                                            </defs>
                                            <path d="M0,20 Q35,18 65,12 T125,8 T165,4 T200,2 L200,24 L0,24 Z" fill="url(#jtrendGrad)"/>
                                            <path d="M0,20 Q35,18 65,12 T125,8 T165,4 T200,2" fill="none" stroke="var(--teal)" stroke-width="1.8" stroke-linecap="round"/>
                                            <circle cx="200" cy="2" r="2.5" fill="var(--teal)" class="jtrend-pulse-dot"/>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Bottom Export Controls -->
                                <div class="jcomp-formats-row">
                                    <span class="jcomp-fmt pdf">PDF Summary</span>
                                    <span class="jcomp-fmt csv">CSV Raw Logs</span>
                                    <span class="jcomp-fmt xls">Excel Sheet</span>
                                </div>
                            </div>

                            <!-- Card 4: Attendee History & CRM Sync -->
                            <div class="jcard jcard--comp-history">
                                <div class="jcard-top">
                                    <div class="jcomp-header-info">
                                        <div class="jcomp-icon-history">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        </div>
                                        <span class="jkicker">Attendee History</span>
                                    </div>
                                    <span class="jbadge jbadge-pink"><span class="pulse-dot"></span> 360&deg; Profile</span>
                                </div>
                                <div class="jcard-title-row">
                                    <b>Connected Journey</b>
                                    <span class="jcomp-sync-pill">&#10003; Synced</span>
                                </div>
                                <div class="jcomp-timeline">
                                    <div class="jcomp-step done">
                                        <span class="jcomp-step-dot"></span>
                                        <span>Registered via WhatsApp</span>
                                    </div>
                                    <div class="jcomp-step done">
                                        <span class="jcomp-step-dot"></span>
                                        <span>Gate A Checked In (1.8s)</span>
                                    </div>
                                    <div class="jcomp-step done">
                                        <span class="jcomp-step-dot"></span>
                                        <span>Polls &amp; Q&amp;A Active</span>
                                    </div>
                                    <div class="jcomp-step done">
                                        <span class="jcomp-step-dot"></span>
                                        <span>Verified Certificate Issued</span>
                                    </div>
                                </div>
                                <div class="jcomp-crm-footer">
                                    <span class="jcomp-crm-dot"></span>
                                    <span>Sync to HubSpot, Salesforce &amp; Webhooks</span>
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
                                    View Details
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
                        <div class="conf-bottom"><span>Kollam, Kerala</span><a href="<?php echo esc_url( home_url('/events') ); ?>">View Details <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></a></div>
                    </article>
                    <article class="conf">
                        <div>
                            <div class="conf-top"><span class="tag tag--upcoming">Upcoming</span><span class="date">JAN 18&ndash;20</span></div>
                            <h3>Research &amp; Innovation Summit</h3>
                        </div>
                        <div class="conf-bottom"><span>Dubai, UAE</span><a href="<?php echo esc_url( home_url('/events') ); ?>">View Details <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></a></div>
                    </article>
                    <article class="conf">
                        <div>
                            <div class="conf-top"><span class="tag tag--past">Past</span><span class="date">MAR 06&ndash;08</span></div>
                            <h3>National Professional Congress</h3>
                        </div>
                        <div class="conf-bottom"><span>Bengaluru, India</span><a href="<?php echo esc_url( home_url('/events') ); ?>">View Details <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></a></div>
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
                            <h3><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">How WhatsApp Integration Streamlines Onsite Registrations</a></h3>
                            <p>Discover how instant messaging automation reduces check-in queues and keeps attendees informed in real-time.</p>
                            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="blog-read-more">Read Article &rarr;</a>
                        </div>
                    </article>
                    <article class="blog-card">
                        <div class="blog-card-body">
                            <div class="blog-meta"><span class="blog-cat">Conferences</span><span class="blog-date">AUG 15, 2026</span></div>
                            <h3><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">The Future of Medical &amp; CME Conference Management</a></h3>
                            <p>Key strategies for managing complex multi-hall scientific tracks, speaker schedules, and instant credit tracking.</p>
                            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="blog-read-more">Read Article &rarr;</a>
                        </div>
                    </article>
                    <article class="blog-card">
                        <div class="blog-card-body">
                            <div class="blog-meta"><span class="blog-cat">Product Update</span><span class="blog-date">JUL 30, 2026</span></div>
                            <h3><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Automating Post-Event Certificate Distribution with QR Verification</a></h3>
                            <p>Generate and distribute tamper-proof digital certificates automatically upon session completion.</p>
                            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="blog-read-more">Read Article &rarr;</a>
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
