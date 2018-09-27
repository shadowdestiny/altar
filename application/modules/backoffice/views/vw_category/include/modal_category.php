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