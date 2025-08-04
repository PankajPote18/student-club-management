<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Club Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .card { margin-top: 40px; }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Add Member to Club</h3>
        </div>

        <div class="card-body">
            <!-- Validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> Please fix the following:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Add Member Form -->
            <form action="{{ route('members.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="club_id" class="form-label">Select Club</label>
                    <select name="club_id" id="club_id" class="form-select" required>
                        <option value="">-- Choose a club --</option>
                        @foreach($clubs as $club)
                            <option value="{{ $club->id }}">{{ $club->name }} ({{ $club->category ?? 'Type not specified' }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="student_id" class="form-label">Select Student</label>
                    <select name="student_id" id="student_id" class="form-select" required>
                        <option value="">-- Choose a student --</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->email }})</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">➕ Add to Club</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">⬅ Back</a>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
