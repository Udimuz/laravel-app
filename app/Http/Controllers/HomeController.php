<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
	public function index(): View {
		//$articles = Article::orderBy('created_at', 'desc')->get()->take(6);
		//$articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        //$articles = Article::with('state', 'tags')->orderBy('created_at', 'desc')->take(6)->get();
		// задействует подключенные СКОПЫ:
		$articles = Article::lastLimit(10);
		// СКОП lastLimit запускается в модели Article - scopeAllPaginate()
		return  view('app.home', compact('articles'));
	}
}
