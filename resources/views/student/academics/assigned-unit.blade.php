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


{{-- My Active Allocated Units --}}
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header text-uppercase bg-info text-white">
            <i class="fa fa-table"></i> Active Allocated Units

            {{-- The modal is actually hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
            <button class="btn btn-info m-1 px-3 float-right" data-toggle="modal" data-target="#requestUnit">
                <i class="fa fa-paper-plane"></i> Request a Unit
            </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UNIT NAME</th>
                    <th>DATE ALLOCATED</th>
                    <th>RESUME</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($activeAllocatedUnits as $key=>$myUnit)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $myUnit->units->name }}</td>
                            <td>{{ date('dS-M-Y', strtotime($myUnit->created_at)) }}</td>
                            <td>
                              {{-- 
                                if access has been given upto a given date 
                                then the student should not be able to access materials past that.
                              --}}
                                @if (($myUnit->access_upto) <= (date('Y-m-d')))
                                <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#newPayment"> New Payment</button>
                                @else
                                  <a href="{{ route('student.lesson-list', $myUnit->units_id) }}" 
                                    class="btn btn-info">Resume Learning</a> 
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
                                   <span><strong>Info!</strong> You have no allocated Unit.</span>
                                 </div>
                               </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>UNIT NAME</th>
                    <th>DATE ALLOCATED</th>
                    <th>RESUME</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
      </div>
    </div>
</div><!-- End Row-->

<hr>
{{-- All Units that I have ever been allocated --}}
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header text-uppercase">
            <i class="fa fa-table"></i> Completed Units

        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UNIT NAME</th>
                    <th>MONTH</th>
                    <th>DATE ALLOCATED</th>
                    <th>COMPLETION DATE</th>
                </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>ID</th>
                  <th>UNIT NAME</th>
                  <th>MONTH</th>
                  <th>DATE ALLOCATED</th>
                  <th>COMPLETION DATE</th>
              </tr>
            </tfoot>
                <tbody>
                    @forelse ($allocatedUnits as $key=>$unit)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $unit->units->name }}</td>
                            <td>{{ date('F', strtotime($unit->created_at)) }}</td>
                            <td>{{ date('dS-M-y', strtotime($unit->created_at)) }}</td>
                            <td>{{ date('dS-M-y', strtotime($unit->updated_at)) }}</td>
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
                                   <span><strong>Info!</strong> You have not been allocated any Unit.</span>
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

<div class="modal fade" id="requestUnit" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-info">
        <div class="modal-header bg-info">
          <h5 class="modal-title text-white"><i class="fa fa-star"></i> Reuest for a unit</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('student.message.request-unit') }}" method="post">
            @csrf
         <div class="modal-body">
             <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="input-13"> Select Month </label>
                    <select name="month_id" id="" class="form-control form-control-square">
                        <option value="{{ date('m') }}" selected>{{ date('F') }}</option>
                        {{-- @for ($i = 1; $i < 13; $i++)
                            <option value="{{ $i }}">{{ date('F', strtotime($i + 1)) }}</option>
                        @endfor --}}
                        <option disabled>_____________</option>
                        <option> January</option>
                        <option> February</option>
                        <option> March</option>
                        <option> April</option>
                        <option> May</option>
                        <option> June</option>
                        <option> July</option>
                        <option> August</option>
                        <option> September</option>
                        <option> October</option>
                        <option> November</option>
                        <option> December</option>
                    </select>
                   </div>

                   <div class="form-group col-sm-6">
                    <label for="input-13"> Select Unit </label>
                    <select name="unit_id" id="" class="form-control form-control-square">
                        <option selected disabled>-- Select Suggest Unit --</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->name }}">{{ $unit->name }}</option>
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


{{-- Payment Modal --}}
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