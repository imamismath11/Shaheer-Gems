<?php
/**
 * AJAX Handlers for Dynamic Catalog Filtering and Contact Form
 *
 * @package Shaheer_Gems
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle Contact Form Submission
 */
function shaheer_handle_contact_submission() {
    // Check nonce if present
    if (isset($_POST['contact_nonce']) && !wp_verify_nonce($_POST['contact_nonce'], 'shaheer_contact_action')) {
        wp_send_json_error(array('message' => __('Security verification failed. Please refresh and try again.', 'shaheer-gems')));
    }

    $name    = isset($_POST['contact_name']) ? sanitize_text_field($_POST['contact_name']) : '';
    $email   = isset($_POST['contact_email']) ? sanitize_email($_POST['contact_email']) : '';
    $phone   = isset($_POST['contact_phone']) ? sanitize_text_field($_POST['contact_phone']) : '';
    $subject = isset($_POST['contact_subject']) ? sanitize_text_field($_POST['contact_subject']) : 'New Gemstone Inquiry';
    $message = isset($_POST['contact_message']) ? sanitize_textarea_field($_POST['contact_message']) : '';

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => __('Please fill in all required fields (Name, Email, Message).', 'shaheer-gems')));
    }

    $recipient = shaheer_get_option('shaheer_email_address', get_option('admin_email'));
    $mail_subject = sprintf('[Shaheer Gems Inquiry] %s', $subject);
    $mail_body    = "New inquiry received from Shaheer Gems website:\n\n";
    $mail_body   .= "Name: " . $name . "\n";
    $mail_body   .= "Email: " . $email . "\n";
    $mail_body   .= "Phone: " . $phone . "\n";
    $mail_body   .= "Subject: " . $subject . "\n\n";
    $mail_body   .= "Message:\n" . $message . "\n";

    $headers = array('Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>');

    // Send email via standard wp_mail
    @wp_mail($recipient, $mail_subject, $mail_body, $headers);

    wp_send_json_success(array('message' => __('Thank you! Your message has been sent successfully. Our gemologist team will respond shortly.', 'shaheer-gems')));
}
add_action('wp_ajax_shaheer_contact_form_submit', 'shaheer_handle_contact_submission');
add_action('wp_ajax_nopriv_shaheer_contact_form_submit', 'shaheer_handle_contact_submission');
