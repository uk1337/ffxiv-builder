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
        $sql = 'SELECT `name` FROM `klassen` WHERE `class_id` = '. $classID .';';
        return db_exec($sql);
    }
    function db_Name2classID($name) {
        $sql = 'SELECT `class_id` FROM `klassen` WHERE `name` = "'. $name .'";';
        return db_exec($sql);
    }

    //ITM ADD Stuff - Moved to /addons/itmadd.php because this one is shit
    /*function db_addItem($itm_name, $itm_level, $itm_dexterity, $itm_hitrate, $itm_critical, $itm_determination, $itm_skillspeed, $itm_vitality, $itm_slot, $class_id) {
        $class_id = db_Name2classID($class_id);
        if (!db_isClassExists($class_id)) { return false; }
        if (db_isItemExists($itm_name)) { return false; }

        $sql = 'INSERT INTO `items`(`name`, `level`, `dexterity`, `hitrate`, `critical`, `determination`, `skillspeed`, `vitality`, `slot`) 
        VALUES 
        ("'.$itm_name.'",'.$itm_level.','.$itm_dexterity.','.$itm_hitrate.','.$itm_critical.','.$itm_determination.','.$itm_skillspeed.','.$itm_vitality.','.$itm_slot.')';
        db_exec($sql);

        $sql = 'SELECT `itm_id` FROM `items` WHERE `name` = "' . $itm_name . '";';
        $itm_id = db_exec($sql);

        $sql = 'INSERT INTO `relation_itm_class`(`itm_id`, `class_id`) VALUES ('.$itm_id.','.$class_id.')';
        db_exec($sql);

        return true;
    }*/
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

    //Add Build Stuff - old
    /*function db_getItemForClassForSlot($class_id, $slot) {
        $sql = 'SELECT `itm_id` FROM `items` WHERE `slot` = ' . $slot . ';';
        $itm_ids = db_exec_array($sql);

        $arr = [];
        foreach ($itm_ids as $c) {
            array_push($arr, $c[1]);
        }


        $arr2 = [];
        foreach ($arr as $c2) {
            $sql = 'SELECT `itm_id` FROM `relation_itm_class` WHERE `class_id` = ' . $class_id . ';';
        }
    }*/
    function db_itmid2name($itm_id) {
        $sql = 'SELECT `name` FROM `items` WHERE `itm_id` = ' . $itm_id . ';';
        return db_exec($sql);
    }
    function db_name2itmid($name) {
        $sql = 'SELECT `itm_id` FROM `items` WHERE `name` = "' . $name . '";';
        return db_exec($sql);
    }
    function db_getItemForClassForSlot($class_id, $slot) {
        $sql = 'SELECT `itm_id` FROM `items` WHERE `slot` = ' . $slot . ';';
        $itm_ids = db_exec_array($sql);

        /*foreach ($itm_ids as $c) {
            echo '<br>' . $c[0];
        }*/

        $sql = 'SELECT `itm_id` FROM `relation_itm_class` WHERE `class_id` = ' . $class_id . ';';
        $class_ids = db_exec_array($sql);

        /*foreach ($class_ids as $d) {
            echo '<br>' . $d[0];
        }*/

        $arr = [];

        for ($i = 0; $i < sizeof($itm_ids); $i++) {
            for ($x = 0; $x < sizeof($class_ids); $x++) {
                if ($class_ids[$x][0] == $itm_ids[$i][0]) { array_push($arr, $itm_ids[$i][0]); }
            }
        }

        return $arr;
    }

    /*function db_isItemClassSlotOK($class_id, $itm_id, $slot) {
        if(!db_isClassExists($classID)) { return false; }

        $sql = 'SELECT COUNT(*) FROM `relation_itm_class` WHERE `itm_id` = ' . $itm_id . ' AND `class_id` = ' . $class_id . ';';
        if (db_exec($sql) != 1) {
            return false;
        }

        $sql = 'SELECT COUNT(*) FROM `items` WHERE `itm_id` = ' . $itm_id . ' AND `slot` = ' . $slot . ';';
        if (db_exec($sql) != 1) {
            return false;
        }

        return true;
    }*/

    function db_addBuild(
        $build_name,
        $class_id,
        $itm_1,
        $itm_2,
        $itm_3,
        $itm_4,
        $itm_5,
        $itm_6
        ) {
            $class_id = db_Name2classID($class_id);
            if (!db_isClassExists($class_id)) { return false; }

            if (!db_isItemExists($itm_1)) { return false; }
            if (!db_isItemExists($itm_2)) { return false; }
            if (!db_isItemExists($itm_3)) { return false; }
            if (!db_isItemExists($itm_4)) { return false; }
            if (!db_isItemExists($itm_5)) { return false; }
            if (!db_isItemExists($itm_6)) { return false; }

            $itm_1 = db_name2itmid($itm_1);
            $itm_2 = db_name2itmid($itm_2);
            $itm_3 = db_name2itmid($itm_3);
            $itm_4 = db_name2itmid($itm_4);
            $itm_5 = db_name2itmid($itm_5);
            $itm_6 = db_name2itmid($itm_6);

            /*if(!db_isClassExists($class_id)) { return false; }
            if (!db_isItemClassSlotOK($class_id, $itm_1, 1)) { return false; }
            if (!db_isItemClassSlotOK($class_id, $itm_2, 2)) { return false; }
            if (!db_isItemClassSlotOK($class_id, $itm_3, 3)) { return false; }
            if (!db_isItemClassSlotOK($class_id, $itm_4, 4)) { return false; }
            if (!db_isItemClassSlotOK($class_id, $itm_5, 5)) { return false; }
            if (!db_isItemClassSlotOK($class_id, $itm_6, 6)) { return false; }*/

            $sql = 'INSERT INTO `builds`(`name`, `itmslot1`, `itmslot2`, `itmslot3`, `itmslot4`, `itmslot5`, `itmslot6`, `class_id`) 
            VALUES 
            ("'.$build_name.'",'.$itm_1.','.$itm_2.','.$itm_3.','.$itm_4.','.$itm_5.','.$itm_6.','.$class_id.')';
            db_exec($sql);

            return true;
        }

        function db_getItemDB() {
            $sql = 'SELECT * FROM `items`;';
            return db_exec_array($sql);
        }
        function db_getClassDB() {
            $sql = 'SELECT * FROM `klassen`;';
            return db_exec_array($sql);
        }
        function db_getRelationDB() {
            $sql = 'SELECT * FROM `relation_itm_class`;';
            return db_exec_array($sql);
        }

?>