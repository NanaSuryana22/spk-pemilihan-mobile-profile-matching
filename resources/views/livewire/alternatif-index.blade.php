<div class="x_content">
  <div class="col-lg-12">
    @include('layout.notice')
  </div>
  <div class="col-md-12 form-group pull-right top_search">
    <div class="input-group">
      <input type="text" name="search" id="search" wire:model.debounce.350ms="search" class="form-control ml-2" aria-label="Search" aria-describedby="search-addon" placeholder="Cari...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
  </div>
  <div class="col-md-12">
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
            <h2 align="center">{{ $alternatif->nama }}</h2>
            <p>{{ $alternatif->desc }}</p>
          </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>