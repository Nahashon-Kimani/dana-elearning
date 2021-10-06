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
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header text-uppercase">
          <i class="fa fa-table"></i> <span class="text-warning">{{ $unit->users->name }}</span> units and unit access
      </div>
      <form action="{{ route('admin.instructor-unit.update', $unit->id) }}" method="post">
        @csrf
        @method('put')
          <div class="card-body">
              <div class="form-group">
                <label for="input-13">Unit</label>
                <input type="text" readonly class="form-control form-control-square" value="{{ $unit->units->name }}">
              </div>
          <div class="form-row">
            <div class="form-group col-sm-7">
              <label for="input-14">Adjust Date</label>
              <input type="date" name="date" class="form-control form-control-square" value="{{ $unit->access_upto }}">
             </div>
             <div class="form-group col-sm-5">
              <label for="input-15">Mark Complete</label>
              <select name="mark_complete" class="form-control form-control-square">
                <option value="0" selected>On-Going</option>
                <option value="1">Complete</option>
              </select>
             </div>
          </div>
          <div class="form-group">
            <a href="{{ route('admin.instructor-unit.index') }}" class="btn btn-square btn-warning shadow-warning px-5">Cancel</a>
           <button type="submit" class="btn btn-info shadow-info btn-square px-5">
             <i class="icon-lock"></i> Update 
            </button>
          </div>
          </div>
      </form>
    </div>
  </div>
</div>

 @endsection