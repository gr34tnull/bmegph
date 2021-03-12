<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodline extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'bloodlines';

    public function endorser()
    {
        return $this->belongsTo(Endorser::class);
    }
}
