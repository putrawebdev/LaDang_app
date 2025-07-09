<div>
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="#">
                    <i class="fas fa-home"></i>
                    Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <i class="fas fa-user mr-1"></i>
                    {{ $title }}
                </li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <div class="d-flex justify-content-between">
                <button wire:click="create" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus mr-1" ></i>
                Tambah Data
                </button>
                <div class="btn-group dropleft">
                <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-print mr-1"></i>
                    Cetak
                </button>
                <div class="dropdown-menu">
                    @livewire('export-users')
                    <a class="dropdown-item text-success" href="#">
                    <i class="fas fa-file-pdf mr-1"></i>
                    PDF
                    </a>
                </div>
                </div>
            </div>
            </div>
            
            <div class="card-body">
                <div class="mb-2 d-flex justify-content-between">
                    <div class="col-2">
                        <select wire:model.live='paginate' class="form-control text-center">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="form-inline my-2 ">
                        <input wire:model.live="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>
                                    <i class="fas fa-cog"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->role == 'Super Admin')
                                            <span class="badge badge-success">
                                                {{ $item->role }}
                                            </span>
                                        @else
                                            <span class="badge badge-info">
                                                {{ $item->role }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-inline">
                                            <button wire:click="edit({{ $item->id }})" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="d-inline">
                                            <button wire:click="delete({{ $item->id }})" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $user->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
        </section>
        <!-- /.content -->
        <!-- Modal -->
        @include('livewire.superadmin.user.create')
        @include('livewire.superadmin.user.edit')
        @include('livewire.superadmin.user.delete')
        {{-- Close Modal --}}
        @script
            <script>
                $wire.on('disableModalCreate', () => {
                    $('#createModal').modal('hide');
                    Swal.fire({
                        position: "top-end",
                        title: "DATA BERHASIL DITAMBAHKAN",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1300
                    });
                });
                $wire.on('disableModalUpdate', () => {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        position: "top-end",
                        title: "DATA BERHASIL DIUPDATE",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1300
                    });
                });
                $wire.on('disableModalDelete', () => {
                    $('#deleteModal').modal('hide');
                    Swal.fire({
                        position: "top-end",
                        title: "DATA BERHASIL DIHAPUS",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1300
                    });
                });
            </script>
        @endscript
    </div>
</div>
