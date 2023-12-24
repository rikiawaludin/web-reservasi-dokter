<div class="container">
    <style>
        .transparent-background {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 15px;
            border-radius: 10px;
            background: none;
        }
    </style>
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 offset-lg-6 transparent-background">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h2 text-gray-900 mb-4">Buat Akun</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group transparent-background">
                                <input type="text" class="form-control " id="name" name="name"
                                    value="<?= set_value('name'); ?>" placeholder="Nama Lengkap">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group transparent-background">
                                <input type="text" class="form-control " id="email" name="email"
                                    placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row transparent-background">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control " id="password1" name="password1"
                                        placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control " id="password2" name="password2"
                                        placeholder="Ulangi password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Register Account
                                    </button>
                                </div>
                            </div>
                            <!-- <button type="button" class="btn btn-success" id="alert_demo_3_3"> Success</button>	 -->
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href=" <?= base_url('auth'); ?>">Sudah punya akun? Masuk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>