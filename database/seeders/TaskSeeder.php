<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscamos os usuários criados no UserSeeder pelos e-mails definidos
        $joao = User::where('email', 'joao@teste.com')->first();
        $pedro = User::where('email', 'pedro@teste.com')->first();
        $jonas = User::where('email', 'jonas@teste.com')->first();

        // Tarefas para o João Victor
        if ($joao) {
            $joao->tasks()->createMany([
                [
                    'title' => 'Desenvolver Models',
                    'description' => 'Criar Models User e Task com relacionamentos.',
                    'status' => 1, // Concluída
                ],
                [
                    'title' => 'Configurar Seeders',
                    'description' => 'Popular o banco com dados de teste para o README.',
                    'status' => 0, // Pendente
                ],
            ]);
        }

        // Tarefas para o Pedro
        if ($pedro) {
            $pedro->tasks()->createMany([
                [
                    'title' => 'Criar Controladores',
                    'description' => 'Implementar a lógica de CRUD no TaskController.',
                    'status' => 0, // Pendente
                ],
            ]);
        }

        // Deixamos o Jonas sem tarefas (ou apenas uma) para testar diferentes cenários de listagem
        if ($jonas) {
            $jonas->tasks()->create([
                'title' => 'Revisar Documentação',
                'description' => 'Ler os requisitos do desafio técnico da DTI.',
                'status' => 1, // Concluída
            ]);
        }
    }
}
