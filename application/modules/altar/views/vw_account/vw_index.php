<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $this->lang->line('account_title') ?></h1>

    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">


            <div class="col_two_third nobottommargin contenidodeinformaciongeneral">


                <h3><?= $this->lang->line('account_title2') ?></h3>

                <p><?= $this->lang->line('account_subtitle') ?> <?= SITE_NAME; ?></p>

                <div class="col-md-6">
                    <h4><?= $this->lang->line('account_form_name') ?></h4>
                    <p><?= $name . ' ' . $firstSurname . ' ' . $secondSurname; ?></p>
                </div>

                <div class="col-md-6">
                    <h4><?= $this->lang->line('account_form_email') ?></h4>
                    <p><?= $email; ?></p>
                </div>
                <div class="col-md-6">
                    <h4><?= $this->lang->line('account_form_username') ?></h4>
                    <p><?= $nickname; ?></p>
                </div>
                <div class="col-md-6">
                    <h4><?= $this->lang->line('account_form_phone') ?></h4>
                    <p><?= $phone; ?></p>
                </div>
                <div class="col-md-6">
                    <h4><?= $this->lang->line('account_form_pass') ?></h4>
                    <p>************</p>
                </div>


                <div class="col-md-12">
                    <a class="button button-3d button-black nomargin" id="register-form-submit"
                       href="<?= ROOT_URL; ?>altar/Ctr_account/edit"><?= $this->lang->line('account_form_button') ?></a>
                </div>


            </div>


            <div class="col_one_third col_last  menumicuenta nobottommargin">

                <div class="well well-lg nobottommargin">
                    <h4><?= $this->lang->line('account_title') ?></h4>
                    <ul class="iconlist">
                        <li><i class="icon-plus-sign2"></i> <a
                                    href="<?= URL_USUARIO_INDEX ?>"><?= $this->lang->line('account_title') ?></a></li>
                        <li><i class="icon-plus-sign2"></i> <a
                                    href="<?= URL_USUARIO_HISTORY ?>"><?= $this->lang->line('account_list_history') ?></a>
                        </li>
                        <li><i class="icon-plus-sign2"></i> <a
                                    href="<?= URL_USUARIO_FAVORITE ?>"><?= $this->lang->line('account_list_favorities') ?></a>
                        </li>
                        <li><i class="icon-plus-sign2"></i> <a
                                    href="<?= URL_USUARIO_CANCEL ?>"><?= $this->lang->line('account_list_cancel') ?></a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->

