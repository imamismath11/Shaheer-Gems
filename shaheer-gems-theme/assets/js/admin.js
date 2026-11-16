/**
 * Shaheer Gems Admin Meta Box Scripts
 * Handles tab switching and native WordPress Media Library image selection.
 */

jQuery(document).ready(function ($) {
  'use strict';

  // 1. Tab Switching
  $('.shaheer-tab-btn').on('click', function (e) {
    e.preventDefault();
    var target = $(this).data('tab');

    $('.shaheer-tab-btn').removeClass('active');
    $(this).addClass('active');

    $('.shaheer-tab-pane').removeClass('active');
    $('#' + target).addClass('active');
  });

  // 2. WordPress Media Uploader for Hero & About Images
  $('.shaheer-upload-btn').on('click', function (e) {
    e.preventDefault();
    var button = $(this);
    var targetInputId = button.data('target');
    var targetImgId = button.data('preview');

    var customUploader = wp.media({
      title: 'Select or Upload Gemstone Image',
      button: {
        text: 'Use this Image'
      },
      multiple: false
    });

    customUploader.on('select', function () {
      var attachment = customUploader.state().get('selection').first().toJSON();
      $('#' + targetInputId).val(attachment.url);
      $('#' + targetImgId).attr('src', attachment.url).show();
    });

    customUploader.open();
  });

  // 3. Remove Image Handler
  $('.shaheer-remove-btn').on('click', function (e) {
    e.preventDefault();
    var button = $(this);
    var targetInputId = button.data('target');
    var targetImgId = button.data('preview');

    $('#' + targetInputId).val('');
    $('#' + targetImgId).attr('src', '').hide();
  });
});
