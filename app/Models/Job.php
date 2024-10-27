<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// data encapsulation, business logic
class Job extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $guarded = [];

    public function employer()
    {
        // relationship type
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
