<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students Section</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Student Club Management</a>
    </div>
</nav>

<div class="container py-5">

    <!-- Header -->
    <div class="rounded shadow p-4 mb-4 text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #2563eb 0%, #7c3aed 100%);">
        <div>
            <h1 class="h3 fw-bold mb-1">Students Section</h1>
            <p class="mb-0 text-white-50">Manage your club members efficiently</p>
        </div>
        <div class="text-end">
            <p class="mb-0 small opacity-75">Total Students</p>
            <p class="h4 fw-bold mb-0">{{ $students->total() }}</p> 
        </div>
        <!-- Button to Clubs -->
        <div class="mb-4">
            <a href="{{ route('clubs.index') }}" class="btn btn-secondary">
                Go to Clubs
            </a>
            <a href="{{ route('clubs.members.index', $club->id ?? 1) }}" class="btn btn-warning">
                Manage Club Members
            </a>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="bg-white rounded shadow-sm p-3 mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <!-- Search Bar -->
            <div class="flex-grow-1" style="max-width: 400px; min-width: 200px;">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search"></i>
                    </span>
                    <input id="searchInput" type="text" class="form-control border-start-0" placeholder="Search students..." aria-label="Search students">
                </div>
            </div>

            <!-- Filter and Add Button -->
            <div class="d-flex gap-2">
                <select class="form-select" id="departmentFilter" aria-label="Filter by Department" style="min-width: 180px;">
                    <option value="">All Departments</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Civil">Civil</option>
                </select>
                <a href="{{ route('students.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                    <span class="bi bi-plus-circle"></span>
                    Add Student
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
            <span class="bi bi-check-circle-fill flex-shrink-0 me-2"></span>
            {{ session('success') }}
        </div>
    @endif

    <!-- Students Table -->
    <div class="card shadow-sm overflow-auto">
        <table class="table table-striped mb-0">
            <thead class="table-light text-uppercase text-muted small">
                <tr>
                    <th scope="col">Student</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Department</th>
                    <th scope="col">Year</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="studentTableBody">
                @forelse($students as $student)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold me-2"
                                     style="height: 40px; width: 40px; background: linear-gradient(90deg, #60a5fa, #8b5cf6); font-size: 1.25rem;">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $student->name }}</div>
                                    <div class="text-muted small">{{ $student->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">{{ $student->student_id }}</td>
                        <td class="align-middle">{{ $student->department }}</td>
                        <td class="align-middle">{{ $student->year }}</td>
                        <td class="align-middle">{{ $student->phone }}</td>
                        <td class="align-middle">
                            <div class="d-flex gap-2">
                                <a href="{{ route('students.show', $student->id) }}" class="text-primary" title="View"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('students.edit', $student->id) }}" class="text-primary" title="Edit"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');" class="d-inline-block m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 m-0" title="Delete" style="color: #dc3545;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center">
                                <i class="bi bi-person-plus mb-3" style="font-size: 2.5rem; color: #aaa;"></i>
                                <h4 class="fw-semibold mb-2">No students found</h4>
                                <p class="text-muted mb-3">Get started by adding your first student to the club.</p>
                                <a href="{{ route('students.create') }}" class="btn btn-primary">Add First Student</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($students->hasPages())
        <div class="mt-4">
            {{ $students->links() }}
        </div>
    @endif

</div>

<!-- Bootstrap JS (needs Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Filtering JS -->
<script>
    const searchInput = document.getElementById('searchInput');
    const departmentFilter = document.getElementById('departmentFilter');

    searchInput.addEventListener('input', filterTable);
    departmentFilter.addEventListener('change', filterTable);

    function filterTable() {
        const searchValue = searchInput.value.toLowerCase();
        const departmentValue = departmentFilter.value.toLowerCase();
        const rows = document.querySelectorAll('#studentTableBody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const departmentCell = row.querySelector('td:nth-child(3)');
            const departmentText = departmentCell ? departmentCell.textContent.toLowerCase() : '';

            const matchesSearch = text.includes(searchValue);
            const matchesDepartment = departmentValue === '' || departmentText === departmentValue;

            row.style.display = (matchesSearch && matchesDepartment) ? '' : 'none';
        });
    }
</script>

<style>
    
    .pagination svg {
        display: none !important;
    }

    
    .pagination {
        font-size: 1rem !important;
    }
</style>


</body>
</html>
