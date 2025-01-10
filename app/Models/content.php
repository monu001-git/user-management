<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class content extends Model
{

    use HasFactory,SoftDeletes;

    protected $fillable = [
        'tilte',
    ];


    public function imageContents()
    {
        return $this->hasMany(ImageContent::class);
    }

    // One content can have many video contents
    public function videoContents()
    {
        return $this->hasMany(VideoContent::class);
    }
}
