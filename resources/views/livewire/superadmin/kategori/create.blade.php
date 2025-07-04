<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Tambah {{ $title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name_kategori">Nama Kategori</label>
                <input wire:model="name_kategori" type="text" class="form-control
                @error('name_kategori') is-invalid @enderror" id="name_kategori" name="name_kategori" placeholder="Masukkan nama kategori">
                @error('name_kategori')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                <i class="fas fa-times mr-1"></i>
                Close
            </button>
            <button wire:click="store" type="button" class="btn btn-primary btn-sm">
                <i class="fas fa-save mr-1"></i>
                Save
            </button>
        </div>
        </div>
    </div>
</div>