<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="<?php echo e(url('/' . $page='index')); ?>"><img src="<?php echo e(URL::asset('assets/img/brand/logo.png')); ?>" class="logo-1" alt="logo"></a>
							<a href="<?php echo e(url('/' . $page='index')); ?>"><img src="<?php echo e(URL::asset('assets/img/brand/logo-white.png')); ?>" class="dark-logo-1" alt="logo"></a>
							<a href="<?php echo e(url('/' . $page='index')); ?>"><img src="<?php echo e(URL::asset('assets/img/brand/favicon.png')); ?>" class="logo-2" alt="logo"></a>
							<a href="<?php echo e(url('/' . $page='index')); ?>"><img src="<?php echo e(URL::asset('assets/img/brand/favicon.png')); ?>" class="dark-logo-2" alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						
					</div>
					<div class="main-header-right">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
					
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>
							
						
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><img alt="" src="<?php echo e(URL::asset('assets/img/faces/6.jpg')); ?>"></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="<?php echo e(URL::asset('assets/img/faces/6.jpg')); ?>" class=""></div>
											<div class="mr-3 my-auto">
												<h6><?php echo e(Auth::user()->name); ?></h6><span><?php echo e(Auth::user()->email); ?></span>
											</div>
										</div>
									</div>
									   <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i>Déconnexion</a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>

                                </div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
<?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/layouts/main-header.blade.php ENDPATH**/ ?>