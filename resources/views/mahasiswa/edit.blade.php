@extends('mahasiswa.layout')

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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Mahasiswa</h5>

		<form method="post" action="{{ route('mahasiswa.update', $data->id_mahasiswa) }}">
			@csrf
            <div class="mb-3">
                <label for="id_mahasiswa" class="form-label">ID Mahasiswa</label>
                <input type="text" class="form-control" id="id_mahasiswa" name="id_mahasiswa" value="{{ $data->id_mahasiswa }}" readonly>
            </div>
			<div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $data->nama_mahasiswa }}">
            </div>
            <div class="mb-3">
                <label for="id_kost" class="form-label">Id Kost</label>
                <input type="text" class="form-control" id="id_kost" name="id_kost" value="{{ $data->id_kost }}">
            </div>
            <div class="mb-3">
                <label for="no_kamar" class="form-label">No Kamar</label>
                <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="{{ $data->no_kamar }}">
            </div>
            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran" value="{{ $data->metode_pembayaran }}">
            </div>
            <div class="mb-3">
                <label for="ktm" class="form-label">KTM</label>
                <input type="text" class="form-control" id="ktm" name="ktm" value="{{ $data->ktm}}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop