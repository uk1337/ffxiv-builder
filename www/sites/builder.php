<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FFXIV - Build Creator JS</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
		<div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Adding a new item</h3>
                        </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Loadout Name</label>
                                    <input disabled type="text" class="form-control" id="build_name" value="<?php echo $_GET['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Klasse</label>
                                    <select disabled class="form-control" id="class_id">
                                        <option><?php echo $_GET['class']; ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Slot 1 - Weapon</label>
                                    <select class="form-control" id="itm_slot_1">
                                        <?php 
                                            $arr = db_getItemForClassForSlot(db_Name2classID($_GET['class']), 1);
                                            foreach ($arr as $a) {
                                                echo '<option>' . db_itmid2name($a) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Slot 2 - Helm</label>
                                    <select class="form-control" id="itm_slot_2">
                                        <?php 
                                            $arr = db_getItemForClassForSlot(db_Name2classID($_GET['class']), 2);
                                            foreach ($arr as $a) {
                                                echo '<option>' . db_itmid2name($a) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Slot 3 - Brustpanzer</label>
                                    <select class="form-control" id="itm_slot_3">
                                        <?php 
                                            $arr = db_getItemForClassForSlot(db_Name2classID($_GET['class']), 3);
                                            foreach ($arr as $a) {
                                                echo '<option>' . db_itmid2name($a) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Slot 4 - Handschuhe</label>
                                    <select class="form-control" id="itm_slot_4">
                                        <?php 
                                            $arr = db_getItemForClassForSlot(db_Name2classID($_GET['class']), 4);
                                            foreach ($arr as $a) {
                                                echo '<option>' . db_itmid2name($a) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Slot 5 - Hose</label>
                                    <select class="form-control" id="itm_slot_5">
                                        <?php 
                                            $arr = db_getItemForClassForSlot(db_Name2classID($_GET['class']), 5);
                                            foreach ($arr as $a) {
                                                echo '<option>' . db_itmid2name($a) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Slot 6 - Schuhe</label>
                                    <select class="form-control" id="itm_slot_6">
                                        <?php 
                                            $arr = db_getItemForClassForSlot(db_Name2classID($_GET['class']), 6);
                                            foreach ($arr as $a) {
                                                echo '<option>' . db_itmid2name($a) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                            </div>
                                                    
                            <div class="card-footer">
                                    <a class="btn btn-danger" href="?s=creator" role="button">Back</a>
                                    <button type="submit" class="btn btn-success" onclick="addBuildAsync(
                                        $('#build_name').val(),
                                        $('#class_id').val(),
                                        $('#itm_slot_1').val(),
                                        $('#itm_slot_2').val(),
                                        $('#itm_slot_3').val(),
                                        $('#itm_slot_4').val(),
                                        $('#itm_slot_5').val(),
                                        $('#itm_slot_6').val(),
                                    );">Submit</button>
                            </div>

                    </div>

                </div>
            
            </div>

        </div>

    </section>

</div>

<!--
    $itm_name = $_POST['itm_name'];
    $itm_level = $_POST['itm_level'];
    $itm_dexterity = $_POST['itm_dexterity'];
    $itm_hitrate = $_POST['itm_hitrate'];
    $itm_determination = $_POST['itm_determination'];
    $itm_skillspeed = $_POST['itm_skillspeed'];
    $itm_vitality = $_POST['itm_vitality'];
    $itm_slot = $_POST['itm_slot'];
    $class_id = $_POST['class_id'];

    db_addItem($itm_name, $itm_level, $itm_dexterity, $itm_hitrate, $itm_determination, $itm_skillspeed, $itm_vitality, $itm_slot, $class_id);

    itm_name: itm_name, itm_level: itm_level, itm_dexterity: itm_dexterity, itm_hitrate: itm_hitrate, itm_determination: itm_determination, itm_skillspeed:itm_skillspeed, itm_vitality:itm_vitality, itm_slot:itm_slot, class_id:class_id
-->

<!-- some Ajax with jQuery testing stuff-->
<script>
/*function addItmAsync(itm_name, itm_level, itm_dexterity, itm_hitrate, itm_critical, itm_determination, itm_skillspeed, itm_vitality, itm_slot, class_id) {
    $.ajax({
        url: '/addons/itmadd.php',
        type: 'post',
        data: {itm_name: itm_name, itm_level: itm_level, itm_dexterity: itm_dexterity, itm_hitrate: itm_hitrate, itm_critical: itm_critical, itm_determination: itm_determination, itm_skillspeed:itm_skillspeed, itm_vitality:itm_vitality, itm_slot:itm_slot, class_id:class_id},
        success: function(response) {
            const arr = response.split(",");
            Alert(arr[0], arr[1], arr[2]);
        }
    });
}*/
function addBuildAsync(build_name, class_id, itm_1, itm_2, itm_3, itm_4, itm_5, itm_6) {
    $.ajax({
        url: '/addons/buildadd.php',
        type: 'post',
        data: {build_name: build_name, class_id: class_id, itm_1: itm_1, itm_2: itm_2, itm_3: itm_3, itm_4: itm_4, itm_5: itm_5, itm_6: itm_6},
        success: function(response) {
            const arr = response.split(",");
            Alert(arr[0], arr[1], arr[2]);
        }
    });
}

</script>