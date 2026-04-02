<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskFlow')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .bg-pastel { background-color: #f0f7ff; }
        .swal2-toast { border: 1px solid #e0f2fe !important; }
    </style>
</head>
<body class="bg-pastel font-sans text-gray-800 min-h-screen">

    @if (View::hasSection('navbar'))
        <nav class="bg-white shadow-sm border-b border-blue-100 p-4 mb-6">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">TaskFlow</a>
                
                @auth
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-blue-400">Olá, <strong>{{ Auth::user()->name }}</strong></span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-400 text-sm hover:underline">Sair</button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
    @endif

    <main class="@yield('main_class', 'container mx-auto px-4')">
        @yield('content')
    </main>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            background: '#ffffff',
            color: '#1e40af',
            iconColor: '#60a5fa',
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if(session('success'))
            Toast.fire({ icon: 'success', title: "{{ session('success') }}" });
        @endif

        @if($errors->any())
            Toast.fire({ icon: 'error', title: "{{ $errors->first() }}" });
        @endif
    </script>

</body>
</html>