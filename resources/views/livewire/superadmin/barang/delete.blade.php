<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">DELETE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body"> 
                Apakah anda yakin ingin menghapus data ini? <br>
                <label>Nama Barang : {{ $name_barang }}</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                <button wire:click="destroy({{ $barang_id }})" type="button" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash mr-1"></i>
                    delete
                </button>
            </div>
        </div>
    </div>
</div>