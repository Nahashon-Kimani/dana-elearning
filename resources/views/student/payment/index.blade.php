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
            <i class="fa fa-table"></i> {{ Auth::user()->name }} Payment history
            <button class="btn btn-info m-1 text-uppercase float-right" data-toggle="modal" data-target="#newPayment">Make new Payment</button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DATE PAID</th>
                    <th>AMOUNT</th>
                    <th>STATUS</th>
                    <th>COURSE</th>
                </tr>
            </thead>
               <tbody>
                   @forelse ($pays as $key=>$pay)
                       <tr>
                           <td>{{ $key + 1 }}</td>
                           <td>{{ date('d-M-Y', strtotime($pay->created_at)) }}</td>
                           <td>
                             @if ($pay->amount == 0)
                                 <span class="badge badge-warning"><i class="fa fa-times"></i> </span>
                             @else
                                 Ksh {{ $pay->amount }}
                             @endif
                           </td>
                           <td>
                               @if ($pay->status == 0)
                                    <span class="badge badge-warning m-1">
                                        {{-- <i class="fa fa-times"></i> --}}
                                        Not Approved
                                    </span>                                   
                               @else
                                <span class="badge badge-info m-1">
                                    <i class="fa fa-check"></i>
                                </span>
                               @endif
                           </td>
                           <td>{{ $pay->courses->name }}</td>
                       </tr>
                   @empty
                       <tr>
                         <td colspan="5" class="text-center">
                          <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                             <div class="alert-icon">
                            <i class="icon-info"></i>
                             </div>
                             <div class="alert-message">
                               <span><strong>Info!</strong> No Payment Done.</span>
                             </div>
                          </div>
                         </td>
                       </tr>
                   @endforelse
               </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>DATE PAID</th>
                    <th>AMOUNT</th>
                    <th>STATUS</th>
                    <th>COURSE</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
        <strong><p class="h5 ml-5">Total Amount: Ksh. {{ $totalPay }}</p></strong>
        {{-- Adding paginations --}}
        {!! $pays->links() !!}
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
        <form action="{{ route('student.payments.store') }}" method="post">
          @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="input-13"> M-Pesa Transaction Code </label>
                <input name="mpesa_code" type="text" class="form-control form-control-square text-uppercase" required placeholder="PXD0123456TY">
               </div>

               <div class="form-group col-sm-6">
                <label for="input-13"> Select Course </label>
                <select name="course_id" id="" class="form-control form-control-square">
                    <option selected disabled>-- Select Course --</option>
                    @foreach ($myCourses as $course)
                        <option value="{{ $course->course_id }}">{{ $course->courses->name }}</option>
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