<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{

    use HasFactory;

    public function galleryDetail()
    {
        return $this->hasMany(gallery_detail::class);
    }

}
