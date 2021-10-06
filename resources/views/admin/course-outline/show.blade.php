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
    <div class="col-md-11 mx-auto">
        <hr>
      <div class="card">
        <div class="card-header bg-info p-4 text-uppercase">
            <p class="h3">Course: {{ $outline->courses->name }}</p>
            <p class="h6">Created by: {{ $outline->user->name }}</p>
            <div class="row">
              <div class="col-sm-6">
                <p class="h6">Created On: {{ date('dS-M-Y', strtotime($outline->created_at)) }}</p>
                <p class="h6">At: {{ date('H:i:s', strtotime($outline->created_at)) }}</p>
              </div>
              <div class="col-sm-6">
                <p class="h5 float-right">
                  @if ($outline->status == 0)
                    <a href="{{ route('admin.course-outline.approve', $outline->id) }}" class="btn btn-warning">Approve</a>
                  @else
                      <button disabled="disabled" class="btn btn-info">
                        <i class="fa fa-check"></i> Approved</button>
                  @endif
                </p>
              </div>
            </div>
        </div>
        <div class="card-body">
            <p class="text-justify">
                {!! $outline->desc !!}
            </p>
        </div>
      </div>
    </div>
  </div><!-- End Row-->








@endsection