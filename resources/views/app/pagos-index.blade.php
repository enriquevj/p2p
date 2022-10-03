@extends('layout.bootstrap')

@section('title', 'Pago WebCheckout')

@section('content')

<h2><i class="fas fa-shopping-cart"></i> Formulario de compra</h2>

<div id="failureMessage"></div>

<form action="/crearTransaccion" id="frmPagos" method="post" data-role="ajax-request" data-title="Transacción" data-id="CREA_TRAN"
    onsubmit="$('#md-request').modal()" data-response="#md-request .modal-body">
    @csrf

    <fieldset>
        <legend>Información del comprador</legend>

        <div class="form-row">
            <div class="form-group col-lg-3 col-sm-6">
                <label for="documentType">Producto</label>
                <input type="text" class="form-control" name="product" id="product" value="producto infinito" readonly>
            </div>
            <div class="form-group col-lg-3 col-sm-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="60" />
            </div>
            <div class="form-group col-lg-3 col-sm-6">
                <label for="surname">Apellidos</label>
                <input type="text" class="form-control" id="surname" name="surname" maxlength="60" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="80" />
            </div>
        </div>
    </fieldset>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="mobile">Número de teléfono móvil</label>
            <input type="text" class="form-control" id="mobile" name="mobile" maxlength="30" />
        </div>
    </div>
    <fieldset>
        <legend>Información de facturación</legend>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="reference">Referencia</label>
                <span class="form-control text-info"><?= time() ?></span>
                <input type="hidden" class="form-control" id="reference" name="reference" value="<?= time() ?>" />
            </div>
            <div class="form-group col-md-4">
                <label for="description">Concepto</label>
                <span class="form-control text-info">Prueba de pago</span>
                <input type="hidden" class="form-control" id="description" name="description" value="Pago Web Checkout - pruebas técnicas" />
            </div>
            <div class="form-group col-md-3">
                <label for="total">Valor a pagar</label>
                <span class="form-control text-danger"><?= number_format(50000, 2) ?></span>
                <input type="hidden" class="form-control" id="total" name="total" value="50000" />
            </div>
            <div class="form-group col-md-3">
                <label for="currency">Moneda</label>
                <input type="text" readonly="readonly" class="form-control" id="currency" name="currency" value="COP" />
            </div>
        </div>
        <div class="form-row">
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Confirmar pago</button>
</form>

<div class="modal" tabindex="-1" role="dialog" id="md-request">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Términos de la plataforma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearInterval(redirectionInterval);">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="
            $('#timer').show();
            $('#timer-desc').show();
            var num = 5;
            redirectionInterval = setInterval(function(){
                if (num == 0)
                    $('#timer').text('...');
                else
                    $('#timer').text(num.toString());
                num--;
                if (num < 0)
                    clearInterval(redirectionInterval);
            }, 1000);
            setTimeout(function(){
                window.location = $('#timer-desc').attr('data-ref');
            }, num * 1000);
        ">Aceptar</button>
      </div>
    </div>
  </div>
</div>

@endsection('content')