@extends('layout.master')
@section('title', "Edit Data Pengguna")
@section('users', 'active')
@section('content')
<div class="dasboard_graph">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Data Pengguna</h2>
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
															<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('users.update', $user->id) }} ">
																{{ csrf_field() }} {{method_field('PUT')}}
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nama Pengguna <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="text" required="required" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
																		@if($errors->has('name'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('name') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="email" id="email" required class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
																		@if($errors->has('email'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('email') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password Baru <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="password" id="password" required class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
																		@if($errors->has('password'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('password') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="item form-group">
																	<label class="col-form-label col-md-3 col-sm-3 label-align" for="password_confirmation">Ketik Ulang Password <span class="required">*</span>
																	</label>
																	<div class="col-md-6 col-sm-6 ">
																		<input type="password" id="password_confirmation" required class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
																		@if($errors->has('password_confirmation'))
																			<span class="invalid-feedback" role="alert">
                                      	<strong>{{$errors->first('password_confirmation') }}</strong>
                                      </span>
                                    @endif
																	</div>
																</div>
																<div class="ln_solid"></div>
																<div class="item form-group">
																	<div class="col-md-6 col-sm-6 offset-md-3">
																		<a class="btn btn-primary" type="button" href="{{ route('users.index') }}">Cancel</a>
																		<button class="btn btn-primary" type="reset">Reset</button>
																		<button type="submit" class="btn btn-success">Save Changes</button>
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