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
    </div>
    <!-- / page content header -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="pull-left"><h4><i class="icon-table"></i> Videos</h4></div>
                    <div class="tools pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="form_add_video" onsubmit="return validate_form_add(); ">
                        <div class="row">
                            <div class="col-xs-8 form-group">
                                <label>Categorías</label>
                                <?= $category; ?>
                            </div>

                            <div class="col-xs-4 form-group">
                                <label>Video Gratis</label>
                                <input class="form-control" type="checkbox" id="check_free" name="check_free"/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-xs-6 form-group">
                                <label>Titulo Español</label>
                                <input class="form-control" type="text" id="title_es" name="data_lang[title_es]"
                                       placeholder="Escribe titulo en español."/>
                            </div>


                            <div class="col-xs-6 form-group">
                                <label>Titulo Inglés</label>
                                <input class="form-control" type="text" id="title_en" name="data_lang[title_en]"
                                       placeholder="Escribe titulo en ingles."/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6 form-group">
                                <label>Precio</label>
                                <input class="form-control" type="number" min="0" id="price" name="data_video[price]"
                                       placeholder="Escribe titulo en español."/>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Precio de oferta</label>
                                <input class="form-control" type="number" min="0" id="price_offer"
                                       name="data_video[price_offer]"
                                       placeholder="Escribe titulo en ingles."/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6 form-group">
                                <label>Introducción Español</label>
                                <textarea class="form-control" rows="5" id="intro_es" name="data_lang[intro_es]"
                                          placeholder="Escribe una introduccion en Español"></textarea>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Introducción Inglés</label>
                                <textarea class="form-control" rows="5" id="intro_en" name="data_lang[intro_en]"
                                          placeholder="Escribe una introduccion en Ingles"></textarea>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Descripción Español</label>
                                <textarea class="form-control" rows="5" id="description_es"
                                          name="data_lang[description_es]"
                                          placeholder="Escribe una descripción en Español"></textarea>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Descripción Inglés</label>
                                <textarea class="form-control" rows="5" id="description_en"
                                          name="data_lang[description_en]"
                                          placeholder="Escribe una descripción en Ingles"></textarea>
                            </div>


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
                                <div class="col-xs-4 form-group">
                                    <label>Video PREVIEW</label>
                                    <input class="form-control" type="file" id="video_preview" name="video_preview" accept="video/*" 
                                           placeholder="Agrega una imagen."/>
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label>Video FULL HD</label>
                                    <input class="form-control" type="file" id="video_full" name="video_full" accept="video/*"
                                           placeholder="Agrega una imagen."/>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="thumbnail" id="div_content_image_temp">

                                    </div>
                                </div>
                                <div class="col-xs-2">
                                </div>
                                <div class="col-xs-4">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="" alt="Video"/>
                                            <div class="mask">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="thumbnail">
                                        <div class="image view view-first">

                                            <img style="width: 100%; display: block;" src="" alt="Video"/>
                                            <div class="mask">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-6 form-group">
                            <label for="sel1">Formato de video:</label>
                            <select class="form-control" id="format_video" name="data_video[format_video]">
                                <option value="video/mp4">video/mp4</option>
                                <option value="video/avi">video/avi</option>
                                <option value="video/wmv">video/wmv</option>
                                <option value="video/flv">video/flv</option>
                            </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="sel1">Autor:</label>
                            <select class="form-control selectpicker" id="autor_video" name="data_video[autor_video]"
                                    data-live-search="true">
                                <option value="">Selecciona una opción</option>
                                <?= $autors; ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="pull-right">
                            <button class="btn btn-success" type="submit">Guardar video
                            </button>
                        </div>
                </div>
                </form>
            </div> <!-- / first data table sample -->
        </div>
    </div><!-- /page-content-wrapper -->


</div>
<div class="loading" style="display: none;"></div>
