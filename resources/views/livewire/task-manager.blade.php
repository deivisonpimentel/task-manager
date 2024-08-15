<div class="p-8 bg-gray-100 min-h-screen font-sans">
    <!-- Filtro por Categoria -->
    <div class="flex justify-between mb-8">
        <select wire:model="selectedCategory" class="form-select w-1/4 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">All</option>
            @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <!-- Botão "Nova Tarefa" -->
        <button wire:click="$set('showModal', true)" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg px-6 py-3 transition duration-200">
            Nova Tarefa
        </button>
    </div>

    <!-- Modal para Adicionar/Editar Tarefa -->
    @if($showModal)
    <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 relative">
            <button wire:click="$set('showModal', false)" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                &times;
            </button>
            <h2 class="text-xl font-semibold mb-4">{{ $editingTaskId ? 'Editar Tarefa' : 'Nova Tarefa' }}</h2>
            <form wire:submit.prevent="{{ $editingTaskId ? 'updateTask' : 'addTask' }}" class="space-y-6">
                <input type="text" wire:model="title" placeholder="Título da Tarefa" class="form-input w-full border border-gray-300 rounded-lg p-3 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <textarea wire:model="description" placeholder="Descrição da Tarefa" class="form-textarea w-full border border-gray-300 rounded-lg p-3 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

                <!-- Select para escolher categoria existente -->
                <select wire:model="category_id" class="form-select w-full border border-gray-300 rounded-lg p-3 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Selecione a Categoria</option>
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <!-- Input para criar nova categoria -->
                <input type="text" wire:model="newCategoryName" placeholder="Ou adicione uma nova categoria" class="form-input w-full border border-gray-300 rounded-lg p-3 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" />

                <label class="flex items-center space-x-2">
                    <input type="checkbox" wire:model="completed" class="form-checkbox text-blue-500 focus:ring-2 focus:ring-blue-500" />
                    <span class="text-gray-700">Concluída</span>
                </label>
                <div class="flex justify-end space-x-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg px-6 py-3 transition duration-200">
                        {{ $editingTaskId ? 'Atualizar Tarefa' : 'Adicionar Tarefa' }}
                    </button>
                    <button type="button" wire:click="$set('showModal', false)" class="bg-gray-500 hover:bg-gray-600 text-white rounded-lg px-6 py-3 transition duration-200">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <!-- Lista de Tarefas -->
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <ul class="space-y-6">
            @foreach($tasks as $task)
                <li class="p-6 bg-gray-100 rounded-lg shadow-md flex justify-between items-center transition duration-200 hover:shadow-lg">
                    <div>
                        <strong class="text-xl text-gray-800">{{ $task->title }}</strong>
                        <p class="text-gray-600 mt-2">{{ $task->description }}</p>
                        <div class="text-sm text-gray-500 mt-2">Categoria: <span class="font-medium text-gray-700">{{ $task->category->name }}</span></div>
                        <div class="text-sm text-gray-500 mt-1">Status:
                            <span class="{{ $task->completed ? 'text-green-500' : 'text-yellow-500' }}">
                                {{ $task->completed ? 'Concluída' : 'Pendente' }}
                            </span>
                        </div>
                    </div>
                    <div class="space-x-3 flex items-center">
                        <button wire:click="editTask({{ $task->id }})" class="text-yellow-500 hover:text-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l3 3L20.5 5.5a2.121 2.121 0 00-3-3L9 8l-3 3v3h3z" />
                            </svg>
                        </button>
                        <button wire:click="deleteTask({{ $task->id }})" class="text-red-500 hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
