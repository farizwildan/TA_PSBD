@extends('kost.layout')

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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Kost</h5>

		<form method="post" action="{{ route('kost.update', $data->id_kost) }}">
			@csrf
            <div class="mb-3">
                <label for="id_kost" class="form-label">ID Kost</label>
                <input type="text" class="form-control" id="id_kost" name="id_kost" value="{{ $data->id_kost }}">
            </div>
			<div class="mb-3">
                <label for="nama_kost" class="form-label">Nama Kost</label>
                <input type="text" class="form-control" id="nama_kost" name="nama_kost" value="{{ $data->nama_kost }}">
            </div>
            <div class="mb-3">
                <label for="tipe_kost" class="form-label">Tipe Kost</label>
                <input type="text" class="form-control" id="tipe_kost" name="tipe_kost" value="{{ $data->tipe_kost }}">
            </div>
            <div class="mb-3">
                <label for="no_kamar" class="form-label">No Kamar</label>
                <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="{{ $data->no_kamar }}">
            </div>
            <div class="mb-3">
                <label for="id_pemilik" class="form-label">ID_Pemilik</label>
                <input type="text" class="form-control" id="id_pemilik" name="id_pemilik" value="{{ $data->id_pemilik }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop