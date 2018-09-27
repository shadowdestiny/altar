<div class="modal fade" id="category_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form_category" onsubmit="return validate_updateCategory();">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Texto Español:</label>
                        <input type="text" class="form-control" id="text_spanish" name="text_spanish"
                               style="background-color: lightgrey">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Texto Ingles:</label>
                        <input type="text" class="form-control" id="text_english" name="text_english"
                               style="background-color: lightgrey">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Imagen</label>
                            <input class="form-control" type="file" id="image_temp_edit" name="image_temp"
                                   placeholder="Agrega una imagen."/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="thumbnail" id="div_content_image_temp_edit">
                                <div class='image view view-first'>
                                    <a href='#' class='remove_image'>X</a>
                                    <img id="image_edit" style='width: 100%; display: none;'
                                         src='' alt='Imagen'/>
                                </div>
                                <input type='hidden' id='image_hidden_name' name='image_name' value=''>
                                <input type='hidden' id='image_hidden_name_preview' name='image_name_preview' value=''>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="lang_id" id="lang_id" value="">
                    <input type="hidden" name="category_id" id="category_id" value="">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="category_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form_category_add" onsubmit="return validate_addCategory();">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Texto Español:</label>
                        <input type="text" class="form-control" id="text_spanish" name="text_spanish"
                               style="background-color: lightgrey" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Texto Ingles:</label>
                        <input type="text" class="form-control" id="text_english" name="text_english"
                               style="background-color: lightgrey" required>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label>Imagen</label>
                            <input class="form-control" type="file" id="image_temp_add" name="image_temp"
                                   placeholder="Agrega una imagen."/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="thumbnail" id="div_content_image_temp_add">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Categoría</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Categorías</h1>
            <ol class="breadcrumb">
                <li><a href="<?= ROOT_URL_BACK; ?>" class="text-transparent"><i class="icon-home"></i> Home</a></li>
                <li class="active"><a href="#">Categorías</a></li>
            </ol>
        </div>
    </div><!-- / page content header -->
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-table"></i> Categorías</h4></div>
                <div class="tools pull-right">
                    <a href="#" aria-hidden="true"><i
                                class="icon-plus text-transparent" onclick="return category_add();"></i></a>

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

    <div class="loading" style="display: none;"></div>
