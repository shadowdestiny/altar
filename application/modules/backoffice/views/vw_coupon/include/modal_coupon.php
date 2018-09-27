<div class="modal fade" id="modal_coupon_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar cupón</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_form_coupon" onsubmit="return validate_add_coupon();">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Código del cupón:</label>
                        <input type="text" class="form-control" id="code_coupon" name="code_coupon"
                               style="background-color: lightgrey" value="<?= $cupon_generate; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Cantidad</label>
                        <input type="number" min="0" class="form-control" id="cantidad" name="cantidad"
                               style="background-color: lightgrey">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Tipo de Cupón</label>
                        <select class="form-control" id="type_coupon" name="type_coupon"
                                style="background-color: lightgrey">
                            <option value="">Seleccione una opción</option>
                            <option value="price">Por precio $</option>
                            <option value="percentage">Por porcentaje %</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" onclick="return generate_code_coupon();" class="btn btn-secondary">Generar
                        código
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cupón</button>
                </div>
            </form>
        </div>
    </div>
</div>