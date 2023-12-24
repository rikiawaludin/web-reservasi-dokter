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
                                    <h1 class="h2 text-gray-900 mb-4">Anda Lupa Password?</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                                    <div class="form-group transparent-background">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="<?= set_value('email'); ?>" placeholder="Masukkan Alamat Email...">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Reset Password
                                            </button>
                                        </div>
                                    </div>


                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth'); ?>">Kembali Ke Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>