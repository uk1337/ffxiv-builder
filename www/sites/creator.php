<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FFXIV - Creator</h1>
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
                                <input type="text" class="form-control" id="build_name" placeholder="Some fancy name lel">
                            </div>
                            <div class="form-group">
                                <label>Klassen ID</label>
                                <select class="form-control" id="class_id" onchange="getComboA(this)">
                                    <?php
                                        echo '<option>-</option>';
                                        $classes = db_getClassNames();
                                        foreach ($classes as $c) {
                                            echo '<option>'. $c[1] .'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                                <b>Enter a name and select a class to create a new loadout!</b>
                        </div>

                </div>

                </div>

            </div>

        </div>

    </section>

</div>
<script>
    function getComboA(selectObject) {
        var value = selectObject.value;  
        value = encodeURIComponent(value.trim());
        location.href = '/?s=builder&class=' + value + '&name=' + $('#build_name').val();
    }
</script>