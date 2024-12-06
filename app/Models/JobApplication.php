<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    public function applications()
{
    return $this->hasMany(JobApplication::class);
}
public function scopeCategory($query, $category)
{
    return $query->where('category', $category);
}

public function scopeSalaryGreaterThan($query, $amount)
{
    return $query->where('salary', '>', $amount);
}
protected $fillable = [
    'user_id',
    'job_id',
    'cv_path',
    'cover_letter_path',
];

// Define relationships, e.g., user and job
public function user()
{
    return $this->belongsTo(User::class);
}

public function job()
{
    return $this->belongsTo(Job::class);
}


}
