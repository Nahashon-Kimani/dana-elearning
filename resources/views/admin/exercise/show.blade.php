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
     <div class="col-sm-9">
            <hr>
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card-title text-uppercase">
                                <p class="h4 text-center">Title: {{ $exercise->title }}</p>
                                <p class="h6">Created By: {{ $exercise->user->name }} <br>
                                    <span class="text-white"> Posted On: {{ date('dS-M-Y', strtotime($exercise->created_at)) }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            @if ($exercise->status == 0)
                                <form action="{{ route('admin.exercise.approve', $exercise->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning px-5 float-right mt-4">
                                        <i class="fa fa-times"></i> Approve
                                    </button>
                                </form>
                            @else
                                <button disabled="disabled" class="btn btn-info px-5 float-right mt-4">
                                    <i class="fa fa-check"></i> Approved
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! $exercise->content !!}
                </div>

                <div class="card-footer">
                    <div class="card-title text-center text-uppercase">Dana School</div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <hr>
            <div class="card">
                <div class="card-header text-uppercase">Assignment List </div>
                 <div class="card-body">
                    <div class="list-group">
                        @forelse ($allExercises as $key=>$anExercise)
                            <a href="{{ route('admin.exercise.show', $anExercise->id) }}" 
                                class="list-group-item list-group-item-action">
                                    @if ($anExercise->status == 0)
                                        <span class="badge badge-warning shadow-warning m-1">{{ $key + 1 }}</span>
                                    @else
                                        <span class="badge badge-info shadow-info m-1">{{ $key + 1 }}</span>
                                    @endif
                                {{ $anExercise->title }}
                            </a>
                        @empty
                            <a href="{{ route('admin.exercise.create') }}" 
                                class="list-group-item list-group-item-action">
                                No Exercise Availble. Create new Here
                            </a>
                        @endforelse
                        </div>
                 </div>
              </div>
        </div>
 </div>
       

@endsection