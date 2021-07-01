<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function directreports(): HasMany
    {
        return $this->hasMany(DirectReports::class);
    }

}
