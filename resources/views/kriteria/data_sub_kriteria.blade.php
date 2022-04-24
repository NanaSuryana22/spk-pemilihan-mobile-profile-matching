<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel">
    <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <h4 class="panel-title">Data Sub Kriteria</h4>
    </a>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <a class="btn btn-sm btn-link btn-primary ml-3 mb-3" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Data Sub Kategori</a>
        @include('kriteria.tambah_data_sub_kategori')
        <section id="no-more-tables">
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf" width="500px">
              <thead class="cf">
                <tr>
                  <th class="th-font">Nomor</th>
                  <th class="th-font">Nama Sub Kriteria</th>
                  <th class="th-font">Kriteria</th>
                  <th class="th-font">Nilai</th>
                  <th class="th-font">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($datas as $no => $data)
                  <tr>
                    <td class="th-font" data-title="Nomor">{{ ++$no + ($datas->currentPage()-1) * $datas->perPage() }}</td>
                    <td class="th-font" data-title="Nama Sub Kriteria">{{ $data->nama }}</td>
                    <td class="th-font" data-title="Kriteria">
                      {{ $data->kriteria->nama }}</td>
                      <td class="th-font" data-title="Nilai">{{ $data->nilai }}</td>
                    <td class="th-font" data-title="Aksi">
                      <form action="{{ route('destroysubkriteria', $data->id) }}" method="post">
                        <a class="btn btn-sm btn-primary" href="{{ route('sub_kriteria.show',$data->id) }}" title="Lihat Detail">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-warning" title="Ubah Data" href="{{ route('editsubkriteria', $data->id) }}">
                          <i class="fa fa-pencil"></i>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                          <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('Yakin ingin menghapus data sub kriteria ini ?')">
                            <i class="fa fa-trash" title="Hapus Data"></i>
                          </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $datas->links() }}
          </section>
        </section>
      </div>
    </div>
  </div>
</div>
