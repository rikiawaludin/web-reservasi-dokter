<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">
                    <?= $title; ?>
                </h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url('user'); ?>">
                            <i class="flaticon-user"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('user/edit'); ?> ">Edit Profil</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('user/ubahpassword'); ?> ">Ubah Password</a>
                    </li>
                </ul>

            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Ubah Password</div>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form method="post" action="<?= base_url('user/ubahpassword') ?>">
                                <div class="form-group">
                                    <label for="password_lama">Password Lama</label>
                                    <input type="password" class="form-control form-control-lg" id="password_lama"
                                        name="password_lama">
                                    <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password_baru1">Password Baru</label>
                                    <input type="password" class="form-control form-control-lg" id="password_baru1"
                                        name="password_baru1">
                                    <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password_baru2">Ulangi Password Baru</label>
                                    <input type="password" class="form-control form-control-lg" id="password_baru2"
                                        name="password_baru2">
                                    <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="text-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="btn-label"><i class="fas fa-check"></i></span> Ubah Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>