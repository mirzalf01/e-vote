<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'description',
        'closing_time'
    ];

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }

    /* public function voteResult(){
        return $this->hasOne(VoteResult::class);
    } */
}
