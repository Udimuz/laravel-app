<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

	protected $fillable = ['title', 'body', 'ing', 'slug'];	// Поля доступные для заполнения
	//protected $guarded = [];	// Поля защищённые от заполнения
	public $dates = ['published_at'];

	// Указать взаимоотношения с другими моделями:
	// Взаимоотношение с Комментариями будет:	Один ко многим
	public function comments() {
		// Укажем что данная модель может иметь много комментариев:
		return $this->hasMany(Comment::class);
	}
	// с объектом Статистики:	Один к одному
	public function state() {
		// - имеет один -
		return $this->hasOne(State::class);
	}
	// Взаимоотношение с Тегами:	Многие ко многим
	public function tags() {
		// - относится ко многим -
		return $this->belongsToMany(Tag::class);
	}

	// Возвращает преобразованное поле body, а именно первые 100 символов:
	public function getBodyPreview(){
		return Str::limit($this->body, 100);
	}

	// Возвращает преобразованное поле created_at, время когда статья была создана:
	public function createdAtForHumans(){
		return $this->created_at->diffForHumans();
        //return $this->published_at->diffForHumans();
	}

	// ----- СКОПЫ для какой-то автоматизации: -----

	// Запускается так:		Article::allPaginate(10);
	public function scopeLastLimit($query, $numbers) {
		//return $query->with('tags', 'state')->orderBy('created_at', 'desc')->limit($numbers)->get();
		// Собрал сам:
		return $query->with('tags', 'state')->orderBy('id', 'asc')->limit($numbers)->get();
	}

	// Запускается так:		Article::lastLimit(6)
	public function scopeAllPaginate($query, $numbers) {
		//return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($numbers);
		// Собрал сам:
		return $query->with('tags', 'state')->orderBy('id', 'asc')->paginate($numbers);
	}

	// Запускается так:		Article::findBySlug($slug);
	public function scopeFindBySlug($query, $slug) {
		return $query->with('comments','tags', 'state')->where('slug', $slug)->firstOrFail();
	}

	// Запускается так:		Article::findByTag($slug);
	public function scopeFindByTag($query) {
		return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate(10);
	}
}
