<?php
$auth = Auth::user()->id;
?>
@extends('layout.master')
@section('title', 'Detail Pengguna')
@section('users', 'active')
@section('content')
    <div class="dasboard_graph">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Data Pengguna</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link ml-5"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="title_right">
                            <div class="col-lg-12">
                                @include('layout.notice')
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <br />
                                                <dl class="row">
                                                    <dt class="col-sm-2">Nama Pengguna</dt>
                                                    <dd class="col-sm-10">{{ $user->name }}</dd>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <dt class="col-sm-2">Email</dt>
                                                    <dd class="col-sm-10">{{ $user->email }}</dd>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                </dl>
                                            </div>
                                        </div>
                                        <br />
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @if ($auth == $user->id)
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="pull-left btn btn-warning btn-md btn-jarak-kebawah">
                                                    <i class="fa fa-pencil" title="Ubah Data"></i>
                                                </a>
                                            @endif
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            {{-- @if ($user->id !== $auth)
														<button type="submit" class="pull-left btn btn-danger btn-md btn-jarak-button-detail"
															onclick="return confirm('Yakin ingin menghapus data pengguna ini ?')">
															<i class="fa fa-trash" title="Hapus Data"></i>
														</button>
													@endif --}}
                                            <a href="{{ route('users.index') }}"
                                                class="pull-right btn btn-primary btn-md">
                                                <i class="fa fa-mail-reply" title="Kembali"></i>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
