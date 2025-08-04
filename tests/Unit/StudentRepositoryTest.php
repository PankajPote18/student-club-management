<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Student;
use App\Repositories\StudentRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentRepositoryTest extends TestCase
{
    use RefreshDatabase;
    protected $repo;
    protected function setUp(): void
    {
        parent::setUp();
        $this->repo = new StudentRepository();
    }
    public function test_can_create_student()
    {
        $data = ['name' => 'Alice', 'email' => 'alice@example.com'];
        $student = $this->repo->create($data);
        $this->assertDatabaseHas('students', ['email' => 'alice@example.com']);
    }
    public function test_can_get_all_students()
    {
        Student::factory()->count(2)->create();
        $students = $this->repo->getAll();
        $this->assertCount(2, $students);
    }
    public function test_can_update_student()
    {
        $student = Student::factory()->create(['name' => 'Old Name']);
        $this->repo->update($student->id, ['name' => 'New Name']);
        $this->assertDatabaseHas('students', ['name' => 'New Name']);
    }
    public function test_can_delete_student()
    {
        $student = Student::factory()->create();
        $this->repo->delete($student->id);
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}

