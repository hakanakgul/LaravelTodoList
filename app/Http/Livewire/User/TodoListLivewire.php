<?php

namespace App\Http\Livewire\User;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoListLivewire extends Component
{
    public $todos;

    public $todo;

    protected $rules = [
        'todo.TodoTitle' => 'required',
    ];

    protected $messages = [
        'todo.TodoTitle.required' => 'required!',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        error_log($propertyName);
    }

    public function getTodos()
    {
        $this->todos = TodoList::where("UserId", Auth::user()->id)->get();
    }

    public function mount()
    {
        $this->getTodos();
        $this->todo = array();
    }

    public function render()
    {
        $this->getTodos();

        return view('livewire.user.todo-list-livewire');
    }
    public function changeStatus(TodoList $id)
    {
        if ($id) {
            $id->Status = $id->Status == 1 ? 0 : 1;
            $id->save();
        }
    }

    public function addNewTask()
    {
        $data = $this->validate();

        TodoList::create([
            "TodoTitle" => $data["todo"]["TodoTitle"],
            "Status" => 1,
            "UserId" => Auth::user()->id,
        ]);

        $this->todo = array();
    }

    public function updateTask(TodoList $id)
    {
    }

    public function deleteTask(TodoList $id)
    {

        $id->delete();

  
    }
}