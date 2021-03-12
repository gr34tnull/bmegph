<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endorser extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'endorsers';

    public function bloodlines()
    {
        return $this->hasMany(Bloodline::class);
    }

    public function videos()
    {
        return $this->hasMany(Gallery::class);
    }
}
