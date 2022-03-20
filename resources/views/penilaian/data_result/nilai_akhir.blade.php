<div class="col-md-12">
    <section id="no-more-tables">
        <h6>Data Kalkulasi Nilai Akhir</h6>
        <hr />
        <table class="table table-bordered table-striped table-condensed cf" width="500px">
            <thead class="cf">
                <tr>
                    <th class="th-font">Nama Alternatif</th>
                    @foreach ($kriteria as $k)
                        <th class="th-font">{{ $k->nama }}</th>
                    @endforeach
                    <th class="th-font">NCF</th>
                    <th class="th-font">NSF</th>
                    <th class="th-font">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php $data_akhir = []; ?>
                @foreach ($mobil as $m)
                    <?php
                    $data_sort = [];
                    $data_sort['id'] = $m->id;
                    $data_sort['nama'] = $m->nama;
                    ?>
                    <tr>
                        <td class="th-font" data-title="Nama Alternatif">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('alternatif.show', $m->id) }}" class="btn btn-link btn-sm"
                                        target="_blank">
                                        {{ $m->nama }}
                                    </a>
                                @else
                                    <a href="{{ route('detail_data_mobil', $m->id) }}" class="btn btn-link btn-sm"
                                        target="_blank">
                                        {{ $m->nama }}
                                    </a>
                                @endauth
                            @endif
                        </td>
                        @foreach ($m->opt_alternatifs->sortBy('kriteria_id') as $k)
                            <?php
                            $id = $k->kriteria_id;
                            $nilai_filter = get_nilai_sub_kriteria($request->$id);
                            $nilai_profile = $k->sub_kriteria->nilai;
                            $data_gap = get_nilai_gap($nilai_filter, $nilai_profile);
                            $nilai_gap = get_nilai_selisih($data_gap);
                            ?>
                            <td class="th-font" data-title="{{ $k->kriteria->nama }}"><?= $nilai_gap ?></td>
                        @endforeach
                        <?php
                        $data = [];
                        $jml_cf = 0;
                        $total_cf = 0;
                        $data_sf = [];
                        $jml_sf = 0;
                        $total_sf = 0;
                        ?>
                        @foreach ($m->opt_alternatifs->sortBy('kriteria_id') as $k)
                            <?php
                            $id = $k->kriteria_id;
                            $nilai_filter = get_nilai_sub_kriteria($request->$id);
                            $nilai_profile = $k->sub_kriteria->nilai;
                            $data_gap = get_nilai_gap($nilai_filter, $nilai_profile);
                            $nilai_gap = get_nilai_selisih($data_gap);
                            if ($k->kriteria->jenis_kriteria->nama == 'Core Factor (CF)') {
                                $jml_cf++;
                                $data_baru = array_push($data, $nilai_gap);
                            }
                            if ($k->kriteria->jenis_kriteria->nama == 'Secondary Factor (SF)') {
                                $jml_sf++;
                                $data_baru_sf = array_push($data_sf, $nilai_gap);
                            }
                            ?>
                        @endforeach
                        <?php
                    $total_cf = array_sum($data);
                    $nilai_cf = $total_cf/$jml_cf;
                    $total_sf = array_sum($data_sf);
                    $nilai_sf = $total_sf/$jml_sf;

                    {{-- menghitung nilai akhir --}}
                    $na =  get_nilai_akhir($nilai_cf,$nilai_sf);
                  ?>
                        <td class="th-font" data-title="NCF">{!! number_format($nilai_cf, 2, ',', ' ') !!}</td>
                        <td class="th-font" data-title="NSF">{!! number_format($total_sf / $jml_sf, 2, ',', ' ') !!}</td>
                        <?php
                        $data_sort['nilai_akhir'] = $na;
                        $data_baru = array_push($data_akhir, $data_sort);
                        ?>
                        <td class="th-font" data-title="Nilai">{!! number_format($na, 2, ',', ' ') !!}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="th-font" data-title="-">
                        <center>
                            <b>Jenis Kriteria</b>
                        </center>
                    </td>
                    @foreach ($kriteria as $k)
                        <td class="th-font" data-title="Jenis Kriteria">{{ $k->jenis_kriteria->nama }} </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <h6>Result Akhir Rekomendasi Mobil</h6>
        <hr />
        <table class="table table-bordered table-striped table-condensed cf" width="500px">
            <thead class="cf">
                <tr>
                    <th class="th-font">Rekomendasi Ke</th>
                    <th class="th-font">Nama Merk Mobil</th>
                    <th class="th-font">Nilai Akhir</th>
                </tr>
            </thead>
            <?php
            foreach ($data_akhir as $key => $row) {
                $nama[$key] = $row['nama'];
                $nilai_akhir[$key] = $row['nilai_akhir'];
            }
            ?>
            <?php
            $nama = array_column($data_akhir, 'nama');
            $nilai_akhir = array_column($data_akhir, 'nilai_akhir');
            
            array_multisort($nilai_akhir, SORT_DESC, $nama, SORT_DESC, $data_akhir);
            ?>
            <tbody>
                @foreach ($data_akhir as $no => $data)
                    <tr>
                        <td class="th-font">
                            {{ ++$no }}
                        </td>
                        <td class="th-font">

                            <a href="{{ route('alternatif.show', $data['id']) }}" class="btn btn-link btn-sm"
                                target="_blank">
                                {{ $data['nama'] }}
                            </a>
                        </td>
                        <td class="th-font">
                            {{ $data['nilai_akhir'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
