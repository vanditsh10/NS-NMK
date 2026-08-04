<?php
/**
 * Template for secrets.php (gitignored).
 *
 *   cp secrets.sample.php secrets.php
 *
 * then paste the real values in. enquiry.php requires this file, so the live
 * enquiry form 500s if secrets.php is missing on the server.
 */

// Google reCAPTCHA v2 secret key — Google admin console > reCAPTCHA > nayasavera.org.
define('RECAPTCHA_SECRET', 'YOUR_RECAPTCHA_SECRET_KEY');
