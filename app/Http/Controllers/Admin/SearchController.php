<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParsedNews;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->searchWord;

        $results = ParsedNews::query()
            ->where('title', 'like', "%$q%")
            ->get();

        return view('admin.search', [
            'titleNews' => $results,
        ])->render();

    }
}
