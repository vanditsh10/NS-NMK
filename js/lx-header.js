/**
 * Behaviour for the one-line header in header-lx.php.
 * Shared by the redesigned pages; no jQuery, no bootstrap collapse.
 */
(function () {
  var burger = document.getElementById('lxBurger');
  var nav = document.getElementById('lxNav');
  var header = document.getElementById('lxHeader');
  if (!header) return;

  if (burger && nav) {
    burger.addEventListener('click', function () {
      var open = header.classList.toggle('is-open');
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    nav.addEventListener('click', function (e) {
      // let a real navigation close the menu; ignore the "About Us" stub link
      var a = e.target.closest('a');
      if (a && a.getAttribute('href') !== '#') {
        header.classList.remove('is-open');
        burger.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // Shadow the bar once the page has moved, so it reads as lifted over content.
  var onScroll = function () {
    header.classList.toggle('is-stuck', window.scrollY > 8);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();
