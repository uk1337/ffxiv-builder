<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FFXIV - Admin Panel JS</h1>
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
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Klassen</label>
                                            <?php
                                                /*$classes = db_getClassNames();
                                                foreach ($classes as $c) {
                                                    echo '
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="class_'.$c[1].'>
                                                            <label class="form-check-label">'.$c[1].'</label>
                                                        </div>
                                                    ';
                                                }*/
                                            ?>
                                            <select id="classes" multiple="" style="height:<?php echo (sizeof(db_getClassNames())* 25); ?>px;" class="form-control">
                                                <?php
                                                    $classes = db_getClassNames();
                                                    foreach ($classes as $c) {
                                                        echo '<option>'.$c[1].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label>Item Slot</label>
                                            <select class="form-control" id="itm_slot">
                                                <option selected>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input type="text" class="form-control" id="itm_name" placeholder="Arrow of XTC">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input type="text" class="form-control" id="itm_level" placeholder="500">
                                        </div>
                                        <div class="form-group">
                                            <label>Dexterity</label>
                                            <input type="text" class="form-control" id="itm_dexterity" placeholder="100">
                                        </div>
                                        <div class="form-group">
                                            <label>Direct Hitrate</label>
                                            <input type="text" class="form-control" id="itm_hitrate" placeholder="100">
                                        </div>
                                        <div class="form-group">
                                            <label>Critical</label>
                                            <input type="text" class="form-control" id="itm_critical" placeholder="100">
                                        </div>
                                        <div class="form-group">
                                            <label>Determination</label>
                                            <input type="text" class="form-control" id="itm_determination" placeholder="100">
                                        </div>
                                        <div class="form-group">
                                            <label>Skill Speed</label>
                                            <input type="text" class="form-control" id="itm_skillspeed" placeholder="100">
                                        </div>
                                        <div class="form-group">
                                            <label>Vitality</label>
                                            <input type="text" class="form-control" id="itm_vitality" placeholder="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <!--<button type="submit" class="btn btn-primary" onclick="addItmAsync(
                                    $('#itm_classID').val(),
                                    $('#itm_slot').val(),
                                    $('#itm_name').val(),
                                    $('#itm_level').val(),
                                    $('#itm_dexterity').val(),
                                    $('#itm_critial').val(),
                                    $('#itm_determination').val(),
                                    $('#itm_skillspeed').val(),
                                    $('#itm_vitality').val()
                                    );">Submit</button>-->
                                    <button type="submit" class="btn btn-success" onclick="addItmAsync(
                                        $('#itm_name').val(),
                                        $('#itm_level').val(),
                                        $('#itm_dexterity').val(),
                                        $('#itm_hitrate').val(),
                                        $('#itm_critical').val(),
                                        $('#itm_determination').val(),
                                        $('#itm_skillspeed').val(),
                                        $('#itm_vitality').val(),
                                        $('#itm_slot').val(),
                                        $('#classes').val(),
                                    );">Create Item</button>
                                    
                                    <!-- DEBUG SHYT <button onclick="testaddItm($('#classes').val());">OK</button>-->
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
function testaddItm(selectioon) {
    $.ajax({
        url: '/addons/itmadd.php',
        type: 'post',
        data: {classes: selectioon},
        success: function(response) {
            const arr = response.split(",");
            Alert(arr[0], arr[1], arr[2]);
        }
    });
}
function addItmAsync(itm_name, itm_level, itm_dexterity, itm_hitrate, itm_critical, itm_determination, itm_skillspeed, itm_vitality, itm_slot, classes) {
    $.ajax({
        url: '/addons/itmadd.php',
        type: 'post',
        data: {itm_name: itm_name, itm_level: itm_level, itm_dexterity: itm_dexterity, itm_hitrate: itm_hitrate, itm_critical: itm_critical, itm_determination: itm_determination, itm_skillspeed:itm_skillspeed, itm_vitality:itm_vitality, itm_slot:itm_slot, classes: classes},
        success: function(response) {
            const arr = response.split(",");
            Alert(arr[0], arr[1], arr[2]);
        }
    });
}
</script>