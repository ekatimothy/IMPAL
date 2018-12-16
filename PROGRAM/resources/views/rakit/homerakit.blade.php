@extends('layouts.aplikasi')

@section('baratas')
PERAKITAN
@endsection

@section('judul')
Bagian Perakitan
@endsection

@section("konten")
        @if($errors->any())
          <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
          </div>
        @endif
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Data Tabel Barang</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>IdBarang</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Aksi</th>
                      <!-- <th>Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ids as $data)
                    <tr>
                        <td >{{$data->kode_barang}}</td>
                        <td >{{$data->nm_barang}}</td>
                        <td >{{$data->jumlah}}</td>
                        <td>
                            <div class="row">
                              <a href="editrakit/{{$data->kode_barang}}"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square"> Edit</i></button></a>
                              &nbsp;
                              <form action="hapus/{{$data->kode_barang}}" method="post">
                              {{csrf_field()}}
                                  <button class="btn btn-danger btn-sm"><i class="fa fa-trash">Hapus</i></button>
                                  <input type="hidden" name="_method" value="DELETE">
                              </form>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated at {{date("m-d-Y")}} </div>
          </div>
        </div>
@endsection