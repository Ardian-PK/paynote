@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <a href="{{ route('cicilan.addPage') }}" class="btn btn-sm btn-primary mb-3">
          <i class="fas fa-plus"></i>
          Tambah Cicilan
        </a>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Cicilan</th>
            <th scope="col">Aksi</th>
            <th scope="col">Kode Referensi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cicilan as $dcicilan)
          <tr>
            <td>{{ $dcicilan->id_cicilan }}</td>
            <td>{{ $dcicilan->name_cicilan }}</td>
            <td>
              <a href="{{ route('cicilan.editPage', $dcicilan->id_cicilan) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
                Edit
              </a>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCicilanModal{{ $dcicilan->id_cicilan }}">
                <i class="fas fa-trash"></i>
                Delete
              </button>
            </td>
            <td>{{ $dcicilan->ref_cicilan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($cicilan as $dcicilan)
    <div class="modal fade" id="deleteCicilanModal{{ $dcicilan->id_cicilan }}" tabindex="-1" aria-labelledby="deleteCicilanModal{{ $dcicilan->id_cicilan }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteCicilanModal{{ $dcicilan->id_cicilan }}">Hapus Data cicilan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus cicilan {{ $dcicilan->name_cicilan }}?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('cicilan.delete', $dcicilan->id_cicilan) }}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach;

  </div>

</div>
@endsection