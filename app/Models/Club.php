<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'president_name',
        'members_count',
        'description',
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'club_student')
            ->withTimestamps();
    }
    public function clubMemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }
}
