<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
//use App\Models\Setting;

class HomeController extends Controller
{
    public function index(Request $request)
    {

/*
    $request->year
    $request->input('year')
*/

    	$dates = Article::selectRaw('year(created_at) `year`, month(created_at) `month`, monthname(created_at) `monthName`, count(created_at) `count`')
        ->groupBy('year', 'month', 'monthName')
        ->orderBy('year')
        ->orderBy('month')
        ->get();
 
        $firstArtice = Article::find(setting('site.first_Top_Article'));
        $secondArtice = Article::find(setting('site.second_Top_Article'));
        $thirdArtice = Article::find(setting('site.third_Top_Article'));

    	return view('pages.welcome', [
            'articles' => Article::getByDate($request->year, $request->month)->simplePaginate(config('custom.paginate_quote')),
    		'categories' => Category::all(),
            'dates' => $dates,
            'firstArtice' => $firstArtice,
            'secondArtice' => $secondArtice,
            'thirdArtice' => $thirdArtice
    	]);
    }

    public function date(Request $request, string $year, string $month)
    {
        $dates = Article::selectRaw('year(created_at) `year`, month(created_at) `month`, monthname(created_at) `monthName`, count(created_at) `count`')
        ->groupBy('year', 'month', 'monthName')
        ->orderBy('year')
        ->orderBy('month')
        ->get();
        dd($thirdArtice);
        return view('pages.welcome', [
            'articles' => Article::getByDate($year, $month)->simplePaginate(config('custom.paginate_quote')),
            'categories' => Category::all(),
            'dates' => $dates            
        ]);
    }
}
