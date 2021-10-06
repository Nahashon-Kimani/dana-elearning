@extends('layouts.backend.index')

@section('content')

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Simple Cards</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Cards</a></li>
        <li class="breadcrumb-item active" aria-current="page">Simple Cards</li>
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
        <div class="card-header"><i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>COURSE NAME</th>
                    <th>ENROLLMENT DATE</th>
                    <th>STATUS</th>
                    <th>PAYABLE AMOUNT</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($studentCourses as $key=>$studentCourse)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $studentCourse->courses->name }}</td>
                        <td>{{ date('dS-F-Y', strtotime($studentCourse->created_at)) }}</td>
                        <td>
                            @if ($studentCourse->status == 1)
                                <span class="badge badge-warning shadow-warning m-1">ON-GOING </span>
                            @else
                                <span class="badge badge-success shadow-success m-1">COMPLETED </span>
                            @endif
                        </td>
                        <td>Ksh. {{ $studentCourse->courses->cost }}</td>
                    </tr>
                    @empty
                      <tr>
                        <td colspan="5">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                              <div class="alert-icon">
                                <i class="icon-exclamation"></i>
                              </div>
                                <div class="alert-message">
                                  <span><strong>No enrolled Course</strong> No enrolled Courses</span>
                                </div>
                            </div>
                        </td>
                      </tr>
                    @endforelse
                </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>COURSE NAME</th>
                    <th>ENROLLMENT DATE</th>
                    <th>STATUS</th>
                    <th>PAYABLE AMOUNT</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->



@endsection