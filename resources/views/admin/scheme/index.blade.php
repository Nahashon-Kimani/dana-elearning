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
            <i class="fa fa-table"></i> Schemes of Work 
            <a href="{{ route('admin.scheme.create') }}" class="btn btn-info float-right">
                <i class="fa fa-plus"> New Scheme</i>
            </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ASSOCIATED UNIT</th>
                    <th>CREATED BY</th>
                    <th>CREATED ON</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>ID</th>
                  <th>ASSOCIATED UNIT</th>
                  <th>CREATED BY</th>
                  <th>CREATED ON</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
              </tr>
          </tfoot>
                <tbody>
                    @forelse ($schemes as $key=>$scheme)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $scheme->units->name }}</td>
                            <td>{{ $scheme->user->name }}</td>
                            <td>{{ date('dS-M-Y', strtotime($scheme->created_at)) }}</td>
                            <td>
                              @if ($scheme->status == 0)
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
                                    <div class="dropdown-menu">
                                      <a href="{{ route('admin.scheme.edit', $scheme->id) }}" class="dropdown-item">EDIT</a>
                                        <div class="dropdown-divider"></div>
                                      <a href="{{ route('admin.scheme.show', $scheme->id) }}" class="dropdown-item">VIEW</a>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->

@endsection