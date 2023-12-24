<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7 offset-lg-6">
            <style>
                .transparent-background {
                    background-color: rgba(255, 255, 255, 0.7);
                    padding: 15px;
                    border-radius: 10px;
                    background: none;
                }
            </style>

            <div class="card o-hidden border-0 shadow-lg my-5 transparent-background">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900">Ubah Password</h1>
                                    <h5 class="mb-4">
                                        <?= $this->session->userdata('reset_email'); ?>
                                    </h5>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/ubahpassword'); ?>">
                                    <div class="form-group transparent-background">
                                        <input type="password" class="form-control" id="password1" name="password1"
                                            placeholder="Masukkan password baru...">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group transparent-background">
                                        <input type="password" class="form-control" id="password2" name="password2"
                                            placeholder="Ulangi password baru...">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Ubah Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>