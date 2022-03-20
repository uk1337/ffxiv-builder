<?php
    $GLOBALS['db_pdo'] = new PDO('mysql:host=localhost;dbname=ffxiv_2', 'root', '');

    function db_exec($sql) {
        $sth = $GLOBALS['db_pdo']->prepare($sql);
        $sth->execute();
        $result = $sth->fetchColumn();
        return $result;
    }
    function db_exec_array($sql) {
        $sth = $GLOBALS['db_pdo']->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    function db_isClassExists($classID) {
        $sql = 'SELECT COUNT(*) FROM `klassen` WHERE `class_id` = "' . $classID . '";';
        if (db_exec($sql) == 1) {
            return true;
        }
        return false;
    }

    function db_isItemClassSlotOK($classID, $itemID, $slotID) {
        if(!db_isClassExists($classID)) { return false; }

        $sql = 'SELECT COUNT(*) FROM `relation_itm_slot` WHERE `itm_id` = ' . $itemID . ' AND `slot` = ' . $slotID . ';';
        if (db_exec($sql) == 1) {
            return true;
        }

        return false;
    }

    //Load Out
    function db_countLoadouts() {
        $sql = 'SELECT COUNT(*) FROM `builds`;';
        return db_exec($sql);
    }
    function db_countLoadoutsID($classID) {
        $sql = 'SELECT COUNT(*) FROM `builds` WHERE `class_id` = ' . $classID . ';';
        return db_exec($sql);
    }

    function db_getLoadouts() {
        $sql = 'SELECT * FROM `builds`;';
        return db_exec_array($sql);
    }
    function db_getLoadoutsID($classID) {
        $sql = 'SELECT * FROM `builds` WHERE `class_id` = ' . $classID . ';';
        return db_exec_array($sql);
    }

    //Count
    function db_countClasses() {
        $sql = 'SELECT COUNT(*) FROM `klassen`;';
        return db_exec($sql);
    }
    function db_countItems() {
        $sql = 'SELECT COUNT(*) FROM `items`;';
        return db_exec($sql);
    }

    //Convert
    function db_classID2Name($classID) {
        $sql = 'SELECT `Klassen` FROM `klassen` WHERE `class_id` = '. $classID .';';
        return db_exec($sql);
    }
    function db_Name2classID($name) {
        $sql = 'SELECT `class_id` FROM `klassen` WHERE `name` = "'. $name .'";';
        return db_exec($sql);
    }

    //ITM ADD Stuff
    function db_addItem($itm_name, $itm_level, $itm_dexterity, $itm_hitrate, $itm_critical, $itm_determination, $itm_skillspeed, $itm_vitality, $itm_slot, $class_id) {
        $class_id = db_Name2classID($class_id);
        if (!db_isClassExists($class_id)) { return false; }
        if (db_isItemExists($itm_name)) { return false; }

        $sql = 'INSERT INTO `items`(`name`, `level`, `dexterity`, `hitrate`, `critical`, `determination`, `skillspeed`, `vitality`, `slot`) 
        VALUES 
        ("'.$itm_name.'",'.$itm_level.','.$itm_dexterity.','.$itm_hitrate.','.$itm_critical.','.$itm_determination.','.$itm_skillspeed.','.$itm_vitality.','.$itm_slot.')';
        db_exec($sql);

        $sql = 'SELECT `itm_id` FROM `items` WHERE `name` = "' . $itm_name . '";';
        $itm_id = db_exec($sql);

        $sql = 'INSERT INTO `relation_itm_slot`(`itm_id`, `class_id`) VALUES ('.$itm_id.','.$class_id.')';
        db_exec($sql);

        return true;
    }
    function db_isItemExists($itm_name) {
        $sql = 'SELECT COUNT(*) FROM `items` WHERE `name` = "' . $itm_name . '";';
        if (db_exec($sql) == 1) {
            return true;
        }
        return false;
    }
    function db_getClassNames() {
        $sql = 'SELECT * FROM `klassen`;';
        return db_exec_array($sql);
    }
    function db_getClassIDS() {
        $sql = 'SELECT * FROM `klassen`;';
        return db_exec_array($sql);
    }

    //Add Build Stuff
    function db_createBuild($buildname, $classID, $itmSlot1, $itmSlot2, $itmSlot3, $itmSlot4, $itmSlot5, $itmSlot6) {
        if(!db_isClassExists($classID)) { return false; }

        if (!db_isItemClassSlotOK($classID, $itmSlot1, 1)) { return false; }
        if (!db_isItemClassSlotOK($classID, $itmSlot2, 2)) { return false; }
        if (!db_isItemClassSlotOK($classID, $itmSlot3, 3)) { return false; }
        if (!db_isItemClassSlotOK($classID, $itmSlot4, 4)) { return false; }
        if (!db_isItemClassSlotOK($classID, $itmSlot5, 5)) { return false; }
        if (!db_isItemClassSlotOK($classID, $itmSlot6, 6)) { return false; }

        $sql = 'INSERT INTO `builds`(`Buildname`, `Klasse`, `ItmSlot1`, `ItmSlot2`, `ItmSlot3`, `ItmSlot4`, `ItmSlot5`, `ItmSlot6`) VALUES ('. $buildname .','. $classID .','. $itmSlot1 .','. $itmSlot2 .','. $itmSlot3 .','. $itmSlot4 .','. $itmSlot5 .','. $itmSlot6 . ';)';
        db_exec($sql);
        
        return true;
    }

?>