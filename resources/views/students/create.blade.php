<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Student</title>
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
        <a class="navbar-brand fw-bold" href="{{ route('students.index') }}">
            <i class="bi bi-people-fill me-2"></i>Student Club
        </a>
    </div>
</nav>

<div class="container py-5">
    <!-- Header Section -->
    <div class="bg-primary text-white p-4 rounded mb-4 d-flex align-items-center">
        <a href="{{ route('students.index') }}" class="text-white me-3" style="text-decoration:none;">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <div>
            <h1 class="h3 mb-1">Add New Student</h1>
            <p class="mb-0">Fill in the details to add a new club member</p>
        </div>
    </div>

    <!-- Error Messages -->
    @if($errors->any())
    <div class="alert alert-danger">
        <h5><i class="bi bi-exclamation-triangle-fill"></i> Please fix the following errors:</h5>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Card -->
    <div class="card shadow">
        <div class="card-header bg-light">
            <h5 class="mb-0">Student Information</h5>
        </div>
        <form action="{{ route('students.store') }}" method="POST" class="p-4" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!-- Full Name -->
                <div class="col-12">
                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" placeholder="Enter student's full name" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Student ID -->
                <div class="col-md-6">
                    <label for="student_id" class="form-label">Student ID <span class="text-danger">*</span></label>
                    <input type="text" name="student_id" id="student_id"
                        class="form-control @error('student_id') is-invalid @enderror"
                        value="{{ old('student_id') }}" placeholder="e.g., 2023CS001" required>
                    @error('student_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="student@university.edu" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" name="phone" id="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}" placeholder="+91 1234567890" required>
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Department -->
                <div class="col-md-6">
                    <label for="department" class="form-label">Department <span class="text-danger">*</span></label>
                    <select name="department" id="department" class="form-select @error('department') is-invalid @enderror" required>
                        <option value="">Select Department</option>
                        @foreach(['Computer Science', 'Electronics ', 'Mechanical Engineering', 'Civil Engineering'] as $dept)
                            <option value="{{ $dept }}" {{ old('department') == $dept ? 'selected' : '' }}>{{ $dept }}</option>
                        @endforeach
                    </select>
                    @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Year of Study -->
                <div class="col-md-6">
                    <label for="year" class="form-label">Year of Study <span class="text-danger">*</span></label>
                    <select name="year" id="year" class="form-select @error('year') is-invalid @enderror" required>
                        <option value="">Select Year</option>
                        @foreach(['1st Year', '2nd Year', '3rd Year', '4th Year'] as $yr)
                            <option value="{{ $yr }}" {{ old('year') == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                        @endforeach
                    </select>
                    @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Date of Birth -->
                <div class="col-md-6">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth"
                        class="form-control @error('date_of_birth') is-invalid @enderror"
                        value="{{ old('date_of_birth') }}">
                    @error('date_of_birth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

               

                <!-- Address -->
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" rows="3"
                        class="form-control @error('address') is-invalid @enderror"
                        placeholder="Enter student's address">{{ old('address') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Interests -->
                <div class="col-12">
                    <label for="interests" class="form-label">Interests/Skills</label>
                    <textarea name="interests" id="interests" rows="3"
                        class="form-control @error('interests') is-invalid @enderror"
                        placeholder="e.g., Programming, Web Development, etc.">{{ old('interests') }}</textarea>
                    @error('interests') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

             <!-- IMAGE UPLOAD SECTION -->
            <div class="col-12">
                <label for="image" class="form-label">Student Image (optional)</label>
                <input type="file" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror"
                    accept="image/*">
                @error('image') 
                <div class="invalid-feedback">{{ $message }}</div> @enderror
                <div class="form-text">Accepted formats: jpeg, png, jpg, gif, svg. Max size: 2MB.</div>
            </div>
   

            <!-- Buttons -->
            <div class="d-flex flex-wrap gap-2 mt-4 pt-3 border-top">
                <button type="submit" class="btn btn-primary d-flex align-items-center gap-1">
                    <i class="bi bi-plus-lg"></i> Add Student
                </button>
                <button type="reset" class="btn btn-secondary d-flex align-items-center gap-1">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset Form
                </button>
                <a href="{{ route('students.index') }}" class="btn btn-light d-flex align-items-center gap-1">
                    <i class="bi bi-x-lg"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Student ID uppercase
    const studentIdInput = document.getElementById('student_id');
    studentIdInput && studentIdInput.addEventListener('input', function () {
        this.value = this.value.toUpperCase();
    });

    // Phone formatting
    const phoneInput = document.getElementById('phone');
    phoneInput && phoneInput.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        if (value.length >= 10)
            value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
        else if (value.length >= 6)
            value = value.replace(/(\d{3})(\d{3})/, '($1) $2');
        this.value = value;
    });
});
</script>
</body>
</html>
