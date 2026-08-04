<?php
/**
 * Template for connect.php (which is gitignored because it holds real credentials).
 *
 * Copy this to connect.php and fill in the real values from cPanel:
 *   cp connect.sample.php connect.php
 *
 * Note: as of this writing every mysqli_connect() call in the live connect.php
 * is commented out — the site renders without a database. The guestbook /
 * client-feedback pages are the only things that would need it.
 */

$db_host     = 'localhost';
$db_user     = 'YOUR_DB_USER';
$db_pass     = 'YOUR_DB_PASSWORD';
$db_database = 'YOUR_DB_NAME';

define("EntryPerPage", "10");

// $link = mysqli_connect($db_host, $db_user, $db_pass, $db_database)
//     or die('Unable to establish a DB connection');
?>
