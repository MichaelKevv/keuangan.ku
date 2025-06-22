<div class="w-64 bg-white shadow flex flex-col">
    <div class="p-4 border-b border-gray-200">
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800">
            {{ config('app.name', 'Keuangan.ku') }}
        </a>
    </div>
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-4 py-2 rounded-md {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('transactions.index') }}" class="flex items-center space-x-2 px-4 py-2 rounded-md {{ request()->routeIs('transactions.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-exchange-alt"></i>
            <span>Transaksi</span>
        </a>
        <a href="{{ route('categories.index') }}" class="flex items-center space-x-2 px-4 py-2 rounded-md {{ request()->routeIs('categories.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-folder"></i>
            <span>Kategori</span>
        </a>
        <a href="{{ route('accounts.index') }}" class="flex items-center space-x-2 px-4 py-2 rounded-md {{ request()->routeIs('accounts.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-wallet"></i>
            <span>Akun</span>
        </a>
        <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 px-4 py-2 rounded-md {{ request()->routeIs('profile.edit') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-user"></i>
            <span>Profil</span>
        </a>
    </nav>
</div>
