<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    use HasFactory , Sluggable;

    protected $fillable = [
        'title',
        'description',
        'slug' , 
        'number_of_views' , 
        'comment_able',
        'status' ,
        'user_id',
        'category_id',
    ];


     //==========================================================================//
        //------------------------Relationships----------------------------//
    //==========================================================================//
    
    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class) ; 
    }

    public function images()
    {
        return $this->hasMany(PostImage::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
     //==========================================================================//
        //------------------------Elequent Sluggable----------------------------//
    //==========================================================================//
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
