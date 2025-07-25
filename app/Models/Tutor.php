<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutor';

    protected $primaryKey = 'id_tutor';

    protected $fillable = [
        'user_id',
        'name',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'id_tutor', 'id');
    }
}
