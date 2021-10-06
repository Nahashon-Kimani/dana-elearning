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


 <div class="card">
     <div class="card-header">
         <h5>Create new Syllabus</h5>
     </div>

    <form action="{{ route('admin.syllabus.store') }}" method="post">
        @csrf
        <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
        <div class="card-body">
            <div class="form-group row col-sm-6">
                <label for="basic-select" class="col-form-label"> Select Associated Course</label>
                <select name="unit_id" class="form-control form-control-square">
                  <option selected disabled>-- Select Associated Unit --</option>
                  <option disabled>___________________________</option>
                    @foreach ($units as $unit)
                      <option value="{{ $unit->id }}">{{ $unit->name }}</option>   
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="basic-textarea" class="col-form-label"> Paste syllabus here </label>
                    <textarea name="description" rows="4" class="form-control" id="summernote"></textarea>
              </div>
        </div> 
        
        <div class="card-footer">
            <a href="{{ route('admin.syllabus.index') }}" class="btn btn-warning btn-square shadow-warning px-5 waves-light"> Cancel</a>
            <button type="submit" class="btn btn-info shadow-info px-5 btn-square waves-light"> Upload</button>
        </div>
    </form>
 </div>

@endsection