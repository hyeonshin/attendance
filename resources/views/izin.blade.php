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
                <h3 class="card-title">Form Izin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="/user/izin/{{ $user_id }}" method="POST">
                    @csrf                    
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Tuliskan alasan anda izin.</label>
                      <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-2">Submit</button>
                    </div>
                  </form>
                
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
