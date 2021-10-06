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
     @forelse ($msgs as $key=>$msg)
         <div class="col-lg-6 col-xl-4">
             @if ($msg->status == 0)
                <div class="card card-warning">
                    <div class="card-header text-white bg-warning">
                        <p class="card-title h4 text-white text-bold text-center text-uppercase">Subject: {{ $msg->subject }}</p>
                        <div class="row">
                            <div class="col-sm-7"><p><small>Message By: </small>{{ $msg->name }}</p></div>
                            <div class="col-sm-5">
                                @if ($msg->phone_no != NULL)
                                <p><small>Phone: </small>{{ $msg->phone_no }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <p class="text-justify">{{ $msg->message }}</p>
                        </div>
                        <div class="card-footer text-right">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <p class="text-italic"><small>{{ date('dS-M-Y H:i:s', strtotime($msg->created_at)) }}</small></p>
                            </div>
                                <div class="col-sm-6">
                                    <form action="{{ route('admin.contact-us.update', $msg->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning btn-sm">Mark as read</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
             @else
             <div class="card card-info">
                <div class="card-header text-white bg-info">
                    <p class="card-title h4 text-white text-bold text-center text-uppercase">Subject: {{ $msg->subject }}</p>
                    <div class="row">
                        <div class="col-sm-7"><p><small>Message By: </small>{{ $msg->name }}</p></div>
                        <div class="col-sm-5">
                            @if ($msg->phone_no != NULL)
                               <p><small>Phone: </small>{{ $msg->phone_no }}</p>
                            @endif
                        </div>
                    </div>
                   </div>
                    <div class="card-body">
                        <p class="text-justify">{{ $msg->message }}</p>
                    </div>
                    <div class="card-footer text-right">
                       <div class="row">
                           <div class="col-sm-6 text-left">
                               <p class="text-italic"><small>{{ date('dS-M-Y H:i:s', strtotime($msg->created_at)) }}</small></p>
                           </div>
                           <div class="col-sm-6">
                               <button disabled class="btn btn-info btn-sm">Already read</button></div>
                           </div>
                    </div>
            </div>
             @endif
         </div>
     @empty
     <div class="col-md-10 mx-auto">
        <div class="card">
          <div class="card-header bg-info text-white text-uppercase">No new Messages</div>
          <div class="card-body">
            <p class="card-text">
                No new Messages

                
            </p>
          </div>
          <div class="card-footer">
            <a href="{{ route('admin.contact-us.index') }}" class="btn btn-info float-right">
                View all Messages
            </a>
          </div>
        </div>
      </div>
     @endforelse
 </div>


 @endsection