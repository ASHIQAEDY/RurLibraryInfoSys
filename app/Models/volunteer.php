<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class volunteer extends Model
{
    use HasFactory;
    public function book(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');

    }

    public function records()
    {
        return $this->hasMany(Record::class,'volunteerId');
    }
}
