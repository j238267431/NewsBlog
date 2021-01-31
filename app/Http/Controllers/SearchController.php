<?php

namespace App\Http\Controllers;

use App\Jobs\NewsSearching;
use App\Models\ParsedNews;
use App\Service\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->searchWord;

        $results = ParsedNews::query()
            ->where('title', 'like', "%$q%")
            ->get();

        return view('searchNews', [
            'titleNews' => $results,
        ])->render();

    }

}
