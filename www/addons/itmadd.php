<?php
    include 'db.php';

    if (!isset($_POST['classes'])) { 
        echo 'Something went wrong!,danger,No class selected!'; 
        return false; 
    }

    $itm_name = $_POST['itm_name'];
    $itm_level = $_POST['itm_level'];
    $itm_dexterity = $_POST['itm_dexterity'];
    $itm_hitrate = $_POST['itm_hitrate'];
    $itm_critical = $_POST['itm_critical'];
    $itm_determination = $_POST['itm_determination'];
    $itm_skillspeed = $_POST['itm_skillspeed'];
    $itm_vitality = $_POST['itm_vitality'];
    $itm_slot = $_POST['itm_slot'];

    if (db_isItemExists($itm_name)) { 
        echo 'Something went wrong!,danger,The Item-Name already exists!';
        return false;
    }

    //Add Item to Items
    $sql = 'INSERT INTO `items`(`name`, `level`, `dexterity`, `hitrate`, `critical`, `determination`, `skillspeed`, `vitality`, `slot`) 
    VALUES 
    ("'.$itm_name.'",'.$itm_level.','.$itm_dexterity.','.$itm_hitrate.','.$itm_critical.','.$itm_determination.','.$itm_skillspeed.','.$itm_vitality.','.$itm_slot.')';
    db_exec($sql);

    $sql = 'SELECT `itm_id` FROM `items` WHERE `name` = "' . $itm_name . '";';
    $itm_id = db_exec($sql);

    foreach ($_POST['classes'] as $class) {
        $class_id = db_Name2classID($class);
        if (!db_isClassExists($class_id)) { continue; }
        $sql = 'INSERT INTO `relation_itm_class`(`itm_id`, `class_id`) VALUES ('.$itm_id.','.$class_id.')';
        db_exec($sql);
    }

    echo 'Something went right!,success,Item successfully added!'; 
    return true;
?>