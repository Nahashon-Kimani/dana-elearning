@extends('layouts.backend.index')
@section('content')

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Bootstrap Elements</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">UI Elements</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bootstrap Elements</li>
     </ol>
   </div>
 <div class="col-sm-3">
   <div class="btn-group float-sm-right">
    <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <div class="dropdown-menu">
      <a href="javaScript:void();" class="dropdown-item">Action</a>
      <a href="javaScript:void();" class="dropdown-item">Another action</a>
      <a href="javaScript:void();" class="dropdown-item">Something else here</a>
      <div class="dropdown-divider"></div>
      <a href="javaScript:void();" class="dropdown-item">Separated link</a>
    </div>
  </div>
 </div>
 </div>

 <div class="row">
    <div class="col-lg-11 mx-auto">
<hr>
       <div class="card">
         <div class="card-body">
           <div class="card-title">Create New lesson</div>
           <hr>
            <form action="{{ route('lecturer.lesson.store') }}" method="POST">
                @csrf
                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                <div class="form-row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="input-13">Lesson Name</label>
                            <input type="text" name="name" class="form-control form-control-square" id="input-13" placeholder="Enter Your Name">
                           </div>

                           <div class="form-group">
                            <label for="input-13">Unit Name</label>
                                <select name="unit_id" id="selects" class="form-control">
                                    <option selected disabled>-- Select Unit --</option>
                                    <option disabled>________________________</option>
                                    @forelse ($units as $unit)
                                        <option value="{{ $unit->units->id }}">{{ $unit->units->name }}</option>
                                    @empty
                                        <option disabled> NO AVAILBLE COURSE</option>
                                    @endforelse
                                </select>
                           </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="input-13">Lesson Objectives</label>
                                <textarea rows="4" name="obj" class="form-control" id="basic-textarea"></textarea>
                        </div>
                    </div>
                </div>


                <hr>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="input-13">Video Link</label>
                        <input type="text" name="video" class="form-control form-control-square" id="input-13" placeholder="Enter Your Name">
                       </div>

                       <div class="form-group col-sm-6">
                        <label for="input-13">Select Exercises </label>
                            <select name="exercise_id" id="selects" class="form-control">
                                <option selected disabled>-- Select Exercise --</option>
                                <option disabled>________________________</option>
                                @forelse ($exercises as $exercise)
                                    <option value="{{ $exercise->id }}">{{ $exercise->title }}</option>
                                @empty
                                    <option disabled> NO AVAILBLE COURSE</option>
                                @endforelse
                            </select>
                       </div>
                </div>

                <hr>
                <div class="form-group">
                    <label for="input-13">Lesson Content/ Notes</label>
                    <textarea name="content" id="summernote" cols="30" rows="10"></textarea>
                   </div>

             <div class="form-group">
                 <a href="{{ route('lecturer.lesson.index') }}" class="btn btn-warning shadow-warning btn-square px-5">Cancel</a>
              <button type="submit" class="btn btn-info shadow-info btn-square px-5"><i class="icon-lock"></i> Upload</button>
            </div>
            </form>
         </div>
       </div>
       

 @endsection