<div>
    <div class="card-body login-card-body">
        
        <p class="login-box-msg">Log In your account</p>

        <form wire:submit="login">
            @csrf
            <div class="form-group mb-3">
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
                <label for="password">Password</label>
                <input wire:model="password" type="password" class="form-control
                @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="row ">
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>