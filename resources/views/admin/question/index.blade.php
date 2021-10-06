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
            <i class="fa fa-table"></i> Questions
            {{-- <a href="{{ route('admin.scheme.create') }}" class="btn btn-info float-right">
                <i class="fa fa-plus"> New Scheme</i>
            </a> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>QUESTION TITLE</th>
                    <th>COURSE</th>
                    <th>STATUS</th>
                    <th>ASKED BY</th>
                    <th>ANSWERED BY</th>
                    <th>ASKED ON</th>
                    <th>ACTION</th>
                </tr>
            </thead>
                @forelse ($questions as $key=>$question)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $question->subject }}</td>
                        <td>{{ $question->courses->name }}</td>
                        <td>
                            @if ($question->status == 0)
                                <span class="badge badge-warning m-1">
                                    <i class="fa fa-close"></i>
                                </span>
                            @else
                                <span class="badge badge-info m-1">
                                    <i class="fa fa-check"></i>
                                </span>
                            @endif
                        </td>
                        <td>{{ $question->users->name }}</td>
                        <td>
                            @if ($question->answered_by == 0)
                                <span class="badge badge-warning m-1">
                                    <i class="fa fa-close"></i>
                                </span>
                            @else
                                {{ $question->repliedBy->name }}
                            @endif
                        </td>
                        <td>{{ date('dS-M-Y', strtotime($question->created_at)) }}</td>
                        <td>
                            @if ($question->status == 0)
                                <div class="btn-group m-1" role="group">
                                <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  ACTIONS
                                </button>
                                <div class="dropdown-menu" style="">
                                  <a href="{{ route('admin.question.edit', $question->id) }}" class="dropdown-item">Answer</a>
                                  <div class="dropdown-divider"></div>
                                  <form action="{{ route('admin.question.ignore',$question->id ) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                                     <button type="submit" class="dropdown-item">Mark Answered</button>
                                  </form>
                                </div>
                              </div>
                                
                            @else
                                Answered
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <div class="alert-icon contrast-alert">
                                    <i class="icon-info"></i>
                                    </div>
                                    <div class="alert-message">
                                    <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
                                    </div>
                                </div>
                        </td>
                    </tr>
                @endforelse
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>QUESTION TITLE</th>
                    <th>COURSE</th>
                    <th>STATUS</th>
                    <th>ASKED BY</th>
                    <th>ANSWERED BY</th>
                    <th>ASKED ON</th>
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