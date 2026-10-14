<?php
/**
 * Template Name: About Us
 *
 * @package Zinvos_V2
 */

get_header();
?>

<main class="za-page">

  <!-- HERO SECTION -->
  <section class="za-hero">
    <div class="za-container za-hero__grid">
      <div>
        <div class="za-eyebrow"><span class="za-dots"></span>Zinvos About</div>
        <h1>Powering Next-Gen <strong>Conferences &amp; Events</strong></h1>
        <p class="za-hero__copy">
          Zinvos is the complete conference technology platform connecting web, WhatsApp, and mobile. From multi-channel registration and automated WhatsApp updates to sub-2-second QR check-in, live audience engagement, and verified certificates — we bring every stage of the attendee journey into one unified system.
        </p>
        <div class="za-actions">
          <a class="za-btn za-btn--dark" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Book a Demo ↗</a>
          <a class="za-btn za-btn--light" href="<?php echo esc_url( home_url( '/platform' ) ); ?>">Explore Platform</a>
        </div>
      </div>

      <div class="za-hero__visual" aria-label="Zinvos Platform Ecosystem">
        <div class="za-hero__center"><span>Connected Event Ecosystem</span></div>
        <div class="za-float za-float--a"><small>Metric 01</small><strong>200+ Conferences</strong></div>
        <div class="za-float za-float--b"><small>Metric 02</small><strong>500k+ Delegates</strong></div>
        <div class="za-float za-float--c"><small>Performance</small><strong>&lt; 1.8s Fast Scan</strong></div>
        <div class="za-float za-float--d"><small>Delivery</small><strong>98% WhatsApp Open</strong></div>
      </div>
    </div>
  </section>

  <!-- MISSION & VISION SECTION -->
  <section class="za-section za-section--white" id="mission-vision">
    <div class="za-container">
      <div class="za-section__head">
        <h2>Driven by Mission, Guided by Vision</h2>
        <p>We build event technology that empowers organizers, delights delegates, and elevates conference management standards.</p>
      </div>
      <div class="za-mv__grid">
        <div class="za-mv-card">
          <div class="za-mv-icon za-mv-icon--green">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"/>
              <path d="M12 16l4-4-4-4"/>
              <path d="M8 12h8"/>
            </svg>
          </div>
          <h3>Our Mission</h3>
          <p>
            Our mission is to transform event management with a connected platform that streamlines every phase — planning, registration, delegate communication, onsite execution, and post-event analysis. We focus on efficiency, scalability, and zero-friction technology so organizers deliver seamless experiences.
          </p>
        </div>

        <div class="za-mv-card">
          <div class="za-mv-icon za-mv-icon--blue">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/>
              <path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-3.05 11a22.35 22.35 0 0 1-3.95 2z"/>
            </svg>
          </div>
          <h3>Our Vision</h3>
          <p>
            We envision a future where corporate conferences, medical summits, trade expos, and academic conventions run effortlessly on one unified software platform. By setting new benchmarks in WhatsApp integration, mobile interactivity, and real-time operations, Zinvos empowers event teams globally.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- WHAT WE OFFER (CAPABILITIES GRID) -->
  <section class="za-section" id="capabilities">
    <div class="za-container">
      <div class="za-section__head">
        <h2>Core Technology Across Every Zinvos Event</h2>
        <p>Zinvos combines enterprise registration software with WhatsApp broadcast automation, fast gate control, and attendee mobile apps.</p>
      </div>
      <div class="za-capabilities">
        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Registration</small>
          <h3>Multi-Channel Registration</h3>
          <p>Accept registrations through web, WhatsApp, or mobile app while keeping attendee records connected in one unified system.</p>
        </article>

        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Communication</small>
          <h3>WhatsApp Broadcasts &amp; Pass Delivery</h3>
          <p>Send instant schedule updates, badge QR passes, and personalized announcements via WhatsApp with an industry-leading 98% open rate.</p>
        </article>

        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Onsite Operations</small>
          <h3>Sub-2-Second QR Check-In</h3>
          <p>Scan delegate QR codes in under 1.8 seconds, print custom badges instantly, and manage entry flow across multiple gates.</p>
        </article>

        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Mobile App</small>
          <h3>Interactive Delegate App</h3>
          <p>Keep delegates engaged with multi-track schedules, speaker biographies, session ratings, and real-time push alerts.</p>
        </article>

        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Audience Engagement</small>
          <h3>Live Polling &amp; Q&amp;A</h3>
          <p>Power real-time audience interaction with moderated Q&amp;A, live polls, session feedback, and gamified leaderboards.</p>
        </article>

        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Post Event</small>
          <h3>Automated QR Certificates</h3>
          <p>Generate verified digital attendance certificates automatically based on attendance criteria with instant PDF export.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- EVENT SECTORS SERVED -->
  <section class="za-section za-section--white" id="solutions">
    <div class="za-container">
      <div class="za-section__head">
        <h2>Built for Every Conferencing Sector</h2>
        <p>Whether managing a medical summit, academic convention, or corporate brand expo — Zinvos adapts to your workflow.</p>
      </div>

      <div class="za-capabilities">
        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Academic</small>
          <h3>Academic &amp; Scientific Summits</h3>
          <p>Manage multi-hall track schedules, abstract submissions, speaker agendas, and academic delegate registrations seamlessly.</p>
        </article>

        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Medical</small>
          <h3>Medical &amp; CME Conferences</h3>
          <p>Track CME credit attendance, verify specialist delegate credentials, and deliver instant attendance certificates.</p>
        </article>

        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Corporate</small>
          <h3>Corporate Events &amp; Launches</h3>
          <p>Deliver premium branded check-in experiences, exhibitor lead tracking, and VIP delegate badge management.</p>
        </article>

        <article class="za-capability">
          <span class="za-capability__accent"></span>
          <small>Associations</small>
          <h3>Associations &amp; Societies</h3>
          <p>Synchronize member directories, manage recurring annual conventions, and streamline attendee communications.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- WHY CHOOSE ZINVOS SECTION -->
  <section class="za-section" id="why-choose">
    <div class="za-container">
      <div class="za-why__grid">
        <div>
          <div class="za-eyebrow"><span class="za-dots"></span>Why Choose Zinvos</div>
          <h2>Use Zinvos <strong>your way.</strong></h2>
          <p class="za-why__lead">
            Start independently, bring Zinvos in for larger conferences, or offer the platform under your own brand through flexible deployment models.
          </p>
        </div>

        <div class="za-pillars-list">
          <div class="za-pillar-item">
            <div class="za-pillar-badge">01</div>
            <div>
              <h5>Self-Serve Platform</h5>
              <p>Create your event, configure registration workflows, and launch independently without waiting for a sales process.</p>
            </div>
          </div>

          <div class="za-pillar-item">
            <div class="za-pillar-badge">02</div>
            <div>
              <h5>Full Managed Services</h5>
              <p>For major conferences and medical summits, our onsite team handles gate scanners, badge printers, and technical operations.</p>
            </div>
          </div>

          <div class="za-pillar-item">
            <div class="za-pillar-badge">03</div>
            <div>
              <h5>White-Label Partner Program</h5>
              <p>Event management agencies can run Zinvos fully under their own brand, logo, and domain while we support behind the scenes.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FREQUENTLY ASKED QUESTIONS (FAQ) -->
  <section class="za-section za-section--white" id="faq">
    <div class="za-container">
      <div class="za-section__head text-center">
        <h2>Frequently Asked Questions</h2>
        <p>Common questions about Zinvos conference technology and event capabilities.</p>
      </div>

      <div class="za-faq-accordion">
        <div class="za-faq-item active">
          <button class="za-faq-question" type="button">
            <span>What is Zinvos?</span>
            <span class="za-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </span>
          </button>
          <div class="za-faq-answer">
            <p>Zinvos is the complete conference technology platform connecting web, WhatsApp, and mobile to streamline registration, check-ins, scheduling, attendee engagement, and verified certificates.</p>
          </div>
        </div>

        <div class="za-faq-item">
          <button class="za-faq-question" type="button">
            <span>Who can use Zinvos?</span>
            <span class="za-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </span>
          </button>
          <div class="za-faq-answer">
            <p>Corporates, medical associations, universities, trade show organizers, and event agencies can use Zinvos for conferences, exhibitions, seminars, and hybrid events of any size.</p>
          </div>
        </div>

        <div class="za-faq-item">
          <button class="za-faq-question" type="button">
            <span>How does WhatsApp integration work?</span>
            <span class="za-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </span>
          </button>
          <div class="za-faq-answer">
            <p>Delegates receive instant registration confirmations, event updates, and QR passes directly on WhatsApp with 98% open rates — eliminating the need for mandatory app downloads.</p>
          </div>
        </div>

        <div class="za-faq-item">
          <button class="za-faq-question" type="button">
            <span>What features does Zinvos provide for onsite operations?</span>
            <span class="za-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </span>
          </button>
          <div class="za-faq-answer">
            <p>Zinvos provides sub-2-second QR scan check-in, instant badge printing, gate control, session tracking, and real-time attendance dashboards.</p>
          </div>
        </div>

        <div class="za-faq-item">
          <button class="za-faq-question" type="button">
            <span>Can event management companies white-label Zinvos?</span>
            <span class="za-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </span>
          </button>
          <div class="za-faq-answer">
            <p>Yes! Through the Zinvos Partner Program, event management companies and agencies can deliver our technology under their own brand name and domain.</p>
          </div>
        </div>

        <div class="za-faq-item">
          <button class="za-faq-question" type="button">
            <span>Is Zinvos suitable for hybrid events?</span>
            <span class="za-faq-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </span>
          </button>
          <div class="za-faq-answer">
            <p>Yes! Zinvos seamlessly connects in-person and virtual attendees, maintaining a unified attendee database for registration, engagement, and reporting.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA BANNER (UNCHANGED EXACT STYLE) -->
  <section class="za-section za-cta-section">
    <div class="za-container">
      <div class="za-cta-card">
        <h2>Ready to Elevate <strong>Your Next Conference?</strong></h2>
        <p>Book a live demo with our team and discover how Zinvos connects registration, onsite check-in, WhatsApp updates, and engagement.</p>
        <div class="za-cta-actions">
          <a class="za-btn za-btn--primary" href="<?php echo esc_url( home_url( '/contact-us' ) ); ?>">Book a Demo ↗</a>
          <a class="za-btn za-btn--secondary" href="<?php echo esc_url( home_url( '/partners' ) ); ?>">Partner With Us</a>
        </div>
      </div>
    </div>
  </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const faqItems = document.querySelectorAll('.za-faq-item');
  faqItems.forEach(item => {
    const btn = item.querySelector('.za-faq-question');
    btn.addEventListener('click', () => {
      const isActive = item.classList.contains('active');
      faqItems.forEach(i => i.classList.remove('active'));
      if (!isActive) {
        item.classList.add('active');
      }
    });
  });
});
</script>

<?php
get_footer();
