<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Cupones</h1>
            <ol class="breadcrumb">
                <li><a href="<?= ROOT_URL_BACK; ?>" class="text-transparent"><i class="icon-home"></i> Home</a></li>
                <li class="active"><a href="#">Cupones</a></li>
            </ol>
        </div>
    </div><!-- / page content header -->
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-table"></i> Cupones <?= $type_cupon; ?> </h4></div>
                <div class="tools pull-right">
                    <button  aria-hidden="true" data-toggle="modal" data-target="#modal_coupon_add"><i
                                class="icon-plus text-transparent"></i></button>

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
