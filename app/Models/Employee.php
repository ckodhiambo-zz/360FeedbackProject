<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'position',

    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function supervisors()
    {
        return $this->belongsToMany(Supervisor::class);
    }
}
