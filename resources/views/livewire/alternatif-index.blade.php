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
    <div class="card-group">
      @foreach ($datas as $alternatif)
        <div class="col-md-3">
          <a href="{{ route('alternatif.show', $alternatif->id) }}">
            <div class="card">
              <img src="{{ $alternatif->image }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h6 class="card-title">{{ substr($alternatif->nama, 0, 24) }}</h6>
                <p class="card-text">{{ substr($alternatif->desc, 0, 30) }}</p>
                <p class="card-text"><small class="text-muted">Last updated {{ $alternatif->updated_at }}</small></p>
                <p>
                <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="post">
                  <a href="{{ route('alternatif.show', $alternatif->id) }}" title="Lihat Detail" class="btn btn-primary btn-sm"><i class="fa fa-link"></i></a>
                  <a href="{{ route('alternatif.edit', $alternatif->id) }}" title="Edit Data" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i></a>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data mobil ini ?')"><i class="fa fa-times"></i></button>
                </form>
                </p>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
    {{ $datas->links('vendor/livewire/bootstrap') }}
  </div>
</div>
