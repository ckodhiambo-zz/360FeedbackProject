<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_name',
    ];
    protected $casts = [
        'question_name' => 'array'
    ];

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function surveys(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function ratings(): HasOne
    {
        return $this->hasOne(Target::class);
    }
}
