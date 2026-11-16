# SHAHEER GEMS – Professional Luxury WordPress Website

A luxury, modern, and elegant WordPress theme designed specifically for **SHAHEER GEMS**, a premier natural gemstone dealer and supplier based in Sri Lanka.

---

## 💎 Project Overview

- **Business Name:** SHAHEER GEMS
- **Business Type:** Natural Gemstone Dealer and Supplier (Sri Lanka)
- **Website Type:** Gemstone Catalog and Business Website
- **Platform:** WordPress (Gutenberg & Elementor Compatible)
- **Design Aesthetic:** Luxury, Modern, Elegant & Professional
- **Color Palette:**
  - **Primary:** Pure White (`#FFFFFF`)
  - **Secondary:** Rich Royal Gold (`#C5A059`) & Radiant Gold (`#E5C77A`)
  - **Text:** Dark Charcoal (`#222222`) & Muted Slate (`#666666`)
  - **Accent:** Royal Blue (`#123A70`) & Deep Navy (`#0A1E38`)
  - **Background:** Light Cream (`#FAF8F3`)

---

## 📂 Project Directory Structure

```text
C:\Users\hp\.gemini\antigravity\scratch\shaheer-gems/
├── shaheer-gems-theme/              <-- Genuine Installable WordPress Theme
│   ├── style.css                     <-- Theme metadata & luxury typography rules
│   ├── functions.php                 <-- Theme setup, enqueuing, CPT & Elementor support
│   ├── header.php                    <-- Top trust bar, logo, sticky nav, WhatsApp CTA
│   ├── footer.php                    <-- 4-column luxury footer, gold accents, quick links
│   ├── front-page.php                <-- Homepage with all 7 required luxury sections
│   ├── page-about.php                <-- About Us template (Story, Mission, Vision, Craft)
│   ├── page-gemstones.php            <-- Gemstone Catalog with dynamic multi-filtering
│   ├── single-gemstone.php           <-- Dedicated Gem Details page with Zoom & Specs
│   ├── page-gallery.php              <-- Gemstone Photo Gallery with full lightbox
│   ├── page-contact.php              <-- Contact Us page with business info & valid form
│   ├── page.php                      <-- Generic page template
│   ├── index.php                     <-- Blog / Fallback template
│   ├── archive-gemstone.php          <-- Gemstone archive template
│   ├── inc/
│   │   ├── custom-post-types.php     <-- CPT 'gemstone', Categories, Cuts, Colors
│   │   ├── custom-fields.php         <-- Admin Meta Boxes (Carat, Origin, Treatment, etc.)
│   │   ├── admin-settings.php        <-- "Shaheer Gems" dashboard settings (WhatsApp #, etc.)
│   │   ├── ajax-handlers.php         <-- AJAX filtering and validated contact form handlers
│   │   └── sample-data.php           <-- Auto-seeder for 10+ realistic Ceylon gemstones
│   └── assets/
│       ├── css/main.css              <-- Comprehensive responsive luxury stylesheet
│       ├── js/main.js                <-- Sticky header, filters, WhatsApp links, lightbox
│       └── images/
│           ├── logo.svg              <-- Shaheer Gems emblem & serif brandmark
│           ├── hero-bg.svg           <-- Luxury facet glow background
│           ├── about-craft.svg       <-- Gemological inspection & Ceylon sapphire graphic
│           └── gemstones/            <-- Vector graphics for all 10 gemstone categories
│
├── shaheer-gems-theme.zip            <-- Ready-to-upload WordPress Theme Zip
└── preview/                          <-- Standalone Interactive Browser Preview
    ├── index.html                    <-- Homepage Preview
    ├── about.html                    <-- About Us Preview
    ├── gemstones.html                <-- Catalog with active filters Preview
    ├── gemstone-detail.html          <-- Single Gem Details Preview
    ├── gallery.html                  <-- Gallery with Lightbox Preview
    └── contact.html                  <-- Contact Form & Map Preview
```

---

## 🚀 How to Install on WordPress

### Option 1: WordPress Admin Upload (Easiest)
1. In your WordPress admin dashboard, navigate to **Appearance > Themes > Add New > Upload Theme**.
2. Select the `shaheer-gems-theme.zip` file located at:
   `C:\Users\hp\.gemini\antigravity\scratch\shaheer-gems\shaheer-gems-theme.zip`
3. Click **Install Now**, then click **Activate**.
4. Upon activation, the theme automatically populates sample Ceylon gemstone listings with full specifications, cuts, origins, and carat weights.

### Option 2: Manual Directory Copy (LocalWP / XAMPP)
1. Copy the `shaheer-gems-theme` folder into your WordPress installation:
   `wp-content/themes/shaheer-gems-theme/`
2. Go to **Appearance > Themes** and click **Activate**.

---

## ⚙️ WordPress Admin Management

### 1. Business & WhatsApp Configuration
- Go to the new **Shaheer Gems** menu in your WordPress dashboard.
- Configure:
  - **WhatsApp Number:** Enter your business number with country code (e.g., `+94 77 707 2131`).
  - **Hotline Phone Number**
  - **Inquiry Email Address**
  - **Showroom Address**
  - **Business Hours**
  - **Currency Symbol** (`Rs.` or `$`)
  - **Google Maps Embed URL**

### 2. Managing Gemstones
- Navigate to **Gemstones > Add New Gemstone**.
- Enter:
  - **Gemstone Name & Description**
  - **Gem ID / Stock Code** (e.g. `SG001`)
  - **Carat Weight** (e.g. `3.45`)
  - **Color Tone** (e.g. `Royal Blue / Vivid`)
  - **Shape & Cut Style** (e.g. `Cushion Mixed Cut`)
  - **Clarity Grade** (e.g. `Eye Clean / VVS1`)
  - **Origin** (e.g. `Ratnapura, Sri Lanka`)
  - **Treatment** (e.g. `Natural Unheated / Untreated`)
  - **Dimensions** (e.g. `8.92 x 7.65 x 5.80 mm`)
  - **Certification** (e.g. `NGJA Certified`)
  - **Pricing Display:** Toggle between numerical price or "Price on Request".
  - **Availability:** Mark as *Available*, *Reserved*, or *Sold*.
  - **Featured:** Check to showcase on the Homepage.
  - **Featured Image:** Upload high-resolution gemstone photograph.

---

## 📱 WhatsApp Inquiry Mechanism

When visitors click **"Inquire on WhatsApp"** or **"Inquire"** anywhere on the website, WhatsApp immediately launches with an automated prefilled message:

> *"Hello Shaheer Gems, I am interested in the Royal Blue Ceylon Sapphire, Gem ID SG001, 3.45 carats. Could you please provide more information?"*

The recipient phone number is dynamically driven by your settings in `wp-admin > Shaheer Gems`.

---

## 🖥️ Live Browser Preview

To immediately inspect the design, navigation, filters, lightbox, and responsive layout in your browser:
Open `C:\Users\hp\.gemini\antigravity\scratch\shaheer-gems\preview\index.html` in any web browser.
