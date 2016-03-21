<?php
// Set the site ID if required.  This must be done before any database
// access is attempted.

if (!empty($_GET['site']))
    $site_id = $_GET['site'];
else if (is_dir("sites/" . $_SERVER['HTTP_HOST']))
    $site_id = $_SERVER['HTTP_HOST'];
else
    $site_id = 'default';

if (empty($site_id) || preg_match('/[^A-Za-z0-9\\-.]/', $site_id))
    die("Site ID '".htmlspecialchars($site_id,ENT_NOQUOTES)."' contains invalid characters.");

require_once "sites/$site_id/sqlconf.php";

if ($config == 1) {
    header("Location: interface/login/login_frame.php?site=$site_id");
} else {
    header("Location: setup.php?site=$site_id");
}
