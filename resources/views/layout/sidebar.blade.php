<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>Halaman Utama</a></li>
            <li><a href="{{ route('kriteria_types.index') }}"><i class="fa fa-table"></i>Jenis Kriteria</a></li>
            <li><a href="{{ route('selisih.index') }}"><i class="fa fa-exchange"></i>Selisih</a></li>
            <li><a href="{{ route('kriteria.index') }}"><i class="fa fa-list"></i>Kriteria (Aspek)</a></li>
            <li><a href="{{ route('sub_kriteria.index') }}"><i class="fa fa-indent"></i>Sub Kriteria</a></li>
            <li><a href="{{ route('alternatif.index') }}"><i class="fa fa-car"></i>Data Mobil (Alternatif)</a></li>
            <li><a href="{{ route('penilaian.index') }}"><i class="fa fa-calculator"></i>Data Penilaian</a></li>
            <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i>Data Pengguna</a></li>
            <li><a href="{{ route('help.index') }}"><i class="fa fa-info"></i>Bantuan</a></li>
            {{-- <li><a><i class="fa fa-table"></i> Master Data <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="#">Data Kategori Mobil</a></li>
					<li><a href="#">Data Alternatif Mobil</a></li>
				</ul>
			</li> --}}
        </ul>
    </div>

</div>
