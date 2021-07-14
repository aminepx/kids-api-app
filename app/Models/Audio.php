<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    public function audioUrl()
    {
     return  $this->hasMany(AudioUrl::class);
    }
    protected $fillable=[
        'title',
        'image',
        'description'
        
    ];
}
