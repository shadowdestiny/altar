<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Videos</h1>
            <ol class="breadcrumb">
                <li><a href="<?= ROOT_URL_BACK; ?>" class="text-transparent"><i class="icon-home"></i> Home</a></li>
                <li class="active"><a href="#">Videos</a></li>
            </ol>
        </div>
    </div><!-- / page content header -->
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-table"></i> Videos</h4></div>
                <div class="tools pull-right">
                    <a href="<?= ROOT_URL_BACK; ?>Ctr_video/add" aria-hidden="true"><i
                                class="icon-plus text-transparent"></i></a>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?= $table; ?>
                </div>
                <div class="panel-footer"></div>
            </div> <!-- / first data table sample -->
        </div>
    </div><!-- /page-content-wrapper -->
