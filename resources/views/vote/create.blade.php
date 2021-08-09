@extends('layouts.adminlte')

@section('title', 'Create New Vote')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Create New Vote</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('vote-list.index') }}">Vote List</a></li>
                <li class="breadcrumb-item active">Create</li>
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
                <form class="needs-validation" novalidate id="form-candidate" action="{{ route('vote-list.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Title</label>
                        <input class="form-control" name="voteName" type="text" placeholder="Title" required>
                        <div class="invalid-feedback">
                          The title is required!
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select name="voteStatus" class="form-control" id="exampleFormControlSelect1">
                          <option value="available">Available</option>
                          <option value="unavailable">Unavailable</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Description</label>
                        <textarea placeholder="Description" name="voteDescription" class="form-control" rows="3"></textarea>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Closing Time</label>
                        <input class="form-control" name="voteClose" type="date" name="" id="" required>
                        <div class="invalid-feedback">
                          The closing time is required!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" id="candidate-list">
                    <div class="col-md-6" id="candidate-card-0">
                      <div class="card">
                        <div class="row">
                          <div class="col-6">
                            <img style="object-fit: cover" id="candidate-image-0" width="200px" height="300px" src="{{ asset('candidate_images/user-image-default.png') }}" alt="default-user-image">
                          </div>
                          <div class="col-6 pr-3 pt-3">
                            <div class="form-group">
                              <input class="form-control" name="candidateNames[]" type="text" placeholder="Candidate name" required>
                              <div class="invalid-feedback">
                                Candidate name is required!
                              </div>
                            </div>
                            <div class="form-group">
                              <textarea placeholder="Description" name="candidateDescriptions[]" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="candidateImages[]" accept="image/*" onchange="loadFile(event, 0)" class="custom-file-input">
                              <label id="label-image-0" class="custom-file-label">Choose file...</label>
                              <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary">Submit</button>
                </form>
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
    let index = 1;
    function loadFile(ev, id){
      let labelImage = document.getElementById('label-image-'+id);
      labelImage.innerHTML = ev.target.files[0].name;
      console.log(ev.target);
      let image = document.getElementById('candidate-image-'+id);
      image.src = URL.createObjectURL(ev.target.files[0]);
    }
    function addNewCandidate(){
      $('#candidate-list').append(
        `<div class="col-md-6" id="candidate-card-${index}">
                      <div class="card">
                        <div class="row">
                          <div class="col-6">
                            <img style="object-fit: cover" id="candidate-image-${index}" width="200px" height="300px" src="{{ asset('candidate_images/user-image-default.png') }}" alt="default-user-image">
                          </div>
                          <div class="col-6 pr-3 pt-3">
                            <div class="form-group">
                              <input class="form-control" name="candidateNames[]" type="text" placeholder="Candidate name" required>
                              <div class="invalid-feedback">
                                Candidate name is required!
                              </div>
                            </div>
                            <div class="form-group">
                              <textarea placeholder="Description" name="candidateDescriptions[]" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="candidateImages[]" accept="image/*" onchange="loadFile(event, ${index})" class="custom-file-input">
                              <label id="label-image-${index}" class="custom-file-label">Choose file...</label>
                              <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                            <button onclick="deleteCandidateCard(${index})" class="mt-3 btn-danger btn"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>`
      );
      index++;
    }
    function deleteCandidateCard(id){
      let candidate = document.getElementById('candidate-card-'+id);
      candidate.remove();
    }
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
@endsection