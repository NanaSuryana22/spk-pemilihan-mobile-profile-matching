@extends('layout.master')
@section('title', 'Login')
@section('login', 'active')
@section('content')
<div>
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <h1>Login Form</h1>
          <div>
            <input type="email" name="email" class="form-control" placeholder="Email" :value="old('email')" id="email" required autofocus/>
          </div>
          <div>
            <input type="password" id="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Password" required="" />
          </div>
          <div>
            <button type="submit" class="btn btn-sm btn-secondary">Login</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">

            <p class="change_link">Belum Punya Akun?
              <a href="{{ route('register') }}" class="to_register"> Buat Akun </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-car"></i> SPK Pemilihan Mobil</h1>
              <p>©2022 All Rights Reserved. Develop By <a href="#">Arif Irawan</a></p>
            </div>
          </div>
        </form>
      </section>
    </div>

    <div id="register" class="animate form registration_form">
      <section class="login_content">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <h1>Buat Akun</h1>
          <div>
            <input type="text" class="form-control" placeholder="Nama" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
          </div>
          <div>
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" :value="old('email')" required />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required autocomplete="new-password"/>
          </div>
          <div>
            <input type="password" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" required autocomplete="new-password" />
          </div>
          <div>
            <button type="submit" class="btn btn-sm btn-secondary">Daftar</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Sudah memiliki akun ?
              <a href="{{ route('login') }}"> Log in </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-car"></i> SPK Pemilihan Mobil</h1>
              <p>©2022 All Rights Reserved. Develop By <a href="#">Arif Irawan</a></p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
@endsection