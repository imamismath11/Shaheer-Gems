<?php
/**
 * The template for displaying all pages
 *
 * @package Shaheer_Gems
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="page-hero-banner">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a>
                <span>/</span>
                <span><?php the_title(); ?></span>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background-color: #FFFFFF;">
        <div class="container" style="max-width: 900px;">
            <?php
            while (have_posts()) :
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content" style="line-height: 1.8; color: var(--color-text-muted);">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php
            endwhile;
            ?>
        </div>
    </section>

</main>

<?php
get_footer();
