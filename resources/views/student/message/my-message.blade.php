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
  <div class="col-sm-10 mx-auto">
    @forelse($msgs as $key=>$msg)
      <div class="card">
        <div class="card-header text-center bg-info">
          <div class="row">
            <div class="col-sm-5">
              <img src="{{ asset('images/users/'.$msg->askedBy->profile_picture) }}" 
                   alt="Sender Profile Picture"
                   class="img-thumbnail">
              <p class="lead">Sent By: {{ $msg->askedBy->name }} <em><small>Admin</small></em> </p>
            </div>
            <div class="col-sm-7">
              <div class="card-title">
                <p class="h4 text-uppercase">Personalised Message</p>
                <p>Sent on: {{ date('dS-M-Y', strtotime($msg->created_at)) }} 
                  <span class="badge badge-warning m-1">{{ $msg->created_at->diffForHumans() }}</span>
                </p>
              </div>
            </div>
          </div>
        </div>
          <div class="card-body">
            {!! $msg->details !!}
          </div>

          <div class="card-footer text-right">
          <div class="btn-group m-1" role="group">
                  <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
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
    @empty

    @endforelse
  </div>
 </div>


@endsection