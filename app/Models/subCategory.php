<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'category_id',
        'order',
        'status',
        'title',
        'detail',
    ];

    protected $table = 'sub_categories';


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
