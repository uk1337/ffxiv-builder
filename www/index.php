<?php
    //Disable display errors
    include 'addons/noerror.php';

    //MySQL Connector
    include 'addons/db.php';

    //The Router
    $GLOBALS['router_site'] = $_GET['s'];
    include 'router.php';
?>

<!--
    Coded by Lucas M.
	Discord: uknwn#0001
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $GLOBALS['head_title']; ?></title>
        <?php include 'components/scripts.php'; ?>
        <?php include 'components/header.php'; ?>
    </head>
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	    <div class="wrapper">
            <?php include 'components/navbar.php'; ?>
            <?php include 'components/sidebar.php'; ?>

            <?php include 'sites/' . $GLOBALS['site_filename'] . '.php'; ?>

            <?php include 'components/foobar.php'; ?>
        </div>
    </body>
</html>