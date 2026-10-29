<?php
/**
 * Template Name: Contact Page
 *
 * @package Zinvos_V2
 */

get_header();
?>

<main id="primary" class="site-main contact-page-main">

    <!-- Hero Header with inner-nav -->
    <section class="inner-hero contact-hero">

        <div class="container inner-hero-inner">
            <div class="breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i style="font-style:normal;opacity:.45">→</i>
                <span>Contact Us</span>
            </div>

            <div class="eyebrow">Get in Touch</div>
            <h1>Contact Zinvos</h1>
            <p class="lead">
                Have questions about our event technology, white-label solutions, or need a live demo?
                Our team is ready to assist you.
            </p>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">

                <!-- Left Column: Contact Cards -->
                <div class="contact-info-col">
                    
                    <!-- Direct Contact Card -->
                    <div class="contact-card contact-card--info">
                        <div class="contact-card__eyebrow">Direct Contact</div>
                        <h3>Reach Out Directly</h3>
                        <p>Talk to our team via phone, WhatsApp, or email for quick support and inquiries.</p>

                        <ul class="contact-list">
                            <li>
                                <div class="contact-icon contact-icon--green">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                </div>
                                <div>
                                    <small>Phone Support</small>
                                    <a href="tel:+917994286660">+91 799 428 66 60</a>
                                </div>
                            </li>

                            <li>
                                <div class="contact-icon contact-icon--green">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.066 7.926c0 1.396.363 2.759 1.052 3.953L.055 16l4.204-1.102a7.868 7.868 0 0 0 3.732.946h.003c4.367 0 7.927-3.558 7.929-7.928.001-2.117-.822-4.108-2.322-5.59z"/>
                                    </svg>
                                </div>
                                <div>
                                    <small>WhatsApp Chat</small>
                                    <a href="https://wa.me/917994286660" target="_blank" rel="noopener noreferrer">+91 799 428 66 60</a>
                                </div>
                            </li>

                            <li>
                                <div class="contact-icon contact-icon--blue">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                    </svg>
                                </div>
                                <div>
                                    <small>Email Address</small>
                                    <a href="mailto:hello@sprdh.com">hello@sprdh.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Registered Office Card -->
                    <div class="contact-card contact-card--office">
                        <div class="contact-card__eyebrow">Registered Office</div>
                        <h3>SPRDH Solutions Private Limited.</h3>
                        <div class="contact-office-item">
                            <div class="contact-icon contact-icon--orange">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                            </div>
                            <div class="contact-office-text">
                                <address class="contact-address">
                                    Suit 506, 39/2475-B1, LR Towers,<br>
                                    SJRRA 104, South Janatha Road, Palarivattom,<br>
                                    Kochi, Kerala, India, 682 025
                                </address>
                                <div class="contact-office-gst">
                                    GST Number : <strong>32ABICS3831R1ZV</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- White Label Custom Solution Card -->
                    <div class="contact-card contact-card--dark">
                        <div class="contact-card__eyebrow">Custom Solutions</div>
                        <h3>Looking For Something Else?</h3>
                        <p>
                            Custom white-labeled mobile apps for your conferences. Tailored to fit your brand identity,
                            providing a paperless, real-time updated experience for your attendees.
                        </p>
                    </div>

                    <!-- Connect & Download Apps Card -->
                    <div class="contact-card contact-card--apps">
                        <div class="contact-card__eyebrow">Apps &amp; Social</div>
                        <h3>Download Zinvos App</h3>
                        <div class="contact-apps-grid">
                            <a href="https://apps.apple.com/in/app/zinvos/id6467652614" class="contact-app-btn" target="_blank" rel="noopener">
                                <svg width="22" height="22" fill="currentColor" viewBox="0 0 22.773 22.773">
                                    <path d="M15.769 0h.162c.13 1.606-.483 2.806-1.228 3.675-.731.863-1.732 1.7-3.351 1.573-.108-1.583.506-2.694 1.25-3.561C13.292.879 14.557.16 15.769 0zM20.67 16.716v.045c-.455 1.378-1.104 2.559-1.896 3.655-.723.995-1.609 2.334-3.191 2.334-1.367 0-2.275-.879-3.676-.903-1.482-.024-2.297.735-3.652.926h-.462c-.995-.144-1.798-.932-2.383-1.642-1.725-2.098-3.058-4.808-3.306-8.276v-1.019c.105-2.482 1.311-4.5 2.914-5.478.846-.52 2.009-.963 3.304-.765.555.086 1.122.276 1.619.464.471.181 1.06.502 1.618.485.378-.011.754-.208 1.135-.347 1.116-.403 2.21-.865 3.652-.648 1.733.262 2.963 1.032 3.723 2.22-1.466.933-2.625 2.339-2.427 4.74.176 2.181 1.444 3.457 3.028 4.209z"/>
                                </svg>
                                <span><small>Download on</small><strong>App Store</strong></span>
                            </a>
                            <a href="https://play.google.com/store/apps/details?id=com.app.zinvos" class="contact-app-btn" target="_blank" rel="noopener">
                                <svg width="22" height="22" fill="currentColor" viewBox="0 0 505.145 505.145">
                                    <path d="M68.541 164.715h-1.294c-16.588 0-30.113 13.568-30.113 30.113v131.107c0 16.61 13.525 30.134 30.113 30.134h1.316c16.588 0 30.113-13.568 30.113-30.134V194.827c-.022-16.544-13.568-30.112-30.135-30.112zM113.085 376.54c0 15.229 12.446 27.632 27.675 27.632h29.574v70.817c0 16.631 13.568 30.156 30.113 30.156h1.294c16.61 0 30.156-13.546 30.156-30.156v-70.817h41.33v70.817c0 16.631 13.611 30.156 30.156 30.156h1.273c16.609 0 30.134-13.546 30.134-30.156v-70.817h29.595c15.207 0 27.654-12.403 27.654-27.632V169.525H113.085V376.54zM322.041 43.983l23.491-36.26c1.51-2.287.841-5.414-1.467-6.903-2.286-1.51-5.414-.884-6.903 1.467l-24.353 37.512c-18.27-7.485-38.676-11.691-60.226-11.691-21.571 0-41.934 4.206-60.247 11.691l-24.31-37.512C166.538-.064 163.388-.69 161.08.82c-2.308 1.488-2.977 4.616-1.467 6.903l23.512 36.26c-42.387 20.773-70.968 59.924-70.968 104.834 0 2.761.173 5.479.41 8.175H392.62c.237-2.696.388-5.414.388-8.175.001-44.91-28.602-84.061-70.967-104.834zm-134.386 64.928c-7.442 0-13.482-5.997-13.482-13.46 0-7.463 6.04-13.439 13.482-13.439 7.485 0 13.482 5.975 13.482 13.439s-6.04 13.46-13.482 13.46zm129.835 0c-7.442 0-13.482-5.997-13.482-13.46 0-7.463 6.04-13.439 13.482-13.439 7.463 0 13.46 5.975 13.46 13.439 0 7.463-5.997 13.46-13.46 13.46zM437.876 164.715h-1.251c-16.588 0-30.156 13.568-30.156 30.113v131.107c0 16.61 13.59 30.134 30.156 30.134h1.273c16.609 0 30.113-13.568 30.113-30.134V194.827c0-16.544-13.547-30.112-30.135-30.112z"/>
                                </svg>
                                <span><small>Get it on</small><strong>Google Play</strong></span>
                            </a>
                        </div>

                        <div class="contact-social-row">
                            <small>Follow SPRDH:</small>
                            <a href="https://www.facebook.com/sprdh" target="_blank" rel="noopener">Facebook ↗</a>
                            <a href="https://in.linkedin.com/company/sprdh-technologies" target="_blank" rel="noopener">LinkedIn ↗</a>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Contact Form -->
                <div class="contact-form-col">
                    <div class="contact-form-card">
                        <div class="contact-card__eyebrow">Send Message</div>
                        <h2>Get in Touch with Us</h2>
                        <p>Fill out the form below and our team will get back to you within 24 hours.</p>

                        <?php
                        $cf7_shortcode = do_shortcode('[contact-form-7 id="080138a" title="Contact Us"]');
                        if ( strpos($cf7_shortcode, '[contact-form-7') === false && !empty(trim($cf7_shortcode)) ) :
                            echo $cf7_shortcode;
                        else :
                        ?>
                            <!-- Standalone Contact Form -->
                            <form class="zinvos-contact-form" id="contactForm">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="contact-name">Your Name *</label>
                                        <input type="text" id="contact-name" name="your-name" placeholder="John Doe" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact-email">Email Address *</label>
                                        <input type="email" id="contact-email" name="your-email" placeholder="john@example.com" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="contact-phone">Phone / WhatsApp *</label>
                                        <input type="tel" id="contact-phone" name="your-phone" placeholder="+91 98765 43210" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact-subject">Inquiry Type</label>
                                        <select id="contact-subject" name="your-subject">
                                            <option value="General Inquiry">General Inquiry</option>
                                            <option value="Book a Demo">Book a Demo</option>
                                            <option value="White-Label Partnership">White-Label Partnership</option>
                                            <option value="Pricing &amp; Plans">Pricing &amp; Plans</option>
                                            <option value="Support">Support</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group full-width">
                                    <label for="contact-message">Your Message *</label>
                                    <textarea id="contact-message" name="your-message" rows="5" placeholder="Tell us about your event requirements..." required></textarea>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn primary submit-btn">
                                        Send Message <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span>
                                    </button>
                                </div>

                                <div class="form-success-msg" id="contactSuccessMsg" style="display:none;">
                                    Thank you! Your message has been sent successfully. We will get back to you shortly.
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();
