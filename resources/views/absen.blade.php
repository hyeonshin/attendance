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
                <h3 class="card-title">Data Absen</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover" id="myTable">
                
                  <a href="/admin/attendance/export" class="btn btn-success" style="padding-top: 10px;"><i class="fa fa-file-export"></i> Export Data</a>
                  <div class="input-group rounded mt-2">
                    <input type="search" name="search_text" id="myInput" onkeyup="myFunction()"  class="form-control rounded" placeholder="Search Data" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                  <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>                    
                    <th >Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($absenList as $data)
                  
                  <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td class="col-sm-2" scope="row">{{ $data->presence_date }} </td>
                    <td class="col-sm-3" scope="row">{{ $data->user->name }} </td>
                    <td class="col-sm-3" scope="row">{{ $data->user->email }} </td>
                    <td class="col-sm-2" scope="row">{{ $data->user->phone }}</td>                    
                    <td class="col-sm-1" scope="row">{{ $data->status }}</td>
                    <td class="col-sm-1">                        
                        <a href="/admin/absen/detail/{{ $data->id }}" type="button" class="btn btn-primary">Detail</a>
                    </td>                    
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
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
  <script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, td1, td2, td3, td4, td5, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        td1 = tr[i].getElementsByTagName("td")[1];
        td2 = tr[i].getElementsByTagName("td")[2];
        td3 = tr[i].getElementsByTagName("td")[3];
        td4 = tr[i].getElementsByTagName("td")[4];
        td5 = tr[i].getElementsByTagName("td")[5];
        if (td && td1 && td2 && td3 && td4 && td5) {
          txtValue = td.textContent || td.innerText;
          txtValue1 = td1.textContent || td1.innerText;
          txtValue2 = td2.textContent || td2.innerText;
          txtValue3 = td3.textContent || td3.innerText;
          txtValue4 = td4.textContent || td4.innerText;
          txtValue5 = td5.textContent || td5.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
@endsection
