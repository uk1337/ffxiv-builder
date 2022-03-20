<?php
    include 'db.php';

    $itm_name = $_POST['itm_name'];
    $itm_level = $_POST['itm_level'];
    $itm_dexterity = $_POST['itm_dexterity'];
    $itm_hitrate = $_POST['itm_hitrate'];
    $itm_critical = $_POST['itm_critical'];
    $itm_determination = $_POST['itm_determination'];
    $itm_skillspeed = $_POST['itm_skillspeed'];
    $itm_vitality = $_POST['itm_vitality'];
    $itm_slot = $_POST['itm_slot'];
    $class_id = $_POST['class_id'];

    if (db_addItem($itm_name, $itm_level, $itm_dexterity, $itm_hitrate, $itm_critical, $itm_determination, $itm_skillspeed, $itm_vitality, $itm_slot, $class_id)) {
        echo 'Item Added Successful,success,The item ' . $itm_name . ' got added!';
    } else {
        echo 'Something went wrong!,danger,The item ' . $itm_name . ' cant get added!';
    }
?>