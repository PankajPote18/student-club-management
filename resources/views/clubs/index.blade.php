<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clubs Section</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-people-fill me-2"></i>Student Club Management
        </a>
    </div>
</nav>

<div class="container py-5">
    <!-- Header Section -->
    <div class="rounded shadow p-4 mb-4 text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #2563eb 0%, #7c3aed 100%);">
        <div>
            <h1 class="h3 fw-bold mb-1">Clubs</h1>
            <p class="mb-0 text-white-50">Manage your clubs efficiently</p>
        </div>
        <div class="text-end">
            <p class="mb-0 small opacity-75">Total Clubs</p>
            <p class="h4 fw-bold mb-0">{{ $clubs->count() }}</p>
        </div>
         <!-- Button to Student -->
        <div class="mb-4">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                Go to Students
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
                    <input id="searchInput" type="text" class="form-control border-start-0" placeholder="Search clubs..." aria-label="Search clubs">
                </div>
            </div>
            <!-- Filter and Add Button -->
            <div class="d-flex gap-2">
                <select id="typeFilter" class="form-select" aria-label="Filter by Type" style="min-width: 180px;">
                    <option value="">All Types</option>
                    <option value="Sports" {{ request('type') == 'Sports' ? 'selected' : '' }}>Sports</option>
                    <option value="Cultural" {{ request('type') == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                    <option value="Academic" {{ request('type') == 'Academic' ? 'selected' : '' }}>Academic</option>
                </select>
                <a href="{{ route('clubs.create') }}" 
                   class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i>
                    Add Club
                </a>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill flex-shrink-0 me-2"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Clubs Table -->
    <div class="card shadow-sm overflow-auto">
        <table class="table table-striped mb-0">
            <thead class="table-light text-uppercase text-muted small">
                <tr>
                    <th scope="col">Club Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">President</th>
                    <th scope="col">Members</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="clubsTableBody">
                @forelse($clubs as $club)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold me-3"
                                 style="height: 40px; width: 40px; background: linear-gradient(90deg, #60a5fa, #8b5cf6); font-size: 1.25rem;">
                                {{ strtoupper(substr($club->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-semibold">{{ $club->name }}</div>
                                <div class="text-muted small">{{ $club->description ?? '-' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">{{ $club->type }}</td>
                    <td class="align-middle">{{ $club->president_name ?? '-' }}</td>
                    <td class="align-middle">{{ $club->members_count ?? 0 }}</td>
                    <td class="align-middle">
                        <div class="d-flex gap-2">
                            <a href="{{ route('clubs.show', $club->id) }}"
                               class="text-primary" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('clubs.edit', $club->id) }}"
                               class="text-info" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('clubs.destroy', $club->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this club?');" class="d-inline m-0 p-0">
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
                    <td colspan="6" class="text-center py-5">
                        <div class="d-flex flex-column align-items-center">
                            <i class="bi bi-people mb-3" style="font-size: 2.5rem; color: #bbb;"></i>
                            <h4 class="fw-semibold mb-2">No clubs found</h4>
                            <p class="text-muted mb-3">Get started by adding your first club.</p>
                            <a href="{{ route('clubs.create') }}" class="btn btn-primary">
                                Add First Club
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
    @if($clubs->hasPages())
    <div class="mt-4">
        {{ $clubs->links() }}
    </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    
    document.getElementById('searchInput').addEventListener('input', filterTable);
    document.getElementById('typeFilter').addEventListener('change', filterTable);

    function filterTable() {
        var searchValue = document.getElementById('searchInput').value.toLowerCase();
        var typeFilter = document.getElementById('typeFilter').value.toLowerCase();
        var rows = document.querySelectorAll('#clubsTableBody tr');

        let anyShown = false;

        rows.forEach(function(row) {
            var text = row.textContent.toLowerCase();
            var typeCell = row.querySelector('td:nth-child(2)');
            var clubType = typeCell ? typeCell.textContent.trim().toLowerCase() : '';
            var show = text.includes(searchValue) && (typeFilter === '' || clubType === typeFilter);
            row.style.display = show ? '' : 'none';
            if (show) anyShown = true;
        });
    }
</script>
</body>
</html>
