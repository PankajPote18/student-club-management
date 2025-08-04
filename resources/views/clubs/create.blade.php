<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
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
    <div class="rounded shadow p-4 mb-4 text-white d-flex align-items-center" style="background: linear-gradient(90deg, #2563eb 0%, #7c3aed 100%);">
        <div>
            <h1 class="h3 mb-1">Add New Club</h1>
            <p class="mb-0 text-white-50">Fill in the details to add a new club</p>
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

    <!-- Form Card -->
    <div class="card shadow">
        <div class="card-header bg-light">
            <h5 class="mb-0">Club Information</h5>
        </div>
        <form action="{{ route('clubs.store') }}" method="POST" class="p-4 row g-3" autocomplete="off">
            @csrf

            <!-- Club Name -->
            <div class="col-12">
                <label for="name" class="form-label">Club Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" placeholder="Enter club name" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Club Type -->
            <div class="col-md-6">
                <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                <select name="type" id="type" 
                        class="form-select @error('type') is-invalid @enderror" required>
                    <option value="">Select Type</option>
                    <option value="Sports" {{ old('type') == 'Sports' ? 'selected' : '' }}>Sports</option>
                    <option value="Cultural" {{ old('type') == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                    <option value="Academic" {{ old('type') == 'Academic' ? 'selected' : '' }}>Academic</option>
                </select>
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- President Name -->
            <div class="col-md-6">
                <label for="president_name" class="form-label">President</label>
                <input type="text" name="president_name" id="president_name"
                       class="form-control @error('president_name') is-invalid @enderror"
                       value="{{ old('president_name') }}" placeholder="Enter president's name">
                @error('president_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Members count -->
            <div class="col-md-6">
                <label for="members_count" class="form-label">Number of Members</label>
                <input type="number" name="members_count" id="members_count" min="0"
                       class="form-control @error('members_count') is-invalid @enderror"
                       value="{{ old('members_count') }}" placeholder="Member count">
                @error('members_count')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="2"
                          class="form-control @error('description') is-invalid @enderror"
                          placeholder="Enter club description">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="col-12 d-flex flex-wrap gap-2 mt-4 pt-3 border-top">
                <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i>
                    Add Club
                </button>
                <button type="reset" class="btn btn-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Reset Form
                </button>
                <a href="{{ route('clubs.index') }}" class="btn btn-light d-flex align-items-center gap-2">
                    <i class="bi bi-x-lg"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
