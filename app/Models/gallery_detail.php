<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery_detail extends Model
{

    use HasFactory;


    protected $table = 'gallerydetails';
    
    public function gallery()
    {
        return $this->belongsTo(gallery::class);
    }
}
