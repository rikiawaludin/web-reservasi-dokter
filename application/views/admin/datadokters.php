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
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
									data-target="#addRowModal">
									<i class="fa fa-plus"></i>
									Tambah Data
								</button>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header no-bd">
											<h5 class="modal-title">
												<span class="fw-mediumbold">
													Tambah Data
												</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<?= form_open_multipart('admin/add'); ?>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group form-group-default">
														<label>Nama Dokter</label>
														<input id="nama_dokter" type="text" class="form-control"
															placeholder="Nama dokter" name="nama_dokter" required>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group form-group-default">
														<label>Spesialis</label>
														<input id="spesialis" type="text" class="form-control"
															placeholder="Spesialis" name="spesialis" required>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group form-group-default">
														<label>Telepon</label>
														<input id="telepon" type="text" class="form-control"
															placeholder="6289xxxx" name="telepon" required>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group form-group-default">
														<label>Alamat</label>
														<input id="alamat" type="text" class="form-control"
															placeholder="Alamat" name="alamat" required>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group form-group-default">
														<label>Foto</label>
														<div class="col-sm-12">
															<div class="custom-file">
																<label for="gambar" class="form-label"></label>
																<input type="file" class="form-control" id="gambar"
																	name="gambar" required>
																<small class="text-muted">file harus berupa
																	gambar</small>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer no-bd">
											<button type="button" class="btn btn-danger"
												data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Add</button>
										</div>
										<?= form_close(); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-sm-12">
								<?= $this->session->flashdata('message'); ?>
							</div>
						</div>
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th width="2%">ID Dokter</th>
										<th width="30%">Nama Dokter</th>
										<th width="2%">Spesialis</th>
										<th width="2%">Telepon</th>
										<th>Alamat</th>
										<th width="40%">Foto</th>
										<th width="5%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data_dokter->result() as $row): ?>
										<tr>
											<td>
												<?= $row->id; ?>
											</td>
											<td>
												<?= $row->nama_dokter; ?>
											</td>
											<td>
												<?= $row->spesialis; ?>
											</td>
											<td>
												<?= $row->telepon; ?>
											</td>
											<td>
												<?= $row->alamat; ?>
											</td>
											<td>
												<div class="col-sm-12 mx-auto">
													<img src="<?= base_url('assets/assets/img/') . $row->gambar; ?>"
														class="img-fluid rounded card-body d-flex">
												</div>
											</td>
											<td>
												<div class="form-button-action">
													<button type="button" data-toggle="modal"
														data-target="#addRowModal2<?= $row->id; ?>" title=""
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

<?php foreach ($data_dokter->result() as $row): ?>
	<div class="modal fade" id="addRowModal2<?= $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Edit Data
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?= form_open_multipart('admin/edit/' . $row->id); ?>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Nama Dokter</label>
								<input id="nama_dokter" type="text" class="form-control" placeholder="Nama dokter"
									name="nama_dokter" value="<?= $row->nama_dokter ?>" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Spesialis</label>
								<input id="spesialis" type="text" class="form-control" placeholder="Spesialis"
									name="spesialis" value="<?= $row->spesialis ?>" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Telepon</label>
								<input id="telepon" type="text" class="form-control" placeholder="6289xxxx" name="telepon"
									value="<?= $row->telepon ?>" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Alamat</label>
								<input id="alamat" type="text" class="form-control" placeholder="Alamat" name="alamat"
									value="<?= $row->alamat ?>" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Foto</label>
								<div class="row">
									<div class="col-sm-3">
										<img src="<?= base_url('assets/assets/img/') . $row->gambar; ?>"
											class="img-thumbnail">
									</div>
									<div class="col-sm-9">
										<div class="custom-file">
											<label for="gambar<?= $row->id; ?>" class="form-label"></label>
											<input type="file" class="form-control" id="gambar<?= $row->gambar; ?>"
												name="gambar">
											<small class="text-muted">file harus berupa gambar</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="btnSubmit">Add</button>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>

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
				<form action="<?= base_url('admin/delete/' . $row->id); ?>" method="post">
					<input type="hidden" name="id" value=" <?= $row->id; ?> ">
					<button class="btn btn-primary">Delete</buttom>
				</form>
			</div>
		</div>
	</div>
</div>