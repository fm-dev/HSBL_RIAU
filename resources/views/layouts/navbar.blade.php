	<!-- header -->
	<header class="site-header header-style-6 dark mo-left ">
		<!-- main header -->
		<div class=" sticky-header main-bar-wraper navbar-expand-lg navbar-expand-lg">
			<div class="main-bar clearfix ">
				<div class="top-bar">
					<div class="container top-bar-crve">
						<div class="row justify-content-between">
							<div class="dez-topbar-left">
								<ul class="social-line text-center pull-right">
									<li><a href="javascript:void(0);"><i class="fa fa-envelope-o"></i> <span> Companyname@mail.com </span> </a></li>
									<li><a href="javascript:void(0);"><i class="fa fa-phone"></i> <span> (732) 803-010-03 </span> </a></li>
								</ul>
							</div>                        
							<div class="dez-topbar-right ">
								<ul class="social-line text-center pull-right">
									<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
									<li><a href="javascript:void(0);" class="fa fa-google-plus"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="header-bar">
					<div class="container clearfix">
						<!-- website logo -->
						<div class="logo-header mostion">
							<a href="index.html"><img src="{{ asset('clientSide/images/logo/logo.png') }}" width="40" height="20" alt=""></a></div>
						<!-- nav toggle button -->
						<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- extra nav -->
						<div class="extra-nav">
							<div class="extra-cell">
								@if(Auth::check())
									<a href="/profile" type="button" class="site-button radius-xl"><i class="fa fa-user"></i> Profile</a>
								@else
									<a href="/login" type="button" class="site-button radius-xl"><i class="fa fa-sign-in"></i> Login</a>
								@endif
							</div>
						</div>
						<!-- Quik search -->
						<div class="dez-quik-search bg-primary-dark">
							<form action="#">
								<input name="search" value="" type="text" class="form-control" placeholder="Type to search">
								<span  id="quik-search-remove"><i class="fa fa-remove"></i></span>
							</form>
						</div>
						 <!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-end"  id="navbarNavDropdown">
							<ul class=" nav navbar-nav">
								<li class="active"> <a href="/">Home<i class="fa fa-chevron-down"></i></a>
									
								</li>
								<li> <a href="/#about">Tentang Kami<i class="fa fa-chevron-down"></i></a>
									<!-- <ul class="sub-menu">
										<li> <a href="javascript:;">Header Style Light<i class="fa fa-chevron-down"></i></a>
											<ul class="sub-menu">
												<li><a href="header-style-1.html">Header 1</a></li>
												<li><a href="header-style-2.html">Header 2</a></li>
												<li><a href="header-style-3.html">Header 3</a></li>
												<li><a href="header-style-4.html">Header 4</a></li>
												<li><a href="header-style-5.html">Header 5</a></li>
												<li><a href="header-style-6.html">Header 6</a></li>
											</ul>
										</li>
										<li> <a href="javascript:;">Header Style Dark<i class="fa fa-chevron-down"></i></a>
											<ul class="sub-menu">
												<li><a href="header-style-1-dark.html">Header 1</a></li>
												<li><a href="header-style-2-dark.html">Header 2</a></li>
												<li><a href="header-style-3-dark.html">Header 3</a></li>
												<li><a href="header-style-4-dark.html">Header 4</a></li>
												<li><a href="header-style-5-dark.html">Header 5</a></li>
												<li><a href="header-style-6-dark.html">Header 6</a></li>
											</ul>
										</li>
										<li> <a href="javascript:;">Footer<i class="fa fa-chevron-down"></i></a>
											<ul class="sub-menu">
												<li><a href="footer-1.html">Footer 1 </a></li>
												<li><a href="footer-2.html">Footer 2</a></li>
												<li><a href="footer-3.html">Footer 3</a></li>
												<li><a href="footer-4.html">Footer 4</a></li>
												<li><a href="footer-5.html">Footer 5</a></li>
												<li><a href="footer-6.html">Footer 6</a></li>
												<li><a href="footer-7.html">Footer 7</a></li>
												<li><a href="footer-8.html">Footer 8</a></li>
												<li><a href="footer-9.html">Footer 9</a></li>
												<li><a href="footer-10.html">Footer 10</a></li>
											</ul>
										</li>
									</ul> -->
								</li>
								<li> <a href="/#jadwal">Jadwal Pertandingan<i class="fa fa-chevron-down"></i></a>
								</li>
								<li> 
                                    @if(Auth::check())
										<a href="/myevent">My Event</a>
									@endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- main header END -->
	</header>
	<!-- header END -->