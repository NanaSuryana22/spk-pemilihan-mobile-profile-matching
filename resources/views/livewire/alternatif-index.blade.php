<div class="x_content">
  <div class="row">
    @foreach ($datas as $alternatif)
      <div class="col-md-55">
        <div class="thumbnail">
          <div class="image view view-first">
            <img style="width: 100%; display: block;" src="{{ $alternatif->image }}" alt="image" />
            <div class="mask">
              <p>{{ $alternatif->nama }}</p>
              <div class="tools tools-bottom">
                <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="post">
                  <a href="{{ route('alternatif.show', $alternatif->id) }}" title="Lihat Detail" class="btn btn-link"><i class="fa fa-link"></i></a>
                  <a href="{{ route('alternatif.edit', $alternatif->id) }}" title="Edit Data" class="btn btn-link"><i class="fa fa-pencil"></i></a>
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-link" onclick="return confirm('Yakin ingin menghapus data mobil ini ?')"><i class="fa fa-times"></i></button>
                </form>
              </div>
            </div>
          </div>
        <div class="caption">
          <p>{{ $alternatif->desc }}</p>
        </div>
        </div>
      </div>
    @endforeach
  </div>
</div>