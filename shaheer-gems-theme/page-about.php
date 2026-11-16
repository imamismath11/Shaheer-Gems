<?php
/**
 * Template Name: About Us Page
 *
 * @package Shaheer_Gems
 */

get_header();

$wa_num = preg_replace('/[^0-9]/', '', shaheer_get_option('shaheer_whatsapp_number', '94777072131'));
?>

<main id="primary" class="site-main">

    <!-- Page Hero Banner -->
    <section class="page-hero-banner">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e('About Shaheer Gems', 'shaheer-gems'); ?></h1>
            <div class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'shaheer-gems'); ?></a>
                <span>/</span>
                <span><?php esc_html_e('About Us', 'shaheer-gems'); ?></span>
            </div>
        </div>
    </section>

    <!-- Story & Introduction Section -->
    <section class="section-padding" style="background-color: #FFFFFF;">
        <div class="container story-grid">
            <div>
                <span class="section-subtitle"><?php esc_html_e('OUR HERITAGE', 'shaheer-gems'); ?></span>
                <h2 class="section-title"><?php esc_html_e('Dedicated to Ceylon’s Finest Natural Gemstones', 'shaheer-gems'); ?></h2>
                <p style="font-size: 1.15rem; color: var(--color-accent-dark); font-weight: 500;">
                    <?php esc_html_e('Welcome to Shaheer Gems, where the natural beauty of precious gemstones meets elegance and craftsmanship.', 'shaheer-gems'); ?>
                </p>
                <p>
                    <?php esc_html_e('Based in Sri Lanka, the historically celebrated "Ratna Dweepa" (Island of Gems), Shaheer Gems is dedicated to presenting an authentic selection of natural gemstones to collectors, connoisseurs, and fine jewelry designers who appreciate rarity, brilliance, and enduring value.', 'shaheer-gems'); ?>
                </p>
                <p>
                    <?php esc_html_e('Our roots lie in ethical sourcing directly from primary Sri Lankan alluvial deposits and historic gem fields including Ratnapura, Elahera, and Balangoda. Each rough crystal is carefully evaluated and cut by master lapidaries to maximize light performance, optical symmetry, and color purity.', 'shaheer-gems'); ?>
                </p>
            </div>

            <div>
                <div class="about-image-frame">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-craft.svg'); ?>" alt="Shaheer Gems Gemological Heritage" width="700" height="520" />
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="section-padding" style="background-color: var(--color-bg);">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e('PURPOSE & DIRECTION', 'shaheer-gems'); ?></span>
                <h2 class="section-title"><?php esc_html_e('OUR MISSION & VISION', 'shaheer-gems'); ?></h2>
                <p class="section-desc">
                    <?php esc_html_e('Guided by timeless values of honesty, gemological expertise, and personalized client relationships.', 'shaheer-gems'); ?>
                </p>
            </div>

            <div class="mission-vision-grid">
                <div class="mission-card">
                    <div style="color: var(--color-secondary); margin-bottom: 16px;">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <h3 style="margin-bottom: 14px;"><?php esc_html_e('Our Mission', 'shaheer-gems'); ?></h3>
                    <p style="margin: 0; line-height: 1.8;">
                        <?php esc_html_e('To source, curate, and supply 100% natural and untreated precious gemstones with absolute disclosure, providing global and local clients with high-caliber gemstones, transparent certifications, and unmatched personal consultation.', 'shaheer-gems'); ?>
                    </p>
                </div>

                <div class="vision-card">
                    <div style="color: var(--color-secondary); margin-bottom: 16px;">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="2"/><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
                    </div>
                    <h3 style="margin-bottom: 14px;"><?php esc_html_e('Our Vision', 'shaheer-gems'); ?></h3>
                    <p style="margin: 0; line-height: 1.8;">
                        <?php esc_html_e('To be recognized globally as a distinguished symbol of Ceylon gemstone excellence, upholding Sri Lanka’s revered lapidary heritage while providing modern, accessible digital cataloging and bespoke acquisition services.', 'shaheer-gems'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Commitment to Quality Section -->
    <section class="section-padding" style="background-color: #FFFFFF;">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle"><?php esc_html_e('GEMOLOGICAL EXCELLENCE', 'shaheer-gems'); ?></span>
                <h2 class="section-title"><?php esc_html_e('OUR COMMITMENT TO QUALITY', 'shaheer-gems'); ?></h2>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Natural Authenticity', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc"><?php esc_html_e('We strictly reject synthetic, composite, or artificially filled gems. Every stone is 100% genuine earth-mined.', 'shaheer-gems'); ?></p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Laboratory Reports', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc"><?php esc_html_e('Gemstones can be accompanied by certifications from recognized gemological authorities such as NGJA, GIA, or Gubelin.', 'shaheer-gems'); ?></p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Master Lapidary Cut', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc"><?php esc_html_e('Cut and faceted to exact proportions to maximize internal light reflections, luster, and brilliance.', 'shaheer-gems'); ?></p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Ethical Sourcing', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc"><?php esc_html_e('Direct partnerships with traditional Sri Lankan gem miners respecting environmental restoration and fair trade.', 'shaheer-gems'); ?></p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    </div>
                    <h4 class="feature-title"><?php esc_html_e('Global Delivery', 'shaheer-gems'); ?></h4>
                    <p class="feature-desc"><?php esc_html_e('Fully insured worldwide express courier shipments via DHL / FedEx with tamper-proof luxury packaging.', 'shaheer-gems'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="cta-banner-section">
        <div class="container">
            <div class="cta-banner-content">
                <span class="section-subtitle" style="color: var(--color-secondary-light);"><?php esc_html_e('PERSONAL CONSULTATION', 'shaheer-gems'); ?></span>
                <h2 class="cta-title"><?php esc_html_e('Looking for Your Perfect Gemstone?', 'shaheer-gems'); ?></h2>
                <p class="cta-desc">
                    <?php esc_html_e('Explore our collection or contact us to find a gemstone that suits your preferences.', 'shaheer-gems'); ?>
                </p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/gemstones/')); ?>" class="btn btn-gold">
                        <?php esc_html_e('Explore Gemstones', 'shaheer-gems'); ?>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($wa_num); ?>&text=<?php echo urlencode('Hello Shaheer Gems, I would like to speak with a gemologist regarding a custom requirement.'); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
                        <span><?php esc_html_e('Inquire on WhatsApp', 'shaheer-gems'); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
