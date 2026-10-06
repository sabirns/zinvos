<?php
/**
 * Zinvos V2 404 Error Page Template
 *
 * @package Zinvos_V2
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="inner-hero" style="min-height: 100vh;">

        <div class="container inner-hero-inner">
            <div class="not-found-wrap" style="min-height: auto; padding: 40px 0;">
                <div class="error-code">404</div>
                <h2>Page Not Found</h2>
                <p class="lead" style="max-width: 500px; margin: 12px auto 24px;">The page you're looking for might have been removed, renamed, or is temporarily unavailable.</p>
                <div style="margin-top: 10px;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn primary">
                        ← Back to Homepage
                    </a>
                </div>
            </div>
        </div>

    </section>
</main>

<?php
get_footer();
