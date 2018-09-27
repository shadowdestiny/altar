<section id="page-title" class="page-title-parallax page-title-dark"
         style="padding: 250px 0; background-image: url('<?= URL_IMAGES; ?>content/thumbs/<?= $previewThumPath; ?>'); background-size: cover; background-position: center center;"
         data-stellar-background-ratio="0.4">
    <?= $info; ?>

    </div>

    <div class="section nomargin">
        <div class="container clearfix">

            <div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
                <i class="i-plain i-xlarge divcenter icon-line2-directions"></i>
                <div class="counter counter-lined"><span data-from="100" data-to="846" data-refresh-interval="50"
                                                         data-speed="2000"></span>K+
                </div>
                <h5><?= $this->lang->line('about_graph_suscriptors'); ?></h5>
            </div>

            <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-line2-graph"></i>
                <div class="counter counter-lined"><span data-from="3000" data-to="15360"
                                                         data-refresh-interval="100" data-speed="2500"></span>+
                </div>
                <h5><?= $this->lang->line('about_graph_videos'); ?></h5>
            </div>

            <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-line2-layers"></i>
                <div class="counter counter-lined"><span data-from="10" data-to="408" data-refresh-interval="25"
                                                         data-speed="3500"></span>*
                </div>
                <h5><?= $this->lang->line('about_graph_sounds'); ?></h5>
            </div>

            <div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-line2-clock"></i>
                <div class="counter counter-lined"><span data-from="60" data-to="1200" data-refresh-interval="30"
                                                         data-speed="2700"></span>+
                </div>
                <h5><?= $this->lang->line('about_graph_hours'); ?></h5>
            </div>

        </div>
    </div>


    </div>

</section><!-- #content end -->