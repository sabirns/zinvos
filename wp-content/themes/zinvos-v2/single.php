<?php
/**
 * Zinvos V2 Single Post Template
 * Clean layout without hero banner and without featured image in content.
 *
 * @package Zinvos_V2
 */

get_header();
?>

<main id="primary" class="site-main single-post-main">

    <?php while ( have_posts() ) : the_post(); 
        $cats = get_the_category();
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-article' ); ?>>
            <div class="post-body">

                <!-- Post Header (Breadcrumb, Eyebrow, Title, Meta) -->
                <header class="single-post-header">
                    <!-- Breadcrumb -->
                    <div class="breadcrumb" aria-label="Breadcrumb">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        <i style="font-style:normal;opacity:.45">→</i>
                        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a>
                        <i style="font-style:normal;opacity:.45">→</i>
                        <span><?php echo esc_html( wp_trim_words( get_the_title(), 6 ) ); ?></span>
                    </div>

                    <?php if ( $cats ) : ?>
                        <div class="eyebrow" style="margin-bottom: 12px;">
                            <?php echo esc_html( $cats[0]->name ); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Post meta pills -->
                    <div class="post-meta-row">
                        <span class="meta-badge"><i class="fa-regular fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
                        <?php if ( function_exists( 'reading_time' ) ) : ?>
                            <span class="meta-badge"><i class="fa-regular fa-clock"></i> <?php echo esc_html( reading_time( get_the_ID() ) ); ?></span>
                        <?php endif; ?>
                    </div>
                </header>

                <!-- Post Content (without featured image) -->
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <!-- Prev / Next navigation -->
                <div class="post-nav-row">
                    <?php
                    $prev = get_previous_post();
                    $next = get_next_post();
                    if ( $prev ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $prev ) ); ?>">← <?php echo esc_html( wp_trim_words( $prev->post_title, 6 ) ); ?></a>
                    <?php endif; ?>
                    <?php if ( $next ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $next ) ); ?>"><?php echo esc_html( wp_trim_words( $next->post_title, 6 ) ); ?> →</a>
                    <?php endif; ?>
                </div>

            </div>
        </article>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
