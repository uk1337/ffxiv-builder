<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FFXIV - Loadouts</h1>
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
                            <h3 class="card-title">List of the community-builds</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Loadout</th>
                                        <th>Klasse</th>
                                        <th>Waffe / ID</th>
                                        <th>Helm</th>
                                        <th>Brustpanzer</th>
                                        <th>Handschuhe</th>
                                        <th>Hose</th>
                                        <th>Schuhe</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $arr = db_getLoadouts();
                                        foreach ($arr as $c) {
                                            echo '
                                            <tr>
                                                <td>'.$c['build_id'].'</td>
                                                <td>'.$c['name'].'</td>
                                                <td>'.db_classID2Name($c['class_id']).'</td>
                                                <td>'.db_itmid2name($c['itmslot1']).' ('.$c['itmslot1'].')</td>
                                                <td>'.db_itmid2name($c['itmslot2']).' ('.$c['itmslot2'].')</td>
                                                <td>'.db_itmid2name($c['itmslot3']).' ('.$c['itmslot3'].')</td>
                                                <td>'.db_itmid2name($c['itmslot4']).' ('.$c['itmslot4'].')</td>
                                                <td>'.db_itmid2name($c['itmslot5']).' ('.$c['itmslot5'].')</td>
                                                <td>'.db_itmid2name($c['itmslot6']).' ('.$c['itmslot6'].')</td>
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