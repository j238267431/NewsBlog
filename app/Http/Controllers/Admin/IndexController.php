<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $title = 'админ панель';
        return view('admin.index', [
            'categories' => $this->getCategoryList(),
            'user' => Auth::user(),
            'title' => $title,
        ]);
    }
}
