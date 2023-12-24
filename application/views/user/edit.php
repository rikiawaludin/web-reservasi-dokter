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
				</ul>
			</div>
			<div class="row">
				<div class="col-md-10">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Halaman Edit</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-lg">
									<?= form_open_multipart('user/edit'); ?>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="text" class="form-control" value="<?= $user['email']; ?>" readonly
											id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Nama Lengkap</label>
										<input type="text" class="form-control" id="name" name="name"
											value="<?= $user['name']; ?>">
										<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="telepon">Telepon</label>
										<input type="text" class="form-control" id="telepon" name="telepon"
											value="<?= $user['telepon']; ?>">
										<?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
								</div>
								<div class="col-md-6 col-lg">
									<div class="form-group">
										<label for="alamat">Alamat</label>
										<input class="form-control" id="alamat" name="alamat"
											value="<?= $user['alamat']; ?>">
										</input>
										<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="usia">Usia</label>
										<input class="form-control" id="usia" name="usia" value="<?= $user['usia']; ?>">
										</input>
										<?= form_error('usia', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="foto profil"> Foto Profil</label>
										<div class="row">
											<div class="col-sm-3">
												<img src="<?= base_url('assets/assets/img/') . $user['image']; ?>"
													class="img-thumbnail">
											</div>
											<div class="col-sm-9">
												<div class="custom-file">
													<label for="image" class="form-label"></label>
													<input type="file" class="form-control" id="image" name="image">
													<small class="text-muted">file harus berupa gambar</small>
												</div>
											</div>
										</div>
									</div>
									<br>
									<br>
									<div class="text-right">
										<div class="form-group">
											<button id="displayNotif" type="submit" class="btn btn-primary">
												<span class="btn-label"><i class="fas fa-check"></i></span> Edit
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