<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image' ,'owner_id'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
   

    public function getHumanReadableDateAttribute(): string
    {
        return $this->created_at->format('l jS \of F Y h:i:s A');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
