<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo ankes.jpeg') }}">
    <title>TLM Harbas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 text-white shadow-md">
      <div class="container mx-auto flex justify-between items-center">
        {{-- Left Side: Logo --}}
        <a href="{{ route('dashboard.index') }}" class="text-2xl font-bold text-white hover:text-gray-300 transition">
          TLM-HB
        </a>

        {{-- Middle Side: Menu Links --}}
        <div class="ml-10 flex items-left space-x-4 relative" x-data="{ open: false }">
          <button @click="open = !open" class="text-white-700 hover:text-gray-300 font-medium">
            {{ Auth::user()->name }} ▼
          </button>
          
          <!-- Dropdown Menu -->
          <div x-show="open" @click.away="open = false" class="absolute top-10 right-0 bg-white shadow-md md w-48">
              <a href="{{ route('admin.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Admin</a>
              <a href="{{ route('pasien.index')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Pasien</a>
              <a href="{{ route('dokter.index')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Dokter</a>
              <a href="{{ route('pemeriksaan.index')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Pemeriksaan</a>
              <a href="{{ route('logout')}}" class="block px-4 py-2 text-red-700 hover:bg-red-100">Log out</a>
            
          </div>
        </div>

        {{-- Right Side: Logout --}}
        @yield('logout')
      </div>

    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-6">
      @yield('content')
    </div>

</body>
</html>
