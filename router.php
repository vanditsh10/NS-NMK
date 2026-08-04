<?php
/**
 * Dev-server router for `php -S`.
 *
 * The production host is Apache and the real routing lives in .htaccess.
 * PHP's built-in server ignores .htaccess, so this reproduces the two rules
 * that matter for local browsing:
 *   RewriteRule ^(.+)\.html$ $1.php   (nav links are all .html)
 *   ErrorDocument 404 /404.php
 *
 * The .htaccess http->https redirect and the /blog/ redirects are deliberately
 * NOT reproduced: the blog is a separate WordPress install that is not part of
 * this repo, and forcing https would break the dev server.
 *
 * Usage:  php -S localhost:8000 router.php
 */

$uri  = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$root = __DIR__;

// Directory request -> index.php
if ($uri === '' || substr($uri, -1) === '/') {
    $index = $root . $uri . 'index.php';
    if (is_file($index)) {
        $_SERVER['SCRIPT_NAME'] = $uri . 'index.php';
        require $index;
        return true;
    }
}

$path = $root . $uri;

// Existing static asset (css/js/images/fonts/video) -> let the server stream it.
if (is_file($path) && substr($uri, -4) !== '.php') {
    return false;
}

// Existing .php file -> run it.
if (is_file($path)) {
    return false;
}

// .html -> .php  (mirrors the Apache rewrite the whole nav depends on)
if (preg_match('/^(.+)\.html$/i', $uri, $m) && is_file($root . $m[1] . '.php')) {
    $_SERVER['SCRIPT_NAME'] = $m[1] . '.php';
    require $root . $m[1] . '.php';
    return true;
}

// Extensionless -> .php  (convenience; harmless in production terms)
if (!pathinfo($uri, PATHINFO_EXTENSION) && is_file($path . '.php')) {
    $_SERVER['SCRIPT_NAME'] = $uri . '.php';
    require $path . '.php';
    return true;
}

// Everything else -> the site's own 404 page.
http_response_code(404);
require $root . '/404.php';
return true;
