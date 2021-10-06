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


 <form action="{{ route('admin.payments.update', $pay->id) }}" method="post">
    @csrf
    @method('PUT')

 <div class="card">
    <div class="card-body">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h4>
                Invoice
                <small>DNS-
                    @if ($pay->id < 10)
                       00{{ $pay->id }}                        
                    @elseif($pay->id < 100)
                       0{{ $pay->id }}
                    @else 
                        {{ $pay->id }}
                    @endif
                </small>
              </h4>
            </section>

            <!-- Main content -->
            <section class="invoice">
              <!-- title row -->
              <div class="row mt-3">
                <div class="col-lg-6 text-uppercase">
                  <h4><i class="fa fa-university"></i> Dana School </h4>
                </div>
                <div class="col-lg-6">
                 <h5 class="float-sm-right">Date: {{ date('dS-F-Y', strtotime($pay->updated_at)+10800) }}</h5>
                </div>
              </div>
              
              <hr>
              <div class="row invoice-info">
                <div class="col-sm-8 invoice-col">
                  From
                  <address>
                   <strong>{{ $pay->paidBy->name }}</strong><br>
                    Email: {{ $pay->paidBy->email }}<br>
                    Phone: {{ $pay->paidBy->phone_no }}<br>
                  </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>DANA SCHOOL</strong><br>
                    Nairobi<br>
                    Phone: (555) 539-1444<br>
                    Email: info@danaschool.com
                  </address>
                </div><!-- /.col -->
              </div><!-- /.row -->
            <hr>
              <!-- Table row -->
              <div class="row my-5">
                <div class="col-12">
                  <p class="lead text-center">
                      In payment for <span class="text-uppercase"><strong>{{ $pay->courses->name }}</strong></span> 
                  </p>
                </div><!-- /.col -->
              </div><!-- /.row -->
            <hr>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-lg-6 payment-icons">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{ asset('backend/assets/images/payment-icons/visa-dark.png') }}" alt="Visa">
                  <img src="{{ asset('backend/assets/images/payment-icons/paypal-dark.png') }}" alt="Paypal">
                  <p class="text-muted bg-light p-2 mt-3 border rounded">
                    Thank you. Enjoy your learning with us!!!!!!
                  </p>
                </div><!-- /.col -->
                <div class="col-lg-6">
                  <p class="lead">Received On: {{ date('dS-F-Y', strtotime($pay->updated_at)+10800) }}</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th style="width:50%">Received:</th>
                        <td>
                            {{ $pay->amount }}
                        </td>
                      </tr>
                      <tr>
                          <td>M-Pesa Reference Number: </td>
                          <td>
                            <span class="text-uppercase">
                               <strong>{{ $pay->mpesa_code }}</strong>
                            </span>
                          </td>
                      </tr>
                      <tr>
                        <th>Course Payable Amount:</th>
                        <td>Ksh. {{ $pay->courses->cost }}</td>
                      </tr>
                    </tbody>
                    </table>
                  </div>
                </div><!-- /.col -->
              </div><!-- /.row -->

              <!-- this row will not appear when printing -->
              <hr>
              <div class="row no-print">
                <div class="col-lg-3">
                  <a href="javascript:window.print();" target="_blank" class="btn btn-outline-secondary m-1"><i class="fa fa-print"></i> Print</a>
                  </div>
                  <div class="col-lg-9">
                  <div class="float-sm-right">
                   {{-- <button type="submit" class="btn btn-success m-1"><i class="fa fa-credit-card"></i> Submit Payment</button> --}}
                   {{-- <button class="btn btn-primary m-1"><i class="fa fa-download"></i> Generate PDF</button> --}}
                  </div>
                </div>
              </div>
            </section><!-- /.content -->
    </div>
 </div>
</form>
 @endsection