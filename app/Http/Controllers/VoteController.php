<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserVote;
use App\Models\Vote;
use App\Models\VoteResult;
use App\Models\Candidate;
use File;

class VoteController extends Controller
{
    public function index(){
        $availableVotes = Vote::where('status', 'available')->get();
        $unavailableVotes = Vote::where('status', 'unavailable')->get();
        return view('vote.index', compact("availableVotes", "unavailableVotes"));
    }

    public function create(){
        return view('vote.create');
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'voteName' => 'required',
            'voteStatus' => ['required', 'max:30'],
            'voteClose' => ['required', 'date'],
        ]);
        $vote = Vote::create([
            'name' => ucwords($request->voteName),
            'status' => $request->voteStatus,
            'description' => ucfirst($request->voteDescription),
            'closing_time' => $request->voteClose
        ]);
        foreach ($request->candidateNames as $key => $candidateName) {
            $fileName = "user-image-default.png";
            if (!empty($request->candidateImages[$key])) {
                $file = $request->candidateImages[$key];
                $fileName = time()."_".$file->getClientOriginalName();
                $path = 'candidate_images';
                $file->move($path, $fileName);
            }
            Candidate::create([
                'vote_id' => $vote->id,
                'name' => ucwords($request->candidateNames[$key]),
                'description' => ucfirst($request->candidateDescriptions[$key]),
                'image_path' =>$fileName
            ]);
        }
        return redirect()->route('vote-list.index')->with(['createVotesSuccess' => 'Vote has been created!']);
    }

    public function detail(Vote $vote){
        return view('vote.detail', compact('vote'));
    }
}
