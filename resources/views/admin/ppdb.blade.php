
@extends('admin.layouts.template')

@section('content')
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel Data Pendaftar</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    @if(session('sukses'))
                    	<div class="alert alert-success d-flex align-items-center" role="alert">
						  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <div>
						    {{session('sukses')}}
						  </div>
						</div>
						@endif
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Jurusan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pendaftaran</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Asal Sekolah</th>
                                            <th>Jurusan</th>
                                            <th>Status Seleksi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pendaftaran</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Asal Sekolah</th>
                                            <th>Jurusan</th>
                                            <th>Status Seleksi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    @php $no=1; @endphp
						            @foreach ($dft as $val )
                                    <tbody>
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$val->no_pendaftar}}</td>
                                            <td>{{$val->nama}}</td>
                                            <td>{{$val->jenis_kelamin}}</td>
                                            <td>{{$val->sekolah}}</td>
                                            <td>{{$val->nama_jurusan}}</td>
                                            <td>{{$val->status_seleksi}}</td>
                                            <td>
                                            <?php  echo "<a href='#' data-toggle='modal' data-target='#editModal' style='color: grey;' onClick=\"SetInput('".$val->id."','".$val->nama."','".$val->nama_jurusan."','".$val->status_seleksi."')\"><i class='fas fa-pencil-alt'></i></a> |
                                            <a href='#'' data-toggle='modal' data-target='#deleteModal' style='color: red;' onclick='myFunction()' id='demo'><i class='fas fa-trash'></i></a>
                                            "?>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk hapus jurusan</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    @foreach ($dft as $val)
                    <form action="{{route('admin.destroy', $val->id)}}" method="post">
                        @endforeach
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Delete
                        </button>
                      </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @foreach ($dft as $val)
            <form class="modal-body" action="{{route('admin.pendaftar-update', $val->id)}}" method="POST">
                @endforeach
                @csrf
                @method('PATCH')
                <input type="text" hidden class="form-control" id="id" name="id_pendaftar" >
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" disabled id="nama" name="nama" placeholder="name jurusan"
                    >
                </div>
                <div class="mb-3">
                    {{-- <label for="exampleFormControlInput1" class="form-label">Jurusan</label> --}}
                    <input type="text" class="form-control" hidden id="nama_jurusan" name="nama_jurusan" placeholder="name jurusan">
                    <input type="text" class="form-control" hidden id="status_seleksi1" name="status_seleksi1" placeholder="name jurusan">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status Seleksi</label>
                    <select name="status_seleksi" id="status_seleksi" class="form-control">
                        <option value="Diterima">Diterima</option>
                        <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                        <option value="Ditolak">Ditolak</option>
                      </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function SetInput(id, nama,nama_jurusan,status_seleksi) {
        document.getElementById('id').value = id;
        document.getElementById('nama').value = nama;
        document.getElementById('nama_jurusan').value = nama_jurusan;
        document.getElementById('status_seleksi1').value = status_seleksi;
        document.getElementById('status_seleksi').value = status_seleksi;
    }
</script>

            <!-- End of Main Content -->
@endsection
