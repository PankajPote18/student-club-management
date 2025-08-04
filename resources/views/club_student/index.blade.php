<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Club Memberships</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-light">

<div class="container py-4">
    <a href="{{ url('/clubs/4/members/create') }}" class="btn btn-success mb-3">
         Add Member to Club 
    </a>
    <a href="{{ route('students.index') }}" class="btn btn-primary mb-3">
        Go to Students
    </a>
</div>

<div class="container py-4">
    @if(isset($club))
        <h1 class="mb-4">Members of Club: {{ $club->name }} ({{ $club->type ?? 'N/A' }})</h1>

        @if($club->members->isEmpty())
            <div class="alert alert-info">No members found in this club.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Student Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($club->members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->pivot->created_at->format('d M Y') ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    @elseif(isset($memberships))
        <h1 class="mb-4">All Club Memberships</h1>

        @if($memberships->isEmpty())
            <div class="alert alert-info">No memberships found.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Club Name</th>
                        <th>Type</th>
                        <th>Student Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($memberships as $m)
                        <tr>
                            <td>{{ $m->club_name ?? $m->club->name ?? '-' }}</td>
                            <td>{{ $m->type ?? ($m->club->type ?? '-') }}</td>
                            <td>{{ $m->student_name ?? $m->student->name ?? '-' }}</td>
                            <td>{{ $m->email ?? $m->student->email ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    @else
        <div class="alert alert-warning">No data to display.</div>
    @endif
</div>

<!-- Bootstrap Bundle JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
