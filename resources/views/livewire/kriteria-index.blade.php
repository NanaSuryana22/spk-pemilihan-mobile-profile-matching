<div class="x_content">
    <div class="title_right">
        <div class="col-lg-12">
            @include('layout.notice')
        </div>
        <div class="col-md-5 form-group pull-right top_search">
            <div class="input-group">
                <select class="form-control" id="filter-by" wire:model="filter">
                    <option value="">All Category</option>
                    @foreach ($filters as $filter)
                        <option value="{{ $filter->id }}">{{ $filter->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-7 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" name="search" id="search" wire:model.debounce.350ms="search" class="form-control ml-2"
                    aria-label="Search" aria-describedby="search-addon" placeholder="Cari...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
        <div class="col-md-12">
            <section id="no-more-tables">
                <section id="no-more-tables">
                    <table class="table table-bordered table-striped table-condensed cf" width="500px">
                        <thead class="cf">
                            <tr>
                                <th class="th-font">Nomor</th>
                                <th class="th-font">Nama Kriteria</th>
                                <th class="th-font">Jenis Kriteria</th>
                                <th class="th-font">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $no => $data)
                                <tr>
                                    <td class="th-font" data-title="Nomor">
                                        {{ ++$no + ($datas->currentPage() - 1) * $datas->perPage() }}</td>
                                    <td class="th-font" data-title="Nama Kriteria">{{ $data->nama }}</td>
                                    <td class="th-font" data-title="Jenis Kriteria">
                                        {{ $data->jenis_kriteria->nama }}</td>
                                    <td class="th-font" data-title="Aksi">
                                        <form action="{{ route('kriteria.destroy', $data->id) }}" method="post">
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('kriteria.show', $data->id) }}" title="Lihat Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('kriteria.edit', $data->id) }}" title="Ubah Data">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('Yakin ingin menghapus data kriteria ini ?')">
                                                <i class="fa fa-trash" title="Hapus Data"></i>
                                            </button>
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
