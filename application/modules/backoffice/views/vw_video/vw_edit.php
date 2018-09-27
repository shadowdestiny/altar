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
                    <div class="pull-left"><h4><i class="icon-table"></i> Videos</h4> <code>SKU: <?= $sku; ?></code>
                    </div>
                    <div class="tools pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="form_edit_video" onsubmit="return validate_form_edit(); ">
                        <div class="row">
                            <div class="col-xs-8 form-group">
                                <label>Categorías</label>
                                <?= $category; ?>
                            </div>

                            <div class="col-xs-4 form-group">
                                <label>Video Gratis</label>
                                <input class="form-control" type="checkbox" id="check_free"
                                       name="check_free" <?php if ($isfree) echo "checked"; ?>/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-xs-6 form-group">
                                <label>Titulo</label>
                                <input class="form-control" type="text" id="title_es" name="data_lang[title_es]"
                                       placeholder="Escribe titulo en español." value="<?= $title_es; ?>"/>
                            </div>


                            <div class="col-xs-6 form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" id="title_en" name="data_lang[title_en]"
                                       placeholder="Escribe titulo en ingles." value="<?= $title_en; ?>"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6 form-group">
                                <label>Precio</label>
                                <input class="form-control" type="number" min="0" id="price" name="data_video[price]"
                                       placeholder="Escribe titulo en español." value="<?= $price; ?>"/>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Precio de oferta</label>
                                <input class="form-control" type="number" min="0" id="price_offer"
                                       name="data_video[price_offer]"
                                       placeholder="Escribe titulo en ingles." value="<?= $offerPrice; ?>"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6 form-group">
                                <label>Introducción</label>
                                <textarea class="form-control" rows="5" id="intro_es" name="data_lang[intro_es]"
                                          placeholder="Escribe una introduccion en Español"><?= $intro_es; ?></textarea>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Introduction</label>
                                <textarea class="form-control" rows="5" id="intro_en" name="data_lang[intro_en]"
                                          placeholder="Escribe una introduccion en Ingles"><?= $intro_en; ?></textarea>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" rows="5" id="description_es"
                                          name="data_lang[description_es]"
                                          placeholder="Escribe una descripción en Español"><?= $descrip_es; ?></textarea>
                            </div>
                            <div class="col-xs-6 form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="5" id="description_en"
                                          name="data_lang[description_en]"
                                          placeholder="Escribe una descripción en Ingles"><?= $descrip_en; ?></textarea>
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
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label>Video FULL HD</label>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="thumbnail" id="div_content_image_temp">
                                        <div class='image view view-first'>
                                            <a href='#' class='remove_image'>X</a>
                                            <img style='width: 100%; display: block;'
                                                 src='<?= URL_IMAGES; ?>videos/thumbs/<?= $previewThumPath; ?>'
                                                 alt='Imagen'/>
                                        </div>
                                        <input type='hidden' id='image_name' name='image_name'
                                               value='<?= $previewPath; ?>'>
                                        <input type='hidden' id='image_name_preview' name='image_name_preview'
                                               value='<?= $previewThumPath; ?>'>

                                    </div>
                                </div>
                                <div class="col-xs-2">
                                </div>
                                <div class="col-xs-4">
                                    <div class="video-responsive">
                                        <?= $vimeoPreview_id; ?>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="video-responsive">
                                        <?= $vimeo_id; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 form-group">
                            <label for="sel1">Formato de video:</label>
                            <select class="form-control" id="format_video" name="data_video[format_video]">
                                <option value="video/mp4" <?php if ($format == "video/mp4") echo "selected" ?>>
                                    video/mp4
                                </option>
                                <option value="video/avi" <?php if ($format == "video/avi") echo "selected" ?>>
                                    video/avi
                                </option>
                                <option value="video/wmv" <?php if ($format == "video/wmv") echo "selected" ?>>
                                    video/wmv
                                </option>
                                <option value="video/flv" <?php if ($format == "video/flv") echo "selected" ?>>
                                    video/flv
                                </option>
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
                        <input type="hidden" name="video_id" id="video_id" value="<?= $id; ?>">

                        <div class="pull-right">
                            <button class="btn btn-warning" type="submit">Actualizar video
                            </button>
                        </div>
                </div>
                </form>
            </div> <!-- / first data table sample -->
        </div>
    </div><!-- /page-content-wrapper -->


</div>
<div class="loading" style="display: none;"></div>
