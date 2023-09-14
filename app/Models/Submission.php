<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'reviewer_id',
        'registrasi_id',
        'title',
        'abstract',
        'keyword',
        'topic',
        'paper',
        'status',
        'message',
        'comment',
        'histories',
        'loa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
