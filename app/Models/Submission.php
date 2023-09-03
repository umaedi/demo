<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'registrasi_id',
        'title',
        'abstract',
        'keyword',
        'topic',
        'paper',
        'message',
        'histories'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
