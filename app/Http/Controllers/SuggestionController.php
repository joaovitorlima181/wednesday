<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuggestionController extends Controller
{
    public function index()
    {
        $adjustments = Suggestion::join('users', 'suggestions.suggestor_id', '=', 'users.id')
            ->select('suggestions.*', 'users.name')
            ->where('type', 'ajuste')
            ->get();

        $improvements = Suggestion::join('users', 'suggestions.suggestor_id', '=', 'users.id')
        ->select('suggestions.*', 'users.name')
        ->where('type', 'melhoria')
        ->get();

        return view('suggestion.index', compact('adjustments', 'improvements'));
    }

    public function create()
    {
       return view('suggestion.create');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();

        DB::beginTransaction();

            Suggestion::create([
                'title_sug' => $request->suggestionTitle,
                'description_sug' => $request->description,
                'type' => $request->suggestionType,
                'suggestor_id' => $userId
            ]);
            

        DB::commit();

        return redirect('/suggestion');
    }

    public function delete(Request $request)
    {
        $suggestionId = $request->id;

        DB::transaction(function() use ($suggestionId){
            Suggestion::destroy($suggestionId);
        });

        return redirect()->back();
    }
}
