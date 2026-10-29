document.addEventListener('DOMContentLoaded', function () {
    /* --- 1. Journey Stage Tabs Data & Switching --- */
    const stagesData = [
        {
            stage: "01",
            eyebrow: "Before the event",
            title: "Registration without friction.",
            text: "Let attendees register through web, WhatsApp or mobile and keep every registration connected to the same attendee record.",
            features: ["Web registration", "WhatsApp registration", "Payments", "QR confirmation"],
            accent: "#3189CC"
        },
        {
            stage: "02",
            eyebrow: "Communicate & Promote",
            title: "Reach every delegate and promote with impact.",
            text: "Send automated schedule updates, marketing campaigns, badge QR passes, and personalized announcements via WhatsApp, email, and mobile push.",
            features: ["WhatsApp Broadcasts", "Email Campaigns & Newsletters", "SMS & Push Alerts", "Promotion & Ticket Reminders"],
            accent: "#EB0B59"
        },
        {
            stage: "03",
            eyebrow: "Onsite Operations",
            title: "Zero queues at entry counters.",
            text: "Scan delegate QR codes in under 2 seconds, auto-print badges, and monitor live venue capacity across multiple entry gates.",
            features: ["QR Scan Check-in", "Instant Badge Printing", "Session Gate Control", "Live Attendance Dashboard"],
            accent: "#4AA99C"
        },
        {
            stage: "04",
            eyebrow: "Session Engagement",
            title: "Turn audience into active participants.",
            text: "Power interactive Q&A, live polls, speaker ratings, and gamified leaderboards right inside the delegate mobile app.",
            features: ["Live Audience Polling", "Speaker Q&A", "Session Feedback", "Leaderboard Points"],
            accent: "#FF9D00"
        },
        {
            stage: "05",
            eyebrow: "Post-Event Completion",
            title: "Automated certificates & analytics.",
            text: "Generate verified digital attendance certificates instantly based on check-in rules and export comprehensive event analytics.",
            features: ["Instant Certificates", "Verification Links", "Analytics Export", "Attendee History"],
            accent: "#7EBC2A"
        }
    ];

    const journeyWrap = document.getElementById('journeyWrap') || document.querySelector('.journey-wrap');
    const journeyTabs = document.querySelectorAll('.journey-tab');
    const journeyEyebrow = document.getElementById('journeyEyebrow');
    const journeyTitle = document.getElementById('journeyTitle');
    const journeyText = document.getElementById('journeyText');
    const journeyFeatures = document.getElementById('journeyFeatures');
    const stagePanels = document.querySelectorAll('.journey-stage-panel');

    let currentStageIndex = 0;
    let autoSwitchTimer = null;
    let isUserHovered = false;
    let isSectionInView = false;
    const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function setJourneyStage(index) {
        if (index < 0 || index >= stagesData.length) return;
        currentStageIndex = index;
        const data = stagesData[index];

        // Update tabs
        journeyTabs.forEach((t, i) => {
            const isActive = i === index;
            t.classList.toggle('active', isActive);
            t.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        // Update stage panels with smooth fade
        if (stagePanels.length) {
            stagePanels.forEach(p => p.classList.remove('active'));
            const targetPanel = document.querySelector(`.journey-stage-panel[data-stage="${index}"]`);
            if (targetPanel) {
                targetPanel.classList.add('active');
            }
        }

        // Update container stage attributes and stage accent color
        if (journeyWrap) {
            journeyWrap.setAttribute('data-active-stage', index);
            journeyWrap.style.setProperty('--stage-accent', data.accent);
        }

        // Update left copy
        if (data) {
            if (journeyEyebrow) journeyEyebrow.textContent = data.eyebrow;
            if (journeyTitle) journeyTitle.textContent = data.title;
            if (journeyText) journeyText.textContent = data.text;
            if (journeyFeatures) {
                journeyFeatures.innerHTML = data.features.map(f => `<div>${f}</div>`).join('');
            }
        }
    }

    function startAutoSwitch() {
        stopAutoSwitch();
        if (prefersReducedMotion || isUserHovered || !isSectionInView) return;
        autoSwitchTimer = setInterval(() => {
            const nextIndex = (currentStageIndex + 1) % stagesData.length;
            setJourneyStage(nextIndex);
        }, 8000);
    }

    function stopAutoSwitch() {
        if (autoSwitchTimer) {
            clearInterval(autoSwitchTimer);
            autoSwitchTimer = null;
        }
    }

    if (journeyWrap) {
        journeyWrap.addEventListener('mouseenter', () => {
            isUserHovered = true;
            stopAutoSwitch();
        });
        journeyWrap.addEventListener('mouseleave', () => {
            isUserHovered = false;
            startAutoSwitch();
        });
        journeyWrap.addEventListener('focusin', () => {
            isUserHovered = true;
            stopAutoSwitch();
        });
        journeyWrap.addEventListener('focusout', () => {
            isUserHovered = false;
            startAutoSwitch();
        });

        if ('IntersectionObserver' in window) {
            const sectionObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    isSectionInView = entry.isIntersecting;
                    if (isSectionInView) {
                        startAutoSwitch();
                    } else {
                        stopAutoSwitch();
                    }
                });
            }, { threshold: 0.2 });
            sectionObserver.observe(journeyWrap);
        } else {
            isSectionInView = true;
            startAutoSwitch();
        }
    }

    if (journeyTabs.length && journeyTitle) {
        journeyTabs.forEach((tab, index) => {
            tab.addEventListener('click', function () {
                setJourneyStage(index);
                startAutoSwitch();
            });
        });
    }

    /* --- 2. Enhanced Scroll Reveal & Stagger Animations --- */
    (function initScrollAnimations() {
        // Dynamic scroll progress bar at top of viewport
        if (!document.querySelector('.scroll-progress-bar')) {
            const bar = document.createElement('div');
            bar.className = 'scroll-progress-bar';
            bar.setAttribute('aria-hidden', 'true');
            document.body.prepend(bar);

            function updateProgressBar() {
                const totalScroll = document.documentElement.scrollHeight - window.innerHeight;
                if (totalScroll > 0) {
                    const percent = Math.min(100, Math.max(0, (window.pageYOffset / totalScroll) * 100));
                    bar.style.width = percent + '%';
                }
            }
            window.addEventListener('scroll', updateProgressBar, { passive: true });
            updateProgressBar();
        }

        // Automatic stagger indexes on card grids across templates
        const gridContainers = document.querySelectorAll('.events-grid, .blog-grid, .logo-track, .footer-grid, .zs-solutions, .feature-grid, .zp-grid, .zs-grid');
        gridContainers.forEach(container => {
            Array.from(container.children).forEach((child, idx) => {
                child.style.setProperty('--stagger-index', idx % 6);
                child.classList.add('scroll-reveal', 'scroll-stagger');
            });
        });

        // Key marketing components, cards, and section heads to animate on scroll
        const targets = document.querySelectorAll(`
            .reveal,
            .section-head,
            .journey-wrap,
            .trust,
            .event-card,
            .blog-card,
            .why-feature,
            .stat-card,
            .card,
            .zp-card,
            .zs-card,
            .zp-section__head,
            .zs-section__head,
            .ze-hero__content,
            .footer-grid > div
        `);

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 1,
                rootMargin: '0px 0px -30px 0px'
            });

            targets.forEach(el => {
                if (!el.classList.contains('reveal')) {
                    el.classList.add('scroll-reveal');
                }
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    el.classList.add('in');
                } else {
                    observer.observe(el);
                }
            });
        } else {
            targets.forEach(el => el.classList.add('in'));
        }
    })();

    /* --- 2b. Parallax Multiplane Scroll Engine (lerp-smoothed rAF loop) --- */
    (function initParallaxEngine() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        const dashboard = document.querySelector('.dashboard');
        const phone = document.querySelector('.phone');
        const whatsapp = document.querySelector('.whatsapp');
        const fc1 = document.querySelector('.float-chip.fc1');
        const fc2 = document.querySelector('.float-chip.fc2');
        const fc3 = document.querySelector('.float-chip.fc3');
        const customParallaxItems = document.querySelectorAll('[data-parallax], .parallax-item');

        // Current lerped values per element
        let lerpDash = 0, lerpPhone = 0, lerpWA = 0, lerpFc1 = 0, lerpFc2 = 0, lerpFc3 = 0;
        const LERP = 0.1; // 0 = instant, 1 = never moves. 0.1 = silky smooth
        let rafId = null;

        function lerp(a, b, t) { return a + (b - a) * t; }

        function loop() {
            const scrollY = window.pageYOffset || document.documentElement.scrollTop;
            const vh = window.innerHeight;

            if (scrollY < vh * 1.5) {
                const targetDash = scrollY * 0.06;
                const targetPhone = scrollY * -0.10;
                const targetWA = scrollY * 0.04;
                const targetFc1 = scrollY * -0.14;
                const targetFc2 = scrollY * 0.10;
                const targetFc3 = scrollY * -0.07;

                lerpDash = lerp(lerpDash, targetDash, LERP);
                lerpPhone = lerp(lerpPhone, targetPhone, LERP);
                lerpWA = lerp(lerpWA, targetWA, LERP);
                lerpFc1 = lerp(lerpFc1, targetFc1, LERP);
                lerpFc2 = lerp(lerpFc2, targetFc2, LERP);
                lerpFc3 = lerp(lerpFc3, targetFc3, LERP);

                if (dashboard) dashboard.style.setProperty('--parallax-y', lerpDash.toFixed(2) + 'px');
                if (phone) phone.style.setProperty('--parallax-y', lerpPhone.toFixed(2) + 'px');
                if (whatsapp) whatsapp.style.setProperty('--parallax-y', lerpWA.toFixed(2) + 'px');
                if (fc1) fc1.style.setProperty('--parallax-y', lerpFc1.toFixed(2) + 'px');
                if (fc2) fc2.style.setProperty('--parallax-y', lerpFc2.toFixed(2) + 'px');
                if (fc3) fc3.style.setProperty('--parallax-y', lerpFc3.toFixed(2) + 'px');
            }

            // General [data-parallax] items — lerped by their own speed factor
            customParallaxItems.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < vh && rect.bottom > 0) {
                    const speed = parseFloat(el.getAttribute('data-parallax') || '0.06');
                    const offset = ((rect.top + rect.height / 2) - (vh / 2)) * speed;
                    el.style.transform = `translate3d(0, ${offset.toFixed(2)}px, 0)`;
                }
            });

            rafId = requestAnimationFrame(loop);
        }

        loop(); // start continuous rAF loop — passive on scroll events
    })();

    /* --- 3. Mobile Navigation Menu Toggle --- */
    const menuButtons = document.querySelectorAll('.menu-btn, #inner-menu-btn');
    const mobileNavs = document.querySelectorAll('.mobile-nav, #inner-mobile-nav');

    if (menuButtons.length && mobileNavs.length) {
        menuButtons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                // Find parent site header or fallback to document query
                const parentHeader = btn.closest('.site-header, .top-wrap') || document;
                const targetNav = parentHeader.querySelector('.mobile-nav') || mobileNavs[0];

                if (targetNav) {
                    const isOpen = targetNav.classList.toggle('active');
                    btn.classList.toggle('is-open', isOpen);
                    btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                    btn.innerHTML = isOpen ? '&#10005;' : '&#9776;';
                }
            });
        });

        // Close menu when clicking any link inside mobile navigation
        mobileNavs.forEach(nav => {
            const navLinks = nav.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    nav.classList.remove('active');
                    menuButtons.forEach(btn => {
                        btn.classList.remove('is-open');
                        btn.setAttribute('aria-expanded', 'false');
                        btn.innerHTML = '&#9776;';
                    });
                });
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function (e) {
            mobileNavs.forEach(nav => {
                if (nav.classList.contains('active')) {
                    let isClickInside = nav.contains(e.target);
                    menuButtons.forEach(btn => {
                        if (btn.contains(e.target)) isClickInside = true;
                    });

                    if (!isClickInside) {
                        nav.classList.remove('active');
                        menuButtons.forEach(btn => {
                            btn.classList.remove('is-open');
                            btn.setAttribute('aria-expanded', 'false');
                            btn.innerHTML = '&#9776;';
                        });
                    }
                }
            });
        });
    }

    /* --- 3b. Active Navigation Sync --- */
    function syncActiveNav() {
        const currentPath = window.location.pathname.replace(/\/+$/, '') || '/';
        const navAnchors = document.querySelectorAll('.nav-links-ul > li > a, .mobile-nav > a');

        navAnchors.forEach(a => {
            const href = a.getAttribute('href');
            if (!href || href.indexOf('#') === 0) return;
            try {
                const url = new URL(href, window.location.origin);
                const aPath = url.pathname.replace(/\/+$/, '') || '/';

                let isMatch = false;
                if (aPath === currentPath) {
                    isMatch = true;
                } else if (aPath !== '/' && currentPath.indexOf(aPath) === 0) {
                    isMatch = true;
                }

                if (isMatch) {
                    a.classList.add('active');
                    const parentLi = a.closest('li');
                    if (parentLi) {
                        parentLi.classList.add('current-menu-item', 'active');
                    }
                }
            } catch (err) {
                // Ignore URL parse error
            }
        });
    }
    syncActiveNav();

    /* --- 3c. Header Scroll (Dock to top: 0) --- */
    const siteHeaders = document.querySelectorAll('.site-header, .top-wrap');
    if (siteHeaders.length) {
        let isScrolled = false;
        const scrollThreshold = 15;

        function handleHeaderScroll() {
            const currentScrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
            const shouldBeScrolled = currentScrollY > scrollThreshold;

            if (shouldBeScrolled !== isScrolled) {
                isScrolled = shouldBeScrolled;
                siteHeaders.forEach(hdr => hdr.classList.toggle('is-scrolled', isScrolled));
                document.body.classList.toggle('header-is-scrolled', isScrolled);
            }
        }

        window.addEventListener('scroll', handleHeaderScroll, { passive: true });
        handleHeaderScroll();
    }

    /* --- 4. Smooth Anchor Scrolling & Hash Offset --- */
    function getHeaderOffset() {
        const header = document.querySelector('.top-wrap, .site-header');
        if (!header) return 100;
        const isDocked = header.classList.contains('is-scrolled') || document.body.classList.contains('header-is-scrolled');
        return header.offsetHeight + (isDocked ? 12 : 24);
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
                } catch (err) { }
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

        const zinvosVisualHeading = document.querySelector('.zinvos-visual__heading');
        const zinvosVisualBlock = document.querySelector('.zinvos-why__visual');

        function setZinvosFeature(feature, isUserClick) {
            const index = zinvosFeatureList.findIndex(item => item.dataset.feature === feature);
            if (index < 0) return;
            zinvosActiveIndex = index;
            zinvosFeatures.forEach(item => item.classList.toggle('is-active', item.dataset.feature === feature));
            zinvosScenes.forEach(scene => scene.classList.toggle('is-active', scene.dataset.scene === feature));
            zinvosProgress.forEach((dot, dotIndex) => dot.classList.toggle('is-active', dotIndex === index));

            // Brief visual refresh effect on title/text change
            if (zinvosVisualHeading) {
                zinvosVisualHeading.classList.add('is-updating');
                setTimeout(() => zinvosVisualHeading.classList.remove('is-updating'), 220);
            }

            if (zinvosLabel) zinvosLabel.textContent = zinvosContent[feature].label;
            if (zinvosTitle) zinvosTitle.textContent = zinvosContent[feature].title;
            if (zinvosCaption) zinvosCaption.textContent = zinvosContent[feature].caption;

            // Mobile specific smooth scrolling & tab positioning
            if (isUserClick) {
                const activeTab = zinvosFeatureList[index];
                if (activeTab && activeTab.scrollIntoView) {
                    activeTab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }

                // If on mobile/small screen and visual stage is below viewport, bring into view
                if (window.innerWidth <= 1000 && zinvosVisualBlock) {
                    const rect = zinvosVisualBlock.getBoundingClientRect();
                    if (rect.top < 0 || rect.bottom > window.innerHeight) {
                        zinvosVisualBlock.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                }
            }
        }

        function zinvosNextFeature() {
            if (!zinvosFeatureList.length) return;
            zinvosActiveIndex = (zinvosActiveIndex + 1) % zinvosFeatureList.length;
            setZinvosFeature(zinvosFeatureList[zinvosActiveIndex].dataset.feature, false);
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
                setZinvosFeature(item.dataset.feature, true);
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
        partnerForm.addEventListener('submit', function (event) {
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
        contactForm.addEventListener('submit', function (event) {
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

    /* --- 8b. Hero Desktop Screen Image Fader --- */
    const desktopSlides = document.querySelectorAll('.desktop-slideshow .desktop-slide');
    const desktopDotsContainer = document.querySelector('.desktop-dots');
    const dashBadge = document.querySelector('.dash-title-badge');
    const dashboardContainer = document.querySelector('.dashboard');

    if (desktopSlides.length > 0) {
        let currentDesktopSlide = 0;
        let desktopSlideInterval = null;

        if (desktopSlides.length > 1 && desktopDotsContainer) {
            desktopDotsContainer.innerHTML = '';
            desktopSlides.forEach((_, idx) => {
                const dot = document.createElement('span');
                dot.className = 'desktop-dot' + (idx === 0 ? ' active' : '');
                dot.setAttribute('role', 'button');
                dot.setAttribute('aria-label', 'Go to desktop screen ' + (idx + 1));
                dot.addEventListener('click', () => {
                    goToDesktopSlide(idx);
                    resetDesktopTimer();
                });
                desktopDotsContainer.appendChild(dot);
            });
        }

        function goToDesktopSlide(index) {
            desktopSlides[currentDesktopSlide].classList.remove('active');
            const dots = document.querySelectorAll('.desktop-dot');
            if (dots[currentDesktopSlide]) dots[currentDesktopSlide].classList.remove('active');

            currentDesktopSlide = index;

            desktopSlides[currentDesktopSlide].classList.add('active');
            if (dots[currentDesktopSlide]) dots[currentDesktopSlide].classList.add('active');

            if (dashBadge && desktopSlides[currentDesktopSlide].dataset.view) {
                dashBadge.textContent = desktopSlides[currentDesktopSlide].dataset.view;
            }
        }

        function nextDesktopSlide() {
            goToDesktopSlide((currentDesktopSlide + 1) % desktopSlides.length);
        }

        function resetDesktopTimer() {
            if (desktopSlideInterval) clearInterval(desktopSlideInterval);
            if (desktopSlides.length > 1) {
                desktopSlideInterval = setInterval(nextDesktopSlide, 4500);
            }
        }

        if (dashboardContainer) {
            dashboardContainer.addEventListener('mouseenter', () => {
                if (desktopSlideInterval) clearInterval(desktopSlideInterval);
            });
            dashboardContainer.addEventListener('mouseleave', () => {
                resetDesktopTimer();
            });
        }

        if (desktopSlides.length > 1) {
            resetDesktopTimer();
        }
    }
});
