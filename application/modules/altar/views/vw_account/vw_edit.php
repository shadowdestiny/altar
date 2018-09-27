<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">

        <h1><?= $this->lang->line('account_edit_title') ?></h1>

    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">


            <div class="col-md-12 nobottommargin">


                <form id="edit-form" name="edit-form" class="nobottommargin" onsubmit="return validateEdit();">

                    <div class="col_half">
                        <label for="register-form-name"><?= $this->lang->line('account_edit_label_name'); ?></label>
                        <input type="text" id="name" name="name"
                               class="form-control" value="<?= $name . ' ' . $firstSurname . ' ' . $secondSurname; ?>"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-email"><?= $this->lang->line('account_edit_label_email'); ?></label>
                        <input type="text" id="email" name="email"
                               class="form-control" value="<?= $email; ?>" disabled/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="register-form-username"><?= $this->lang->line('account_edit_label_username'); ?></label>
                        <input type="text" id="username" name="username"
                               class="form-control" value="<?= $nickname; ?>"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-phone"><?= $this->lang->line('account_edit_label_phone'); ?></label>
                        <input type="number" id="phone" name="phone"
                               class="form-control" value="<?= $phone; ?>"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="register-form-password"><?= $this->lang->line('account_edit_label_pass'); ?></label>
                        <input type="password" id="password" name="password" value=""
                               class="form-control"/>
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-repassword"><?= $this->lang->line('account_edit_label_passC'); ?></label>
                        <input type="password" id="password_confirm" name="password_confirm" value=""
                               class="form-control"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" id="register-form-submit"
                                name="register-form-submit" value="register">
                            <?= $this->lang->line('account_edit_button'); ?>
                        </button>
                    </div>

                </form>

            </div>


        </div>

    </div>

</section><!-- #content end -->

<div class="loading" style="display: none;"></div>

