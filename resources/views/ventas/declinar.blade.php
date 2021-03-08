{!! Form::open(['route' => ['cerrar.venta'], 'method' => 'POST']) !!}
    @csrf
    <div class="modal fade" id="DeclinarVenta" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Declinar Venta</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                    <h3>¡ATENCIÓN!</h3>
                    <p>Está a punto de declinar la venta. Esta opción no se podrá deshacer</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_venta" id="id_venta2">
                    <input type="hidden" name="opcion" value="Declinar">
                    <button type="submit" class="btn btn-danger" style="border-radius: 50px;">Declinar</button>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}