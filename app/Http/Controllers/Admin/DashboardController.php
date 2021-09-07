<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Citizen;
use App\Models\Content;
use App\Models\KritikSaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $citizen = Citizen::withoutTrashed()->count();
        $category = Category::withoutTrashed()->count();
        $content = Content::withoutTrashed()->count();
        $critic = KritikSaran::orderBy('id')->count();

        return view('admin.dashboard')->with(compact('citizen', 'category', 'content', 'critic'));
    }
}
