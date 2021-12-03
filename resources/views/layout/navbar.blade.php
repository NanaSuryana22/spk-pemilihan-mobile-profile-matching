<div class="top_nav">
	<div class="nav_menu">
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
			<nav class="nav navbar-nav">
			<ul class=" navbar-right">
				<li class="nav-item dropdown open" style="padding-left: 15px;">
					<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
						@if(Route::has('login'))
							@auth
								<?= Auth::user()->name; ?>
							@else
								Pengunjung
							@endauth
						@endif
					</a>
					<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item"  href="{{ route('profile.show') }}"> Profile</a>
						<a class="dropdown-item"  href="{{ route('logout') }}" onclick="return logout(event);" title="Keluar Aplikasi ?"><i class="fa fa-sign-out pull-right"></i>
							<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>	
							Log Out
						</a>
					</div>
				</li>

				
			</ul>
		</nav>
	</div>
</div>