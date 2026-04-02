@extends('layouts.app')

@section('title', 'Minhas Tarefas - TaskFlow')

@section('navbar', true) 

@section('content')
<div class="max-w-4xl mx-auto pb-10">
    
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-blue-100 mb-8">
        <h3 class="text-lg font-bold text-blue-900 mb-4 flex items-center">
            <span class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
            </span>
            Nova Tarefa
        </h3>

        <form id="taskForm" action="{{ route('tasks.store') }}" method="POST" class="grid grid-cols-1 gap-4 items-end">
            @csrf
            <div class="md:col-span-1">
                <label class="block text-xs font-medium text-blue-400 mb-1 uppercase tracking-wider">Título</label>
                <input type="text" name="title" required 
                    class="w-full px-4 py-2 rounded-xl border border-blue-300 focus:border-blue-900 outline-none transition placeholder-blue-200"
                    placeholder="O que precisa ser feito?">
            </div>

            <div class="md:col-span-1">
                <label class="block text-xs font-medium text-blue-400 mb-1 uppercase tracking-wider">Descrição (Opcional)</label>
                <input type="text" name="description" 
                    class="w-full px-4 py-2 rounded-xl border border-blue-300 focus:border-blue-900 outline-none transition placeholder-blue-200"
                    placeholder="Algum detalhe extra?">
            </div>

            <div class="md:col-span-1">
                <button type="submit" 
                    class="w-1/4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-xl transition duration-300 shadow-blue-200 shadow-lg">
                    Adicionar Tarefa
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">
        <div class="p-6 border-b border-blue-50">
            <h3 class="text-lg font-bold text-blue-900">Suas Tarefas</h3>
        </div>

        <div class="divide-y divide-blue-50">
            @forelse ($tasks as $task)
                <div class="p-4 flex items-center justify-between hover:bg-blue-50/50 transition">
                    <div class="flex items-center space-x-4">
                        <form action="{{ route('tasks.status', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" 
                                class="h-6 w-6 rounded-full border-2 flex items-center justify-center transition
                                {{ $task->status ? 'bg-green-400 border-green-400 text-white' : 'border-blue-200 text-transparent hover:border-blue-400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>

                        <div>
                            <h4 class="font-semibold {{ $task->status ? 'text-gray-400 line-through' : 'text-blue-900' }}">
                                {{ $task->title }}
                            </h4>
                            @if($task->description)
                                <p class="text-sm text-gray-500">{{ $task->description }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Excluir esta tarefa?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-300 hover:text-red-500 transition p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-10 text-center">
                    <img src="https://illustrations.popsy.co/blue/abstract-art-4.svg" class="h-32 mx-auto mb-4 opacity-50">
                    <p class="text-blue-300">Você ainda não tem tarefas. Comece criando uma acima!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection