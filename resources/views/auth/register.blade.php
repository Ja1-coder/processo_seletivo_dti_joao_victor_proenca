@extends('layouts.app')

@section('title', 'Criar Conta - TaskFlow')

@section('main_class', 'bg-blue-50 h-screen flex items-center justify-center font-sans px-4')

@section('content')
    <div class="bg-white p-10 rounded-2xl shadow-sm w-full max-w-md border border-blue-100">
        
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-blue-900">Nova Conta</h2>
            <p class="text-blue-600 text-sm">Cadastre-se para organizar suas tarefas</p>
        </div>

        <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-blue-600 mb-1">Nome Completo</label>
                <input type="text" name="name" required class="w-full px-4 py-2 rounded-xl border border-blue-100 focus:border-blue-300 outline-none transition" placeholder="João Silva" value="{{ old('name') }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-blue-600 mb-1">E-mail</label>
                <input type="email" name="email" required class="w-full px-4 py-2 rounded-xl border border-blue-100 focus:border-blue-300 outline-none transition" placeholder="seu@email.com" value="{{ old('email') }}">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-blue-600 mb-1">Senha</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 rounded-xl border border-blue-100 focus:border-blue-300 outline-none transition" placeholder="••••••••">
                </div>
                <div>
                    <label class="block text-sm font-medium text-blue-600 mb-1">Confirmar</label>
                    <input type="password" name="password_confirmation" required class="w-full px-4 py-2 rounded-xl border border-blue-100 focus:border-blue-300 outline-none transition" placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 rounded-xl transition duration-300 shadow-md mt-4">
                Criar Minha Conta
            </button>
        </form>

        <div class="mt-6 pt-6 border-t border-blue-50 text-center">
            <a href="{{ route('login') }}" class="text-blue-400 text-sm hover:underline italic">
                Já tenho uma conta. Voltar ao login.
            </a>
        </div>
    </div>
@endsection