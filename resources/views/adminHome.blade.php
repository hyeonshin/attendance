@extends('layouts/panel')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                
                  <a href="/admin/user/input" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> Input Data</a>
               
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($userList as $data)
                  @if($data->is_active == 'Yes')
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="col-sm-3">{{ $data->name }}</td>
                    <td class="col-sm-2">{{ $data->email }}</td>
                    <td class="col-sm-2">{{ $data->phone }}</td>

                    
                    <td>
                        <a href="/admin/user/detail/{{ $data->id }}" type="button" class="btn btn-primary">Detail Data</a>
                        <a href="/admin/user/edit/{{ $data->id }}" type="button" class="btn btn-success">Edit Data</a>
                        <a href="/admin/user/delete/{{ $data->id }}" type="button" class="btn btn-danger">Hapus Data</a>
                    </td>
                    
                  </tr>
                  @endif
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    
                    <th>Action</th>
                    
                  </tr>
                  </tfoot>
                </table>
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
