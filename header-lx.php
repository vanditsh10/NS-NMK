<?php
/**
 * One-line site header used by the redesigned pages (index.php,
 * team-naya-savera.php). The rest of the site still uses header.php.
 *
 * Every link and its anchor text is identical to header.php — keep them in
 * step. Mark the current page by passing $lx_current before including, e.g.
 *   <?php $lx_current = 'team'; include("header-lx.php"); ?>
 */
$lx_current = isset($lx_current) ? $lx_current : 'home';
?>
  <!-- =====================================================================
       HEADER — one line: logo, navigation, call action.
       This page does not include header.php; it carries its own header so the
       bar can be a single row with no phone block. Every link and its anchor
       text is identical to header.php. The phone numbers it used to hold now
       live in the contact section further down the page.
       ===================================================================== -->
  <header class="lx-header" id="lxHeader">
    <div class="lx-bar">
      <strong class="lx-logo"><a href="/"><img src="images/logo.png" alt="Naya Savera - Best Rehab in Delhi, Nasha Mukti Kendra Delhi, Rehab Centre, Drug De-Addiction Centre in Delhi"></a></strong>

      <nav class="lx-nav" id="lxNav" aria-label="Main">
        <ul>
          <li<?php if ($lx_current === 'home') echo ' class="is-current"'; ?>><a href="/">Home</a></li>
          <li class="has-sub<?php if ($lx_current === 'about' || $lx_current === 'team') echo ' is-current'; ?>">
            <a href="#">About Us &#8964;</a>
            <ul>
              <li<?php if ($lx_current === 'about') echo ' class="is-current"'; ?>><a href="about.php">About Us</a></li>
              <li<?php if ($lx_current === 'team') echo ' class="is-current"'; ?>><a href="team-naya-savera.php">Team</a></li>
            </ul>
          </li>
          <li><a href="services.html">Services</a></li>
          <li><a href="treatment.html">Treatment</a></li>
          <li><a href="faq.html">FAQ</a></li>
          <li><a href="enquiry.html">Enquiry</a></li>
          <li><a href="gallery.html">Photo Gallery</a></li>
          <li><a href="/blog/">Blog</a></li>
          <li><a href="panchakarma-wellness-treatment.php">Panchakarma</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </nav>

      <a href="tel:+91-9873020709" class="lx-btn lx-btn--call lx-bar__cta"><i class="fa fa-phone" aria-hidden="true"></i> CALL NOW +91-9873020709 </a>

      <button type="button" class="lx-burger" id="lxBurger" aria-controls="lxNav" aria-expanded="false" aria-label="Toggle navigation">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>
