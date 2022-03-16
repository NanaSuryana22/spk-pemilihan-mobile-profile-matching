<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Table Penilaian</h2>
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
                                {{-- Nilai Profile Standar --}}
                                @include(
                                    'penilaian.data_result.profile_standar'
                                )
                                {{-- Nilai Profile Alternatif --}}
                                @include(
                                    'penilaian.data_result.profile_alternatif'
                                )
                                {{-- DATA GAP --}}
                                {{-- @include('penilaian.data_result.gap') --}}
                                {{-- DATA NILAI GAP --}}
                                {{-- @include('penilaian.data_result.nilai_akhir') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
