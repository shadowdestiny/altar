<div class="modal fade " id="modal_shared_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <form id="shared_email_blog" onsubmit="return sharedEmailBlog()">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"
                            style="color: #ffce00; "><?= $this->lang->line('product_video_modal_shared_email_title'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="col_full">
                            <label for="billing-form-city"><?= $this->lang->line('product_video_modal_shared_email_form_email'); ?>
                                :</label>
                            <input type="email" id="email" name="email" value="" class="sm-form-control">
                        </div>
                        <div class="col_full">
                            <label for="billing-form-city"><?= $this->lang->line('product_video_modal_shared_email_form_subject'); ?>
                                :</label>
                            <textarea type="text" id="subject" name="subject" value=""
                                      class="sm-form-control"> </textarea>
                        </div>
                        <input type="hidden" name="id_blog" value="<?= $blog_id; ?>">
                        <input type="hidden" name="current_url" value="<?= $social_video_current_url; ?>">
                        <div class="line"></div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit"
                                class="nomargin button button-3d button-small btn-block"><?= $this->lang->line('product_video_modal_shared_email_form_button'); ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
