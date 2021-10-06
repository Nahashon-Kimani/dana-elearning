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
    <div class="col-sm-11 mx-auto">
        <hr>
          <div class="card">
            <div class="card-header">
              <div class="card-title text-uppercase text-info">
                <u>Message Title: {{ $msg->title }}</u> 
              </div>
                <div class="card-title text-uppercase">Message By: {{ $msg->askedBy->name }}</div>
               <div class="card-title text-uppercase">Sent on: {{ date('dS-M-Y', strtotime($msg->created_at)) }}</div>
            </div>
            <div class="card-body">
                
            <p class="text-justify text-warning mb-5">
              {!! $msg->details !!}
            </p>
            <hr>
            {{-- If the sender is a student we need to show their fee payment  --}}
            @if ($msg->askedBy->role_id == 3)
            <p class="h6 text-warning text-body text-center text-uppercase">
              Here is my fee statement
            </p>

            <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header text-uppercase">
                        <i class="fa fa-table"></i> 
                        {{ $msg->askedBy->name }} Fee statement
                        <button class="btn btn-info m-1 float-right" data-toggle="modal" data-target="#assignStudentUnit">
                            <i class="fa fa-check"></i> Assign Unit 
                        </button>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                      <table id="default-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DATE PAID</th>
                                <th>AMOUNT PAID</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>DATE PAID</th>
                                <th>AMOUNT PAID</th>
                                <th>STATUS</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($payments  as $key=>$pay)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                      @if ($pay->amount == 0)
                                        <a href="{{ route('admin.payments.edit', $pay->id) }}">
                                          {{ date('dS-M-Y', strtotime($pay->created_at)) }}
                                        </a>
                                      @else
                                          {{ date('dS-M-Y', strtotime($pay->created_at)) }}
                                      @endif
                                    </td>
                                    <td>{{ $pay->amount }}</td>
                                    <td>
                                        @if ($pay->status == 0)
                                            <span class="badge badge-warning m-1"><i class="fa fa-times"></i></span>
                                        @else
                                            <span class="badge badge-info m-1"><i class="fa fa-check"></i></span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                  <td colspan="4">
                                      <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                          <div class="alert-icon contrast-alert">
                                            <i class="icon-info"></i>
                                          </div>
                                        <div class="alert-message">
                                          <span><strong>Info!</strong> I have not paid anything.</span>
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
            @else
                {{-- Nothing to show --}}
            @endif
            <form action="{{ route('admin.message.update', $msg->id) }}" method="POST">
                @csrf
                @method('PUT')
      
            <div class="form-group">
              <label for="input-2">Answer Here</label>
              <textarea name="answer" id="summernote" cols="30" rows="10"></textarea>
             </div>
            
           </div>
            <div class="card-footer">
              <div class="form-group">
                <a href="{{ route('admin.message.index') }}" class="btn btn-warning shadow-warning btn-square px-5">Cancel</a>
                <button type="submit" class="btn btn-info shadow-info btn-square px-5"><i class="icon-lock"></i> Answer</button>
              </div>
            </div>
          </div>
         </form>
    </div>
</div>

<div class="modal fade" id="assignStudentUnit">
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
            @method('POST')
            <div class="modal-body">
                {{-- Hidden message ID so that we can mark it replied after assigning the unit --}}
                <input type="hidden" name="msg_id" value="{{ $msg->id }}">

                    {{-- Hidden student ID --}}
                    <input type="hidden" name="user_id" value="{{ $msg->asked_by }}">
                        <div class="form-row">
                          {{-- Select unit select box --}}
                          <div class="form-group col-sm-6">
                            <label for="input-1">Assign Unit</label>
                            <select name="unit_id" class="form-control" id="basic-select">
                                <option selected disabled>-- Select Unit </option>
                                <option disabled>________________________</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                              </select>
                           </div>

                           {{-- Assigning access up  --}}
                           <div class="form-group col-sm-6">
                            <label for="input-1">Set access upto</label>
                              <input type="date" name="date" class="form-control">
                           </div>
                        </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Save changes</button>
        </div>
        </form>
      </div>
    </div>
</div>

 @endsection