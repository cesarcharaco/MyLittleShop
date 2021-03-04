{!! Form::open(['route' => ['productos.mostrar_producto'], 'method' => 'POST']) !!}
    @csrf
    <div class="modal fade" id="Mostrar" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Mostrar o no la imagen en el portal</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                    <h3>¡ATENCIÓN!</h3>
                    <p>Está a punto de quitar/poner la imagen en el portal</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_imagen" id="id_imagen">
                    <input type="hidden" name="status" id="status">
                    <button type="submit" class="btn btn-danger" style="border-radius: 50px;">Mostrar/Quitar</button>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}