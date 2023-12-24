<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">
                    <?= $title; ?>
                </h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href=" <?= base_url('admin/index'); ?> ">
                            <i class="fas fa-hospital-alt"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/datadokters'); ?>">Data dokter</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/jadwaldokter'); ?>">Jadwal Dokter</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/permintaanpasien'); ?>">Permintaan Pasien</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">
                                    <?= $title; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <?php foreach ($reservasi->result() as $row): ?>
                                <div class="modal fade" id="addRowModal<?= $row->id ?>" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                        Edit data
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('admin/editreq/' . $row->id) ?>" method="post">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Dokter</label>
                                                                <input id="dokter" type="text" class="form-control"
                                                                    placeholder="John Doe" name="dokter"
                                                                    value="<?= $row->dokter ?>" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Pasien</label>
                                                                <input id="pasien" type="text" class="form-control"
                                                                    placeholder="John Doe" name="pasien"
                                                                    value="<?= $row->pasien ?>" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Usia</label>
                                                                <input id="usia" type="text" class="form-control"
                                                                    placeholder="John Doe" name="usia"
                                                                    value="<?= $row->usia ?>" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Tanggal</label>
                                                                <input id="tanggal" type="text" class="form-control"
                                                                    placeholder="01/01/2023" name="tanggal"
                                                                    value="<?= $row->tanggal ?>" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Waktu Konsultasi</label>
                                                                <input id="waktu_konsultasi" type="text"
                                                                    class="form-control" placeholder="08.00"
                                                                    name="waktu_konsultasi"
                                                                    value="<?= $row->waktu_konsultasi ?>" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Status</label>
                                                                <select class="form-control" id="formGroupDefaultSelect"
                                                                    name="status">
                                                                    <option value="Request" <?= ($row->status === 'Request') ? 'selected' : ''; ?>>Request </option>
                                                                    <option value="Confirmed"
                                                                        <?= ($row->status === 'Confirmed') ? 'selected' : ''; ?>>Confirmed </option>
                                                                    <option value="Rescheduled"
                                                                        <?= ($row->status === 'Rescheduled') ? 'selected' : ''; ?>>Rescheduled</option>
                                                                    <option value="Done" <?= ($row->status === 'Done') ? 'selected' : ''; ?>>Done</option>
                                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="no_telepon" value="<?= $row->no_telepon; ?>">
                                                        <input type="hidden" name="id_data_dokter" value="<?= $row->id_data_dokter; ?>">
                                                        <input type="hidden" name="id_pasien" value="<?= $row->id_pasien; ?>">
                                                    </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 17%">Nama Dokter</th>
                                        <th style="width: 17%">Pasien</th>
                                        <th>Usia</th>
                                        <th>Tanggal</th>
                                        <th style="10%">Waktu Konsultasi</th>
                                        <th>Status</th>
                                        <th style="width: 5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reservasi->result() as $row): ?>
                                        <tr>
                                            <td>
                                                <?= $row->dokter ?>
                                            </td>
                                            <td>
                                                <?= $row->pasien ?>
                                            </td>
                                            <td>
                                                <?= $row->usia ?>
                                            </td>
                                            <td>
                                                <?= $row->tanggal ?>
                                            </td>
                                            <td>
                                                <?= $row->waktu_konsultasi ?>
                                            </td>
                                            <td>
                                                <?php if ($row->status == 'Request'): ?>
                                                    <span class="badge badge-warning">
                                                        <?= $row->status ?>
                                                    </span>
                                                <?php elseif ($row->status == 'Confirmed'): ?>
                                                    <span class="badge badge-primary">
                                                        <?= $row->status ?>
                                                    </span>
                                                <?php elseif ($row->status == 'Rescheduled'): ?>
                                                    <span class="badge badge-danger">
                                                        <?= $row->status ?>
                                                    </span>
                                                <?php elseif ($row->status == 'Done'): ?>
                                                    <span class="badge badge-success">
                                                        <?= $row->status ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#addRowModal<?= $row->id ?>" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" data-toggle="modal" data-target="#deleteModal"
                                                        title="" class="btn btn-link btn-danger"
                                                        data-original-title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin akan menghapus data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <form action="<?= base_url('admin/hapusreq/' . $row->id); ?>" method="post">
                    <input type="hidden" name="id" value=" <?= $row->id; ?> ">
                    <button class="btn btn-primary">Delete</buttom>
                </form>
            </div>
        </div>
    </div>
</div>