<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $this->lang->line('purchases_title'); ?></h1>

    </div>

</section><!-- #page-title end -->

<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="table-responsive bottommargin">

                <table class="table cart">
                    <thead>
                    <tr>
                        <th class="cart-product-remove">&nbsp;</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-name">Producto</th>
                        <th class="cart-product-subtotal">Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?= $elementsPurchase; ?>

                    <tr class="cart_item">
                        <td colspan="6">
                            <div class="row clearfix">

                                <div class="row clearfix">
                                    <div class="col-md-6 clearfix">

                                    </div>

                                    <div class="col-md-6 clearfix">
                                        <div class="table-responsive">
                                            <h4>Total a pagar</h4>

                                            <table class="table cart">
                                                <tbody>
                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        <strong>Sub total</strong>
                                                    </td>

                                                    <td class="cart-product-name">
                                                        <span class="amount">
                                                            <span class="signopesos">$</span>
                                                            <span class="showSubTotalPriceAdd">
                                                                <?= $subTotalPriceElements; ?>
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        <strong>Descuento</strong>
                                                    </td>

                                                    <td class="cart-product-name">
                                                        <span class="amount">
                                                            <span class="signopesos" id="type_descount">
                                                                <?= $totalTypeElementsDescount; ?>
                                                            </span>

                                                            <span id="descount">
                                                                <?= $totalQuantityElementsDescount; ?>
                                                            </span>


                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        <strong>Total</strong>
                                                    </td>

                                                    <td class="cart-product-name">
                                                        <span class="amount lead">
                                                            <strong>
                                                                    <span class="signopesos">$</span>
                                                                <span class="showTotalPriceAdd"><?= $totalPriceElements ?></span>
                                                            </strong>
                                                        </span>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <!--VARIABLES PARA MODIFICAR LA CANTIDAD TOTAL-->

                                <input type="hidden" name="coupon_id" id="coupon_id" value="">
                                <input type="hidden" name="coupon_code" id="coupon_code" value="">
                                <input type="hidden" name="coupon_type" id="coupon_type" value="">
                                <input type="hidden" name="coupon_quantity" id="coupon_quantity" value="">


                                <!---->
                                <div class="col-md-4 col-xs-4 nopadding">
                                    <form id="form_coupon_aplied" onsubmit="return validateCoupon();">
                                        <div class="col-md-8 col-xs-7 nopadding">
                                            <input type="text" class="sm-form-control" name="coupon_input"
                                                   id="coupon_input"
                                                   placeholder="Ingresar código"/>
                                        </div>

                                        <div class="col-md-4 col-xs-5">
                                            <button type="submit" class="button button-3d button-black nomargin">Aplicar
                                                cupón
                                            </button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-8 col-xs-7 nopadding">
                                    <a href="<?= ROOT_URL; ?>altar/creativealtar"
                                       class="button button-3d nomargin fright">Seguir
                                        comprando</a>

                                    <?= $form_to_pay; ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>


        </div>

    </div>

</section><!-- #content end -->

