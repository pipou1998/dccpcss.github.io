@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                <strong>APPROVED</strong>
                </div>
            </div>
            <div class="card-body">

            @include('inc.messages') <!-- Show messages here -->
            
            @if(count($viewdis) > 0)
                <div class="table-responsive">
                    <table class="table table-sm table-hover" style="white-space:nowrap;">
                        <tr>
                            <th>Quiz No.</th>
                            <th>Question</th>
                            <th>About</th>
                            <th>Created At</th>
                        </tr>
                    @foreach($viewdis as $i)
                        <tr>
                            <td>{{ $i->quiz_no }}</td>
                            <td>{{ $i->question }}</td>
                            <td>{{ $i->about }}</td>
                            <td>
                                {{ date('d-m-Y', strtotime($i->created_at)) }}
                                {{ date('h:i A', strtotime($i->created_at)) }}
                            </td>
                        </tr>
                    @endforeach

                    </table>
                </div>
            @else
                <p class="text-muted">No Approved.</p>
            @endif

            </div>
        </div>
    </div>
</div>
@endsection
