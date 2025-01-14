<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;
    use HasFactory , Sluggable;


    protected $fillable = ['name' , 'slug' , 'status'] ;
    
    
     //==========================================================================//
        //------------------------Relationships----------------------------//
    //==========================================================================//
    
    public function posts()
    {
        return $this->hasMany(Post::class , 'category_id') ;
    }


     //==========================================================================//
        //------------------------Elequent Sluggable----------------------------//
    //==========================================================================//
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
