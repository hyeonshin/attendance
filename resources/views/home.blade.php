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
                <p> Today : <strong> {{ now()->toFormattedDateString() }} </strong> </p>
                <p> Current Loc : <strong>{{ $position->cityName }} </strong></p>
                @if($attendance == null)
                <p> Status : <span class="badge bg-danger">Tidak Hadir</span> </p>
                <a href="/user/hadir" class="btn btn-primary col-12" style="padding-top: 10px;"><i class="fa fa-check"></i> Hadir</a>
                <a href="/user/izin" class="btn btn-outline-danger col-12 mt-2" style="padding-top: 10px;"><i class="fa fa-times"></i> Izin</a>
                @elseif($attendance->presence_date == now()->toDateString() && $attendance->status == "Hadir" && $attendance->keterangan == NULL)
                <p> Status : <span class="badge bg-primary">Hadir</span> </p>
                <a href="/user/pulang" class="btn btn-warning col-12" style="padding-top: 10px;"><i class="fa fa-check-circle"></i> Pulang</a>
                @elseif($attendance->presence_date == now()->toDateString() && $attendance->status == "Izin")
                <p> Status : <span class="badge bg-warning">Izin</span> </p>
                <div class="alert alert-primary" role="alert">
                  Anda sudah mengajukan izin.
                </div>
                @else
                <p> Status : <span class="badge bg-primary ">Hadir</span> <span class="badge bg-success">Sudah Pulang</span></p>
                <div class="alert alert-success" role="alert">
                  <p>Terima kasih atas kontribusi anda hari ini. Selamat beristirahat :) </p>
                </div>
                @endif
                
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
