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
            <i class="fa fa-table"></i> All units
            <a href="{{ route('admin.unit.create') }}" class="btn btn-info float-right"> <i class="fa fa-plus"> New Unit</i></a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UNIT NAME</th>
                    <th>COURSE</th>
                    <th>DURATION</th>
                    <th>CREATED BY</th>
                    <th>ACTION</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($units as $key=>$unit)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $unit->name }}</td>
                            <td>
                                <a href="{{ route('admin.courses.show', $unit->course_id) }}">{{ $unit->courses->name }}</a>
                            </td>
                            <td>{{ $unit->duration }} Months</td>
                            <td>{{ $unit->user->name }}</td>
                            <td>
                                <div class="btn-group m-1" role="group">
                                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      ACTION
                                    </button>
                                    <div class="dropdown-menu">
                                      <a href="{{ route('admin.unit.edit', $unit->id) }}" class="dropdown-item">EDIT</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="{{ route('admin.unit.show', $unit->id) }}" class="dropdown-item">VIEW</a>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>UNIT NAME</th>
                    <th>COURSE</th>
                    <th>DURATION</th>
                    <th>CREATED BY</th>
                    <th>ACTION</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
        <div class="card-footer">
          <p class="float-right">{{ $units->links() }}</p>
        </div>
      </div>
    </div>
  </div><!-- End Row-->




@endsection