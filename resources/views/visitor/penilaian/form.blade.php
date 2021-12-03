<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('profilematchingvisitor') }}" method="get">
	@foreach ($kriteria as $k)
		<div class="item form-group">
			<input type="hidden" name="kriteria_id_{{ $k->id }}" value="{{ $k->id }}">
		</div>
		<div class="item form-group">
			<label for="{{ $k->id }}" class="col-form-label col-md-3 col-sm-3 label-align">{{ $k->nama }}</label>
			<select class="form-control" name="{{$k->id}}" required>
				<option value="">Pilih..</option>
				<?php $id = $k->id ?>
				@foreach ($k->sub_kriterias as $i)
					<option value="{{ $i->id }}" {{ ( $i->id == $request->$id ) ? 'selected' : '' }}>{{ $i->nama }}</option>
				@endforeach
			</select>
		</div>
	@endforeach
	<div class="ln_solid"></div>

	<div class="form-group row">
		<div class="col-md-9 offset-md-3">
			 <button type="reset" class="btn btn-primary">Reset</button>
			<button type="submit" class="btn btn-success">Proses</button>
		</div>
	</div>
</form>