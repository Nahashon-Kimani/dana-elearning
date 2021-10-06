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
    <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#message">Send Message</button>
 </div>
 </div>

<div class="row table">
    @foreach ($msgs as $key=>$msg)
        <div class="col-xs-12 col-sm-6 col-md-4 table-cell">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-info">{{ $key + 1 }}. {{ $msg->title }}</h5>
                        <p class="card-text text-justify">
                            {!! $msg->details !!}
                        </p>
                    <hr>
                    {{-- <button class="btn btn-danger m-1 waves-effect float-right btn-sm" data-toggle="modal" data-target="#confirmDelete">
                      <i class="fa fa-trash mr-1"></i> Delete
                    </button> --}}

                    <form action="{{ route('student.message.destroy', $msg->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn gradient-blooker text-white float-right waves-effect waves-light">
                        <i class="fa fa-trash mr-1"></i> Yes, Delete
                      </button>
                    </form>
            </div>
            </div>
        </div>
    @endforeach
</div>


{{-- Message Modal --}}
<div class="modal fade" id="message">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-warning">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white text-uppercase"><i class="fa fa-star"></i> Send us a message</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
             
<div class="card-body">
<div class="card-title text-uppercase">create new unit</div>
<hr>
    <form action="{{ route('student.message.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="input-13">Message Title</label>
            <input type="text" name="title" class="form-control form-control-square" id="input-13" placeholder="Enter Message Title" required>
            </div>
            <div class="form-group">
                <label for="input-14">Message Details</label>
                <textarea name="details" class="form-control form-control-square" rows="5" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          <button type="submit" class="btn btn-warning"><i class="fa fa-check-square-o"></i> Post</button>
        </div>
        </form>
      </div>
    </div>
  </div><!--End Modal -->


  {{-- Confirm Delete modal --}}
  <div class="modal fade" id="confirmDelete" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-danger">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white"><i class="fa fa-star"></i> Modal title</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST">
          @csrf
          @method('DELETE')
            <div class="modal-body">
              <p class="text-center">Are you sure you want to delete thee messsage?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-inverse-danger" data-dismiss="modal"><i class="fa fa-times"></i> No, Cancel</button>
              <button type="submit" class="btn btn-danger  waves-effect waves-light"><i class="fa fa-trash mr-1"></i> Yes, Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection