<div class="modal fade" id="modal_detalhes_compra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModalDetalhes()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="content-modal-detalhes-compra">
                
            </div>
            
        </div>
    </div>
</div>

<script>
    function closeModalDetalhes() {
        $('#modal_detalhes_compra').modal('hide')
    }
</script>
<?php /**PATH /home/rifadigital/public_html/resources/views/compras/modal/detalhes.blade.php ENDPATH**/ ?>