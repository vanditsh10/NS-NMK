# NS-NMK — Naya Savera (nayasavera.org)

Plain HTML/PHP site, no framework, no build step. Production runs on cPanel/Apache
with **PHP 8.2** (`ea-php82`, set in `.htaccess`).

## Running locally

Requires PHP (any 8.x). Installed here via `brew install php`.

```bash
php -S localhost:8765 -t . router.php
```

Then open http://localhost:8765.

### Why `router.php`

Production routing lives in `.htaccess`, which PHP's built-in server ignores.
The whole nav links to `.html` URLs (`services.html`, `contact.html`, …) that
Apache rewrites to `.php` via:

```apache
RewriteRule ^(.+)\.html$ $1.php [NC]
```

`router.php` reproduces that rewrite plus the `ErrorDocument 404 /404.php`
handler, so local browsing matches production. It deliberately does **not**
reproduce the http→https redirect (would break localhost) or the `/blog/`
redirects (see below).

## Secrets — read before deploying

Two files hold credentials and are **gitignored**. A fresh clone must create them
or pages will break:

```bash
cp connect.sample.php connect.php
cp secrets.sample.php secrets.php
```

| File | Holds | Breaks if missing |
| --- | --- | --- |
| `secrets.php` | Google reCAPTCHA v2 secret key | `enquiry.php` fatals on POST |
| `connect.php` | MySQL credentials | nothing today — every `mysqli_connect()` in it is commented out; only the old guestbook / client-feedback pages would need it |

**If you deploy from this repo, upload `secrets.php` to the server manually.**
It used to be hardcoded in `enquiry.php`; it was moved out so the key isn't
public.

## Two header partials — read this before editing the nav

The site currently has **two** headers:

| Partial | Used by | Shape |
| --- | --- | --- |
| `header.php` | every legacy page | social strip + logo + phone block + nav |
| `header-lx.php` | `index.php`, `team-naya-savera.php` | one line: logo, nav, call button |

**A nav change must be made in both.** The link list and anchor text are
currently identical; keep them that way. `header-lx.php` marks the active item
from `$lx_current`, set before the include:

```php
<?php $lx_current = 'team'; include("header-lx.php"); ?>
```

Its behaviour (mobile menu, sticky shadow) lives in `js/lx-header.js` — no
jQuery, no bootstrap collapse.

`header-lx.php` has no phone block and no social strip. On the home page those
moved into the contact section above the footer. **Any other page converted to
this header loses them unless the page provides them** — see the note in
`team-naya-savera.php` below.

## The redesign stylesheet

`css/lx.css`, scoped to `body.ns-lx`, loaded only by the redesigned pages. Rules
that touch shared markup (`footer.php`, its "Our Awareness & Services" block,
and `sidebar.php`) are scoped the same way, so legacy pages are untouched.

Recurring trap: this theme floats a lot of containers (`#wrapper`, `#main`,
`#footer`, `.sidebar-box`, `.price-plans-section`, the sidebar `form`). A
floated ancestor collapses CSS grids inside it and stops parents containing
their children — `float: none` and `display: flow-root` are used throughout to
undo it.

### Home hero images — `images/hero/`

`hero-1..5.jpg` are the home page's background slides. They are **derived
files**, cut and resampled from photographs already in the repo:

| file | source | shows |
| --- | --- | --- |
| `hero-1.jpg` | `gallery/66.jpg` | Noida centre from the lawn, residents lined up |
| `hero-2.jpg` | `gallery/67.jpg` | morning exercise on the Noida lawn |
| `hero-3.jpg` | `gallery/68.jpg` | the Himachal centre under the snow line |
| `hero-4.jpg` | `gallery/13.jpg` | the community, hands raised |
| `hero-5.jpg` | `gallery/88.jpg` | a residents' room |

Each is cropped to a uniform **16:9** and resampled to 1440×810 (LANCZOS +
unsharp, q74). The uniform ratio is what lets the mobile hero show the frames
**whole**, with no crop at all — `css/lx.css` gives the mobile band
`aspect-ratio: 16 / 9` to match. Change the masters' ratio and that rule has to
change with it.

The sources are only 800–1000px wide, so these are upscaled; resampling them
offline beats letting the browser stretch them, but the real ceiling is the
photography. **Higher-resolution originals would be the single biggest
improvement to this hero.**

Regenerating them is not optional bookkeeping: the hero scrim in `css/lx.css`
is solved against these exact pixels. Swap an image and re-check contrast in
the copy zone.

**Known issue, accepted deliberately.** The scrim is a gradient pinned to the
hero in percentages, tuned so the photographs stay visible at ~1920px. But the
headline wraps to a different number of lines at every width, so the copy
block's top edge sits at 44% of the hero at 1920px and only 12% at 1280px — the
gradient cannot follow it. Measured worst-case headline contrast:

| width | headline | AA wants |
| --- | --- | --- |
| 1000px | 1.6:1 | 3.0 |
| 1280px | 1.6:1 | 3.0 |
| 1440px | 2.0:1 | 3.0 |
| 1920px | 3.4:1 | 3.0 |

So on a 13–14" laptop the headline is hard to read over the brighter slides.
This predates the current gradient — the older, heavier one failed at those
widths too (1.7 / 1.7 / 2.2). Mobile is unaffected: at <=991px the hero becomes
an uncropped band with the copy on solid black.

A scrim anchored to `.lx-hero__copy` fixes it at every width, and was tried —
but it reads as a dark blob behind the text and was rejected on looks. If this
gets revisited, the constraint to respect is that a pseudo-element paints only
inside its own box, so a radial gradient must reach fully transparent before
that box ends or the box edge shows as a hard rectangle. Anything checking hero
contrast must check **1000, 1280, 1440 and 1920**, not just one.

The old campaign artwork (`images/banner-img-1..3.jpg`) is still in the repo and
still used by `404.php`; do not delete it. `index.php`'s `og:image` also still
points at `banner-img-1.jpg`, deliberately left alone as a meta tag.

### team-naya-savera.php

Rebuilt on the redesign language. Copy, title, description, keywords and
canonical are byte-identical to the old page. Because it now uses
`header-lx.php`, two destinations that only ever appeared in the old header
strip are no longer on this page: **the Palampur number `tel:+91-9816008103`
and the LinkedIn profile**. Everything else the page linked to is still
reachable. Add a contact block to the page if those matter.

## Not in this repo

- **`/blog/`** — a separate WordPress install living in its own directory on the
  host. `.htaccess` has ~70 `Redirect 301` rules pointing legacy `blog-*.php`
  pages at it. Those legacy stub files are here; the WordPress install is not.
- **`video/panchakarma.mp4`** (158 MB) — over GitHub's 100 MB per-file limit.
  Present locally, deployed to the host directly.

## Layout

```
*.php              page templates (flat, one file per URL)
header.php         topbar + logo + nav, included by every page
header-includes.php  <head> assets
footer.php         footer, included by every page
sidebar.php
css/  js/  fonts/  images/  gallery/  thumb/  video/
.htaccess          Apache rewrites + the legacy /blog/ redirect table
router.php         dev-server stand-in for .htaccess (local only)
```

Pages are self-contained: each `.php` file has its own `<head>` block and inlines
its own SEO metadata, then `include`s `header.php` / `footer.php`.
