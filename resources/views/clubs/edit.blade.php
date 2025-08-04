<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Club - {{ $club->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <style>
      .bg-gradient {
        background: linear-gradient(90deg, #2563eb 0%, #7c3aed 100%) !important;
      }
      .bg-gradient-accent {
        background: linear-gradient(90deg, #60a5fa, #8b5cf6);
      }
    </style>
</head>
<body class="bg-light">

<!-- Navbar (optional) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('clubs.index') }}">
            <i class="bi bi-people-fill me-2"></i>Student Clubs
        </a>
    </div>
</nav>

<div class="container py-5">
    <!-- Header Section -->
    <div class="rounded shadow p-4 mb-4 text-white d-flex justify-content-between align-items-center bg-gradient">
        <div>
            <h1 class="h3 fw-bold mb-1">Edit Club</h1>
            <p class="mb-0 text-white-50">Update details for <strong>{{ $club->name }}</strong></p>
        </div>
        <div class="text-end">
            <p class="mb-0 small opacity-75">Club ID</p>
            <p class="h4 fw-bold mb-0">{{ $club->id }}</p>
        </div>
    </div>

    <!-- Error Messages -->
    @if($errors->any())
    <div class="alert alert-danger mb-4">
        <strong>Please fix the following errors:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Current Club Info -->
    <div class="card mb-4">
        <div class="card-header bg-light border-bottom">
            <span class="h5 mb-0">Current Club Information</span>
        </div>
        <div class="card-body d-flex align-items-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold me-3 bg-gradient-accent"
                 style="height: 4rem; width: 4rem; font-size: 1.5rem;">
                {{ strtoupper(substr($club->name, 0, 1)) }}
            </div>
            <div>
                <h3 class="h5 mb-1">{{ $club->name }}</h3>
                <div class="text-muted small">{{ $club->description ?? '-' }}</div>
                <div class="text-secondary small">{{ $club->type }}</div>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="card">
        <div class="card-header bg-light border-bottom">
            <span class="h5 mb-0">Update Club Information</span>
        </div>
        <form action="{{ route('clubs.update', $club->id) }}" method="POST" class="card-body row g-3" autocomplete="off">
            @csrf
            @method('PUT')

            <!-- Club Name -->
            <div class="col-12">
                <label for="name" class="form-label">Club Name <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name', $club->name) }}"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter club name" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Club Type -->
            <div class="col-md-6">
                <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                <select id="type" name="type"
                        class="form-select @error('type') is-invalid @enderror" required>
                    <option value="">Select Type</option>
                    <option value="Sports" {{ old('type', $club->type) == 'Sports' ? 'selected' : '' }}>Sports</option>
                    <option value="Cultural" {{ old('type', $club->type) == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                    <option value="Academic" {{ old('type', $club->type) == 'Academic' ? 'selected' : '' }}>Academic</option>
                </select>
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- President Name -->
            <div class="col-md-6">
                <label for="president_name" class="form-label">President</label>
                <input type="text" id="president_name" name="president_name" value="{{ old('president_name', $club->president_name) }}"
                       class="form-control @error('president_name') is-invalid @enderror"
                       placeholder="Enter president's name">
                @error('president_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Members count -->
            <div class="col-md-6">
                <label for="members_count" class="form-label">Number of Members</label>
                <input type="number" id="members_count" name="members_count" min="0"
                       value="{{ old('members_count', $club->members_count) }}"
                       class="form-control @error('members_count') is-invalid @enderror"
                       placeholder="Member count">
                @error('members_count')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" rows="2"
                          class="form-control @error('description') is-invalid @enderror"
                          placeholder="Enter club description">{{ old('description', $club->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="col-12 d-flex flex-wrap gap-2 pt-3 border-top mt-3">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    <i class="bi bi-save2 me-2"></i> Update Club
                </button>
                <a href="{{ route('clubs.show', $club->id) }}" class="btn btn-info text-white flex-grow-1">
                    <i class="bi bi-eye me-2"></i> View Club
                </a>
                <a href="{{ route('clubs.index') }}" class="btn btn-outline-secondary flex-grow-1">
                    <i class="bi bi-x-circle me-2"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
