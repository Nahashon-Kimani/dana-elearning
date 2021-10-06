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
           <div class="card-title text-uppercase">create new unit</div>
           <hr>
            <form action="{{ route('admin.unit.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-sm-7">
                    <label for="input-13" class="text-info h6">Unit Name</label>
                    <input type="text" name="name" class="form-control form-control-square" id="input-13" placeholder="Enter Unit Name">
                    </div>
                </div>

                <hr>
                <p class="text-uppercase text-info">Duration and Associated Course</p>
                <div class="form-row">
                    <div class="form-group col-sm-5">
                        <label for="input-14">Unit Duration</label>
                        <input type="text" name="duration" class="form-control form-control-square" id="input-14" placeholder="Enter Your Email Address">
                       </div>

                       <div class="form-group col-sm-7">
                        <label for="basic-select">Select Course</label>
                          <select name="course_id" class="form-control" class="form-control form-control-square" id="basic-select">
                                <option selected disabled>-- Select Course --</option>
                                <option disabled>_______________________</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                              </select>
                      </div>
                </div>

                <hr>
                <p class="text-uppercase text-info">Syllabus and Schemes</p>
             
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="input-15">Syllabus</label>
                            <select name="syllabus_id" class="form-control form-control-square" id="basic-select">
                                <option selected disabled>-- Select Syllabus --</option>
                                <option disabled>_______________________</option>
                               @if (count($syllabi))
                                   <option disabled>No Approved Syllabus</option>
                               @else
                                    @foreach ($syllabi as $syllabus)
                                     <option value="{{ $syllabus->id }}">{{ $syllabus->units->name }}</option>
                                    @endforeach
                               @endif
                            </select>
                       </div>

                    <div class="form-group col-sm-6">
                        <label for="input-15">Schemes</label>
                            <select name="scheme_id" class="form-control form-control-square" id="basic-select">
                                <option selected disabled>-- Select Scheme of Work --</option>
                                <option disabled>_______________________</option>
                                    @if (count($schemes)== 0)
                                        <option disabled>No Approved Schemes</option>
                                    @else
                                        @foreach ($schemes as $scheme)
                                            <option value="{{ $scheme->id }}">{{ $scheme->units->name }}</option>
                                        @endforeach
                                    @endif
                            </select>
                       </div>
                </div>

                <br><hr>
             <p class="text-uppercase text-info">Unit Description and objectives (what the unit entails)</p>
             <div class="form-group">
              {{-- <label for="input-15">Unit Description and objectives (what the unit entails)</label> --}}
              <textarea name="desc" class="form-control" id="summernote" cols="30" rows="10"></textarea>
             </div>

             <div class="form-group">
                 <a href="{{ route('admin.unit.index') }}" class="btn btn-warning shadow-warning btn-square px-5">Cancel</a>
                 <button type="submit" class="btn btn-info shadow-info btn-square px-5"><i class="icon-lock"></i> Upload</button>
            </div>
            </form>
         </div>
       </div>
    </div>
 </div>

       

 @endsection