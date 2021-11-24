@extends('layout.master')
@section('title', "Tambah Data Mobil")
@section('alternatif', 'active')
@section('content')
<div class="dasboard_graph">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tambah Data Mobil</h2>
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
															<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('alternatif.store') }} " enctype="multipart/form-data">
																{{ csrf_field() }}
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Data Mobil / Seri Mobil <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="text" required="required" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
																		@if($errors->has('nama'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('nama') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Upload Gambar <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6">
																		<img class="img-preview img-fluid">
																		<input type="file" class="mt-1 form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ old('image') }}" onchange="previewImage()">
                                    @if($errors->has('image'))
                                    	<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('image') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="desc">Deskripsi <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<textarea name="desc" id="desc" cols="20" rows="5" class="form-control">{{ old('desc') }}</textarea>
																		@if($errors->has('desc'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('desc') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																@foreach ($kriteria as $k)
																	<div class="item form-group">
																		<label class="col-form-label col-md-3 col-sm-3 label-align" for="{{ $k->nama }}">{{ $k->nama }} <span class="required">*</span>
																		</label>
																		<div class="col-md-6 col-sm-6">
																			<input type="hidden" name="{{ $k->nama }}" value="$k->id" />
																			<select class="form-control" name="{{ $k->id }}" id="{{ $k->id }}" required>
																				<option value="">Pilih...</option>
																				@foreach ($k->sub_kriterias as $s)
																					<option value="{{ $s->id }}">{{ $s->nama }}</option>
																				@endforeach
																			</select>
																		</div>
																	</div>
																@endforeach
																<div class="ln_solid"></div>
																<div class="item form-group">
																	<div class="col-md-6 col-sm-6 offset-md-3">
																		<a class="btn btn-primary" type="button" href="{{ route('alternatif.index') }}">Cancel</a>
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
@push('script')
<script src="{{ asset('js/previewImage.js') }}" />
@endpush