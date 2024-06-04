<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'publisherName', 'published_year','category','BookStatus','volunteerId','id'
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'volunteerId');
    }

    public function records()
    {
        return $this->hasMany(Record::class,'book_Id');
    }

}
