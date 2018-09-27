<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Publicidad</h1>
            <ol class="breadcrumb">
                <li><a href="<?= ROOT_URL_BACK; ?>" class="text-transparent"><i class="icon-home"></i> Home</a></li>
                <li class="active"><a href="#">Publicidad</a></li>
            </ol>
        </div>
    </div>
    <!-- / page content header -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="pull-left"><h4><i class="icon-table"></i> Publicidad</h4></div>
                    <div class="tools pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="form_add_adv" onsubmit="return validate_form_add(); ">
                        <div class="row">

                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    <label>Imagen Español</label>
                                    <input class="form-control" type="file" id="image_temp_es" name="image_temp_es"
                                           placeholder="Agrega una imagen."/>
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label>Imagen Inglés</label>
                                    <input class="form-control" type="file" id="image_temp_en" name="image_temp_en"
                                           placeholder="Agrega una imagen."/>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="thumbnail" id="div_content_image_temp1">

                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="thumbnail" id="div_content_image_temp2">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="type_adv" value="<?= $type_adv; ?>">
                        <div class="pull-right">
                            <button class="btn btn-success" type="submit">Guardar blog
                            </button>
                        </div>
                </div>
                </form>
            </div> <!-- / first data table sample -->
        </div>
    </div><!-- /page-content-wrapper -->


</div>
<div class="loading" style="display: none;"></div>
