<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Student Details - {{ $student->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <style>
      .bg-gradient {
        background: linear-gradient(90deg, #2563eb 0%, #7c3aed 100%);
      }
      .bg-gradient-accent {
        background: linear-gradient(90deg, #60a5fa, #8b5cf6);
      }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a href="{{ route('students.index') }}" class="navbar-brand fw-bold">
            <i class="bi bi-people-fill me-2"></i>Student Club
        </a>
    </div>
</nav>

<div class="container py-5">
    <div class="rounded shadow p-4 mb-4 text-dark bg-gradient d-flex align-items-center gap-3">
        <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold bg-gradient-accent" 
             style="width: 56px; height: 56px; font-size: 2rem;">
            {{ strtoupper(substr($student->name, 0, 1)) }}
        </div>
        <div>
            <h1 class="h3 mb-1">{{ $student->name }}</h1>
            <p class="mb-1 text-muted">{{ $student->full_name }}</p>
            <p class="text-dark-50 mb-0">{{ $student->email }}</p>
        </div>
        <div class="ms-auto text-white text-end">
            <p class="mb-0 small opacity-75">Student ID</p>
            <p class="h5 fw-bold mb-0">{{ $student->student_id }}</p>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Department</dt>
                <dd class="col-sm-9">{{ $student->department ?? '-' }}</dd>

                <dt class="col-sm-3">Year</dt>
                <dd class="col-sm-9">{{ $student->year ?? '-' }}</dd>

                <dt class="col-sm-3">Phone</dt>
                <dd class="col-sm-9">{{ $student->phone ?? '-' }}</dd>

                <dt class="col-sm-3">Date of Birth</dt>
                <dd class="col-sm-9">{{ $student->date_of_birth ?? '-' }}</dd>

                <dt class="col-sm-3">Address</dt>
                <dd class="col-sm-9">{{ $student->address ?? '-' }}</dd>

                <dt class="col-sm-3">Interests / Skills</dt>
                <dd class="col-sm-9">{{ $student->interests ?? '-' }}</dd>
            </dl>
        </div>
    </div>

    <div class="d-flex gap-2 flex-wrap">
        <a href="{{ route('students.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i> Back to Students
        </a>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info text-white d-flex align-items-center gap-2">
            <i class="bi bi-pencil"></i> Edit Student
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
