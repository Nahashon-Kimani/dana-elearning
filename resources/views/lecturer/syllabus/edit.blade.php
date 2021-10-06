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
     <div class="card-header text-uppercase">
         <h5>update {{ $syllabus->units->name }} Syllabus</h5>
     </div>

    <form action="{{ route('lecturer.syllabus.update', $syllabus->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="basic-select" class="col-form-label">Select Course</label>
                <select name="unit_id" class="form-control form-control-square">
                  <option value="{{ $syllabus->unit_id }}" selected>{{ $syllabus->units->name }}</option>
                  <option disabled>__________________________</option>
                  {{-- Getting other units --}}
                    @forelse ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                    @empty
                        <option disabled>{{ Str::upper('No other available unit') }}</option>
                    @endforelse
                </select>
              </div>

              <div class="form-group">
                <label for="basic-textarea" class="col-form-label">TEXTAREA INPUT</label>
                    <textarea name="description" rows="4" class="form-control" id="summernote">
                      {!! $syllabus->desc !!}
                    </textarea>
              </div>
        </div> 
        
        <div class="card-footer">
          <a href="{{ route('lecturer.syllabus.index') }}" class="btn btn-square waves-effect waves-light btn-warning shadow-warning px-5">Cancel</a>
          <button type="submit" class="btn btn-info shadow-info px-5 btn-square waves-effect waves-light"> Save Changes</button>
        </div>
    </form>
 </div>

@endsection