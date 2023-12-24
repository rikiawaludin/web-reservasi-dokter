<!-- Sidebar -->

<!-- End Sidebar -->

<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h1 class="text-white pb-2 fw-bold">
							<?= $title; ?>
						</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--6">
			<div class="row">
				<div class="col-lg-8">
				<?= $this->session->flashdata('message'); ?>
				</div>
			</div>
		</div>

		<div class="page-inner mt--5">
			<div>
				<div class="card mb-3 col-lg-8">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="<?= base_url('assets/assets/img/') . $user['image']; ?>"
								class="img-fluid rounded card-body" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h4 class="card-title">
									<?= $user['name']; ?>
								</h4> <br>
								<p class="card-text">
									<i class="fas fa-envelope"></i>
									<?= $user['email'] ?> <br>
									<i class="fas fa-phone"></i>
									<?= $user['telepon'] ?> <br>
									<i class="fas fa-map-marker-alt"></i>
									<?= $user['alamat'] ?> <br>
									<i class="fas fa-birthday-cake"></i>
									<?= $user['usia'] ?>
								</p>
								<br> <br>
								<p class="card-text"><small class="text=muted">
										Pengguna sejak
										<?= date('d F Y', $user['date_created']) ?>
									</small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	