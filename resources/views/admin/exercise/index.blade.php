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
            <i class="fa fa-table"></i> Exercises list
            <a href="{{ route('admin.exercise.create') }}" class="btn btn-info shadow-info float-right text-uppercase">
                <i class="fa fa-plus"> New exercise</i>
            </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>CREATED BY</th>
                    <th>CREATED ON</th>
                    <th>APPROVED?</th>
                    <th>ACTION</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($assignments as $key=>$assignment)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $assignment->title }}</td>
                            <td>{{ $assignment->user->name }}</td>
                            <td>
                                {{ date('dS-M-Y', strtotime($assignment->created_at)) }}
                                {{-- <span class="badge badge-warning shadow-warning m-1">{{ $assignment->created_at->diffForHumans() }}</span> --}}
                            </td>
                            <td>
                              @if ($assignment->status == 0)
                                  <span class="badge badge-warning m-1">
                                    <i class="fa fa-times"></i>
                                  </span>
                              @else
                                  <span class="badge badge-info m-1">
                                    <i class="fa fa-check"></i>
                                  </span>
                              @endif
                            </td>
                            <td>
                                <div class="btn-group m-1" role="group">
                                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      ACTIONS
                                    </button>
                                    <div class="dropdown-menu" style="">
                                      <a href="{{ route('admin.exercise.edit', $assignment->id) }}" class="dropdown-item">EDIT</a>
                                      {{-- <div class="dropdown-divider"></div> --}}
                                      {{-- <a href="javaScript:void();" class="dropdown-item">QUICK VIEW</a> --}}
                                      <div class="dropdown-divider"></div>
                                      <a href="{{ route('admin.exercise.show', $assignment->id) }}" class="dropdown-item">VIEW</a>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>CREATED BY</th>
                    <th>CREATED ON</th>
                    <th>APPROVED?</th>
                    <th>ACTION</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->








@endsection