<!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1><?= $this->lang->line('sitemap_Sitemap') ?></h1>              
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="col_one_third nobottommargin">

                        <h3><?= $this->lang->line('sitemap_Categories') ?></h3>
                        <!--linea que imprime todas las categorias-->
                        <ul class='iconlist nobottommargin'>
                            <li><i class='icon-file-alt'></i><a href=''><?= $this->lang->line('sitemap_All') ?></a>
                                <ul>
                                    <!--variable que contiene todos los generos -->
                                    <?= $info ?>
                                </ul>
                            </li>
                        </ul>

                    </div>

                    <div class="col_one_third nobottommargin">

                        <h3><?= $this->lang->line('sitemap_My_account') ?></h3>

                        <ul class="iconlist nobottommargin">
                            <li><i class="icon-pencil2"></i><a href="<?= ROOT_URL; ?>altar/Ctr_account/"><?= $this->lang->line('sitemap_Account_information') ?></a></li>
                            <li><i class="icon-pencil2"></i><a href="<?= ROOT_URL; ?>altar/Ctr_account/orders_history"><?= $this->lang->line('sitemap_Orders_history')?>.</a></li>
                            
                        </ul>

                        

                    </div>

                    <div class="col_one_third nobottommargin col_last">

                        <h3><?= $this->lang->line('sitemap_Information') ?></h3>

                        <ul class="iconlist nobottommargin">
                            <li><i class="icon-link"></i><a href="<?= ROOT_URL; ?>altar/Ctr_aboutus"><?= $this->lang->line('sitemap_About_us')?></a></li>
                            <li><i class="icon-link"></i><a href="<?= ROOT_URL; ?>altar/Ctr_contact"><?= $this->lang->line('sitemap_Contact')?></a></li>
                            <li><i class="icon-link"></i><a href="<?= ROOT_URL; ?>altar/Ctr_help"><?= $this->lang->line('sitemap_Help')?></a></li>
                            <li><i class="icon-link"></i><a href="<?= ROOT_URL; ?>altar/Ctr_privacy"><?= $this->lang->line('sitemap_Notice_of_privacy')?></a></li>
                            <li><i class="icon-link"></i><a href="<?= ROOT_URL; ?>altar/Ctr_termsconditions"><?= $this->lang->line('sitemap_Terms_and_conditions')?></a></li>
                            
                        </ul>

                    </div>

                </div>

            </div>

        </section><!-- #content end -->