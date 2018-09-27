<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Términos y condiciones</h1>
            <ol class="breadcrumb">
                <li><a href="<?= ROOT_URL_BACK; ?>" class="text-transparent"><i class="icon-home"></i> Home</a></li>
                <li class="active"><a href="#">Términos y condiciones</a></li>
            </ol>
        </div>
    </div><!-- / page content header -->
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-file-alt"></i> Términos y condiciones</h4></div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">

                <!--**************************************-->

                <form role="form" method="POST" id="termsForm" onsubmit="return editTerms();">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                            <label for="">Título Español</label>
                            <input type="text" class="form-control" id="termsTitleEs" placeholder="Escribir título"
                                   value="<?= $termsTitleEs ?>">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                            <label for="">Título Inglés</label>
                            <input type="text" class="form-control" id="termsTitleEn" placeholder="Enter title"
                                   value="<?= $termsTitleEn ?>">
                        </div>
                        <hr class="col-xs-12">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                            <label for="">Contenido Español</label>
                            <textarea rows="50" cols="50" class="form-control" placeholder="Escribir contenido"
                                      id="termsContentEs"><?= $termsContentEs ?></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                            <label for="">Contenido Inglés</label>
                            <textarea rows="50" cols="50" class="form-control" placeholder="Enter content"
                                      id="termsContentEn"><?= $termsContentEn ?></textarea>
                        </div>
                    </div>

                    <div class="pull-right">
                        <!--<button type="submit" class="btn btn-default">Cancel</button>-->
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

                <!--*************************************-->

                <div class="panel-footer"></div>
            </div> <!-- / first data table sample -->
        </div>
    </div><!-- /page-content-wrapper -->