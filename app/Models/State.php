<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

	protected $fillable = ['title', 'body', 'ing', 'slug'];	// Поля доступные для заполнения
	// Изменить поведение модели:	временные штампы здесь не нужны
	public $timestamps = false;

	// Отношения не указываются. Статистику будем доставать ИЗ статьи. Никогда не будем доставать статью из статистики
}
