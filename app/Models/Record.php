<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrowing_date', 'returning_date', 'volunteerId', 'book_Id', 'memberId'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class,'book_Id');

    }

    public function member()
    {
        return $this->belongsTo( Member::class,'memberId');
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class,'volunteerId');
    }

}
