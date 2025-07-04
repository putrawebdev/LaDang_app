<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Logout</button>
                </div>
            </div>
        </form>
    </div>
</div>