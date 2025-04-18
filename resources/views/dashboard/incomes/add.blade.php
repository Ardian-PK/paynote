@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow-sm p-3">
        <div class="card-header">
          <h5 class="card-title fw-bold">
            Tambah Data Pemasukan
          </h5>
        </div>
        <div class="card-body">
          <!-- Form -->
          <form action="{{ route('incomes.insert') }}" method="POST">
            @csrf

            <!-- Kategori -->
            <div class="form-group">
              <label for="name_income">Nama Pemasukan</label>
              <input type="text" class="form-control @error('name_income') is-invalid @enderror" id="name_income" name="name_income">
              @error('name_income')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              {{-- <label for="id_cicilan">Kategori</label>
              <select class="form-control @error('id_cicilan') is-invalid @enderror" id="id_cicilan" name="id_cicilan">
                <option value="">Pilih Kategori</option>
                @foreach($cicilan as $cicilan)
                <option value="{{ $cicilan->id_cicilan }}">{{ $cicilan->name_cicilan }}</option>
                @endforeach
              </select>
              @error('id_cicilan')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror --}}
            </div>

            <!-- Date -->
            <div class="form-group">
              <label for="date">Tanggal</label>
              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
              @error('date')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Amount -->
            <div class="form-group">
              <label for="amount">Jumlah</label>
              <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}">
              @error('amount')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Descriptions -->
            <div class="form-group">
              <label for="description">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
              @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Action Buttons -->
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="{{ route('incomes') }}" class="btn btn-sm btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection