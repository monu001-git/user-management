<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class imageContent extends Model
{

    use HasFactory,SoftDeletes;

    protected $table = 'imageContents';

    
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
