<div>
    <div class="content-wrapper">
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
        </div>
        </section>
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
                    <a class="dropdown-item text-success" href="#">
                    <i class="fas fa-file-excel mr-1"></i>
                    Excel
                    </a>
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
                    isi konten
                </div>
            </div>
        </div>
        <!-- /.card -->
        </section>
    </div>
</div>
