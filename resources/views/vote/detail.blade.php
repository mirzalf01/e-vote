@extends('layouts.adminlte')

@section('title', 'Vote Detail')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Vote Detail</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('vote-list.index') }}">Vote List</a></li>
                <li class="breadcrumb-item active">Detail</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        {{-- Error Alert --}}
        <div class="row">
          <div class="col-12">
          @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><button id="new-candidate" onclick="addNewCandidate()" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> New Candidate</button></h5>
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
                <div class="row" id="candidate-list">
                    @foreach ($vote->candidates as $candidate)
                    <div class="col-md-6" id="candidate-card-{{ $candidate->id }}">
                      <div class="card">
                        <div class="row">
                          <div class="col-6">
                              
                            <img style="object-fit: cover" id="candidate-image-0" width="200px" height="300px" src="{{ asset('candidate_images/'.$candidate->image_path) }}" alt="user-image">
                          </div>
                          <div class="col-6 pr-3 pt-3">
                            <div class="form-group">
                              <input class="form-control" name="candidateNames[]" type="text" placeholder="Candidate name" readonly value="{{ $candidate->name }}">
                            </div>
                            <div class="form-group">
                              <textarea placeholder="Description" name="candidateDescriptions[]" class="form-control" rows="3" readonly>{{ $candidate->description }}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.Main content -->
    
@endsection

@section('js')
  <script>
    
  </script>
@endsection