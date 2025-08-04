<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use App\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\StudentRepositoryInterface;

class StudentControllerTest extends TestCase
{
    public function test_index_displays_student_data()
    {
        $student = new Student([
            'name' => 'Mock Student',
            'email' => 'mock@example.com',
        ]);
        $student->id = 1;
        $student->exists = true;
        $student->setConnection('testing');

        $paginator = new LengthAwarePaginator(
            [$student],
            1, 
            10, 
            1, 
            ['path' => '/students']
        );
        $mock = Mockery::mock(StudentRepositoryInterface::class);
        $mock->shouldReceive('paginate')
            ->once()
            ->andReturn($paginator);

        $this->app->instance(StudentRepositoryInterface::class, $mock);
        $response = $this->get(route('students.index'));
        $response->assertStatus(200);
        $response->assertSee('Mock Student');
    }
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
