<div class="x_content">
    <div class="title_right">
        <div class="col-lg-12">
            @include('layout.notice')
        </div>
        <div class="col-md-5 col-sm-5 col-lg-5">
            {{-- <button type="button" class="btn btn-secondary btn-sm mt-2">Tambah Data Jenis Kriteria</button> --}}
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12 form-group pull-right top_search">
            <form action="{{ route('kriteria_types.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" id="search" wire:model.debounce.350ms="search"
                        class="form-control ml-2" aria-label="Search" aria-describedby="search-addon"
                        placeholder="Cari...">
                    <span class="input-group-btn">
                        {{-- <button class="btn btn-default" type="button">Go!</button> --}}
                        <input type="submit" class="btn btn-default" type="button" value="Go !">
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <section id="no-more-tables">
                <section id="no-more-tables">
                    <table class="table table-bordered table-striped table-condensed cf" width="500px">
                        <thead class="cf">
                            <tr>
                                <th width="20px">Nomor</th>
                                <th width="215px">Nama</th>
                                <th width="215px">Nilai</th>
                                <th width="50px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $no => $data)
                                <tr>
                                    <td class="th-font" data-title="Nomor">
                                        {{ ++$no + ($datas->currentPage() - 1) * $datas->perPage() }}</td>
                                    <td class="th-font" data-title="Nama">{{ $data->nama }}</td>
                                    <td class="th-font" data-title="Nilai">
                                        {{ $data->nilai }}</td>
                                    <td class="th-font" data-title="Aksi">
                                        <form action="{{ route('kriteria_types.destroy', $data->id) }}" method="post">
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('kriteria_types.edit', $data->id) }}"
                                                title="Ubah Data">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datas->links('vendor/livewire/bootstrap') }}
                </section>
            </section>
        </div>
    </div>
</div>
