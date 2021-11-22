@extends('layout.master')
@section('title', "Edit Data Sub Kriteria")
@section('sub_kriteria', 'active')
@section('content')
<div class="dasboard_graph">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Data Sub Kriteria</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
															<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('sub_kriteria.update', $sub_kriteria->id) }} ">
																{{ csrf_field() }} {{method_field('PUT')}}
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Sub Kriteria<span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="text" required="required" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $sub_kriteria->nama }}" placeholder="Silahkan isi nama sub kriteria..">
																		@if($errors->has('nama'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('nama') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="kriteria_id">Kriteria <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<select name="kriteria_id" id="kriteria_id" class="form-control">
																			<option value="{{ $sub_kriteria->kriteria_id }}">Pilih...</option>
																			@foreach ($kriteria as $k)
																				<option value="{{ $k->id}}" {{ ( $k->id == "$sub_kriteria->kriteria_id") ? 'selected' : '' }}>{{ $k->nama }}</option>
																			@endforeach
																		</select>
																		@if($errors->has('kriteria_id'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('kriteria_id') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="nilai">Nilai<span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="number" required="required" class="form-control @error('nilai') is-invalid @enderror" name="nilai" value="{{ $sub_kriteria->nilai }}" placeholder="Silahkan isi nilai sub kriteria..">
																		@if($errors->has('nilai'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('nilai') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="ln_solid"></div>
																<div class="item form-group">
																	<div class="col-md-6 col-sm-6 offset-md-3">
																		<a class="btn btn-primary" type="button" href="{{ route('sub_kriteria.index') }}">Cancel</a>
																		<button class="btn btn-primary" type="reset">Reset</button>
																		<button type="submit" class="btn btn-success">Submit</button>
																	</div>
																</div>
															</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection