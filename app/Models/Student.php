<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    use HasFactory;
    protected static function booted()
    {
        static::created(function ($student) {
            \Log::info('Student created: ' . $student->name . ' (' . $student->email . ')');
        });
        static::updating(function ($student) {
            \Log::info('Student updating: ' . $student->id);
        });
        static::deleted(function ($student) {
            \Log::warning('Student deleted: ' . $student->id);
        });
    }
    protected $fillable = [
        'name',
        'student_id',
        'email',
        'phone',
        'department',
        'year',
        'date_of_birth',
        'address',
        'interests',
    ];
    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'club_student')
            ->withTimestamps();
    }
    public function clubMemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }
    public function getNameAttribute($value)
    {
        return ucfirst($value);  
    }
    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
        );
    }
}
