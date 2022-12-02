<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

	protected $fillable = ['title', 'body', 'ing', 'slug'];	// Поля доступные для заполнения
	//protected $guarded = [];	// Поля защищённые от заполнения

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

}
