@extends('layouts.master')

@section('content')

    @include('inc.messages') <!-- Show messages here -->

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">DASHBOARD</a>
        </li>
        <li class="breadcrumb-item active">OVERVIEW</li>
    </ol>
    @if(Auth::user()->role == "ADMIN")
        <div class="card-body">
            <table class="table table-hover table-responsive" style="white-space:nowrap;">
                <tr class="bg-info text-white">
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                @if(count($ins) > 0)
                    @foreach($ins as $sr)
                        <tr>
                            <td> {{ $sr->name }}</td>
                            <td>
                                <a href="{{ route('view.questions', ['id' => $sr->user_id]) }}" title="View Questions"><i class="fas fa-eye fa-lg text-success"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p class="text-muted">No instructor!</p>
                @endif

            </table>
        </div>
    @elseif(Auth::user()->role == "INSTRUCTOR")
        <table class="table table-hover table-responsive" style="white-space:nowrap;">

            <tr class="bg-info text-white">
                <th>Full Name</th>
                <th>Remarks</th>
                <th>Quiz</th>
                <th>Date</th>
            </tr>

            @if(count($stdshow) > 0)
                @foreach($stdshow as $sr)
                    <tr>
                        <td> {{ $sr->fullName }}</td>
                        <td>{{ $sr->remark }}</td>
                        <td>{{ $sr->quiz_passed }}</td>
                        <td> {{ $sr->created_at }}</td>
                    </tr>
                @endforeach
            @else
                <p class="text-muted">No record found!</p>
            @endif
        
        </table>
    
    @elseif(Auth::user()->role == "STUDENT")

        <!-- Icon Cards-->
        <div class="row">

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body" title="Failed">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-times"></i>
                        </div>
                        <div class="mr-5">
                            {{ count($failed) }}
                        </div>
                    </div>

                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">TOTAL FAILED</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>

                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body" title="Failed">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-check"></i>
                        </div>
                        <div class="mr-5">
                            {{ count($passed) }}
                        </div>
                    </div> 

                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">TOTAL PASSED</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    
                </div>
            </div>

        </div>
        <!-- End Icon Cards-->



        <table class="table table-hover table-responsive" style="white-space:nowrap;">

            <tr class="bg-secondary text-white">
                <th>Full Name</th>
                <th>Remarks</th>
                <th>Quiz</th>
                <th>Date</th>
            </tr>

            @if(count($stdlogs) > 0)
                @foreach($stdlogs as $sr)
                    <tr>
                        <td> {{ $sr->fullName }}</td>
                        <td>{{ $sr->remark }}</td>
                        <td>{{ $sr->quiz_passed }}</td>
                        <td> {{ $sr->created_at }}</td>
                    </tr>
                @endforeach
            @else
                <p class="text-muted">No Quiz!</p>
            @endif
        
        </table>

    @else

    @endif

@endsection
