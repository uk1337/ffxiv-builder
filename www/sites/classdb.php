<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FFXIV - Class Database</h1>
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
                            <h3 class="card-title">List of all classes</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $arr = db_getClassDB();
                                        foreach ($arr as $c) {
                                            echo '
                                            <tr>
                                                <td>'.$c['class_id'].'</td>
                                                <td>'.$c['name'].'</td>
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