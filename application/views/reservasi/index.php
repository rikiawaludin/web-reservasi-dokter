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
                </ul>
            </div>
            <div class="container">
                <!-- row -->
                <div class="row mb-5 cstm-height-card">
                    <?php
                    // Ambil data reservasi yang berkaitan dengan pengguna saat pertama kali
                    $reservasi_pengguna = $reservasi->result();

                    foreach ($data_dokter->result() as $row):
                        $sudah_reservasi = false;
                        foreach ($reservasi_pengguna as $booked):
                            if ($row->id == $booked->id_data_dokter && $booked->id_pasien == $user['id']):
                                    $sudah_reservasi = true;
                                break; // Keluar dari loop jika sudah ditemukan reservasi
                    
                            endif;
                        endforeach;
                        ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= base_url('assets/assets/img/') . $row->gambar; ?>" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $row->nama_dokter; ?>
                                    </h5>
                                    <hr>
                                    <p class="card-text">
                                        Spesialis :
                                        <?= $row->spesialis; ?> <br>
                                        Alamat :
                                        <?= $row->alamat; ?> <br>
                                        Informasi:
                                        <a type="submit" data-toggle="modal" data-target="#addRowModal<?= $row->id; ?>"
                                            class="btn btn-link btn-sm btn-info">
                                            <span class="btn-label"><i class="far fa-calendar-alt"></i></span> Jadwal
                                        </a>
                                    </p>

                                    <?php if ($sudah_reservasi): ?>
                                        <div class="text-left">
                                            <button type="submit" data-toggle="modal" data-target="#doneReservasi" class="btn btn-sm btn-round btn-success">
                                                <span class="btn-label"><i class="fas fa-check"></i></span> Sudah Reservasi
                                            </button>
                                        </div>
                                        <div class="modal fade" id="doneReservasi" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Reservasi</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda sudah melakukan Reservasi
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-left">
                                            <button type="submit" data-toggle="modal"
                                                data-target="#addRowModal2<?= $row->id; ?>"
                                                class="btn btn-sm btn-round btn-primary">
                                                <span class="btn-label"><i class="far fa-bookmark"></i></span> Reservasi
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php foreach ($data_dokter->result() as $row): ?>
                <div class="modal fade" id="addRowModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Schedule -
                                        <?= $row->nama_dokter; ?>
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table id="" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Hari</th>
                                                <th>Jam Praktek</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($jadwal_dokter->result() as $jadwal): ?>
                                                <?php if ($row->id == $jadwal->id_data_dokter): ?>
                                                    <tr>
                                                        <td>
                                                            <?= $jadwal->hari; ?>
                                                        </td>
                                                        <td>
                                                            <?= $jadwal->jam_praktek; ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer no-bd">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Modal -->
            <?php foreach ($data_dokter->result() as $row): ?>
                <div class="modal fade" id="addRowModal2<?= $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Buat Janji
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('reservasi/reqPasien') ?>" method="post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal</label>
                                                <input id="tanggal" type="date" class="form-control" placeholder="Senin"
                                                    name="tanggal" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Waktu Konsultasi</label>
                                                <input id="waktu_konsultasi" type="time" class="form-control" placeholder=""
                                                    name="waktu_konsultasi" required>
                                            </div>
                                        </div>
                                        <input id="pasien" type="hidden" name="pasien" value="<?= $user['name']; ?>">
                                        <input id="usia" type="hidden" name="usia" value="<?= $user['usia']; ?>">
                                        <input id="id_pasien" type="hidden" name="id_pasien" value="<?= $user['id']; ?>">
                                        <input type="hidden" name="id_data_dokter" value="<?= $row->id; ?>">
                                        <input type="hidden" name="dokter" value="<?= $row->nama_dokter; ?>">
                                        <input type="hidden" name="no_telepon" value="<?= $row->telepon; ?>">
                                    </div>
                            </div>
                            <div class="modal-footer no-bd">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <style>
                .cstm-height-card .card-img-top {
                    height: 300px;
                    object-fit: cover;
                }
            </style>