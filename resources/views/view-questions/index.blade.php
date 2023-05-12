@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                   <strong>Questions to Approve.</strong>
                </div>
            </div>
            <div class="card-body">

            @include('inc.messages') <!-- Show messages here -->
            
            @if(count($vqs) > 0)
                <div class="table-responsive">
                    <table class="table table-sm table-hover" style="white-space:nowrap;">
                        <tr>
                            <th>Question</th>
                            <th>About</th>
                            <th>Quiz</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    @foreach($vqs as $vq)
                        <tr>
                            <td>{{ $vq->question }}</td>
                            <td>{{ $vq->about }}</td>
                            <td>{{ $vq->quiz_no }}</td>
                            <td>
                            @if($vq->type == 1)
                                Multiple Choice
                            @else
                                True or False
                            @endif
                            </td>
                           
                            <td>

                                <div class="btn-group">

                                    <button title="disapproved" type="button" class="btn btn-sm btn-outline-danger" id="disapproved" data-id="{{ $vq->id }}" data-q_no="{{ $vq->quiz_no }}" data-about="{{ $vq->about }}" data-question="{{ $vq->question }}" data-about="{{ $vq->about }}" data-under="{{ $vq->under }}">
                                        <i class="fas fa-times"></i>
                                    </button>

                                    <button title="Approved" type="button" class="btn btn-sm btn-outline-success" id="approved" data-id="{{ $vq->id }}" data-question="{{ $vq->question }}" data-about="{{ $vq->about }}">
                                        <i class="fas fa-check"></i>
                                    </button>

                                </div>

                            </td>
                        </tr>
                    @endforeach

                    </table>
                </div>

            @else
                <p class="text-muted">No Question.</p>
            @endif

            </div>
        </div>
    </div>
</div>




<!-- Script for Approved -->
<script>
    $(document).ready(function() {
        /**
        * for showing return item popup
        */
        $(document).on('click', "#approved", function() {
            $(this).addClass('approved-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            // var options = {
            //     'backdrop': 'static'
            // };

            $('#approved-modal').modal("show")
        })

        // on modal show
        $('#approved-modal').on('show.bs.modal', function() {
            var el = $(".approved-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");
            
            // get the data
            var approved_id = el.data('id');
            var approved_question = el.data('question');
            var approved_about = el.data('about');
          
            // fill the data in the input fields
            $("#approved_id").val(approved_id);
            $("#approved_question").html(approved_question);
            $("#approved_about").html(approved_about);
            
        })

        // on modal hide
        $('#approved-modal').on('hide.bs.modal', function() {
            $('.approved-trigger-clicked').removeClass('approved-trigger-clicked')
            $("#approved-form").trigger("reset");
        })
    })
</script>
<!-- End Script for approved -->

<!-- approved Modal -->
<div class="modal fade" id="approved-modal" tabindex="-1" aria-labelledby="approved-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="activate-modal-label">
                    Approved?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="approved-form" class="form-horizontal" method="POST" action="{{ route('approved') }}">
                @csrf

                <div class="modal-body" id="attachment-body-content">
                   
                    <input type="hidden" name="approved_id" id="approved_id">

                    <p>
                        <strong>Quetion: </strong><i id="approved_question"></i>
                    </p>

                    <p>
                        <strong>About: </strong><i id="approved_about"></i>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="approved-button">
                        <i class="fas fa-check"></i>
                        Approved
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- End approved Modal -->

<script>
    $('#approved-form').submit(function(){
        $("#approved-button", this)
            .html('<i class="fas fa-spinner fa-spin"></i> Please Wait...')
            .attr('disabled', 'disabled');
        return true;
    });
</script>

<!-- Script for disapproved -->
<script>
    $(document).ready(function() {
        /**
        * for showing return item popup
        */
        $(document).on('click', "#disapproved", function() {
            $(this).addClass('disapproved-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            
            // var options = {
            //     'backdrop': 'static'
            // };

            $('#disapproved-modal').modal("show")
        })

        // on modal show
        $('#disapproved-modal').on('show.bs.modal', function() {
            var el = $(".disapproved-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");
    
            // get the data
            var disapproved_id = el.data('id');
            var disapproved_q_no = el.data('q_no');
            var disapproved_question = el.data('question');
            var disapproved_about = el.data('about');
            var disapproved_under = el.data('under');
            
            // fill the data in the input fields
            $("#disapproved_id").val(disapproved_id);
            $("#disapproved_q_no").val(disapproved_q_no);
            $("#disapproved_question").val(disapproved_question);
            $("#disapproved_about").val(disapproved_about);
            $("#disapproved_under").val(disapproved_under);
            $("#disapproved_question1").html(disapproved_question);
            $("#disapproved_about1").html(disapproved_about);
        })

        // on modal hide
        $('#disapproved-modal').on('hide.bs.modal', function() {
            $('.disapproved-trigger-clicked').removeClass('disapproved-trigger-clicked')
            $("#disapproved-form").trigger("reset");
        })
    })
</script>
<!-- End Script for disapproved -->

<!-- disapproved Modal -->
<div class="modal fade" id="disapproved-modal" tabindex="-1" aria-labelledby="disapproved-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="disapproved-modal-label">
                    Disapproved?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="disapproved-form" class="form-horizontal" method="POST" action="{{ route('disapproved') }}">
                @csrf

                <div class="modal-body" id="attachment-body-content">
                   
                    <input type="hidden" name="disapproved_id" id="disapproved_id">
                    <input type="hidden" name="disapproved_q_no" id="disapproved_q_no">
                    <input type="hidden" name="disapproved_question" id="disapproved_question">
                    <input type="hidden" name="disapproved_about" id="disapproved_about">
                    <input type="hidden" name="disapproved_under" id="disapproved_under">

                    <p>
                        <strong>Question: </strong><i id="disapproved_question1"></i>
                    </p>

                    <p>
                        <strong>About: </strong><i id="disapproved_about1"></i>
                    </p>

                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="comment" id="comment" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" id="disapproved-button">
                        <i class="fas fa-times"></i>
                        Disapproved
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- End Deactdisapprovedivate Modal -->

<script>
    $('#disapproved-form').submit(function(){
        $("#disapproved-button", this)
            .html('<i class="fas fa-spinner fa-spin"></i> Please Wait...')
            .attr('disabled', 'disabled');
        return true;
    });
</script>

@endsection
