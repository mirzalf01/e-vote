<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'vote_id',
        'name',
        'description',
        'image_path'
    ];

    public function vote(){
        return $this->belongsTo(Vote::class);
    }
    /* public function userVote(){
        return $this->hasMany(UserVote::class);
    }
    public function voteResult(){
        return $this->hasOne(VoteResult::class);
    } */

}
