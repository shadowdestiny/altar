<div class="modal fade" id="subscribeForm" tabindex="-1" role="dialog"
     aria-labelledby="reviewFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="form_preregister" onsubmit=' return savePre_register();'>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="color: white">&times;
                </button>
                <h4 class="modal-title"
                    id="reviewFormModalLabel"
                    style="color: #ffce00"><?= $this->lang->line('subscribe_modal_title'); ?></h4>
            </div>
            <div class="modal-body">

                <div class='col_full'>
                    <input type='text' name='firstName' id='firstName' class='form-control center'
                           placeholder='<?= $this->lang->line('subscribe_modal_placeholder_name'); ?>' required=''
                           autofocus=''>
                </div>
                <div class='col_full'>
                    <input type='text' name='lastName' id='lastName' class='form-control center'
                           placeholder='<?= $this->lang->line('subscribe_modal_placeholder_surname'); ?>' required=''
                           autofocus=''>
                </div>
                <div class='col_full'>
                    <input type='email' name='email' id='email' class='form-control center'
                           placeholder='<?= $this->lang->line('subscribe_modal_placeholder_email'); ?>'
                           required=''>
                </div>
                <div class='col_full' style='color: white;'>
                    <input type='checkbox' class='checkbox_contributor' id='contributor' name='contributor'
                           value='1'><?= $this->lang->line('subscribe_modal_contribute'); ?>
                </div>

                <div id='hidenBox' style='display: none;'>
                    <div class='col_full'>
                        <select class='form-control center' id='con_country' name='con_country'>
                            <?= $contrys; ?>
                        </select>
                    </div>
                    <div class='col_full'>
                        <input type='text' name='con_question1' id='con_question1' class='form-control center'
                               placeholder='<?= $this->lang->line('subscribe_modal_placeholder_contrubute'); ?>'
                               autofocus=''>
                    </div>
                    <div class='col_full'>
                        <textarea rows='2' class='form-control center' placeholder='<?= $this->lang->line('subscribe_modal_placeholder_link_examples'); ?>'
                                  name='con_question2' id='con_question2' autofocus=''></textarea>
                    </div>
                    <div class='col_full'>
                        <input type='text' name='con_question3' id='con_question3' class='form-control center'
                               placeholder='<?= $this->lang->line('subscribe_modal_placeholder_content_es_en'); ?>' autofocus=''>
                    </div>
                    <div class='col_full'>
                    </div>
                </div>
                <div class='col-sm-2 col-md-2 col-sm-offset-2 col-md-offset-2 centrado-porcentual'>
                    <?= $widget; ?>
                    <?= $script; ?>
                </div>
                <div class='clear'></div>
                <div style='color: white;'>
                    <input type='checkbox' class='checkbox_noti' id='notified' name='notified' checked=''>
                    <?= $this->lang->line('subscribe_modal_check_notify'); ?>
                </div>
                <input type='hidden' name='check_notificaciones' id='check_notificaciones' value='1'>

            </div>
            <div class="modal-footer">
                <button type="submit" class='button button-3d button-gray nomargin' id='register-form-submit'
                        name='register-form-submit'
                        value='register'><?= $this->lang->line('subscribe_modal_button'); ?>
                </button>
            </div>
        </form>
    </div>
</div>
</div>
