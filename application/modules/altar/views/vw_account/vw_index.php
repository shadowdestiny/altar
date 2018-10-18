<!-- Page Title
============================================= -->
<section id="page-title" class="account-title">

    <div class="container top-account clearfix">
        <div class="content-wrap">
            <div class="row">
                <div class="col-md-4 section-top-account selected-account">
                    <div>
                        <h4>
                            <a href="<?=URL_USUARIO_INDEX?>">
                                <?= $this->lang->line('account_title') ?>
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 section-top-account">
                    <div>
                        <h4>
                            <a href="<?=URL_USUARIO_HISTORY?>">
                                <?= $this->lang->line('account_order_history_title'); ?>
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 section-top-account">
                    <div>
                        <h4>
                            <a href="<?=URL_USUARIO_FAVORITE?>">
                                <?= $this->lang->line('account_favorities_title') ?>
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">


            <div class = "content-user" *class="col_two_third nobottommargin contenidodeinformaciongeneral">


                <h3><?= $this->lang->line('account_title2') ?>
                    <a href="<?=URL_USUARIO_INDEX?>edit">
                        <img style="margin-bottom: 7px;width: 26px;" src="<?= URL_TEMPLATEALTAR ?>/img/pencil.png">
                    </a>
                </h3>

                <p><?= $this->lang->line('account_subtitle') ?> <?/*= SITE_NAME; */?></p>

                <div class="col-md-2">
                    <h4><?= $this->lang->line('account_form_name') ?></h4>
                    <p><?= $name . ' ' . $firstSurname . ' ' . $secondSurname; ?></p>
                </div>

                <div class="col-md-3">
                    <h4><?= $this->lang->line('account_form_email') ?></h4>
                    <p><?= $email; ?></p>
                </div>
                <div class="col-md-3">
                    <h4><?= $this->lang->line('account_form_username') ?></h4>
                    <p><?= $nickname; ?></p>
                </div>
                <div class="col-md-2">
                    <h4><?= $this->lang->line('account_form_phone') ?></h4>
                    <p><?= $phone; ?></p>
                </div>
                <div class="col-md-2">
                    <h4><?= $this->lang->line('account_form_pass') ?></h4>
                    <p>************</p>
                </div>


                <!--<div class="col-md-12">
                    <a class="button button-3d button-black nomargin" id="register-form-submit"
                       href="<?/*= ROOT_URL; */?>altar/Ctr_account/edit"><?/*= $this->lang->line('account_form_button') */?></a>
                </div>-->

                <div>
                    <div class="col-md-12" style="margin-top: 26px;margin-bottom: 30px;">
                        <p class="cancel-supcription">Cancelar Cuenta</p>
                        <span class="note-cancel">
                        Si deseas cancelar tu cuenta puedes seleccionar esta opción, recuerda que no podras
                            <br/>
                            recuperar todos los archivos que previamente haibais obtenido con la cuenta activa.
                    </span>
                    </div>
                </div>

            </div>


            <div class="col_one_third col_last  menumicuenta nobottommargin">

                <!--<div class="well well-lg nobottommargin">
                    <h4><?/*= $this->lang->line('account_title') */?></h4>
                    <ul class="iconlist">
                        <li><i class="icon-plus-sign2"></i> <a
                                    href="<?/*= URL_USUARIO_INDEX */?>"><?/*= $this->lang->line('account_title') */?></a></li>
                        <li><i class="icon-plus-sign2"></i> <a
                                    href="<?/*= URL_USUARIO_HISTORY */?>"><?/*= $this->lang->line('account_list_history') */?></a>
                        </li>
                        <li><i class="icon-plus-sign2"></i> <a
                                    href="<?/*= URL_USUARIO_FAVORITE */?>"><?/*= $this->lang->line('account_list_favorities') */?></a>
                        </li>
                        <li><i class="icon-plus-sign2"></i> <a
                                    href="<?/*= URL_USUARIO_CANCEL */?>"><?/*= $this->lang->line('account_list_cancel') */?></a>
                        </li>
                    </ul>
                </div>-->

            </div>

        </div>

    </div>

</section><!-- #content end -->

