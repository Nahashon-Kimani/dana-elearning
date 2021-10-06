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
    <a href="{{ route('student.question.index') }}" class="btn btn-outline-primary waves-effect waves-light"> <i class="fa fa-home"></i> Home</a>
    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" data-toggle="modal" data-target="#newQuestion">Post a new question</a>
        <div class="dropdown-divider"></div>
      <a href="{{ route('student.question.all-questions') }}" class="dropdown-item">View All Questions</a>
    </div>
  </div>
 </div>
 </div>

<div class="row table">
    @forelse ($questions as $key=>$question)
        <div class="col-lg-12 table-cell">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <p class="h6">Question by: {{ $question->users->name }}</p>
                    <h5 class="card-title text-white">{{ $key + 1 }}. {{ $question->subject }}</h5>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-xs-2 border-right border-info">Question: </div>
                            <div class="col-xs-10 ml-3">
                                <p class="card-text">{!! $question->details !!}</p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <p class="bg-info">
                                @if ($question->answered_by == NULL)
                                    <span class="badge badge-warning m-1">Not Answered</span>
                                @else
                                    Answered by: Tr. {{ $question->repliedBy->name }}
                                @endif
                            </p>

                            <div class="col-sm-10 mx-auto">
                                <p class="card-text">{!! $question->answer !!}</p>
                            </div>
                        </div>

                    <hr>
                <form action="{{ route('student.question.destroy', $question->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning  waves-effect waves-light float-right btn-sm">
                        <i class="fa fa-trash mr-1"></i>
                            Delete
                    </button>
                </form>
            </div>
            </div>
        </div>
        <div class="float-right">
            {!! $questions->links() !!}
        </div>
        @empty

        <div class="col-sm-9 mx-auto">
            <div class="card">
                <div class="card-header bg-warning text-uppercase">
                    <h5 class="card-title text-primary">No question Asked</h5>
                </div>
              <div class="card-body">
                    <p class="card-text text-center">
                        No question asked yet. <br>
                        click here to ask a new question
                    </p>
                 {{-- <hr> --}}
              </div>
                <div class="card-footer">
                   <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('student.question.all-questions') }}"
                                class="btn btn-info shadow-info m-1"> View all questions</a>
                        </div>

                        <div class="col-xs-6">
                            <button class="btn btn-warning m-1 text-uppercase text-white"
                                 data-toggle="modal" data-target="#newQuestion">
                                   Ask a new question
                            </button>
                        </div>
                   </div>
                </div>
            </div>
          </div>

    @endforelse
</div>


<!--Warning Modal -->
{{-- <button class="btn btn-warning m-1" data-toggle="modal" data-target="#newQuestion">Warning</button> --}}
<div class="modal fade" id="newQuestion">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-warning">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-white text-uppercase"><i class="fa fa-star"></i> Ask a new question</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('student.question.store') }}" method="POST">
            @csrf
           <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="input-13">Question Title</label>
                <input name="title" class="form-control form-control-square" type="text"  id="input-13" placeholder="Question Title">
            </div>

            <div class="form-group col-sm-6">
                <label for="input-13">Select Course</label>
                <select name="course_id" class="form-control form-control-square">
                    <option disabled selected>-- Select Course --</option>
                    <option disabled>_____________________________</option>
                    @foreach ($myCourses as $myCourse)
                        <option value="{{ $myCourse->id }}">{{ $myCourse->courses->name }}</option>
                    @endforeach
                </select>
            </div>
           </div>

                <div class="form-group">
                    <label for="input-14">Question Details</label>
                    <textarea name="desc" id="summernote" cols="30" rows="10"></textarea>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-inverse-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn btn-warning"><i class="fa fa-check-square-o"></i> Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--End Modal -->

@endsection