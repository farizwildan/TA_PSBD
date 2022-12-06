@extends('layout.template')

@section('content')

<h4 class="mt-5">Data Kost</h4>

<a href="{{ route('kost.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Id Kost</th>
        <th>Nama Kost</th>
        <th>Nama Pemilik</th>
        <th>Alamat</th>
        <th>Tipe Kost</th>
        <th>Id Mahasiswa</th>
        <th>Nama Mahasiswa</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_kost }}</td>
                <td>{{ $data->nama_kost }}</td>
                <td>{{ $data->nama_pemilik }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->tipe_kost }}</td>
                <td>{{ $data->id_mahasiswa }}</td>
                <td>{{ $data->nama_mahasiswa }}</td>
                <td>
                    
                    <a href="{{ route('kost.edit', $data->id_kost) }}" type="button" class="btn btn-icon btn-icon rounded-circle btn-primary waves-effect waves-float waves-light"><i class="nc-icon nc-simple-add"></i> </a>
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-float waves-light" data-toggle="modal" data-target="#hapusModal{{ $data->id_kost }}" >
                        <i class="nc-icon nc-simple-delete"></i> 
                    </button>
                    
                    <form class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light" method="POST" action="{{ route('kost.soft', $data->id_kost) }}">
                        @csrf
                        <button onclick="return confirm('{{ __('Are you sure you want to destroy?') }}')" type="submit" class="btn btn-warning"><i class="nc-icon nc-simple-remove"></i> </button>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_kost }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('kost.delete', $data->id_kost) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>


<h4 class="mt-5">Deleted Data</h4>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Id Kost</th>
        <th>Nama Kost</th>
        <th>Nama Pemilik</th>
        <th>Alamat</th>
        <th>Tipe Kost</th>
        <th>Id Mahasiswa</th>
        <th>Nama Mahasiswa</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($index2 as $data)
            <tr>
                <td>{{ $data->id_kost }}</td>
                <td>{{ $data->nama_kost }}</td>
                <td>{{ $data->nama_pemilik }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->tipe_kost }}</td>
                <td>{{ $data->id_mahasiswa }}</td>
                <td>{{ $data->nama_mahasiswa }}</td>
                <td>
                    
                    <a href="{{ route('kost.edit', $data->id_kost) }}" type="button" class="btn btn-icon btn-icon rounded-circle btn-primary waves-effect waves-float waves-light"><i class="nc-icon nc-simple-add"></i> </a>
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-float waves-light" data-toggle="modal" data-target="#hapusModal{{ $data->id_kost }}" >
                        <i class="nc-icon nc-simple-delete"></i> 
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_kost }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('kost.restore', $data->id_kost) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin merestore data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin merestore data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
@stop