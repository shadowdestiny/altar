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
<form id="edit-form" name="edit-form" class="nobottommargin" onsubmit="return validateEdit();">
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
                    <input type="text" id="name" name="name"
                           class="form-control edit-form" value="<?= $name . ' ' . $firstSurname . ' ' . $secondSurname; ?>"/>
                </div>

                <div class="col-md-2">
                    <h4><?= $this->lang->line('account_form_email') ?></h4>
                    <input type="text" id="email" name="email"
                           class="form-control edit-form" value="<?= $email; ?>" disabled/>
                </div>
                <div class="col-md-2">
                    <h4><?= $this->lang->line('account_form_username') ?></h4>
                    <input type="text" id="username" name="username"
                           class="form-control edit-form" value="<?= $nickname; ?>"/>
                </div>
                <div class="col-md-2">
                    <h4><?= $this->lang->line('account_form_phone') ?></h4>
                    <input type="number" id="phone" name="phone"
                           class="form-control edit-form" value="<?= $phone; ?>"/>
                </div>
                <div class="col-md-2">
                    <h4><?= $this->lang->line('account_form_pass') ?></h4>
                    <input type="password" id="password" name="password" value=""
                           class="form-control edit-form" placeholder="******"/>
                </div>
                <div class="col-md-2">
                    <h4><?= $this->lang->line('account_form_pass_repeat') ?></h4>
                    <input type="password" id="password_confirm" name="password_confirm" value=""
                           class="form-control edit-form" placeholder="******"/>
                </div>

                <div class="col-md-12" style="margin-top: 26px;margin-bottom: 30px;">
                    <div class="col_full nobottommargin">
                        <button style="text-transform: none" class="button button-3d button-black nomargin" id="register-form-submit"
                                name="register-form-submit" value="register">
                            <?= $this->lang->line('account_form_pass_submit'); ?>
                        </button>
                    </div>
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
</form>




<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">

        <h1><?= $this->lang->line('account_edit_title') ?></h1>

    </div>

</section>
<!-- #page-title end -->

<!-- Content
============================================= -->
<!--<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">


            <div class="col-md-12 nobottommargin">


                <form id="edit-form" name="edit-form" class="nobottommargin" onsubmit="return validateEdit();">

                    <div class="col_half">
                        <label for="register-form-name"><?/*= $this->lang->line('account_edit_label_name'); */?></label>
                        <input type="text" id="name" name="name"
                               class="form-control edit-form" value="<?/*= $name . ' ' . $firstSurname . ' ' . $secondSurname; */?>"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-email"><?/*= $this->lang->line('account_edit_label_email'); */?></label>
                        <input type="text" id="email" name="email"
                               class="form-control edit-form" value="<?/*= $email; */?>" disabled/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="register-form-username"><?/*= $this->lang->line('account_edit_label_username'); */?></label>
                        <input type="text" id="username" name="username"
                               class="form-control edit-form" value="<?/*= $nickname; */?>"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-phone"><?/*= $this->lang->line('account_edit_label_phone'); */?></label>
                        <input type="number" id="phone" name="phone"
                               class="form-control" value="<?/*= $phone; */?>"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="register-form-password"><?/*= $this->lang->line('account_edit_label_pass'); */?></label>
                        <input type="password" id="password" name="password" value=""
                               class="form-control edit-form"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-repassword"><?/*= $this->lang->line('account_edit_label_passC'); */?></label>
                        <input type="password" id="password_confirm" name="password_confirm" value=""
                               class="form-control edit-form"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" id="register-form-submit"
                                name="register-form-submit" value="register">
                            <?/*= $this->lang->line('account_edit_button'); */?>
                        </button>
                    </div>

                </form>

            </div>


        </div>

    </div>

</section>-->

<!-- #content end -->

<div class="loading" style="display: none;"></div>

