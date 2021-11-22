<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('storesubkriteria') }} ">
				{{ csrf_field() }}
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Tambah Data Sub Kategori</h4>
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Sub Kriteria<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" required="required" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Silahkan isi nama sub kriteria..">
							@if($errors->has('nama'))
								<span class="invalid-feedback" role="alert">
									<strong>{{$errors->first('nama') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<input type="hidden" name="kriteria_id" id="kriteria_id" value="{{ $kriteria->id }}">
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="nilai">Nilai<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="number" required="required" class="form-control @error('nilai') is-invalid @enderror" name="nilai" value="{{ old('nilai') }}" placeholder="Silahkan isi nilai sub kriteria..">
							@if($errors->has('nilai'))
								<span class="invalid-feedback" role="alert">
									<strong>{{$errors->first('nilai') }}</strong>
								</span>
							@endif
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan Data</button>
				</div>
			</form>

		</div>
	</div>
</div>