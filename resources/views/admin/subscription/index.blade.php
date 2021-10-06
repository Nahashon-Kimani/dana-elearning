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
            <i class="fa fa-table"></i> Our Subscribers
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>SUBSCRIPTION DATE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
                @forelse ($subs as $key=>$sub)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $sub->name }}</td>
                        <td>
                            <a href="mailto:{{ $sub->email }}">{{ $sub->email }}</a>
                        </td>
                        <td>
                            @if (date('Y-m-d', strtotime($sub->created_at)) == date('Y-m-d'))
                                {{ date('dS-F-Y', strtotime($sub->created_at)) }}
                                <span class="badge badge-info shadow-info m-1">New</span>
                            @else
                                {{ date('dS-F-Y', strtotime($sub->created_at)) }}
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.subscribers.destroy', $sub->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-icon-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                 <div class="alert-icon icon-part-info">
                                  <i class="icon-info"></i>
                                 </div>
                                 <div class="alert-message">
                                   <span><strong>Info!</strong> No system subscriber yet.  <a href="javascript:void();" class="alert-link">simply dummy text.</a></span>
                                 </div>
                               </div>
                        </td>
                    </tr>
                @endforelse
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>SUBSCRIPTION DATE</th>
                    <th>ACTION</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
        {{ $subs->links() }}
      </div>
    </div>
  </div><!-- End Row-->

@endsection