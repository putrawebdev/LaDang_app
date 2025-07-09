<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit {{ $title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {{-- nama barang --}}
            <div class="form-group">
                <label for="name_barang">Nama Barang</label>
                <input wire:model="name_barang" type="text" class="form-control
                @error('name_barang') is-invalid @enderror" id="name_barang" name="name_barang">
                @error('name_barang')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            {{-- harga --}}
            <div class="form-group">
                <label for="harga">Harga</label>
                <input wire:model="harga" type="number" class="form-control
                @error('harga') is-invalid @enderror" id="harga" name="harga">
                @error('harga')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
            </div>
            {{-- stok_barang --}}
            <div class="form-group">
                <label for="stok_barang">Stok</label>
                <input wire:model="stok_barang" type="number" class="form-control
                @error('stok_barang') is-invalid @enderror" id="stok_barang" name="stok_barang">
                @error('stok_barang')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
            </div>
            {{-- kategori barang --}}
            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select wire:model="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id">
                    <option selected> -- Pilih Kategori -- </option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->name_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori_id')
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
            <button wire:click="update({{ $barang_id }})" type="button" class="btn btn-warning btn-sm">
                <i class="fas fa-edit mr-1"></i>
                Update
            </button>
        </div>
        </div>
    </div>
</div>