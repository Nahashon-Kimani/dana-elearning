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
    <div class="col-lg-10 mx-auto">
<hr>
       <div class="card">
         <div class="card-body">
           <div class="card-title">Create New lesson</div>
           <hr>
            <form action="{{ route('admin.lesson.update',$lesson->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                <div class="form-row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="input-13">Lesson Name</label>
                            <input type="text" name="name" class="form-control form-control-square" id="input-13" value="{{ $lesson->title }}" >
                           </div>

                           <div class="form-group">
                            <label for="input-13">Unit Name</label>
                                <select name="unit_id" id="selects" class="form-control">
                                    <option selected value="{{ $lesson->unit_id }}">{{ $lesson->units->name }}</option>
                                    <option disabled>________________________</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                           </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="input-13">Lesson Objectives</label>
                                <textarea rows="4" name="obj" class="form-control" id="basic-textarea">{{ $lesson->lesson_objectives }}</textarea>
                        </div>
                    </div>
                </div>


                <hr>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="input-13">Video Link</label>
                        @if ($lesson->featured_video == NULL)
                            <input type="text" name="video" class="form-control form-control-square" placeholder="Paste Video Link here">
                        @else
                            <input type="text" name="video" class="form-control form-control-square" value="{{ $lesson->featured_video }}">
                        @endif
                       </div>

                       <div class="form-group col-sm-6">
                        <label for="input-13">Select Exercises </label>
                            <select name="exercise_id" id="selects" class="form-control">
                                
                                @if ($lesson->exercise_id == NULL)
                                    <option selected disabled> -- Select Exercise --</option>
                                @else
                                    <option selected value="{{ $lesson->exercise_id }}">{{ $lesson->exercise->title }}</option>
                                @endif

                                <option disabled>________________________</option>
                                @foreach ($exercises as $exercise)
                                    <option value="{{ $exercise->id }}">{{ $exercise->title }}</option>
                                @endforeach
                            </select>
                       </div>
                </div>

                <hr>
                <div class="form-group">
                    <label for="input-13">Lesson Content/ Notes</label>
                    <textarea name="content" id="summernote" cols="30" rows="10">{{ $lesson->content }}</textarea>
                   </div>

             <div class="form-group">
                 <a href="{{ route('admin.lesson.index') }}" class="btn btn-warning shadow-warning btn-square px-5"> Cancel</a>
              <button type="submit" class="btn btn-info shadow-info btn-square px-5"><i class="icon-lock"></i> Update</button>
            </div>
            </form>
         </div>
       </div>
       

 @endsection