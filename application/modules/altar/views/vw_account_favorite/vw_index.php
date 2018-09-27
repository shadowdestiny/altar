<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $this->lang->line('account_favorities_title'); ?></h1>

    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">


            <div class="col_two_third nobottommargin contenidodeinformaciongeneral">


                <div class="col_one_third ">

                    <?= $allfavorite ?>

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