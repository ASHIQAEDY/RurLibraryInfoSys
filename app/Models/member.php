<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    protected $fillable = ['Name', 'Ic_No', 'Address', 'PhoneNumber', 'VolunteerId'];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'VolunteerId');
    }

    public function book()
    {
        return $this->hasMany(Book::class, 'memberId');
    }

    public function records()
    {
        return $this->hasMany(Record::class,'memberId');
    }

}

