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
        <div class="card-header"><i class="fa fa-table"></i> 
            COURSES LIST
            <a href="{{ route('admin.courses.create') }}" class="btn btn-info float-right waves-effect px-5"><i class="fa fa-plus"> New Course</i></a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>COURSE NAME</th>
                    {{-- <th>COURSE SUMMARY</th> --}}
                    <th>COST</th>
                    <th>DURATION</th>
                    <th>INSTRUCTOR</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $key=>$course)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $course->name }}</td>
                      {{-- <td>{{ $course->summary }}</td> --}}
                      <td>Ksh. {{ $course->cost }}</td>
                      <td>{{ $course->duration }} Months</td>
                      <td>{{ $course->user->name }}</td>
                      <td>
                        <div class="btn-group m-1" role="group">
                          <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ACTIONS
                          </button>
                          <div class="dropdown-menu">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="dropdown-item">EDIT</a>
                              <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#quickView">QUICK VIEW</a>
                              <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.courses.show', $course->id) }}" class="dropdown-item">VIEW</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>COURSE NAME</th>
                    {{-- <th>COURSE SUMMARY</th> --}}
                    <th>COST</th>
                    <th>DURATION</th>
                    <th>INSTRUCTOR</th>
                    <th>ACTION</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->


  <div class="modal fade" id="quickView">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-warning">
        <div class="modal-header bg-warning">
          {{-- <h5 class="modal-title text-uppercase text-white"><i class="fa fa-star"></i>{{ $course->name }}</h5> --}}
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          <button type="button" class="btn btn-warning"><i class="fa fa-check-square-o"></i> Save changes</button>
        </div>
      </div>
    </div>
  </div><!--End Modal -->

@endsection