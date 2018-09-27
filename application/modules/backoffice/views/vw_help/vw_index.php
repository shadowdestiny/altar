<div class="modal fade" id="help_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form_help" onsubmit="return validate_updateHelp();">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Titulo Español:</label>
                        <input type="text" class="form-control" id="title_spanish" name="title_spanish"
                               style="background-color: lightgrey">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Titulo Inglés:</label>
                        <input type="text" class="form-control" id="title_english" name="title_english"
                               style="background-color: lightgrey">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Contenido Español:</label>
                        <textarea  class="form-control" id="cont_spanish" name="cont_spanish"
                               style="background-color: lightgrey"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Contenido Inglés:</label>
                        <textarea  class="form-control" id="cont_english" name="cont_english"
                               style="background-color: lightgrey"></textarea>
                    </div>
                    <input type="hidden" name="help_id" id="help_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="help_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form_help_add" onsubmit="return validateAddHelp();">
                 <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Titulo Español:</label>
                        <input type="text" class="form-control" id="title_spanish" name="title_spanish"
                               style="background-color: lightgrey">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Titulo Inglés:</label>
                        <input type="text" class="form-control" id="title_english" name="title_english"
                               style="background-color: lightgrey">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Contenido Español:</label>
                        <textarea  class="form-control" id="cont_spanish" name="cont_spanish"
                               style="background-color: lightgrey"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Contenido Inglés:</label>
                        <textarea  class="form-control" id="cont_english" name="cont_english"
                               style="background-color: lightgrey"></textarea>
                    </div>
                    <input type="hidden" name="type_help" id="type_help" value="page_help">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Página Ayuda</h1>
            <ol class="breadcrumb">
                <li><a href="<?= ROOT_URL_BACK; ?>" class="text-transparent"><i class="icon-home"></i> Home</a></li>
                <li class="active"><a href="#">Página Ayuda</a></li>
            </ol>
        </div>
    </div><!-- / page content header -->
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-table"></i> Página Ayuda</h4></div>
                <div class="tools pull-right">
                    <a href="#" aria-hidden="true"><i
                                class="icon-plus text-transparent" onclick="return help_add();"></i></a>

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
