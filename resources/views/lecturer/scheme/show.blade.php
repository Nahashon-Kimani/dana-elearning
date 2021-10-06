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
    <div class="col-sm-11 mx-auto">
    <hr>
       <div class="card">
           <div class="card-header text-center bg-info p-3 text-uppercase text-white">
                <p class="h4">{{ Str::upper('Scheme') }}</p>
                <div class="row">
                  <div class="col-sm-8">
                    <div class="card-title pt-2">Unit Name: {{ $scheme->units->name }}</div>
                  </div>
                  <div class="col-sm-4">
                    @if ($scheme->status == 0)
                    <button type="button" class="btn btn-outline-warning btn-square waves-effect waves-light m-1">
                      <i class="fa fa-times"></i> Not Approved
                    </button>      
                    @else
                          <p class="card-text"><i class="fa fa-check"></i> Approved</p>
                    @endif  
                  </div>
                </div>
           </div>
         <div class="card-body">
           <p class="text-justify">
               {!! $scheme->desc !!}
           </p>
         </div>
       </div>
    </div>
 </div>
       

 @endsection