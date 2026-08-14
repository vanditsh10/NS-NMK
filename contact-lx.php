<?php
/**
 * Compact contact band for the redesigned inner pages, placed just above the
 * footer.
 *
 * header-lx.php is a single line and carries no phone strip or social row, so
 * converted pages would otherwise lose two destinations that only ever lived
 * in the old header.php: the Palampur number and the LinkedIn profile. This
 * partial puts them back.
 *
 * Every href and every label is copied verbatim from header.php — keep them in
 * step if that file ever changes.
 *
 *   <?php include("contact-lx.php"); ?>
 */
?>
    <section class="lx-section lx-contactband">
      <div class="lx-wrap">
        <div class="lx-contactband__grid">

          <div class="lx-numbers">
            <div class="lx-number">
              <span>Delhi / Noida Contact Nos:</span>
              <strong>
                <a href="tel:+91-9873290300">9873290300</a>
                <a href="https://wa.me/919873290300" aria-label="Whatsapp"><i class="fa fa-whatsapp" title="Whatsapp: +91-9873290300"></i></a>
              </strong>
            </div>
            <div class="lx-number">
              <span>Palampur Contact No:</span>
              <strong><a href="tel:+91-9816008103">+91-9816008103</a></strong>
            </div>
          </div>

          <div class="lx-social">
            <ul>
              <li><a href="https://www.facebook.com/nayasaverrehab/" target="_blank" aria-label="Facebook"><i class="fa fa-facebook-f"></i></a></li>
              <li><a href="https://www.youtube.com/@NayaSaveraRehabilitationCentre" target="_blank" aria-label="YouTube"><i class="fa fa-youtube"></i></a></li>
              <li><a href="https://www.instagram.com/nayasavera_wellnessretreat" target="_blank" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://www.linkedin.com/company/naya-savera-drug-de-addiction-rehabilitation-centre/?viewAsMember=true" target="_blank" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="https://wa.me/919873290300" aria-label="Whatsapp"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
            <a href="mailto:info@nayasavera.org" class="lx-email"><i class="fa fa-envelope-o"></i><span class="__cf_email__" data-cfemail="">info@nayasavera.org</span></a>
          </div>

        </div>
      </div>
    </section>
