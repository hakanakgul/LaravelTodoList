<div>

    <style>
        input[type=checkbox]:checked+label span:first-of-type {
            background-color: #10B981;
            border-color: #10B981;
            color: #fff;
        }

        input[type=checkbox]:checked+label span:nth-of-type(2) {
            text-decoration: line-through;
            color: #9CA3AF;
        }
    </style>
    <div class="flex items-center justify-center font-medium pb-3">
        <div class="flex flex-grow items-center justify-center h-full text-gray-600">
            <!-- Component Start -->
            <div class="max-w-full p-8 bg-white rounded-lg shadow-lg w-96">
                <div class="flex items-center mb-6">
                    <svg class="h-8 w-8 text-indigo-500 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h4 class="font-semibold ml-3 text-lg">{{ Auth::user()->name }}'s Jobs</h4>
                </div>

                <button class="flex items-center w-full h-8 px-2 mt-2 text-sm font-medium rounded">
                    <svg wire:click='addNewTask'
                        class="w-5 h-5 text-gray-400 fill-current hover:text-gray-500 hover:bg-gray-200 hover:rounded-lg active:text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <input wire:model='todo.TodoTitle' wire:keydown.enter='addNewTask'
                        class="flex-grow h-8 ml-4 bg-transparent focus:outline-none font-medium" type="text"
                        placeholder="add a new task">
                </button>
                @error('todo.TodoTitle')
                    <div class="text-bold text-red-800 bg-red-200 rounded m-2 mt-1">
                        {{ $message }}
                    </div>
                @enderror
                @foreach ($todos as $todo)
                    <div wire:ignore>
                        <input wire:click='changeStatus({{ $todo->TodoListId }})' class="hidden" type="checkbox"
                            id="task_{{ $todo->TodoListId }}" {{ $todo->Status == 0 ? 'checked' : '' }}>
                        <label class="flex items-center h-10 px-2 rounded cursor-pointer hover:bg-gray-100"
                            for="task_{{ $todo->TodoListId }}">
                            <span
                                class="flex items-center justify-center w-5 h-5 text-transparent border-2 border-gray-300 rounded-full">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-4 text-sm select-none">{{ $todo->TodoTitle }}</span>
                            <div class="float-end">X</div>
                        </label>

                    </div>
                @endforeach

            </div>
            <!-- Component End  -->
        </div>


    </div>

</div>
