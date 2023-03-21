<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search_data = $request->input('query');
        $request->validate([
            'query'=>'required|min:3'
        ]);

        $result = Blog::
            where('category', 'Like', '%' . $search_data . '%')
            ->orWhere('writter', 'Like', '%' . $search_data . '%')
            ->get()
            ->all();
        if (!empty($search_data)) {
            $history = new SearchHistory();
            $history->user_id = Auth::user()->id;
            $history->keyword = $request->input('query');
            $history->searched_at = Carbon\Carbon::now();
            if (!is_null($result)) {
                $history->results_count = count($result);
            }
            $history->save();
        }


        return view('search-data', compact('result'));

    }

    public function history()
    {
        $variable = SearchHistory::select('keyword', DB::raw('count(*) as total'))
            ->groupBy('keyword')
            
            ->get();

        return view('history',compact('variable'));
    }

}