<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ClubMembershipController;
use App\Models\Student;



Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);
Route::resource('clubs', ClubController::class);

Route::prefix('clubs/{club}')->name('clubs.')->group(function () {
    Route::get('/members', [ClubMembershipController::class, 'index'])->name('members.index');
    Route::get('/members/create', [ClubMembershipController::class, 'create'])->name('members.create');
    Route::post('/members', [ClubMembershipController::class, 'store'])->name('members.store');
    Route::delete('/members/{student}', [ClubMembershipController::class, 'destroy'])->name('members.destroy');
});


// Route::get('/members', [ClubMembershipController::class, 'index'])->name('members.index');
// Route::get('/members/create', [ClubMembershipController::class, 'create'])->name('members.create');
// Route::post('/members', [ClubMembershipController::class, 'store'])->name('members.store');
Route::get('/test-student', function () {
    $student = Student::find(1);
    return $student->name;
});
Route::get('/test-model-event', function () {
    $randomId = 'EVT' . rand(100, 999); // Generates EVT123 etc.
    Student::create([
        'name' => 'Event Test',
        'student_id' => $randomId,
        'email' => $randomId . '@example.com',
        'phone' => '1112223333',
        'department' => 'Demo',
        'year' => '2nd',
    ]);
    return 'Student created with id: ' . $randomId;
});
