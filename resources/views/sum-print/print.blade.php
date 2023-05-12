<html lang="en">
<head>
    <title>Computer generated</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
        }

        th, td{
            padding: 5px;
        }
    </style>
</head>
<body>

    @if(count($srs) > 0)
        <table class="table" border="1" style="white-space:nowrap;">
            <tr>
                <th colspan="4" align="center">
                    Summary Report
                </th>
            </tr>
            <tr>
                <th>Full Name</th>
                <th>Remarks</th>
                <th>Quiz</th>
                <th>Date</th>
            </tr>

        @foreach ($srs as $sr)
            <tr>
                <td>{{ $sr->fullName }}</td>
                <td>{{ $sr->remark }}</td>
                <td>{{ $sr->quiz_passed }}</td>
                <td>{{ $sr->created_at }}</td>
            </tr>
        @endforeach

        </table>

    @else
        <p class="text-muted">No item found!</p>
    @endif

</body>
</html>