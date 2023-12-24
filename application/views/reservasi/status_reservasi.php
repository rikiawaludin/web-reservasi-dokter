<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">
                    <?= $title; ?>
                </h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url('reservasi/index'); ?>">
                            <i class="fas fa-calendar-alt"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('reservasi/statusreservasi'); ?>">Status Reservasi</a>
                    </li>
                </ul>
            </div>
            <div class="text-center">
                <div class="col-sm-8">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <?php foreach ($reservasi->result() as $row): ?>
                <?php if ($row->status == 'Request' && $row->id_pasien == $user['id']): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Dokter
                                            <?= $row->dokter ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-7 col-md-5">
                                                <div class="card card-stats card-warning card-round">
                                                    <div class="card-body ">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="icon-big text-center">
                                                                    <i class="flaticon-agenda-1"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-stats">
                                                                <div class="numbers">
                                                                    <p class="card-category">
                                                                        <?= $row->tanggal; ?>
                                                                    </p>
                                                                    <h4 class="card-title">
                                                                        <?= $row->status; ?>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p>
                                                    Selamat! Permintaan Anda pada jam
                                                    <?= $row->waktu_konsultasi ?> WIB
                                                    berhasil dikirim, Informasi selanjutnya tersedia dalam satu jam sebelum
                                                    jadwal permintaan Anda.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($row->status == 'Confirmed' && $row->id_pasien == $user['id']): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Dokter
                                            <?= $row->dokter ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-7 col-md-5">
                                                <div class="card card-stats card-primary card-round">
                                                    <div class="card-body ">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="icon-big text-center">
                                                                    <i class="flaticon-success"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-stats">
                                                                <div class="numbers">
                                                                    <p class="card-category">
                                                                        <?= $row->tanggal; ?>
                                                                    </p>
                                                                    <h4 class="card-title">
                                                                        <?= $row->status; ?>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p>
                                                    Selamat! permintaan Anda sudah dikonfirmasi. Silakan berkonsultasi pada jam
                                                    <?= $row->waktu_konsultasi ?> WIB
                                                </p>
                                                <a href="https://wa.me/<?= $row->no_telepon ?>?text=Nama: <?= $row->pasien ?>%0AUsia: <?= $row->usia ?>%0AKeluhan: "
                                                    target="_blank" class="btn btn-link btn-sm btn-success">
                                                    <span class="btn-label"><i class="fab fa-whatsapp"></i></span> Whatsapp
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($row->status == 'Rescheduled' && $row->id_pasien == $user['id']): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Dokter
                                            <?= $row->dokter ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-7 col-md-5">
                                                <div class="card card-stats card-danger card-round">
                                                    <div class="card-body ">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="icon-big text-center">
                                                                    <i class="flaticon-error"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-stats">
                                                                <div class="numbers">
                                                                    <p class="card-category">
                                                                        <?= $row->tanggal; ?>
                                                                    </p>
                                                                    <h4 class="card-title">
                                                                        <?= $row->status; ?>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p>
                                                    Mohon maaf permintaan Anda pada jam
                                                    <?= $row->waktu_konsultasi ?> WIB
                                                    tidak tersedia untuk saat ini. Silakan lakukan kembali permintaan Anda
                                                </p>
                                                <div class="text-right">
                                                    <a href="<?= base_url('reservasi/hapusreq/' . $row->id); ?>"
                                                        class="btn btn-link btn-sm btn-danger">
                                                        <span class="btn-label"><i class="fas fa-pencil-alt"></i></span> Jadwal
                                                        Ulang
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($row->status == 'Done' && $row->id_pasien == $user['id']): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Dokter
                                            <?= $row->dokter ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-7 col-md-5">
                                                <div class="card card-stats card-success card-round">
                                                    <div class="card-body ">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="icon-big text-center">
                                                                    <i class="flaticon-interface-1"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-stats">
                                                                <div class="numbers">
                                                                    <p class="card-category">
                                                                        <?= $row->tanggal; ?>
                                                                    </p>
                                                                    <h4 class="card-title">
                                                                        <?= $row->status; ?>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p>
                                                    Sesi konsultasi Anda pada jam
                                                    <?= $row->waktu_konsultasi ?> WIB
                                                    telah selesai. Terima kasih telah berkonsultasi dengan kami.
                                                    Semoga harimu menyenangkan.
                                                </p>
                                                <div class="text-right">
                                                    <a href="<?= base_url('reservasi/hapusreq/' . $row->id); ?>"
                                                        class="btn btn-link btn-sm btn-success">
                                                        <span class="btn-label"><i class="fas fa-check"></i></span> Selesai
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>