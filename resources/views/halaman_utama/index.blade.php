@extends('layout.master')
@section('title', "Halaman Utama")
@section('halaman_utama', 'active')
@section('content')
<div class="dasboard_graph">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Halaman Utama</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="title_right">
						<div class="col-lg-12">
							@include('layout.notice')
						</div>
						<div class="card">
							<div class="card-content">
									<div class="card-body">
											<div class="row">
													<div class="col-md-12">
														<br>
														<dl class="row">
															<dt class="col-sm-12"><h4 align="center"><i class="fa fa-car"></i> Aplikasi ini dibuat untuk memenuhi syarat kelulusan untuk mendapatkan gelar Strata Satu (S1) di <a href="https://www.stmik-im.ac.id/" target="_blank" class="btn-link">STMIK Indonesia Mandiri</a></h4></dt>
															<div class="col-md-12">
																<hr />
															</div>
														</dl>
													</div>
													<div class="col-md-5">
														<img src="{{ asset('img/icon-mobil.jpg') }}" class="img-thumbnail">
													</div>
													<div class="col-md-7">
															<br />
															<dl class="row">
																	<dt class="col-sm-5">Nama Mahasiswa</dt>
																	<dd class="col-sm-7">Arif Irawan</dd>
																	<div class="col-md-12">
																			<hr />
																	</div>
																	<dt class="col-sm-5">NIM (Nomor Induk Mahasiswa)</dt>
																	<dd class="col-sm-7">361742001</dd>
																	<div class="col-md-12">
																			<hr />
																	</div>
																	<dt class="col-sm-5">Program Studi</dt>
																	<dd class="col-sm-7">Teknik Informatika</dd>
																	<div class="col-md-12">
																			<hr />
																	</div>
																	<dt class="col-sm-5">Dosen Pembimbing</dt>
																	<dd class="col-sm-7">Chairuddin, IR. MT., MM., DR</dd>
																	<div class="col-md-12">
																			<hr />
																	</div>
																	<dt class="col-sm-5">Ketua Program Studi</dt>
																	<dd class="col-sm-7">Chalifa Chazar, S.T, M.T</dd>
																	<div class="col-md-12">
																			<hr />
																	</div>
																	<dt class="col-sm-5">Judul Tugas Akhir</dt>
																	<dd class="col-sm-7">Sistem Pendukung Keputusan Pemilihan Mobil Baru Menggunakan Metode Profile Matching</dd>
																	<div class="col-md-12">
																			<hr />
																	</div>
																	<hr />
															</dl>
													</div>
											</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
