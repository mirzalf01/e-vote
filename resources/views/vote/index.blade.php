@extends('layouts.adminlte')

@section('title', 'Available Vote List')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Vote List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Vote List</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('vote-list.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus" aria-hidden="true"></i> New Vote</a>
            <div class="row">
                {{-- Avaialable Vote --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h5 class="card-title">Available Vote</h5>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table">
                                <thead>
                                <tr>
                                    <th style="width: 25%">Title</th>
                                    <th style="width: 25%">Description</th>
                                    <th style="width: 15%">Status</th>
                                    <th style="width: 20%">Closing Time</th>
                                    <th style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach ($availableVotes as $availableVote)
                                  <tr>
                                      <td>{{ $availableVote->name }}</td>
                                      <td>{{ $availableVote->description }}</td>
                                      <td>{{ $availableVote->status }}</td>
                                      <td>{{ $availableVote->closing_time }}</td>
                                      <td><a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-secondary btn-sm" href="{{ route('vote-list.detail', $availableVote) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- /.Avaialable Vote --}}

                {{-- Unavaialable Vote --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h5 class="card-title">Unavailable Vote</h5>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table">
                                <thead>
                                <tr>
                                  <th style="width: 25%">Title</th>
                                  <th style="width: 25%">Description</th>
                                  <th style="width: 15%">Status</th>
                                  <th style="width: 20%">Closing Time</th>
                                  <th style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach ($unavailableVotes as $unavailableVote)
                                  <tr>
                                      <td>{{ $unavailableVote->name }}</td>
                                      <td>{{ $unavailableVote->status }}</td>
                                      <td>{{ $unavailableVote->description }}</td>
                                      <td>{{ $unavailableVote->closing_time }}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- /.Unvaialable Vote --}}
            </div>
        </div>
    </section>
    <!-- /.Main content -->
    
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script>
        $(function () {
          $(".table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
          });
        });
        let exampleWrapper = document.getElementById('example1_wrapper');
        console.log(exampleWrapper);
        console.log(exampleWrapper.row);
    </script>
@endsection