<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1><?= $this->lang->line('contact_title') ?></h1>
        <span><?= $this->lang->line('contact_subtitle') ?></span>
    </div>
</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">
        <div class="container clearfix">
            <!-- Contact Form
            ============================================= -->
            <div class="col_half">
                <div class="fancy-title title-dotted-border">
                    <h3><?= $this->lang->line('contact_form_title') ?></h3>
                </div>
                <div class="contact-widget22222">
                    <div class="contact-form-result"></div>
                    <form onsubmit="return send_mailContacto();" id="formulario">

                        <div class="col_one_third">
                            <label for="contactform-name"><?= $this->lang->line('contact_form_name') ?>
                                <small>*</small>
                            </label>
                            <input type="text" id="contactform_name" name="contactform_name" value=""
                                   class="sm-form-control "/>
                        </div>
                        <div class="col_one_third">
                            <label for="contactform-email"><?= $this->lang->line('contact_form_email') ?>
                                <small>*</small>
                            </label>
                            <input type="email" id="contactform_email" name="contactform_email" value=""
                                   class=" email sm-form-control"/>
                        </div>
                        <div class="col_one_third col_last">
                            <label for="contactform-phone"><?= $this->lang->line('contact_form_phone') ?></label>
                            <input type="text" id="contactform_phone" name="contactform_phone" value=""
                                   class="sm-form-control"/>
                        </div>
                        <div class="clear"></div>
                        <div class="col_full">
                            <label for="contactform-subject"><?= $this->lang->line('contact_form_subject') ?>
                                <small>*</small>
                            </label>
                            <input type="text" id="contactform_subject" name="contactform_subject" value=""
                                   class=" sm-form-control"/>
                        </div>
                        <div class="clear"></div>

                        <div class="col_full">
                            <label for="contactform-message"><?= $this->lang->line('contact_form_message') ?>
                                <small>*</small>
                            </label>
                            <textarea class=" sm-form-control" id="contactform_message" name="contactform_message"
                                      rows="6" cols="30"></textarea>
                        </div>
                        <div class="col_full">
                            <button type="submit" type="submit" tabindex="5"
                                    class="button button-3d nomargin"><?= $this->lang->line('contact_form_send_message') ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- Contact Form End -->

            <div class="col_half col_last">
                <div class="widget clearfix">
                    <div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-items="1"
                         data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false">
                        <?= $publicidad; ?>
                    </div>
                </div>
            </div>
            <div id="resultado"></div>
            <div class="clear"></div>

            <!-- Contact Info
            ============================================= -->
        </div>
    </div>
</section><!-- #content end -->

<div class="loading" style="display: none;"></div>