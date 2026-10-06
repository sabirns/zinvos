document.addEventListener('DOMContentLoaded', function () {
    /* --- 1. Journey Stage Tabs Data & Switching --- */
    const stagesData = [
        {
            stage: "01",
            eyebrow: "Before the event",
            title: "Registration without friction.",
            text: "Let attendees register through web, WhatsApp or mobile and keep every registration connected to the same attendee record.",
            features: ["Web registration", "WhatsApp registration", "Payments", "QR confirmation"],
            stackA: { kicker: "Web", title: "Registration", badge: "Live", sub: "+1,280 delegates online", bar: "82%" },
            stackB: { kicker: "WhatsApp", title: "Confirmed ✓", badge: "Instant", msg: "QR Pass sent to attendee" },
            stackC: { kicker: "Attendee profile", title: "QR Pass Ready", badge: "Verified", icon: '<div class="card-mini-qr"></div>', code: "#ZV-9824", sub: "Entry Gate Authorized" }
        },
        {
            stage: "02",
            eyebrow: "Communicate & Promote",
            title: "Reach every delegate and promote with impact.",
            text: "Send automated schedule updates, marketing campaigns, badge QR passes, and personalized announcements via WhatsApp, email, and mobile push.",
            features: ["WhatsApp Broadcasts", "Email Campaigns & Newsletters", "SMS & Push Alerts", "Promotion & Ticket Reminders"],
            stackA: { kicker: "WhatsApp", title: "Broadcast Sent", badge: "Delivered", sub: "1,450 messages sent", bar: "98%" },
            stackB: { kicker: "Delivery", title: "98% Open Rate", badge: "Active", msg: "Campaign metrics tracking" },
            stackC: { kicker: "Promote", title: "Campaign Active", badge: "Scheduled", icon: '<div class="card-mini-icon icon-bullseye">🎯</div>', code: "CAMPAIGN #02", sub: "Reach: 12.4k Delegates" }
        },
        {
            stage: "03",
            eyebrow: "Onsite Operations",
            title: "Zero queues at entry counters.",
            text: "Scan delegate QR codes in under 2 seconds, auto-print badges, and monitor live venue capacity across multiple entry gates.",
            features: ["QR Scan Check-in", "Instant Badge Printing", "Session Gate Control", "Live Attendance Dashboard"],
            stackA: { kicker: "Scanner", title: "Checked In ✓", badge: "1.8 sec", sub: "Main Hall Gate A", bar: "94%" },
            stackB: { kicker: "Printer", title: "Badge Printing", badge: "Printing", msg: "Lanyard badge queued" },
            stackC: { kicker: "Gate 1", title: "Flow Normal", badge: "Optimal", icon: '<div class="card-mini-icon icon-scanner">⚡</div>', code: "GATE-01 PASS", sub: "1.8s Fast Check-in" }
        },
        {
            stage: "04",
            eyebrow: "Session Engagement",
            title: "Turn audience into active participants.",
            text: "Power interactive Q&A, live polls, speaker ratings, and gamified leaderboards right inside the delegate mobile app.",
            features: ["Live Audience Polling", "Speaker Q&A", "Session Feedback", "Leaderboard Points"],
            stackA: { kicker: "Poll", title: "1,248 Votes", badge: "Poll Open", sub: "89% participation", bar: "89%" },
            stackB: { kicker: "Q&A", title: "Question Posted", badge: "Top Voted", msg: "Approved by moderator" },
            stackC: { kicker: "Session", title: "Rating 4.9★", badge: "Keynote", icon: '<div class="card-mini-icon icon-star">★</div>', code: "SCORE 4.9 / 5.0", sub: "1,120 Attendee Ratings" }
        },
        {
            stage: "05",
            eyebrow: "Post-Event Completion",
            title: "Automated certificates & analytics.",
            text: "Generate verified digital attendance certificates instantly based on check-in rules and export comprehensive event analytics.",
            features: ["Instant Certificates", "Verification Links", "Analytics Export", "Attendee History"],
            stackA: { kicker: "Certificate", title: "Generated ✓", badge: "Auto Sent", sub: "1,200 PDF certificates", bar: "100%" },
            stackB: { kicker: "Download", title: "Ready", badge: "Verified", msg: "SHA-256 secure hash" },
            stackC: { kicker: "Analytics", title: "Report Exported", badge: "Complete", icon: '<div class="card-mini-icon icon-doc">📄</div>', code: "EXECUTIVE REPORT", sub: "PDF & CSV Downloaded" }
        }
    ];

    const journeyTabs = document.querySelectorAll('.journey-tab');
    const journeyEyebrow = document.getElementById('journeyEyebrow');
    const journeyTitle = document.getElementById('journeyTitle');
    const journeyText = document.getElementById('journeyText');
    const journeyFeatures = document.getElementById('journeyFeatures');

    const stackA = document.querySelector('.stack-a');
    const stackB = document.querySelector('.stack-b');
    const stackC = document.querySelector('.stack-c');

    if (journeyTabs.length && journeyTitle) {
        journeyTabs.forEach((tab, index) => {
            tab.addEventListener('click', function () {
                journeyTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const data = stagesData[index];
                if (data) {
                    if (journeyEyebrow) journeyEyebrow.textContent = data.eyebrow;
                    journeyTitle.textContent = data.title;
                    journeyText.textContent = data.text;

                    if (journeyFeatures) {
                        journeyFeatures.innerHTML = data.features.map(f => `<div>${f}</div>`).join('');
                    }

                    if (stackA && data.stackA) {
                        const k = stackA.querySelector('.kicker'); if (k) k.textContent = data.stackA.kicker;
                        const b = stackA.querySelector('b'); if (b) b.textContent = data.stackA.title;
                        const badge = stackA.querySelector('.card-badge'); if (badge && data.stackA.badge) {
                            const pulse = badge.querySelector('.pulse-dot');
                            if (pulse) {
                                badge.innerHTML = '';
                                badge.appendChild(pulse);
                                badge.appendChild(document.createTextNode(' ' + data.stackA.badge));
                            } else {
                                badge.textContent = data.stackA.badge;
                            }
                        }
                        const sub = stackA.querySelector('.card-meta-text'); if (sub && data.stackA.sub) sub.textContent = data.stackA.sub;
                        const bar = stackA.querySelector('.card-bar'); if (bar && data.stackA.bar) bar.style.width = data.stackA.bar;
                    }

                    if (stackB && data.stackB) {
                        const k = stackB.querySelector('.kicker'); if (k) k.textContent = data.stackB.kicker;
                        const b = stackB.querySelector('b'); if (b) b.textContent = data.stackB.title;
                        const badge = stackB.querySelector('.card-badge'); if (badge && data.stackB.badge) badge.textContent = data.stackB.badge;
                        const msg = stackB.querySelector('.card-wa-bubble span'); if (msg && data.stackB.msg) msg.textContent = data.stackB.msg;
                    }

                    if (stackC && data.stackC) {
                        const k = stackC.querySelector('.kicker'); if (k) k.textContent = data.stackC.kicker;
                        const b = stackC.querySelector('b'); if (b) b.textContent = data.stackC.title;
                        const badge = stackC.querySelector('.card-badge'); if (badge && data.stackC.badge) badge.textContent = data.stackC.badge;
                        const iconWrap = stackC.querySelector('.card-c-icon-wrap'); if (iconWrap && data.stackC.icon) iconWrap.innerHTML = data.stackC.icon;
                        const code = stackC.querySelector('.qr-code-id'); if (code && data.stackC.code) code.textContent = data.stackC.code;
                        const sub = stackC.querySelector('.card-c-sub'); if (sub && data.stackC.sub) sub.textContent = data.stackC.sub;
                    }
                }
            });
        });
    }

    /* --- 2. Scroll Reveal Animations --- */
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                }
            });
        }, { threshold: 0.1 });

        reveals.forEach(reveal => observer.observe(reveal));
    }

    /* --- 3. Mobile Navigation Menu Toggle --- */
    const menuBtn = document.querySelector('.menu-btn');
    const mobileNav = document.querySelector('.mobile-nav');

    if (menuBtn && mobileNav) {
        menuBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            mobileNav.classList.toggle('active');
        });

        document.addEventListener('click', function (e) {
            if (!mobileNav.contains(e.target) && !menuBtn.contains(e.target)) {
                mobileNav.classList.remove('active');
            }
        });
    }

    /* --- 4. Smooth Anchor Scrolling & Hash Offset --- */
    function getHeaderOffset() {
        const header = document.querySelector('.top-wrap, .site-header');
        return header ? header.offsetHeight + 20 : 100;
    }

    function smoothScrollTo(targetY, duration) {
        duration = duration || 750;
        const startY = window.pageYOffset || document.documentElement.scrollTop;
        const distance = targetY - startY;
        if (Math.abs(distance) < 2) return;
        let startTime = null;

        function easeInOutCubic(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t * t + b;
            t -= 2;
            return c / 2 * (t * t * t + 2) + b;
        }

        function step(currentTime) {
            if (!startTime) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const nextY = easeInOutCubic(timeElapsed, startY, distance, duration);
            window.scrollTo(0, nextY);
            if (timeElapsed < duration) {
                requestAnimationFrame(step);
            } else {
                window.scrollTo(0, targetY);
            }
        }

        requestAnimationFrame(step);
    }

    function scrollToElement(targetElement) {
        if (!targetElement) return;
        const headerOffset = getHeaderOffset();
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = Math.max(0, elementPosition + window.pageYOffset - headerOffset);

        smoothScrollTo(offsetPosition, 750);
    }

    document.querySelectorAll('a[href]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (!href || href === '#' || href.startsWith('javascript:')) return;

            let hash = '';
            let isSamePage = false;

            if (href.startsWith('#')) {
                hash = href;
                isSamePage = true;
            } else {
                try {
                    const url = new URL(href, window.location.origin);
                    if (url.pathname === window.location.pathname && url.hash) {
                        hash = url.hash;
                        isSamePage = true;
                    }
                } catch (err) {}
            }

            if (isSamePage && hash && hash !== '#') {
                const targetElement = document.querySelector(hash);
                if (targetElement) {
                    e.preventDefault();
                    if (mobileNav) mobileNav.classList.remove('active');
                    
                    // Unfocus active dropdown item on click
                    if (document.activeElement) document.activeElement.blur();
                    
                    scrollToElement(targetElement);
                    if (history.pushState) {
                        history.pushState(null, null, hash);
                    }
                }
            }
        });
    });

    if (window.location.hash && window.location.hash !== '#') {
        window.addEventListener('load', function () {
            setTimeout(function () {
                const targetElement = document.querySelector(window.location.hash);
                if (targetElement) {
                    scrollToElement(targetElement);
                }
            }, 180);
        });
    }

    /* --- 5. Why Zinvos Feature Auto Switcher --- */
    const zinvosFeatures = document.querySelectorAll('.zinvos-feature');
    const zinvosScenes = document.querySelectorAll('.zinvos-scene');
    const zinvosProgress = document.querySelectorAll('.zinvos-visual__progress span');
    const zinvosLabel = document.getElementById('zinvosVisualLabel');
    const zinvosTitle = document.getElementById('zinvosVisualTitle');
    const zinvosCaption = document.getElementById('zinvosVisualCaption');
    const zinvosWhySection = document.getElementById('why-zinvos');

    if (zinvosFeatures.length) {
        const zinvosContent = {
            registration: {
                label: 'Multi-Channel Registration',
                title: 'Register attendees wherever they prefer.',
                caption: 'Accept registrations through your event website, WhatsApp, or the Zinvos mobile app. Every registration is stored in one connected attendee record, ready for ticketing, QR check-in, communication, attendance, and post-event workflows.'
            },
            ticketing: {
                label: 'Conference Registration & Ticketing',
                title: 'One connected ticketing system from signup to entry.',
                caption: 'Manage attendee information, confirmations, payments, digital tickets, and unique QR codes from the same platform. Organizers get a clear registration record while attendees get a simple ticketing experience.'
            },
            ai: {
                label: 'AI Event Assistant',
                title: 'Give attendees answers without making them search.',
                caption: 'The Zinvos AI chatbot can answer questions about schedules, speakers, sessions, venue information, FAQs, and how to use the event application, helping attendees find the right information quickly.'
            },
            onsite: {
                label: 'Onsite Event Management',
                title: 'Keep check-in and venue operations moving.',
                caption: 'Use QR-based check-in, attendance tracking, access control, and badge or label printing to manage attendees efficiently at the venue and across different sessions or access areas.'
            },
            engagement: {
                label: 'Audience Engagement',
                title: 'Make sessions more interactive and measurable.',
                caption: 'Run live quizzes and polls, display results during sessions, and identify winners automatically. Engagement tools help organizers create participation without adding separate systems.'
            },
            certificates: {
                label: 'Online Event Certificates',
                title: 'Turn verified attendance into ready-to-access certificates.',
                caption: 'Generate and distribute online certificates to eligible attendees after the event. Certificate delivery can stay connected with attendee and attendance information already available in Zinvos.'
            },
            'white-label': {
                label: 'White-Label Event Platform',
                title: 'Your brand on top of a complete event platform.',
                caption: 'Event companies can offer Zinvos under their own branding for their events or clients, while using the same registration, attendee, onsite, engagement, and post-event technology underneath.'
            }
        };

        const zinvosFeatureList = Array.from(zinvosFeatures);
        let zinvosActiveIndex = 0;
        let zinvosAutoTimer = null;
        const zinvosAutoDelay = 3500;
        const zinvosReduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function setZinvosFeature(feature) {
            const index = zinvosFeatureList.findIndex(item => item.dataset.feature === feature);
            if (index < 0) return;
            zinvosActiveIndex = index;
            zinvosFeatures.forEach(item => item.classList.toggle('is-active', item.dataset.feature === feature));
            zinvosScenes.forEach(scene => scene.classList.toggle('is-active', scene.dataset.scene === feature));
            zinvosProgress.forEach((dot, dotIndex) => dot.classList.toggle('is-active', dotIndex === index));
            if (zinvosLabel) zinvosLabel.textContent = zinvosContent[feature].label;
            if (zinvosTitle) zinvosTitle.textContent = zinvosContent[feature].title;
            if (zinvosCaption) zinvosCaption.textContent = zinvosContent[feature].caption;
        }

        function zinvosNextFeature() {
            if (!zinvosFeatureList.length) return;
            zinvosActiveIndex = (zinvosActiveIndex + 1) % zinvosFeatureList.length;
            setZinvosFeature(zinvosFeatureList[zinvosActiveIndex].dataset.feature);
        }

        function stopZinvosAutoSwitch() {
            if (zinvosAutoTimer) {
                clearInterval(zinvosAutoTimer);
                zinvosAutoTimer = null;
            }
        }

        function startZinvosAutoSwitch() {
            if (zinvosReduceMotion) return;
            stopZinvosAutoSwitch();
            zinvosAutoTimer = setInterval(zinvosNextFeature, zinvosAutoDelay);
        }

        zinvosFeatures.forEach((item, index) => {
            item.addEventListener('click', () => {
                zinvosActiveIndex = index;
                setZinvosFeature(item.dataset.feature);
                startZinvosAutoSwitch();
            });
        });

        if (zinvosWhySection) {
            zinvosWhySection.addEventListener('mouseenter', stopZinvosAutoSwitch);
            zinvosWhySection.addEventListener('mouseleave', startZinvosAutoSwitch);
            zinvosWhySection.addEventListener('focusin', stopZinvosAutoSwitch);
            zinvosWhySection.addEventListener('focusout', event => {
                if (!zinvosWhySection.contains(event.relatedTarget)) startZinvosAutoSwitch();
            });
        }

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) stopZinvosAutoSwitch(); else startZinvosAutoSwitch();
        });

        startZinvosAutoSwitch();
    }

    /* --- 6. Partner Form Handler --- */
    const partnerForm = document.getElementById('partnerForm');
    const partnerSuccess = document.getElementById('partnerSuccess');

    if (partnerForm) {
        partnerForm.addEventListener('submit', function(event) {
            event.preventDefault();

            if (!partnerForm.checkValidity()) {
                partnerForm.reportValidity();
                return;
            }

            if (partnerSuccess) {
                partnerSuccess.classList.add('is-visible');
            }
        });
    }

    /* --- 7. Contact Form Handler --- */
    const contactForm = document.getElementById('contactForm');
    const contactSuccessMsg = document.getElementById('contactSuccessMsg');

    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault();

            if (!contactForm.checkValidity()) {
                contactForm.reportValidity();
                return;
            }

            if (contactSuccessMsg) {
                contactSuccessMsg.style.display = 'block';
            }
        });
    }

    /* --- 8. Hero Mobile Screen Image Fader --- */
    const phoneSlides = document.querySelectorAll('.phone-slideshow .phone-slide');
    const phoneDotsContainer = document.querySelector('.phone-dots');

    if (phoneSlides.length > 0) {
        let currentPhoneSlide = 0;
        let phoneSlideInterval = null;

        if (phoneSlides.length > 1 && phoneDotsContainer) {
            phoneDotsContainer.innerHTML = '';
            phoneSlides.forEach((_, idx) => {
                const dot = document.createElement('span');
                dot.className = 'phone-dot' + (idx === 0 ? ' active' : '');
                dot.addEventListener('click', () => {
                    goToPhoneSlide(idx);
                    resetPhoneTimer();
                });
                phoneDotsContainer.appendChild(dot);
            });
        }

        function goToPhoneSlide(index) {
            phoneSlides[currentPhoneSlide].classList.remove('active');
            const dots = document.querySelectorAll('.phone-dot');
            if (dots[currentPhoneSlide]) dots[currentPhoneSlide].classList.remove('active');

            currentPhoneSlide = index;

            phoneSlides[currentPhoneSlide].classList.add('active');
            if (dots[currentPhoneSlide]) dots[currentPhoneSlide].classList.add('active');
        }

        function nextPhoneSlide() {
            goToPhoneSlide((currentPhoneSlide + 1) % phoneSlides.length);
        }

        function resetPhoneTimer() {
            if (phoneSlideInterval) clearInterval(phoneSlideInterval);
            if (phoneSlides.length > 1) {
                phoneSlideInterval = setInterval(nextPhoneSlide, 3500);
            }
        }

        if (phoneSlides.length > 1) {
            resetPhoneTimer();
        }
    }
});
