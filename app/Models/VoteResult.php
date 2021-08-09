<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteResult extends Model
{
    use HasFactory;
    protected $table = 'vote_results';
    protected $fillable = [
        'vote_id',
        'vote_result'
    ];
    
    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }
    public function vote(){
        return $this->belongsTo(Vote::class);
    }
}
