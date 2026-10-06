<?php
/**
 * Zinvos V2 Page Template
 *
 * @package Zinvos_V2
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>

        <!-- ── Full-cover inner hero with nav inside ── -->
        <section class="inner-hero">

            <div class="container inner-hero-inner">

                <!-- Breadcrumb -->
                <div class="breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                    <i style="font-style:normal;opacity:.45">→</i>
                    <span><?php the_title(); ?></span>
                </div>

                <!-- Eyebrow -->
                <div class="eyebrow">Zinvos</div>

                <!-- Title -->
                <h1><?php the_title(); ?></h1>

                <!-- Lead -->
                <?php $excerpt = get_the_excerpt(); if ( $excerpt ) : ?>
                    <p class="lead"><?php echo esc_html( wp_trim_words( $excerpt, 28 ) ); ?></p>
                <?php endif; ?>

                <!-- Actions -->
                <div class="hero-actions">
                    <a class="btn primary" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact Us <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span></a>
                    <a class="btn soft" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Book a Demo <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span></a>
                </div>

            </div>
        </section>

        <!-- ── Page content ── -->
        <div class="page-body">

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumb-wrap">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        </div>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
