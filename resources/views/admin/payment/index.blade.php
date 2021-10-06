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
            <i class="fa fa-table"></i> All fee payments 
            <button type="button" class="btn btn-info waves-effect waves-light float-right" data-toggle="modal" data-target="#newPayment"> 
              New Payment
            </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>M-PESA CODE</th>
                    <th>PAID ON</th>
                    <th>PAID BY</th>
                    <th>AMOUNT</th>
                    <th>AUTHORIZED BY</th>
                    <th>AUTHORIZED ON</th>
                    <th><i class="fa fa-check"></i></th>
                </tr>
            </thead>
              <tbody>
                @forelse ($payments as $key=>$pay)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ strtoupper($pay->mpesa_code) }}</td>
                      <td>{{ date('dS-M-Y', strtotime($pay->created_at)+10800) }}</td> {{-- 10800 s added as 3 hours --}}
                      <td>
                        <a href="{{ route('admin.student-payments', $pay->paid_by) }}">{{ $pay->paidBy->name }}</a>
                      </td>
                      <td>
                        @if ($pay->amount == 0)
                            <span class="badge badge-warning m-1"><i class="fa fa-times"></i></span>
                        @else
                            {{ $pay->amount }}
                        @endif
                      </td>
                      <td>
                        @if ($pay->authorised_by == NULL)
                            <span class="badge badge-warning m-1"><i class="fa fa-times"></i></span>
                        @else
                            {{ $pay->authorisedBy->name }}
                        @endif
                      </td>
                      <td>
                            @if ($pay->amount == 0)
                                <span class="badge badge-warning m-1"><i class="fa fa-times"></i></span>
                            @else
                              {{ date('dS-M-Y', strtotime($pay->updated_at)+10800) }}
                            @endif
                        </td>
                        <td>
                          @if ($pay->status == 0)
                            <a href="{{ route('admin.payments.edit', $pay->id) }}"
                              class="btn btn-info m-1 text-uppercase">Authorise</a>
                          @else
                              <span class="badge badge-info m-1"><i class="fa fa-check"></i></span>
                          @endif
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
                  <th>M-PESA CODE</th>
                  <th>PAID ON</th>
                  <th>PAID BY</th>
                  <th>AMOUNT</th>
                  <th>AUTHORIZED BY</th>
                  <th>AUTHORIZED ON</th>
                  <th><i class="fa fa-check"></i></th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
        <div class="row">
          <div class="col-6">{{ $payments->links() }}</div>
          <div class="col-6"><strong><p class="h5 text-right mr-3">Total: Ksh.{{ $totalPayments }}</p></strong></div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->

  {{-- Payment Modal --}}
  <div class="modal fade" id="newPayment" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-info">
        <div class="modal-header bg-info">
          <h5 class="modal-title text-white"><i class="fa fa-star"></i> Modal title</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('admin.payments.store') }}" method="post">
          @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="input-13"> Select Student </label>
            <select name="student_id" class="form-control form-control-square">
              <option selected disabled>-- Select Student --</option>
              @forelse ($students as $student)
                  <option value="{{ $student->id }}">{{ $student->name }}-> {{ $student->email }}</option>
              @empty
                  <option selected disabled>-- No Student Availble -- </option>
              @endforelse
            </select>
           </div>
                  <hr>
                      <small><p>If Cash Money received, leave Mpesa code field blank</p></small>
                  <hr>
          <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="input-13"> M-Pesa Transaction Code </label>
                <input name="mpesa_code" type="text" class="form-control form-control-square text-uppercase" placeholder="PXD0123456TY">
               </div>

               <div class="form-group col-sm-6">
                <label for="input-13"> Select Course </label>
                <select name="course_id" id="" class="form-control form-control-square">
                    <option selected disabled>-- Select Course --</option>
                    @foreach ($allCourses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
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