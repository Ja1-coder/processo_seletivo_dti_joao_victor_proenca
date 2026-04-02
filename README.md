```markdown
# 🚀 TaskFlow - Gerenciador de Tarefas (Desafio Técnico DTI)

Este projeto é um sistema de gerenciamento de tarefas (To-Do List) desenvolvido em **Laravel 13**, focado em simplicidade, segurança e experiência do usuário. O sistema permite o cadastro de usuários, autenticação segura e a gestão individual de tarefas (CRUD).

---

## 🛠️ Tecnologias e Versões Utilizadas

Para o desenvolvimento deste projeto, foram utilizadas as seguintes ferramentas e versões:

- **Ambiente Local:** XAMPP (Apache & MySQL)
- **PHP:** 8.4.6
- **Framework:** Laravel 13.3.0
- **Gerenciador de Dependências:** Composer 2.8.5
- **Frontend:** Tailwind CSS (via CDN) & SweetAlert2 (Notificações Toasts)

---

## 🚀 Como Instalar e Rodar o Projeto (XAMPP)

Siga os passos abaixo para configurar o ambiente em sua máquina local:
```

### 1\. Clonar o Repositório

```bash
git clone https://github.com/Ja1-coder/processo_seletivo_dti_joao_victor_proenca.git
cd processo-seletivo-dti
```

### 2\. Instalar Dependências do PHP

```bash
composer install
```

### 3\. Configurar o Ambiente (.env)

1.  Certifique-se de que o **XAMPP** (Apache e MySQL) está rodando.
2.  No seu navegador, acesse o `localhost/phpmyadmin` e crie um banco de dados chamado `taskflow_db`.
3.  Na raiz do projeto, copie o arquivo de exemplo e gere a chave da aplicação:

<!-- end list -->

```bash
cp .env.example .env
php artisan key:generate
```

4.  No arquivo `.env`, ajuste as credenciais conforme o seu XAMPP:

<!-- end list -->

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskflow_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4\. Migrações e Dados de Teste (Seeders)

Execute o comando abaixo para criar as tabelas e popular o banco com os usuários de teste pré-definidos:

```bash
php artisan migrate --seed
```

### 5\. Iniciar o Servidor

```bash
php artisan serve
```

---

## 🔐 Usuários para Teste (Seeders)

O sistema já vem com três usuários cadastrados para facilitar a avaliação. **A senha é a mesma para todos os perfis.**

| Usuário         | E-mail            | Senha      |
| :-------------- | :---------------- | :--------- |
| **João Victor** | `joao@teste.com`  | `teste123` |
| **Pedro**       | `pedro@teste.com` | `teste123` |
| **Jonas**       | `jonas@teste.com` | `teste123` |

---

## 💡 Funcionalidades Principais

- **Sistema de Autenticação:** Login, Cadastro de novos usuários e Logout.
- **Gestão de Tarefas (CRUD):** Criação, listagem e exclusão de tarefas em uma única tela.
- **Controle de Status:** Alternância rápida entre tarefas "Pendentes" e "Concluídas".
- **Privacidade de Dados:** Cada usuário logado tem acesso apenas às suas próprias tarefas (Vínculo por `user_id`).
- **Interface Moderna:** Layout limpo em tons pastel de azul utilizando Tailwind CSS.
- **Experiência do Usuário:** Mensagens de erro e sucesso via SweetAlert2 (Toasts no canto superior direito).

---

Desenvolvido por **João Victor Nascimento Proença** como parte do processo seletivo DTI - 2026.
