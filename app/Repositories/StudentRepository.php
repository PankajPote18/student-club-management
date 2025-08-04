<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function getAll()
    {
        return Student::all();
    }
    public function find($id)
    {
        return Student::findOrFail($id);
    }
    public function create(array $data)
    {
        return Student::create($data);
    }
    public function update($id, array $data)
    {
        $student = Student::findOrFail($id);
        $student->update($data);
        return $student;
    }
    public function delete($id)
    {
        return Student::destroy($id);
    }
    public function paginate($perPage = 10)
    {
        return Student::paginate($perPage);
    }
}
