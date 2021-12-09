@extends('layout.master')
@section('title', "Tambah Data Selisih")
@section('jenis_kriteria', 'active')
@section('content')
<div class="dasboard_graph">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tambah Data Selisih</h2>
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
															<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('selisih.store') }} ">
																{{ csrf_field() }}
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="nilai">Nilai <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="number" required="required" class="form-control @error('nilai') is-invalid @enderror" name="nilai" value="{{ old('nilai') }}">
																		@if($errors->has('nilai'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('nilai') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="bobot">Bobot <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="number" id="bobot" required step="0.01" class="form-control @error('bobot') is-invalid @enderror" name="bobot" value="{{ old('bobot') }}">
																		@if($errors->has('bobot'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('bobot') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="keterangan">Keterangan <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control">{{ old('keterangan') }}</textarea>
																		@if($errors->has('keterangan'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('keterangan') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="ln_solid"></div>
																<div class="item form-group">
																	<div class="col-md-6 col-sm-6 offset-md-3">
																		<a class="btn btn-primary" type="button" href="{{ route('selisih.index') }}">Cancel</a>
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
