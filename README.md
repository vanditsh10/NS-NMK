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

## The home page has its own header — read this before editing the nav

`index.php` does **not** `include("header.php")`. It carries its own header
markup so the bar can be a single row (logo, nav, call button) with no phone
block. Every other page still uses `header.php` unchanged.

**Consequence: a nav change must be made in two places** — `header.php` for the
rest of the site, and the `<header class="lx-header">` block near the top of
`index.php` for the home page. The link list and anchor text are currently
identical in both; keep them that way.

The phone numbers `header.php` used to show now live in the contact section
above the footer on the home page, along with the social links and email that
were in the old top strip.

All home page styling is in `css/home-redesign.css`, scoped to `body.ns-home`
and loaded only by `index.php`. Rules in there that touch shared markup (the
footer, and the "Our Awareness & Services" block that lives in `footer.php`)
are scoped the same way, so no other page is affected.

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
