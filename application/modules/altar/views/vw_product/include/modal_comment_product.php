<div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog"
     aria-labelledby="reviewFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="reviewform" onsubmit="return validateReview();">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;
                </button>
                <h4 class="modal-title"
                    id="reviewFormModalLabel"
                    style="color: #ffce00"><?= $this->lang->line('product_video_modal_comments_title'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="col_full col_last">
                    <label for="template-reviewform-rating"><?= $this->lang->line('product_video_modal_comments_form_rank'); ?></label>
                    <select id="rating"
                            name="rating"
                            class="form-control">
                        <option value="">
                            -- <?= $this->lang->line('product_video_modal_comments_form_option'); ?>
                            --
                        </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="clear"></div>
                <div class="col_full">
                    <label for="template-reviewform-comment"><?= $this->lang->line('product_video_modal_comments_form_comment'); ?>
                        <small>*</small>
                    </label>
                    <textarea class="required form-control"
                              id="comment"
                              name="comment"
                              rows="6" cols="30"></textarea>
                </div>

            </div>
            <input type="hidden" name="video_id" value="<?= $video_id; ?>">
            <input type="hidden" name="return_uri" value="<?= $current_url; ?>">
            <div class="modal-footer">
                <button class="button button-3d nomargin"
                        type="submit"><?= $this->lang->line('product_video_modal_comments_form_button'); ?>
                </button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal Reviews End -->