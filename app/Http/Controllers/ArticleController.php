<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	public function index() {
		// Новый СКОП allPaginate
		$articles = Article::allPaginate(10);
		// СКОП allPaginate запускается в модели Article - scopeLastLimit()

		return view('app.article.index', compact('articles'));
	}

	public function show($slug) {
		// СКОП findBySlug запускается в модели Article - scopeFindBySlug()
		$article = Article::findBySlug($slug);
		return view('app.article.show', compact('article'));
	}

	public function allByTag(Tag $tag) {
		// СКОУП findByTag запускается в модели Article - scopeFindByTag()
		$articles = $tag->articles()->findByTag();
		return view('app.article.byTag', compact('articles'));
	}

}
