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
            <i class="fa fa-table"></i> Unit Assignment
            <button class="btn btn-info px-2 m-1 float-right" data-toggle="modal" data-target="#assignUnit">
                <i class="fa fa-plus"></i> 
                Assign Instructor
            </button>
            {{-- <a href="{{ route('admin.instructor-unit.create') }}" 
               class="btn btn-info px-2 m-1 float-right">
               <i class="fa fa-user"></i> Assign Student</a> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>INSTRUCTOR</th>
                    <th>UNITS</th>
                    <th>ACCESS UPTO</th>
                    <th>ASSIGNED ON</th>
                    <th>STATUS</th>
                    <th>GRANT ACCESS</th>
                </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>ID</th>
                  <th>INSTRUCTOR</th>
                  <th>UNITS</th>
                  <th>ACCESS UPTO</th>
                  <th>ASSIGNED ON</th>
                  <th>STATUS</th>
                  <th>GRANT ACCESS</th>
              </tr>
          </tfoot>
                <tbody>
                    @forelse ($uInstructs as $key=>$iUnit)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ Str::limit($iUnit->users->name, 17, '') }}</td>
                            <td>{{ $iUnit->units->name }}</td>
                            <td>
                              @if ($iUnit->access_upto == NULL)
                                <span class="badge badge-info m-1">Unlimited</span>
                              @else
                                @if(($iUnit->access_upto) <= (date('Y-m-d')))
                                  {{ date('d-M-Y', strtotime($iUnit->access_upto)) }}
                                  <span class="badge badge-warning">?</span>
                                @else
                                  {{ date('d-M-Y', strtotime($iUnit->access_upto)) }}
                                  <span class="badge badge-info"><i class="fa fa-check"></i></span>
                                @endif
                              @endif
                            </td>
                            <td>{{ date('dS-M-Y', strtotime($iUnit->created_at)) }}</td>
                            <td>
                              @if ($iUnit->status == 0)
                                  <span class="badge badge-warning m-1">On-going</span>
                              @else
                                  <span class="badge badge-info m-1">Completed</span>
                              @endif
                            </td>
                            <td>
                              {{-- This should allow the admin to: 
                                1. if a student view the fee payment statement and update upto_access
                                2. both the student and instructor their units status changed here
                                3. If a unit is marked complete then we shouldnt have access to. --}}
                                <a href="{{ route('admin.instructor-unit.edit', $iUnit->id) }}"
                                   class="btn btn-info btn-sm waves-effect">
                                   <i class="fa fa-edit"></i>
                                  </a>

                                

                                {{-- <form action="{{ route('admin.instructor-unit.edit', $iUnit->id) }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="user_id" value="{{ $iUnit->instructor_id }}">
                                  <button type="submit" class="btn btn-info btn-sm waves-effect">
                                    <i class="fa fa-edit"></i></button>
                                </form> --}}
                            
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                          <td colspan="5">
                            <div class="alert alert-info alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                               <div class="alert-icon contrast-alert">
                              <i class="icon-info"></i>
                               </div>
                               <div class="alert-message">
                                 <span><strong>Info!</strong> No units assigned.</span>
                               </div>
                            </div>
                          </td>
                        </tr>
                    @endforelse
                </tbody>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->


  {{-- Assign an instructor a unit Modal --}}
  <div class="modal fade" id="assignUnit" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-info">
        <div class="modal-header bg-info">
          <h5 class="modal-title text-white"><i class="fa fa-star"></i> Modal title</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('admin.instructor-unit.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input-1">Select Instructor</label>
                            <select name="user_id" class="form-control" id="basic-select">
                                <option selected disabled>-- Select Instructor</option>
                                <option disabled>________________________</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} -> {{ $user->email }}</option>
                                @endforeach
                              </select>
                           </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="input-1">Assign Unit</label>
                            <select name="unit_id" class="form-control" id="basic-select">
                                <option selected disabled>-- Select Unit </option>
                                <option disabled>________________________</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                              </select>
                           </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Assign</button>
            </div>
        </form>
      </div> 
    </div>
  </div>

  <hr>

  {{-- Tabs from here 
  <div class="row">
    <div class="col-lg-12">
       <div class="card">
        <div class="card-header text-uppercase">
          <i class="fa fa-table"></i> Unit Assignment
          <button class="btn btn-info px-2 m-1 float-right" data-toggle="modal" data-target="#assignUnit">
              <i class="fa fa-plus"></i> 
              Assign Instructor
          </button>
         
          </div>
          <div class="card-body"> 
            <ul class="nav nav-tabs nav-tabs-info nav-justified">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabe-13"><i class="icon-home"></i> <span class="hidden-xs">Home</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabe-14"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
              </li>
      <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabe-15"><i class="icon-envelope-open"></i> <span class="hidden-xs">Message</span></a>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void();"><i class="icon-settings"></i> <span class="hidden-xs">Setting</span></a>
      <div class="dropdown-menu">
        <a class="dropdown-item" data-toggle="tab" href="#tabe-16">Link 1</a>
        <a class="dropdown-item" href="javascript:void();">Link 2</a>
        <a class="dropdown-item" href="javascript:void();">Link 3</a>
      </div>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="tabe-13" class="container tab-pane active">
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
      <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet</p>
              </div>
              <div id="tabe-14" class="container tab-pane fade">
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
              </div>
      <div id="tabe-15" class="container tab-pane fade">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
              </div>
              <div id="tabe-16" class="container tab-pane fade">
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
              </div>
            </div>
          </div>
       </div>

    </div>
  </div>
  --}}

@endsection