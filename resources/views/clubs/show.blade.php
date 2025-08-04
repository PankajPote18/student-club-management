<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Club Details - {{ $club->name }}</title>
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
        <a href="{{ route('clubs.index') }}" class="navbar-brand fw-bold">
            <i class="bi bi-people-fill me-2"></i>Student Clubs
        </a>
    </div>
</nav>

<div class="container py-5">
    <!-- Club Header -->
    <div class="rounded shadow p-4 mb-4 text-dark bg-gradient d-flex align-items-center gap-3">
        <div class="rounded-circle d-flex align-items-center justify-content-center text-dark fw-bold bg-gradient-accent"
             style="width: 56px; height: 56px; font-size: 2rem;">
            {{ strtoupper(substr($club->name, 0, 1)) }}
        </div>
        <div>
            <h1 class="h3 mb-1">{{ $club->name }}</h1>
            <p class="text-dark-50 mb-0">{{ $club->type ?? '-' }}</p>
        </div>
        <div class="ms-auto text-dark text-end">
            <p class="mb-0 small opacity-75">Club ID</p>
            <p class="h5 fw-bold mb-0">{{ $club->id }}</p>
        </div>
    </div>

    <!-- Club Info -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">President</dt>
                <dd class="col-sm-9">{{ $club->president_name ?? '-' }}</dd>

                <dt class="col-sm-3">Total Members</dt>
                <dd class="col-sm-9">{{ $club->students->count() }}</dd>

                <dt class="col-sm-3">Description</dt>
                <dd class="col-sm-9">{{ $club->description ?? '-' }}</dd>
            </dl>
        </div>
    </div>
    <!-- Action Buttons -->
    <div class="d-flex gap-2 flex-wrap">
        <a href="{{ route('clubs.index') }}" class="btn btn-secondary d-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i> Back to Clubs
        </a>
        <a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-info text-white d-flex align-items-center gap-2">
            <i class="bi bi-pencil"></i> Edit Club
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
