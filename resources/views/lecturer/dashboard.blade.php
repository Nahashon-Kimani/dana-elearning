@extends('layouts.backend.index')

@section('content')

<p>welcome back {{ Auth::user()->name }}</p>

<div class="row mt-3">
    <div class="col-12 col-md-4">
      <div class="card bg-pattern-primary">
        <div class="card-body">
          <div class="media align-items-center">
          <div class="media-body text-left">
            <h4 class="text-white mb-0">{{ $lessonsUploaded }}</h4>
            <span class="text-white">Uploaded Lessons</span>
          </div>
          <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
            <i class="icon-basket-loaded text-white"></i></div>
         </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card bg-pattern-success">
        <div class="card-body">
          <div class="media align-items-center">
          <div class="media-body text-left">
            <h4 class="text-white mb-0">{{ $allocatedUnits->count() }}</h4>
            <span class="text-white">Units Assigned</span>
          </div>
          <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
            <i class="icon-pie-chart text-white"></i></div>
        </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card bg-pattern-warning">
        <div class="card-body">
          <div class="media align-items-center">
          <div class="media-body text-left">
            <h4 class="text-white mb-0">{{count($myMessages) }}</h4>
            <span class="text-white">Messages</span>
          </div>
          <div class="align-self-center w-circle-icon rounded-circle bg-contrast">
            <i class="icon-user text-white"></i></div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
      <div class="col-12 col-sm-7">
        <div class="card card-info">
            <div class="card-header text-uppercase">Unanswered Questions</div>
            <div class="card-body">
			  <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      {{-- <th scope="col">ID</th> --}}
                      <th scope="col">TITLE</th>
                      {{-- <th scope="col">COURSE</th> --}}
                      <th scope="col">SENT AT</th>
                      <th scope="col">ACTION</th>
                    </tr>
                  </thead>
                 <tbody>
                     @forelse ($unAnsweredQuestion as $key=>$qn)
                         <tr>
                             {{-- <td>{{ $key + 1 }}</td> --}}
                             <td>{{ $qn->subject }}</td>
                             {{-- <td>{{ $qn->questions->name }}</td> --}}
                             <td>
                                 <span class="badge badge-warning m-1">{{ $qn->created_at->diffForHumans() }}</span>
                             </td>
                             <td>
                                 <a href="{{ route('lecturer.question.edit', $qn->id) }}"
                                    class="btn btn-info btn-square waves-effect waves-light m-1">
                                    Answer
                                 </a>
                             </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="5" class="text-center py-2">
                                <div class="alert alert-icon-info alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <div class="alert-icon icon-part-info">
                                  <i class="icon-info"></i>
                                  </div>
                                  <div class="alert-message">
                                    <span><strong>Info!</strong> Hurray, No Unanswered Questions. </span>
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

      <div class="col-12 col-sm-5">
          <div class="card card-info">
            <div class="card-header bg-info">
              <div class="card-title text-white">My Messages</div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                   <thead>
                     <tr>
                       <th scope="col">TITLE</th>
                       <th scope="col">ACTION</th>
                     </tr>
                   </thead>
                   <tbody>
                     @forelse ($myMessages as $key=>$message)
                         <tr>
                           <td>
                             {{-- {{ $message->title }}  --}}
                             {{ Str::limit($message->title, 15, '') }} <br>
                             <span class="badge badge-warning m-1">{{ $message->created_at->diffForHumans() }}</span>
                           </td>
                           <td>
                             <a href="{{ route('lecturer.message.read', $message->id) }}" class="btn btn-info px-3 shadow-ifo">
                                Read Message
                             </a>
                           </td>
                         </tr>
                     @empty
                        <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="alert-icon contrast-alert">
                          <i class="icon-info"></i>
                          </div>
                          <div class="alert-message">
                            <span><strong>Info!</strong> No any new Message.</span>
                          </div>
                        </div>
                     @endforelse
                   </tbody>
                 </table>
             </div>
            </div>
          </div>
      </div>
  </div>


  {{-- Unit Allocation Table --}}
  <div class="row mt-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header text-uppercase">
            <i class="fa fa-table"></i> {{ Auth::user()->name }} Allocated Units
            <small><span class="text-warning"><em>(Active)</em></span></small>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="default-datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UNIT</th>
                    <th>ALLOCATED ON</th>
                    <th>ACTION</th>
                </tr>
            </thead>
               <tbody>
                 @forelse ($allocatedUnits as $key=>$unit)
                     <tr>
                       <td>{{ $key + 1 }}</td>
                       <td>{{ $unit->units->name }}</td>
                       <td>{{ date('dS-M-Y', strtotime($unit->created_at)) }}</td>
                       <td>
                         <a href="{{ route('lecturer.instructor-unit.show', $unit->id) }}" 
                          class="btn btn-info px-2 btn-square text-uppercase">View</a>
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
                              <span><strong>Info!</strong> No Assigned Unit.</span>
                            </div>
                          </div>
                       </td>
                     </tr>
                 @endforelse
               </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>UNIT</th>
                    <th>ALLOCATED ON</th>
                    <th>ACTION</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div><!-- End Row-->
  
    
@endsection