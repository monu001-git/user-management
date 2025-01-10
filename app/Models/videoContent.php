<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class videoContent extends Model
{

    use HasFactory,SoftDeletes;

    protected $table = 'videocontents';

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
