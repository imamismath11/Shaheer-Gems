<?php
/**
 * The main template file
 *
 * @package Shaheer_Gems
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="page-hero-banner">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e('Shaheer Gems Journal', 'shaheer-gems'); ?></h1>
            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a>
                <span>/</span>
                <span><?php esc_html_e('Journal', 'shaheer-gems'); ?></span>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background-color: var(--color-bg);">
        <div class="container" style="max-width: 900px;">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background: #FFFFFF; padding: 35px; border-radius: var(--radius-md); border: 1px solid var(--color-border); margin-bottom: 30px; box-shadow: var(--shadow-sm);">
                        <h2 style="font-size: 1.8rem; margin-bottom: 12px;">
                            <a href="<?php the_permalink(); ?>" style="color: var(--color-accent-dark);"><?php the_title(); ?></a>
                        </h2>
                        <div style="font-size: 0.85rem; color: var(--color-text-light); margin-bottom: 16px;">
                            <?php echo get_the_date(); ?> • <?php the_author(); ?>
                        </div>
                        <div class="entry-summary" style="line-height: 1.8; color: var(--color-text-muted);">
                            <?php the_excerpt(); ?>
                        </div>
                        <div style="margin-top: 20px;">
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-gold btn-sm"><?php esc_html_e('Read More', 'shaheer-gems'); ?></a>
                        </div>
                    </article>
            <?php
                endwhile;
                the_posts_navigation();
            else :
            ?>
                <p><?php esc_html_e('No posts found.', 'shaheer-gems'); ?></p>
            <?php
            endif;
            ?>
        </div>
    </section>

</main>

<?php
get_footer();
