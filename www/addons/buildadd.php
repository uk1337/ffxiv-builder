<?php
    include 'db.php';

    $build_name = $_POST['build_name'];
    $class_id = $_POST['class_id'];
    $itm_1 = $_POST['itm_1'];
    $itm_2 = $_POST['itm_2'];
    $itm_3 = $_POST['itm_3'];
    $itm_4 = $_POST['itm_4'];
    $itm_5 = $_POST['itm_5'];
    $itm_6 = $_POST['itm_6'];

    if (db_addBuild(
        $build_name,
        $class_id,
        $itm_1,
        $itm_2,
        $itm_3,
        $itm_4,
        $itm_5,
        $itm_6
        )) {
        echo 'Build Added Successful,success,The build ' . $build_name . ' got added!';
    } else {
        echo 'Something went wrong!,danger,The build ' . $build_name . ' cant get added!';
    }
?>