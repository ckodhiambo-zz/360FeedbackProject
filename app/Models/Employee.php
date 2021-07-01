<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'position',

    ];

    public function companies(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function departments(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function supervisors(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class);
    }
}
