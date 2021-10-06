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
            <i class="fa fa-table"></i> All Message 
            {{-- <a href="{{ route('admin.message.create') }}" class="btn btn-info float-right text-right">
                <i class="fa fa-plus"> New message</i>
            </a> --}}
            <button class="btn btn-info float-right" data-toggle="modal" data-target="#message">
              Send Messsage
            </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>ASKED BY</th>
                    <th>STATUS</th>
                    <th>REPLIED BY</th>
                    <th>ASKED ON</th>
                    <th>ACTION</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($msgs as $key=>$msg)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ Str::limit($msg->title, 25, '..') }}</td>
                            <td>{{ $msg->askedBy->name }}</td>
                            <td>
                                @if ($msg->status == 0)
                                    <span class="badge badge-warning m-1"><i class="fa fa-times-circle"></i> </span>
                                @else
                                    <span class="badge badge-info m-1"><i class="fa fa-check-circle"></i></span>
                                @endif
                            </td>
                            <td>
                                @if ($msg->replied_by == 0)
                                    <span class="badge badge-warning m-1">Not Replied</span>
                                @else
                                    {{ $msg->repliedBy->name }}
                                @endif
                            </td>
                            <td>
                                {{-- {{ date('dS-M-Y H:i:s', strtotime($msg->created_at)) }}  --}}
                                {{ date('d-M-Y', strtotime($msg->created_at)) }} 
                                {{-- <span class="badge badge-info m-1">
                                    {{ $msg->created_at->diffForHumans() }}
                                </span> --}}
                            </td>
                            <td>
                                <div class="btn-group m-1" role="group">
                                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" 
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      ACTION
                                    </button>
                                    <div class="dropdown-menu">
                                      {{-- <a href="{{ route('admin.message.edit', $msg->id) }}" class="dropdown-item">REPLY</a>
                                        <div class="dropdown-divider"></div> --}}
                                      <form action="{{ route('admin.message.ignore', $msg->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="msg_id" value="{{ $msg->id }}">
                                        <button type="submit" class="dropdown-item">MARK REPLIED</button>
                                      </form>
                                        <div class="dropdown-divider"></div>
                                        @if ($msg->askedBy->role_id == 3)
                                            <form action="{{ route('admin.message.student-message-show', $msg->id) }}" method="post">
                                              @csrf
                                              @method('PUT')
                                              <input type="hidden" name="student_id" value="{{ $msg->asked_by }}">
                                              <button type="submit" class="dropdown-item">VIEW/REPLY</button>
                                            </form>
                                        @else
                                          <a href="{{ route('admin.message.show', $msg->id) }}" class="dropdown-item">VIEW/REPLY</a>
                                        @endif
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>ASKED BY</th>
                    <th>STATUS</th>
                    <th>REPLIED BY</th>
                    <th>ASKED ON</th>
                    <th>ACTION</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
        <div class="card-footer text-right">
          {{ $msgs->links() }}
        </div>
      </div>
    </div>
  </div><!-- End Row-->

  {{-- ================================= Id should be message =====--}}
  <div class="modal animated bounceIn modal-warning" id="message" style="display: none;" aria-hidden="true"> 
    <div class="modal-dialog modal-lg modal-dialog-centered modal-">
      <div class="modal-content border-warning">
        <div class="modal-header bg-warning">
          <h5 class="modal-title"><i class="fa fa-star"></i> Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('admin.message.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <div class="form-row">
                <div class="col-sm-6">
                  <label for="input-13">Target Person</label>
                    <select class="form-control" name="target_user" id="basic-select">
                      <option value="all-students">All Students</option>
                      <option value="all-lecturers">All Lecturers</option>
                      <option disabled>__________________</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} -> {{ $user->email }}</option>
                        @endforeach
                </select>
             </div>

             <div class="col-sm-6">
              <label for="title">Messsage Title</label>
               <input type="text" name="title" class="form-control">
             </div>
                </div>
              </div>

             <div class="form-group">
              <label for="input-13">Message Description</label>
              <textarea name="desc" id="summernote" class="form-control form-control-square"></textarea>
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Send Message</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection