<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = "todo_lists";
    protected $primaryKey = 'TodoListId';

    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    protected $fillable = [
        "TodoListId",
        "UserId",
        "TodoTitle",
        "TodoDescription",
        "Status",
    ];
}