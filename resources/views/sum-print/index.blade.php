@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                  
                    <div class="col-md-100%">
                        <form method="get" action="{{ route('search.sum') }}">
                            <div class="input-group">
                                <table width="100%">
                                    <tr>
                                        <td>
                                        <input placeholder="search..." type="text" class="form-control" name="search" required>
                                        </td>
                                        <td>
                                        <button type="submit" class="btn btn-secondary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        </td>
                                        <td>
                                        <p>
                                            <a style="text" href="{{ route('print.sum', ['search' => $search]) }}" class="btn btn-info btnPrint"><i class="fas fa-print"></i> PRINT</a>
                                        </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="card-body">
            @if(count($srs) > 0)

                <table class="table table-hover table-responsive" style="white-space:nowrap;">
                    <tr class="bg-info text-white">
                        <th>Full Name</th>
                        <th>Remarks</th>
                        <th>Quiz</th>
                        <th>Date</th>
                    </tr>
                @foreach($srs as $sr)
                    <tr>
                        <td>{{ $sr->fullName }}</td>
                        <td>{{ $sr->remark }}</td>
                        <td>{{ $sr->quiz_passed }}</td>
                        <td>{{ $sr->created_at }}</td>
                    </tr>
                @endforeach

                </table>
                <p>
                    {{ $srs->links() }}
                </p>
            @else
                <p class="text-muted">No item found!</p>
            @endif

            </div>
        </div>
    </div>
</div>

@endsection
