<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\Category;

class TaskManager extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $category_id;
    public $newCategoryName;
    public $completed = false;
    public $editingTaskId = null;
    public $showModal = false;
    public $selectedCategory = ''; // Nova propriedade para o filtro de categoria

    public function mount()
    {
        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.task-manager');
    }

    // Função para carregar as tarefas com base na categoria selecionada
    public function loadTasks()
    {
        $this->tasks = $this->selectedCategory
            ? Task::where('category_id', $this->selectedCategory)->with('category')->get()
            : Task::with('category')->get();
    }

    public function addTask()
    {
        // Verifica se uma nova categoria foi inserida
        if ($this->newCategoryName) {
            $category = Category::create(['name' => $this->newCategoryName]);
            $this->category_id = $category->id;
        }

        // Cria a nova tarefa
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'completed' => $this->completed,
        ]);

        // Reseta o formulário e fecha o modal
        $this->resetForm();
        $this->showModal = false;
        $this->loadTasks();
    }

    public function editTask($id)
    {
        $task = Task::find($id);
        $this->editingTaskId = $id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->category_id = $task->category_id;
        $this->completed = $task->completed;
        $this->showModal = true;
    }

    public function updateTask()
    {
        $task = Task::find($this->editingTaskId);
        $task->update([
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'completed' => $this->completed,
        ]);

        $this->resetForm();
        $this->showModal = false;
        $this->loadTasks();
    }

    public function deleteTask($id)
    {
        Task::destroy($id);
        $this->loadTasks();
    }

    private function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->category_id = null;
        $this->newCategoryName = '';
        $this->completed = false;
        $this->editingTaskId = null;
    }
}
