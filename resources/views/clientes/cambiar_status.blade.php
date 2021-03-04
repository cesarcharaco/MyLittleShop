{!! Form::open(['route' => ['clientes.cambiar_status'], 'method' => 'POST']) !!}
    @csrf
    <div class="modal fade" id="CambiarStatus" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Cambiar el Status del Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                    <h3>¡ATENCIÓN!</h3>
                    <p>Está a punto de cambiar el status del Cliente</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_cliente" id="id_cliente">
                    <button type="submit" class="btn btn-danger" style="border-radius: 50px;">Cambiar</button>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}