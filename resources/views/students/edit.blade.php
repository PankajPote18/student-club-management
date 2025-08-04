<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student - {{ $student->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
      .bg-gradient { background: linear-gradient(90deg, #7c3aed 0%, #4f46e5 100%) !important; }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <!-- Header Section -->
    <div class="bg-gradient rounded shadow p-4 mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('students.index') }}" class="me-3 text-white" style="text-decoration:none;">
                <i class="bi bi-arrow-left-circle-fill" style="font-size:1.5rem;"></i>
            </a>
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold text-white mb-1">Edit Student</h1>
                <p class="text-light mb-0">Update information for <strong>{{ $student->name }}</strong></p>
            </div>
            <div class="text-end text-white ms-3">
                <p class="mb-0 small opacity-75">Student ID</p>
                <p class="h5 fw-bold mb-0">{{ $student->student_id }}</p>
            </div>
        </div>
    </div>

    <!-- Error Messages -->
    @if($errors->any())
    <div class="alert alert-danger mb-4" role="alert">
        <div class="d-flex align-items-center mb-2">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Please fix the following errors:</strong>
        </div>
        <ul class="mb-0 ps-4">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Edit Form Card -->
    <div class="card">
        <div class="card-header bg-light border-bottom">
            <span class="h5 mb-0">Update Student Information</span>
        </div>
        <form id="editStudentForm" action="{{ route('students.update', $student->id) }}" method="POST" class="card-body row g-3" autocomplete="off">
            @csrf
            @method('PUT')

            <!-- Full Name -->
            <div class="col-12">
                <label for="name" class="form-label">
                    Full Name <span class="text-danger">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Enter student's full name" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Student ID -->
            <div class="col-md-6">
                <label for="student_id" class="form-label">
                    Student ID <span class="text-danger">*</span>
                </label>
                <input type="text" id="student_id" name="student_id" value="{{ old('student_id', $student->student_id) }}"
                    class="form-control @error('student_id') is-invalid @enderror"
                    placeholder="e.g., 2023CS001" required>
                @error('student_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <label for="email" class="form-label">
                    Email Address <span class="text-danger">*</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="student@university.edu" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="col-md-6">
                <label for="phone" class="form-label">
                    Phone Number <span class="text-danger">*</span>
                </label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', $student->phone) }}"
                    class="form-control @error('phone') is-invalid @enderror"
                    placeholder="+1 (555) 123-4567" required>
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Department -->
            <div class="col-md-6">
                <label for="department" class="form-label">
                    Department <span class="text-danger">*</span>
                </label>
                <select id="department" name="department"
                        class="form-select @error('department') is-invalid @enderror" required>
                    <option value="">Select Department</option>
                    <option value="Computer Science" {{ old('department', $student->department) == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                    <option value="Electronics & Communication" {{ old('department', $student->department) == 'Electronics & Communication' ? 'selected' : '' }}>Electronics & Communication</option>
                    <option value="Mechanical Engineering" {{ old('department', $student->department) == 'Mechanical Engineering' ? 'selected' : '' }}>Mechanical Engineering</option>
                    <option value="Civil Engineering" {{ old('department', $student->department) == 'Civil Engineering' ? 'selected' : '' }}>Civil Engineering</option>
                </select>
                @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Year of Study -->
            <div class="col-md-6">
                <label for="year" class="form-label">
                    Year of Study <span class="text-danger">*</span>
                </label>
                <select id="year" name="year"
                        class="form-select @error('year') is-invalid @enderror" required>
                    <option value="">Select Year</option>
                    <option value="1st Year" {{ old('year', $student->year) == '1st Year' ? 'selected' : '' }}>1st Year</option>
                    <option value="2nd Year" {{ old('year', $student->year) == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                    <option value="3rd Year" {{ old('year', $student->year) == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                    <option value="4th Year" {{ old('year', $student->year) == '4th Year' ? 'selected' : '' }}>4th Year</option>
                </select>
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Date of Birth -->
            <div class="col-md-6">
                <label for="date_of_birth" class="form-label">
                    Date of Birth
                </label>
                <input type="date" id="date_of_birth" name="date_of_birth"
                    value="{{ old('date_of_birth', $student->date_of_birth) }}"
                    class="form-control @error('date_of_birth') is-invalid @enderror">
                @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="col-12">
                <label for="address" class="form-label">
                    Address
                </label>
                <textarea id="address" name="address" rows="2"
                    class="form-control @error('address') is-invalid @enderror"
                    placeholder="Enter student's address">{{ old('address', $student->address) }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Interests/Skills -->
            <div class="col-12">
                <label for="interests" class="form-label">
                    Interests/Skills
                </label>
                <textarea id="interests" name="interests" rows="2"
                    class="form-control @error('interests') is-invalid @enderror"
                    placeholder="e.g., Programming, Web Development, Public Speaking, Event Management">{{ old('interests', $student->interests) }}</textarea>
                @error('interests')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="col-12 d-flex flex-wrap gap-2 pt-3 border-top mt-3">
                <button type="button" class="btn btn-primary flex-grow-1" onclick="confirmUpdate()">
                    <i class="bi bi-save2 me-2"></i>Update Student
                </button>
                <button type="button" onclick="resetForm()" class="btn btn-secondary flex-grow-1">
                    <i class="bi bi-arrow-repeat me-2"></i>Reset Changes
                </button>
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info text-white flex-grow-1">
                    <i class="bi bi-eye me-2"></i>View Student
                </a>
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary flex-grow-1">
                    <i class="bi bi-x-circle me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Store original values for reset
const originalValues = {};

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, select, textarea');

    // Store original values
    inputs.forEach(input => { originalValues[input.name] = input.value; });

    // Real-time validation and highlight changed fields
    inputs.forEach(input => {
        input.addEventListener('blur', function() { validateField(this); });
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid')) validateField(this);

            // Highlight changed fields
            if (this.value !== originalValues[this.name]) {
                this.classList.add('border-warning', 'bg-warning-subtle');
            } else {
                this.classList.remove('border-warning', 'bg-warning-subtle');
            }
        });
    });

    function validateField(field) {
        const value = field.value.trim();
        const req = field.hasAttribute('required');
        if (req && !value) {
            field.classList.add('is-invalid');
            field.classList.remove('is-valid');
        } else if (value) {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
        } else {
            field.classList.remove('is-invalid', 'is-valid');
        }
    }

    // Phone input formatting
    const phoneInput = document.getElementById('phone');
    phoneInput && phoneInput.addEventListener('input', function() {
        let v = this.value.replace(/\D/g, '');
        if (v.length >= 10)
            v = v.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
        else if (v.length >= 6)
            v = v.replace(/(\d{3})(\d{3})/, '($1) $2');
        this.value = v;
    });
    
});

// Reset form to original values
function resetForm() {
    if (confirm('Are you sure you want to reset all changes?')) {
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.value = originalValues[input.name] || '';
            input.classList.remove('is-invalid', 'is-valid', 'border-warning', 'bg-warning-subtle');
        });
    }
}



// Confirm before updating student
function confirmUpdate() {
    if (confirm('Are you sure you want to update student?')) {
        document.getElementById('editStudentForm').submit();
    }
}
</script>
</body>
</html>
