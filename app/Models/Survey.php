<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_title',
        'survey_description',
        'start_date',
        'end_date',
    ];
    protected $guarded = [];

//    public function categories(): HasManyThrough
//    {
//        return $this->hasManyThrough(Category::class, CategorySurvey::class);
//    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function ratings(): BelongsToMany
    {
        return $this->belongsToMany(Target::class);
    }




//    public function questions(): HasMany
//    {
//        return $this->hasMany(Question::class);
//    }

}
