@extends('layouts.app')

@section('title', 'Login - Gerenciador de Tarefas')


@section('main_class', 'bg-blue-50 h-screen flex items-center justify-center font-sans px-4')

@section('content')
    <div class="bg-white p-10 rounded-2xl shadow-sm w-full max-w-sm border border-blue-100">
        
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-blue-900">Entrar</h2>
            <p class="text-blue-600 text-sm">Acesse sua conta para gerenciar tarefas</p>
        </div>

        {{-- Alterado: action agora aponta para a rota de login que definimos no AuthController --}}
        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-medium text-blue-600 mb-1">E-mail</label>
                <input type="email" name="email" id="email" required 
                    class="w-full px-4 py-3 rounded-xl border border-blue-100 focus:border-blue-300 focus:ring focus:ring-blue-100 outline-none transition duration-200 placeholder-blue-200"
                    placeholder="exemplo@email.com"
                    value="{{ old('email') }}">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-blue-600 mb-1">Senha</label>
                <input type="password" name="password" id="password" required 
                    class="w-full px-4 py-3 rounded-xl border border-blue-100 focus:border-blue-300 focus:ring focus:ring-blue-100 outline-none transition duration-200 placeholder-blue-200"
                    placeholder="••••••••">
                @error('login')
                    <span class="text-red-400 text-xs mt-4">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" 
                class="w-full bg-blue-200 hover:bg-blue-300 text-blue-700 font-bold py-3 rounded-xl transition duration-300 shadow-sm">
                Acessar
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-blue-50 text-center">
            <p class="text-gray-400 text-sm mb-2">Não tem uma conta?</p>
            <a href="{{ route('register') }}" class="text-blue-500 font-semibold text-sm hover:text-blue-700 transition">
                Criar nova conta agora
            </a>
        </div>
    </div>
@endsection