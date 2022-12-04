<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

	protected $fillable = ['title', 'body', 'ing', 'slug'];	// Поля доступные для заполнения

	// Пропишем взаимоотношение со статьёй:
	public function article() {
		// Как читается взаимоотношение со статьёй:
		// - Комментарий относится к статье -
		return $this->belongsTo(Article::class);
	}

	public function createdAtForHumans()
	{
		return $this->created_at->diffForHumans();
	}
}
