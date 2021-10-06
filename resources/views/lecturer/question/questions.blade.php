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
            <i class="fa fa-table"></i> Question List 
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>QUESION TITLE</th>
                    <th>COURSE</th>
                    <th>STATUS</th>
                    <th>ASKED ON</th>
                    <th>ANSWERED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($qns as $key=>$qn)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $qn->subject }}</td>
                            <td>{{ $qn->courses->name }}</td>
                            <td>
                                @if ($qn->status == 0)
                                    <span class="badge badge-warning m-1">
                                        <i class="fa fa-close"></i>
                                    </span>
                                @else
                                    <span class="badge badge-info m-1">
                                        <i class="fa fa-check"></i>
                                    </span>
                                @endif
                            </td>
                            <td>{{ date('dS-M-Y', strtotime($qn->created_at)) }}</td>
                            <td>
                                @if ($qn->answered_by == NULL)
                                    <span class="badge badge-warning m-1">
                                        Unreplied
                                    </span>
                                @else
                                    {{ $qn->repliedBy->name }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('lecturer.question.show', $qn->id) }}" 
                                    class="btn btn-info waves-effect waves-light">
                                    <i class="fa fa-eye"></i>
                                </a>    
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Question Available</td>
                        </tr>
                    @endforelse
                </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>QUESION TITLE</th>
                    <th>COURSE</th>
                    <th>STATUS</th>
                    <th>ASKED ON</th>
                    <th>ANSWERED BY</th>
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