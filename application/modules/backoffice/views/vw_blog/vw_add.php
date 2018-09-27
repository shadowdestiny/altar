<div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
    <!-- page content header -->
    <div class="row add-padding">
        <div class="pull-left">
            <h1>Blogs</h1>
            <ol class="breadcrumb">
                <li><a href="<?= ROOT_URL_BACK; ?>" class="text-transparent"><i class="icon-home"></i> Home</a></li>
                <li class="active"><a href="#">Blog</a></li>
            </ol>
        </div>
    </div>
    <!-- / page content header -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="pull-left"><h4><i class="icon-table"></i> Blog</h4></div>
                    <div class="tools pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="form_add_blog" onsubmit="return validate_form_add(); ">
                        <div class="row">

                            <div class="col-xs-6 form-group">
                                <label>Titulo Español</label>
                                <input class="form-control" type="text" id="title_es" name="title_es"
                                       placeholder="Escribe titulo en español."/>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Titulo Inglés</label>
                                <input class="form-control" type="text" id="title_en" name="title_en"
                                       placeholder="Escribe titulo en ingles."/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6 form-group">
                                <label>Contenido Español</label>
                                <textarea class="form-control" rows="5" id="content_es" name="content_es"
                                          placeholder="Escribe una introduccion en Español"></textarea>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Contenido Inglés</label>
                                <textarea class="form-control" rows="5" id="content_en" name="content_en"
                                          placeholder="Escribe una introduccion en Ingles"></textarea>
                            </div>
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
                                <div class="col-xs-4">
                                    <div class="thumbnail" id="div_content_image_temp">

                                    </div>
                                </div>
                                <div class="col-xs-4">

                                </div>
                                <div class="col-xs-4">

                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>

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
