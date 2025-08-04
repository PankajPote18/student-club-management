namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'student_id' => $this->faker->unique()->regexify('EVT[0-9]{3}'),  
            'phone' => $this->faker->phoneNumber,
            'department' => $this->faker->randomElement(['Computer Science', 'Electronics', 'Mechanical', 'Civil']),
            'year' => $this->faker->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
            'date_of_birth' => $this->faker->date(),
            'address' => $this->faker->address,
            'interests' => $this->faker->sentence(),
            'image' => $this->faker->randomElement([
                'student1.jpg',
                'student2.png',
                'default-student.png',
                null, // sometimes no image
            ]),
        ];
    }
}
