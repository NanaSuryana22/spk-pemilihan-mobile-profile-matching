<div class="col-md-6">
	<div class="x_panel">
		<div class="x_title">
			<h2>Keterangan</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="title_right">
				<div class="card">
					<div class="card-content">
							<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<center>
												<h3>Ini merupakan halaman penilaian</h3>
												<hr>
												<p>Halaman ini digunakan untuk menghitung / mengakumulasi data pemilihan mobil menggunakan metode profile matching</p>
												<div class="clearfix"></div>
											</center>
											<hr>
											<center>
												<h2><span class="count_top"><i class="fa fa-car"></i> Total Data Mobil</span>
												<div class="count"><i class="green">{{ $mobil->count(); }}</i> </div>
												<span class="count_bottom">Dari Data Mobil (Alternatif) Yang Telah Diinput.</span></h2>
											</center>
											<hr>
											<center>
												<h2><span class="count_top"><i class="fa fa-car"></i> Total Data Kriteria</span>
												<div class="count"><i class="green">{{ $kriteria->count(); }}</i> </div>
												<span class="count_bottom">Dari Data Kriteria Yang Telah Diinput.</span></h2>
											</center>
											<hr>
										</div>
									</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>