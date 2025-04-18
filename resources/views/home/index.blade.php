@extends('layouts.home')
@section('content')
<div class="container mt-5">
  
  {{-- Jumbotron --}}
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">
        Laporan Keuangan
      </h1>
      <p class="lead">
        Silahkan Login atau Register untuk melanjutkan ke halaman laporan keuanganmu
      </p>
    </div>

    {{-- Button --}}
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-block">Login</a>
        </div>
        <div class="col-md-6">
          <a href="{{ route('register') }}" class="btn btn-secondary btn-lg btn-block">Register</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection