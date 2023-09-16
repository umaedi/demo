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
        'abstract_file',
        'paper',
        'ppt',
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

    public function persentation()
    {
        return $this->belongsTo(Persentation::class);
    }
}
