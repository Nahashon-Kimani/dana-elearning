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
            <i class="fa fa-table"></i> Course Name Units
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>COURSE</th>
                    <th>UNIT NAME</th>
                    <th>DURATION</th>
                    {{-- <th>INSTRUCTOR</th> --}}
                    <th>ACTIONS</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($units as $key=>$unit)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $unit->courses->name }}</td>
                            <td>{{ $unit->name }}</td>
                            <td>{{ $unit->duration }} Months</td>
                            {{-- <td>{{  }}</td> --}}
                            <td>
                                <a href="{{ route('student.lesson-list', $unit->id) }}" 
                                  class="btn btn-info"><i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                    <div class="alert alert-info alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                       <div class="alert-icon contrast-alert">
                      <i class="icon-info"></i>
                       </div>
                       <div class="alert-message">
                         <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
                       </div>
                      </div>
                    @endforelse
                </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>COURSE</th>
                    <th>UNIT NAME</th>
                    <th>DURATION</th>
                    {{-- <th>INSTRUCTOR</th> --}}
                    <th>ACTIONS</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->

 @endsection