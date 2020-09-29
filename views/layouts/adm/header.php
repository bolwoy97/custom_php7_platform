<!-- Page Header Start -->
			<!--================================-->
			<div class="page-header">
				<!--================================-->
				<!-- Page Header  Start -->
				<!--================================-->
				<nav class="navbar navbar-expand-lg">
					<ul class="list-inline list-unstyled mg-r-20">
						<!-- Mobile Toggle and Logo -->
						<li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu wd-20"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a></li>
						<!-- PC Toggle and Logo -->
						<li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu wd-20"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a></li>
					</ul>
					<!--================================-->
					<!-- Mega Menu Start -->
					<!--================================-->
					<div class="collapse navbar-collapse">
					
					</div>
					<!--/ Mega Menu End-->
					<!--/ Brand and Logo End -->
					<!--================================-->
					<!-- Header Right Start -->
					<!--================================-->
					
					<div class="header-right pull-right">
					
						<ul class="list-inline justify-content-end">
							<!--================================-->
							<!-- Languages Dropdown Start -->
							<!--================================-->
							
							<li class="list-inline-item ">
								<strong><span id="time" class="select-profile" >Admin: <?=$_SESSION['user']['login']?></span></strong>
							</li>
							<!--<li class="list-inline-item align-middle dropdown hidden-xs">
								<a href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="flag-icon flag-icon-us"></i>
								</a>
								<ul class="dropdown-menu languages-dropdown shadow-2">
									<li>
										<a href="" data-lang="en"><i class="flag-icon flag-icon-tr mr-2"></i><span>Turkish</span></a>
									</li>
									<li>
										<a href="" data-lang="en"><i class="flag-icon flag-icon-vn mr-2"></i><span>Vietnamese</span></a>
									</li>
									<li>
										<a href="" data-lang="ru"><i class="flag-icon flag-icon-ru mr-2"></i><span>Russian</span></a>
									</li>
									<li>
										<a href="" data-lang="ru"><i class="flag-icon flag-icon-gb mr-2"></i><span>English</span></a>
									</li>
								</ul>
							</li>-->
							<!--/ Languages Dropdown End -->
							<!--================================-->
							
							<!-- Profile Dropdown Start -->
							<!--================================-->
							<!-- <li class="list-inline-item dropdown">
								<a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="select-profile"><?=$user['login']?></span>
									<img src="<?=Data::imageUrl();?>" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
									<div class="user-profile-area">
										<a href="profile" class="dropdown-item"><i class="icon-settings" aria-hidden="true"></i> Settings</a>
										<a href="logout" class="dropdown-item"><i class="icon-power" aria-hidden="true"></i> Logout</a>
									</div>
								</div>
							</li> -->
							<!-- Profile Dropdown End -->
							<!--================================-->
						</ul>
					</div>
					<!--/ Header Right End -->
				</nav>
			</div>
			<!--/ Page Header End -->
			<!--/ Page Header End -->


			<script>
           /* document.addEventListener('DOMContentLoaded', function(){
                $.post("/time", {}, function (data) {
                    $("#time").html(data); 
                });
            });
            var timerId = setInterval(function() {
                $.post("/time", {}, function (data) {
                    $("#time").html(data); 
                });
                 
            }, 30000);*/
        </script>
<!--/ ========================================================= -->

	
