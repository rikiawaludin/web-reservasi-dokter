<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					
					
					<?php
						$role_id = $this->session->userdata('role_id');
						$queryMenu = "SELECT `user_menu`. `id`, `menu`
										FROM `user_menu` JOIN `user_access_menu`
										ON `user_menu` . `id` = `user_access_menu` . `menu_id`
										WHERE `user_access_menu` . `role_id` = $role_id
										ORDER BY `user_access_menu` . `menu_id` ASC ";
						
						$menu = $this->db->query($queryMenu)->result_array();

					?>


					<ul class="nav nav-primary">

				<?php foreach($menu as $m) : ?>
					
					<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section"><?= $m['menu']; ?> </h4>
					</li>

					<?php
						$menuId = $m['id'];
						$querySubMenu = "SELECT * 
											FROM `user_sub_menu` JOIN `user_menu`
											ON `user_sub_menu` . `menu_id` = `user_menu` . `id`
											WHERE `user_sub_menu` . `menu_id` = $menuId
											AND `user_sub_menu` . `is_active` = 1
											";
						$subMenu = $this->db->query($querySubMenu)->result_array();
					?>
						<?php foreach($subMenu as $sm): ?>
							<?php if ($title == $sm['title']) : ?>
							<li class="nav-item active">
								<?php else : ?>
									<li class="nav-item">
							<?php endif; ?>
								<a class="nav-link" href=" <?= base_url($sm['url']); ?>">
									<i class=" <?= $sm['icon']; ?> "></i>
									<span> <?= $sm['title']; ?> </span>
								</a>
							</li>
							<?php endforeach; ?>
				<?php endforeach; ?>
				
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Logout</h4>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="modal"
								data-target="#logoutModal"> <i class="fas fa-fw fa-sign-out-alt"></i>
								<span>Logout</span>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>

				

		<!-- Modal untuk Logout -->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Pilih Logout jika Anda ingin keluar
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
					</div>
				</div>
			</div>
		</div>