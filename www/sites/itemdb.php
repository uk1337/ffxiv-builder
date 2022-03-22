<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FFXIV - Item Database</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
		<div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of all items</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Critical</th>
                                        <th>Level</th>
                                        <th>Dexterity</th>
                                        <th>Hitrate</th>
                                        <th>Determination</th>
                                        <th>Skillspeed</th>
                                        <th>Vitality</th>
                                        <th>Slot</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $arr = db_getItemDB();
                                        foreach ($arr as $c) {
                                            echo '
                                            <tr>
                                                <td>'.$c['itm_id'].'</td>
                                                <td>'.$c['name'].'</td>
                                                <td>'.$c['critical'].'</td>
                                                <td>'.$c['level'].'</td>
                                                <td>'.$c['dexterity'].'</td>
                                                <td>'.$c['hitrate'].'</td>
                                                <td>'.$c['determination'].'</td>
                                                <td>'.$c['skillspeed'].'</td>
                                                <td>'.$c['vitality'].'</td>
                                                <td>'.$c['slot'].'</td>
                                            </tr>
                                            ';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

</div>