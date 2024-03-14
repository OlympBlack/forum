<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'image', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
