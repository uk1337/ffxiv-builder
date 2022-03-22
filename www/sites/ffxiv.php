<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FFXIV - Get the best loadout for your class!</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
		<div class="container-fluid">

            <div class="row">

                <div class="col-12 col-sm-6 col-md-3">

                    <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-sticky-note"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Created Loadouts</span>
                                <span class="info-box-number">
                                    <?php echo db_countLoadouts(); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-person-booth"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Supported Classes</span>
                                <span class="info-box-number">
                                    <?php echo db_countClasses(); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-database"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Item Database</span>
                                <span class="info-box-number">
                                <?php echo db_countItems(); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-spinner"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Latest Update</span>
                                <span class="info-box-number">
                                    22.03.2022
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>