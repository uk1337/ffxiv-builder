<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FFXIV - Relation Database</h1>
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
                            <h3 class="card-title">List of the M:N relation between classes and items</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Klasse</th>
                                        <th>Klassen ID</th>
                                        <th>Item</th>
                                        <th>Item ID</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $arr = db_getRelationDB();
                                        foreach ($arr as $c) {
                                            echo '
                                            <tr>
                                                <td>'.db_classID2Name($c['class_id']).'</td>
                                                <td>'.$c['class_id'].'</td>
                                                <td>'.db_itmid2name($c['itm_id']).'</td>
                                                <td>'.$c['itm_id'].'</td>
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