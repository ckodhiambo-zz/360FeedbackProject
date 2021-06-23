<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function supervisors()
    {
        return $this->belongsToMany(Supervisor::class);
    }
}
