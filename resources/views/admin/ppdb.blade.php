
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
                                            <td>{{$val->id_jurusan}}</td>
                                            <td>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>{{$val->status_seleksi}}</option>
                                                    <option value="Pengecekkan">Pengecekkan</option>
                                                    <option value="Diterima">Diterima</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                  </select>
                                            </td>
                                            <td><a href="#" style="color: grey;"><i class="fas fa-pencil-alt"></i></a> | <a href="#" style="color: red;" onclick="myFunction()" id="demo"><i class="fas fa-trash"></i></a></td>
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
            <!-- End of Main Content -->
@endsection
