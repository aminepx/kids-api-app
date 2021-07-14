<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioUrl extends Model
{
    use HasFactory;
    public function audio() {
        return  $this->belongsTo(Audio::class);
        }
        protected $fillable=[
            'title',
            'audio',
            
            
        ];
        protected $table='audio_urls';
        protected $foreign='audio_id';
}
