<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Acerca de Nosotros</h1>
            <ol class="breadcrumb">
                <li><a href="<?= ROOT_URL_BACK; ?>" class="text-transparent"><i class="icon-home"></i> Home</a></li>
                <li class="active"><a href="#">Acerca de Nosotros</a></li>
            </ol>
        </div>
    </div>
    <!-- / page content header -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="pull-left"><h4><i class="icon-table"></i> Acerca de Nosotros</h4></div>
                    <div class="tools pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form method="post" id="form_aboutus" onsubmit="return update_aboutus();" name="form_aboutus">

                        <?= $list; ?>

                        <div class="clearfix"></div>
                        <hr class="hr-primary"/>
                        <br>
                        <br>
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label>Imagen</label>
                                <input class="form-control" type="file" id="image_temp" name="image_temp"
                                       placeholder="Agrega una imagen."/>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="thumbnail" id="div_content_image_temp">
                                    <div class='image view view-first'>
                                        <a href='#' class='remove_image'>X</a>
                                        <img style='width: 100%; display: block;'
                                             src='<?= URL_IMAGES; ?>content/thumbs/<?= $previewThumPath; ?>'
                                             alt='Imagen'/>
                                    </div>
                                    <input type='hidden' id='image_name' name='image_name'
                                           value='<?= $previewPath; ?>'>
                                    <input type='hidden' id='image_name_preview' name='image_name_preview'
                                           value='<?= $previewThumPath; ?>'>

                                </div>
                            </div>

                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                    <div id="respuesta"></div>
                </div> <!-- / first data table sample -->
            </div>
        </div><!-- /page-content-wrapper -->


    </div>
