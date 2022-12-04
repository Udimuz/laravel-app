<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

	protected $fillable = ['label'];	// Поля доступные для заполнения

	// Изменить поведение модели:	(видимо, чтобы не вставлялись данные со временем)
	public $timestamps = false;

	public function articles() {
		return $this->belongsToMany(Article::class);
	}
}
