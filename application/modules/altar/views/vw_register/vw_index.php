<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $title; ?></h1>


    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">


            <div class="col_two_third nobottommargin">


                <h3><?= $subtitle; ?></h3>

                <p><?= $content; ?></p>

                <form id="register-form" onsubmit="return validateRegister();">

                    <div class="col_half">
                        <label for="register-form-name"><?= $this->lang->line('register_section1_form_name') ?>:</label>
                        <input type="text" id="name" name="name" value=""
                               class="form-control"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-email"><?= $this->lang->line('register_section1_form_email') ?>:</label>
                        <input type="text" id="email" name="email" value=""
                               class="form-control"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="register-form-username"><?= $this->lang->line('register_section1_form_user') ?>:</label>
                        <input type="text" id="username" name="username" value=""
                               class="form-control"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-phone"><?= $this->lang->line('register_section1_form_phone') ?>:</label>
                        <input type="text" id="phone" name="phone" value=""
                               class="form-control"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="register-form-password"><?= $this->lang->line('register_section1_form_pass') ?>:</label>
                        <input type="password" id="password" name="password" value=""
                               class="form-control"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-repassword"><?= $this->lang->line('register_section1_form_passc') ?></label>
                        <input type="password" id="password_confirm" name="password_confirm" value=""
                               class="form-control"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" id="register-form-submit"
                                name="register-form-submit" value="register"><?= $this->lang->line('register_section1_form_register') ?>
                        </button>
                    </div>

                </form>

            </div>
            <div class="col_one_third col_last  nobottommargin">

                <div class="well well-lg nobottommargin">
                    <form id="login-form" onsubmit="return validateLogin();">

                        <h3><?= $this->lang->line('register_section2_form_title') ?></h3>

                        <div class="col_full">
                            <label for="login-form-username"><?= $this->lang->line('register_section2_form_email') ?>:</label>
                            <input type="text" id="email" name="email" class="form-control"/>
                        </div>

                        <div class="col_full">
                            <label for="login-form-password"><?= $this->lang->line('register_section2_form_pass') ?>:</label>
                            <input type="password" id="password" name="password" class="form-control"/>
                        </div>

                        <div class="col_full nobottommargin">
                            <button type="submit" class="button button-3d nomargin"><?= $this->lang->line('register_section2_form_button') ?>
                            </button>
                            <a href="<?= ROOT_URL; ?>altar/Ctr_account/recovery" class="fright"><?= $this->lang->line('register_section2_form_forgot') ?></a>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->
<div class="loading" style="display: none;"></div>
