<?php
/**
 * Zinvos V2 Blog Archive Template (home.php)
 * Template for displaying the main blog listing.
 *
 * @package Zinvos_V2
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- ── Archive hero banner with nav inside ── -->
    <section class="archive-hero">

        <div class="container archive-hero-inner">
            <!-- Breadcrumb -->
            <div class="breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i style="font-style:normal;opacity:.45">→</i>
                <span>Blog</span>
            </div>

            <div class="eyebrow">Insights &amp; News</div>
            <h1 style="margin-top:18px">Latest <strong>updates.</strong></h1>
            <p class="archive-hero-lead">Read the latest from the Zinvos team — event tech, product updates, and industry insights.</p>

            <div class="hero-actions">
                <a class="btn primary" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact Us <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span></a>
                <a class="btn soft" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Book a Demo <span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow" class="arrow-img"></span></a>
            </div>
        </div>

    </section>

    <!-- ── Blog grid ── -->
    <section class="section" style="padding: 64px 0 100px;">
        <div class="container">

            <?php
            // Query blog posts
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $blog_query = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 9,
                'paged'          => $paged,
            ) );

            if ( $blog_query->have_posts() ) : ?>

                <div class="blog-row">
                    <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card reveal' ); ?>>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="blog-card-thumb">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large' ); ?></a>
                                </div>
                            <?php else : ?>
                                <div class="blog-card-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/zinvos-2.webp" alt="<?php the_title_attribute(); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="blog-card-body">
                                <div class="blog-meta">
                                    <span class="blog-cat">
                                        <?php
                                        $cats = get_the_category();
                                        echo esc_html( $cats ? $cats[0]->name : 'Insight' );
                                        ?>
                                    </span>
                                    <span class="blog-date"><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
                                </div>

                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>

                                <a href="<?php the_permalink(); ?>" class="blog-read-more">
                                    Read Article →
                                </a>
                            </div>

                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div style="margin-top: 48px; text-align: center;">
                    <?php
                    echo paginate_links( array(
                        'total'     => $blog_query->max_num_pages,
                        'current'   => $paged,
                        'prev_text' => '← Newer',
                        'next_text' => 'Older →',
                    ) );
                    ?>
                </div>

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <div style="text-align:center; padding: 80px 20px; color: var(--muted);">
                    <i class="fas fa-newspaper" style="font-size: 48px; margin-bottom: 16px; opacity: 0.35; display: block;"></i>
                    <p style="font-size: 18px;">No blog posts published yet. Check back soon!</p>
                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php
get_footer();
