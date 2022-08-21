@extends('layout.master')
@section('title', 'Halaman Bantuan')
@section('help', 'active')
@section('content')
    <div class="dasboard_graph">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Bantuan - Untuk Pengguna Yang Belum Daftar</h2>
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
                                                <br />
                                                <dl class="row">
                                                    <dt class="col-sm-12">
                                                        <h4>1. Masuk ke menu daftar, atau anda bisa <a
                                                                href="{{ route('register') }}" class="btn-link">Klik
                                                                Disini</a>. </h4>
                                                    </dt>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <dt class="col-sm-12">
                                                        <h4>2. Isi form dengan data diri di <a
                                                                href="{{ route('register') }}" class="btn-link">Halaman
                                                                Daftar</a>.
                                                        </h4>
                                                    </dt>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <dt class="col-sm-12">
                                                        <h4>3. Klik tombol daftar yang ada di <a
                                                                href="{{ route('register') }}" class="btn-link">Halaman
                                                                Daftar</a>, kemudian anda akan diarahkan ke halaman utama.
                                                        </h4>
                                                    </dt>
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
    <div class="dasboard_graph">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Halaman Bantuan - Untuk Pengguna Terdaftar</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: none;">
                        <div class="title_right">
                            <div class="col-lg-12">
                                @include('layout.notice')
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <dl class="row">
                                                <dt class="col-sm-12">
                                                    <h4>1. Masuk ke menu login, atau anda bisa <a
                                                            href="{{ route('login') }}" class="btn-link">Klik
                                                            Disini</a>.
                                                    </h4>
                                                </dt>
                                                <div class="col-md-12">
                                                    <hr />
                                                </div>
                                                <dt class="col-sm-12">
                                                    <h4>2. Isi form berupa email & password yang sudah didaftarkan pada <a
                                                            href="{{ route('login') }}" class="btn-link">Halaman Login</a>.
                                                    </h4>
                                                </dt>
                                                <div class="col-md-12">
                                                    <hr />
                                                </div>
                                                <dt class="col-sm-12">
                                                    <h4>3. Klik tombol login, kemudian anda akan diarahkan ke halaman utama.
                                                    </h4>
                                                </dt>
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
    <div class="dasboard_graph">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Petunjuk Penggunaan Aplikasi</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: none;">
                        <div class="title_right">
                            <div class="col-lg-12">
                                @include('layout.notice')
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <br />
                                                <dl class="row">
                                                    <dt class="col-sm-12">
                                                        <h4>1. Tentukan persentase jenis kriteria, pada menu <a
                                                                href="{{ route('kriteria_types.index') }}"
                                                                class="btn-link">Jenis
                                                                Kriteria</a>. Di menu jenis kriteria ini ada 2 jenis
                                                            kriteria yang sudah disediakan, yaitu :
                                                            <ul>
                                                                <li><b>Core Factor (CF)</b>
                                                                    yaitu
                                                                    faktor utama untuk pengelompokan suatu jenis kriteria
                                                                    (kompetensi) yang paling dibutuhkan oleh suatu penilaian
                                                                    yang
                                                                    diharapkan dapat memperoleh hasil yang optimal.</li>
                                                                <li><b>Secondary Factor (SF)</b> atau faktor pendukung,
                                                                    yaitu
                                                                    item-item
                                                                    selain yang ada pada core factor.</li>
                                                            </ul>

                                                        </h4>
                                                    </dt>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <dt class="col-sm-12">
                                                        <h4>2. Tentukan selisih / GAP yang merupakan perbedaan nilai yang
                                                            didapat dari selisih nilai mobil yang dipilih dan kriteria
                                                            mobil. Nilai selisih / GAP dapat ditentukan pada menu <a
                                                                href="{{ route('selisih.index') }}"
                                                                class="btn-link">Selisih</a>.
                                                        </h4>
                                                    </dt>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <dt class="col-sm-12">
                                                        <h4>3. Tentukan data kriteria, pada menu <a
                                                                href="{{ route('kriteria.index') }}"
                                                                class="btn-link">Kriteria (Aspek)</a>. Pada menu ini user
                                                            dapat menentukan nama kriteria & jenis kriteria (core factor /
                                                            secondary factor).
                                                        </h4>
                                                    </dt>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <dt class="col-sm-12">
                                                        <h4>3. Tentukan data sub kriteria, pada menu <a
                                                                href="{{ route('sub_kriteria.index') }}"
                                                                class="btn-link">Sub
                                                                Kriteria</a>. Pada menu ini user
                                                            dapat menentukan nama sub kriteria & masuk ke dalam jenis
                                                            kriteria mana, termasuk menentukan nilai dari sub kriteria
                                                            tersebut.
                                                        </h4>
                                                    </dt>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <dt class="col-sm-12">
                                                        <h4>4. Tentukan data mobil (alternatif), pada menu <a
                                                                href="{{ route('alternatif.index') }}" class="btn-link">Data
                                                                Mobil (Alternatif)</a>. Pada menu ini
                                                            user dapat input data mobil seperti nama mobil, upload gambar
                                                            mobil, keterangan / deskripsi dari mobil itu sendiri, begitu
                                                            juga penentuan data sub kriteria yang sudah dibuat dari menu
                                                            data sub kriteria.
                                                        </h4>
                                                    </dt>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <dt class="col-sm-12">
                                                        <h4>4. Melihat mobil yang direkomendasikan dengan masuk ke menu <a
                                                                href="{{ route('penilaian.index') }}"
                                                                class="btn-link">Data Penilaian</a>. Pada menu
                                                            ini
                                                            user harus memilih sub kriteria yang cocok dengan kebutuhan
                                                            user, setelah memilih sub kriteria yang cocok tekan tombol
                                                            Proses, lalu sistem akan mengakumulasi data pemilihan mobil
                                                            menggunakan metode profile matching. Dan result akhir
                                                            rekomendasi mobil dapat dilihat pada data table bagian bawah di
                                                            halaman data penilaian.
                                                        </h4>
                                                    </dt>
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
