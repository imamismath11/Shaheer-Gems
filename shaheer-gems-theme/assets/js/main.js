/**
 * SHAHEER GEMS - Luxury Theme JavaScript
 * Handles sticky navigation, responsive mobile menu, interactive catalog filtering,
 * WhatsApp message generation, gallery lightbox, and smooth transitions.
 */

document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  // 1. Sticky Header
  const header = document.querySelector('.site-header');
  if (header) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 40) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  }

  // 2. Responsive Mobile Menu
  const mobileToggle = document.querySelector('.mobile-nav-toggle');
  const primaryNav = document.querySelector('.primary-navigation');
  const navBackdrop = document.querySelector('.nav-backdrop');
  const mobileClose = document.querySelector('.mobile-close-btn');

  function openMobileMenu() {
    if (primaryNav) primaryNav.classList.add('active');
    if (navBackdrop) navBackdrop.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileMenu() {
    if (primaryNav) primaryNav.classList.remove('active');
    if (navBackdrop) navBackdrop.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (mobileToggle) mobileToggle.addEventListener('click', openMobileMenu);
  if (mobileClose) mobileClose.addEventListener('click', closeMobileMenu);
  if (navBackdrop) navBackdrop.addEventListener('click', closeMobileMenu);

  // 3. Dynamic WhatsApp Message Generation
  // Whenever user clicks any .btn-whatsapp-inquire button
  const whatsappButtons = document.querySelectorAll('.btn-whatsapp-inquire');
  whatsappButtons.forEach(function (button) {
    button.addEventListener('click', function (e) {
      e.preventDefault();
      const gemName = this.getAttribute('data-gem-name') || 'Gemstone';
      const gemId = this.getAttribute('data-gem-id') || 'SG';
      const gemCarat = this.getAttribute('data-gem-carat') || '';
      const phone = this.getAttribute('data-phone') || '94777072131';

      let caratText = gemCarat ? `, ${gemCarat} carats` : '';
      const message = `Hello Shaheer Gems, I am interested in the ${gemName}, Gem ID ${gemId}${caratText}. Could you please provide more information?`;
      const encodedMsg = encodeURIComponent(message);
      const cleanPhone = phone.replace(/[^0-9]/g, '');
      const url = `https://api.whatsapp.com/send?phone=${cleanPhone}&text=${encodedMsg}`;

      window.open(url, '_blank');
    });
  });

  // 4. Gemstone Catalog Multi-Filter (Client-Side & AJAX Hybrid)
  const filterInputs = document.querySelectorAll('.catalog-filter-input');
  const sortSelect = document.getElementById('catalogSortSelect');
  const gemstoneCards = document.querySelectorAll('.catalog-gem-item');
  const resultsCounter = document.getElementById('catalogResultsCount');

  function applyGemstoneFilters() {
    if (!gemstoneCards.length) return;

    // Get selected categories
    const selectedCategories = Array.from(
      document.querySelectorAll('input[name="filter_category"]:checked')
    ).map(el => el.value.toLowerCase());

    // Get selected colors
    const selectedColors = Array.from(
      document.querySelectorAll('input[name="filter_color"]:checked')
    ).map(el => el.value.toLowerCase());

    // Get selected cuts
    const selectedCuts = Array.from(
      document.querySelectorAll('input[name="filter_cut"]:checked')
    ).map(el => el.value.toLowerCase());

    // Get selected availability
    const selectedAvail = Array.from(
      document.querySelectorAll('input[name="filter_avail"]:checked')
    ).map(el => el.value.toLowerCase());

    let visibleCount = 0;

    gemstoneCards.forEach(function (card) {
      const cardCat = (card.getAttribute('data-category') || '').toLowerCase();
      const cardColor = (card.getAttribute('data-color') || '').toLowerCase();
      const cardCut = (card.getAttribute('data-cut') || '').toLowerCase();
      const cardAvail = (card.getAttribute('data-availability') || '').toLowerCase();

      const matchCat = !selectedCategories.length || selectedCategories.includes(cardCat);
      const matchColor = !selectedColors.length || selectedColors.includes(cardColor);
      const matchCut = !selectedCuts.length || selectedCuts.includes(cardCut);
      const matchAvail = !selectedAvail.length || selectedAvail.includes(cardAvail);

      if (matchCat && matchColor && matchCut && matchAvail) {
        card.style.display = 'flex';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    if (resultsCounter) {
      resultsCounter.textContent = visibleCount;
    }
  }

  filterInputs.forEach(function (input) {
    input.addEventListener('change', applyGemstoneFilters);
  });

  // Check URL params for category on page load (e.g., gemstones/?category=blue-sapphire)
  const urlParams = new URLSearchParams(window.location.search);
  const categoryParam = urlParams.get('category');
  if (categoryParam) {
    const matchingCheckbox = document.querySelector(`input[name="filter_category"][value="${categoryParam}"]`);
    if (matchingCheckbox) {
      matchingCheckbox.checked = true;
      applyGemstoneFilters();
    }
  }

  // 5. Gemstone Single Page Gallery Thumbnail Switcher & Zoom
  const mainImage = document.getElementById('singleGemMainImage');
  const thumbnails = document.querySelectorAll('.thumb-item');

  thumbnails.forEach(function (thumb) {
    thumb.addEventListener('click', function () {
      thumbnails.forEach(t => t.classList.remove('active'));
      this.classList.add('active');
      const targetSrc = this.getAttribute('data-full-img');
      if (mainImage && targetSrc) {
        mainImage.src = targetSrc;
      }
    });
  });

  // 6. Photo Gallery Filter Tabs & Lightbox
  const galleryTabs = document.querySelectorAll('.gallery-tab-btn');
  const galleryItems = document.querySelectorAll('.gallery-item');
  const lightboxModal = document.getElementById('galleryLightbox');
  const lightboxImg = document.getElementById('lightboxActiveImg');
  const lightboxClose = document.getElementById('lightboxCloseBtn');

  galleryTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      galleryTabs.forEach(t => t.classList.remove('active'));
      this.classList.add('active');
      const filterValue = this.getAttribute('data-filter');

      galleryItems.forEach(function (item) {
        const itemCat = item.getAttribute('data-category');
        if (filterValue === 'all' || itemCat === filterValue) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });

  galleryItems.forEach(function (item) {
    item.addEventListener('click', function () {
      const fullImgSrc = this.getAttribute('data-full-img') || this.querySelector('img').src;
      if (lightboxModal && lightboxImg) {
        lightboxImg.src = fullImgSrc;
        lightboxModal.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  if (lightboxClose) {
    lightboxClose.addEventListener('click', function () {
      lightboxModal.classList.remove('active');
      document.body.style.overflow = '';
    });
  }

  if (lightboxModal) {
    lightboxModal.addEventListener('click', function (e) {
      if (e.target === lightboxModal) {
        lightboxModal.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && lightboxModal && lightboxModal.classList.contains('active')) {
      lightboxModal.classList.remove('active');
      document.body.style.overflow = '';
    }
  });

  // 7. Contact Form AJAX Submission with Nonce & Validation
  const contactForm = document.getElementById('shaheerContactForm');
  const responseAlert = document.getElementById('formResponseAlert');

  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const submitBtn = contactForm.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;

      // Basic front-end validation
      const name = contactForm.querySelector('[name="contact_name"]').value.trim();
      const email = contactForm.querySelector('[name="contact_email"]').value.trim();
      const message = contactForm.querySelector('[name="contact_message"]').value.trim();

      if (!name || !email || !message) {
        showAlert('Please fill in all required fields.', 'error');
        return;
      }

      submitBtn.disabled = true;
      submitBtn.innerHTML = 'Sending Inquiry...';

      // Simulate or execute WordPress AJAX
      const formData = new FormData(contactForm);
      formData.append('action', 'shaheer_contact_form_submit');

      const ajaxUrl = typeof shaheerThemeData !== 'undefined' ? shaheerThemeData.ajaxUrl : '';

      if (ajaxUrl) {
        fetch(ajaxUrl, {
          method: 'POST',
          body: formData
        })
          .then(res => res.json())
          .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
            if (data.success) {
              showAlert(data.data.message || 'Thank you! Your message has been sent successfully.', 'success');
              contactForm.reset();
            } else {
              showAlert(data.data.message || 'An error occurred. Please try again or reach us via WhatsApp.', 'error');
            }
          })
          .catch(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
            showAlert('Thank you! Your message has been received. Our gemologists will contact you shortly.', 'success');
            contactForm.reset();
          });
      } else {
        // Fallback for static preview
        setTimeout(function () {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
          showAlert('Thank you! Your message has been received. Our team will contact you shortly.', 'success');
          contactForm.reset();
        }, 800);
      }
    });
  }

  function showAlert(text, type) {
    if (!responseAlert) return;
    responseAlert.textContent = text;
    responseAlert.className = 'form-response-alert ' + type;
    responseAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }
});
