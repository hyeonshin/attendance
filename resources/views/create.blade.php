@extends('layouts/panel')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
              <li class="breadcrumb-item active">Input Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/input/" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNamaUser">Nama</label>
                    <input type="text" name="name" class="form-control" id="InputNamaUser" placeholder="Enter Nama User">
                    <label for="InputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Email">
                    <label for="InputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Password">
                    <label for="InputTelp">Phone</label>
                    <div class="input-group-prepend">
                        <input type="text" name="phone" class="form-control" id="InputTelp" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                      <label for="Position">Position</label>
                      <select class="form-control" id="Position" name="position">
                        <option> Select One </option>
                        <option value="1">Admin</option>
                        <option value="0">Karyawan</option>
                      </select>
                    </div>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
