@extends('layouts/panel')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if (session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Absensi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p> Date : <strong>{{ $absen->presence_date}} </strong></p>
                <p> Nama : <strong> {{ $absen->user->name }} </strong> </p>
                <p> Email : <strong>{{ $absen->user->email }} </strong></p>
                <p> Phone : <strong>{{ $absen->user->phone}} </strong></p>
                <p> Status : <strong>{{ $absen->status}} </strong></p>
                <p> Keterangan : <strong>{{ $absen->keterangan}} </strong></p>
                @if($absen->status == "Izin")
                <p> Jam Izin : <strong>{{ $absen->presence_enter_time}} </strong></p>
                <p> Lokasi Izin : <strong>{{ $absen->presence_enter_loc}} </strong></p>
                @else
                <p> Jam Hadir : <strong>{{ $absen->presence_enter_time}} </strong></p>
                <p> Lokasi Hadir : <strong>{{ $absen->presence_enter_loc}} </strong></p>
                <p> Jam Pulang : <strong>{{ $absen->presence_out_time}} </strong></p>
                <p> Lokasi Pulang : <strong>{{ $absen->presence_out_loc}} </strong></p>
                @endif
                <a href="/admin/attendance/" type="button" class="btn btn-primary">Kembali</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
@endsection
