@extends('pemilik.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Pemilik</h5>

		<form method="post" action="{{ route('pemilik.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_kost" class="form-label">ID Kost</label>
                <input type="text" class="form-control" id="id_kost" name="id_kost">
            </div>
			<div class="mb-3">
                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Handphone</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="mb-3">
                <label for="no_rekening" class="form-label">No Rekening</label>
                <input type="text" class="form-control" id="no_rekening" name="no_rekening">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop