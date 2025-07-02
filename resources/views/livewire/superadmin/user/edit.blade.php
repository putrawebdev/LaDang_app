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
            <div class="form-group">
                <label for="name">Nama</label>
                <input wire:model="name" type="text" class="form-control
                @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan nama">
                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input wire:model="email" type="email" class="form-control
                @error('email') is-invalid @enderror" id="email" name="email">
                @error('email')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select wire:model="role" class="form-control @error('role') is-invalid @enderror" id="role">
                    <option selected> -- Pilih Role -- </option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Admin">Admin</option>
                </select>
                @error('role')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input wire:model="password" type="password" class="form-control
                @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input wire:model="password_confirmation" type="password" class="form-control
                @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
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
            <button wire:click="update({{ $user_id }})" type="button" class="btn btn-warning btn-sm">
                <i class="fas fa-edit mr-1"></i>
                Update
            </button>
        </div>
        </div>
    </div>
</div>