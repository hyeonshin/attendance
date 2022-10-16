@extends('layouts/panel')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                        <li class="breadcrumb-item active">Edit Form</li>
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
                            <h3 class="card-title">Edit Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/edit/{{ $user->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="InputNamaUser">Nama</label>
                                    <input type="text" name="name" class="form-control" id="InputNamaUser" placeholder="Enter Nama User" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail">Email</label>
                                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="InputTelp">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="InputTelp" placeholder="Enter Phone Number" value="{{ $user->phone }}">
                                </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Edit</button>
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
