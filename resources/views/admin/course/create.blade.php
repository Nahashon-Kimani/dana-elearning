@extends('layouts.backend.index')
@section('content')

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Simple Cards</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Cards</a></li>
        <li class="breadcrumb-item active" aria-current="page">Simple Cards</li>
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
           <div class="card-title text-uppercase">create a new course</div>
           <hr>
            <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
             <div class="form-row">
                <div class="col-md-5">
                        <div class="form-group">
                            <label for="input-13">Course Name</label>
                            <input type="text" name="name" class="form-control form-control-square" id="input-13" placeholder="Enter Course Name">
                        </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="input-14">Instructor</label>
                                    <select name="instructor" class="form-control" id="basic-select">
                                        <option selected disabled>-- Select --</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                        @endforeach
                                    </select>
                               </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="input-14">DURATION</label>
                                <input name="duration" type="text" class="form-control form-control-square" id="input-14" placeholder="3 Months">
                               </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="input-14">Price</label>
                                <input name="price" type="text" class="form-control form-control-square" id="input-14" placeholder="Ksh. 45, 000">
                               </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="basic-textarea">Course Summary</label>
                            <textarea name="summary" rows="4" class="form-control" placeholder="Course Summary"></textarea>
                          </div>
                </div>
             </div>
             <hr>
             <p class="card-title text-uppercase"> Syllabus </p>

             <div class="form-row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="input-14">Course Outline</label>
                            <select name="syllabus_id" class="form-control" id="basic-select">
                                <option disabled selected>-- Select Syllabus--</option>
                                <option disabled>_______________________</option>
                                {{-- <option value="0">New Unit</option> --}}
                                @forelse ($courseOutlines as $outline)
                                    <option value="{{ $outline->id }}">{{ $outline->courses->name }}</option>
                                @empty
                                   <a href="{{ route('admin.syllabus.create') }}">New Syllabus</a> 
                                @endforelse
                            </select>
                       </div>
                </div>

                <div class="form-group col-sm-5">
                    <label for="image">Upload Image</label>
                    <input type="file" name="image" class=" form-control form-control-square" id="image">
                  </div>

             </div>

             <hr>
             <p class="card-title text-uppercase"> Course description </p>
             <div class="form-group">
                <label for="basic-textarea">Course description</label>
                <textarea name="details" rows="4" class="form-control" id="summernote"></textarea>
              </div>

             <div class="form-group">
                 <a href="{{ route('admin.courses.index') }}" class="btn btn-warning shadow-warning btn-square px-5">Cancel</a>
              <button type="submit" class="btn btn-info shadow-info btn-square px-5">Create</button>
            </div>
            </form>
         </div>
       </div>
    </div>
 </div>
       

@endsection