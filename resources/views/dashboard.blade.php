<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content (Left Column) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Monthly Stats -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-chart-line mr-3 text-gray-400"></i>
                    Ringkasan Bulan Ini
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-green-500 p-2">
                        <p class="text-sm font-medium text-gray-500">Pemasukan</p>
                        <p class="text-2xl font-bold text-gray-800 mt-2">Rp {{ number_format($monthlyIncome, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-red-500 p-2">
                        <p class="text-sm font-medium text-gray-500">Pengeluaran</p>
                        <p class="text-2xl font-bold text-gray-800 mt-2">Rp {{ number_format($monthlyExpense, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-blue-500 p-2">
                        <p class="text-sm font-medium text-gray-500">Selisih</p>
                        <p class="text-2xl font-bold text-gray-800 mt-2">Rp {{ number_format($monthlyBalance, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-history mr-3 text-gray-400"></i>
                    Transaksi Terakhir
                </h3>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <ul class="divide-y divide-gray-200 -mx-6">
                        @forelse ($recentTransactions as $transaction)
                            <li class="px-6 py-4 flex justify-between items-center hover:bg-gray-50 transition-colors">
                                <div class="flex items-center">
                                    <span class="p-3 rounded-full mr-4" style="background-color: {{ optional($transaction->category)->color ?? '#cccccc' }}20;">
                                        <i class="{{ optional($transaction->category)->icon ?? 'fas fa-question-circle' }}" style="color: {{ optional($transaction->category)->color ?? '#cccccc' }};"></i>
                                    </span>
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $transaction->description }}</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $transaction->transaction_date->format('d M Y') }} &bull;
                                            <span class="font-medium">{{ optional($transaction->account)->name ?? 'Tanpa Akun' }}</span>
                                        </p>
                                    </div>
                                </div>
                                <p class="font-semibold text-lg {{ $transaction->type == 'income' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $transaction->type == 'income' ? '+' : '-' }}Rp{{ number_format($transaction->amount, 0, ',', '.') }}
                                </p>
                            </li>
                        @empty
                            <li class="px-6 py-10 text-center text-gray-500">
                                Belum ada transaksi bulan ini.
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sidebar (Right Column) -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Account Summary -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-wallet mr-3 text-gray-400"></i>
                    Ringkasan Akun
                </h3>
                <div class="bg-white p-6 rounded-lg shadow-sm space-y-5">
                    <div class="flex justify-between items-center border-b pb-4">
                        <p class="font-medium text-gray-600">Total Saldo</p>
                        <p class="text-xl font-bold text-blue-600">Rp {{ number_format($totalBalance, 0, ',', '.') }}</p>
                    </div>
                    <ul class="divide-y divide-gray-100">
                        @forelse($accounts as $account)
                            <li class="py-4 flex justify-between items-center">
                                <div class="flex items-center">
                                    <i class="{{ $account->icon }} mr-3" style="color: {{ $account->color }};"></i>
                                    <span class="text-gray-700">{{ $account->name }}</span>
                                </div>
                                <p class="font-medium text-gray-800">Rp {{ number_format($account->balance, 0, ',', '.') }}</p>
                            </li>
                        @empty
                             <li class="py-4 text-center text-gray-500">Belum ada akun.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Expense by Category -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-chart-pie mr-3 text-gray-400"></i>
                    Pengeluaran per Kategori
                </h3>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <ul class="space-y-5">
                        @forelse($expenseByCategory as $category)
                            <li>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-600">{{ $category['name'] }}</span>
                                    <span class="text-sm font-medium text-gray-600">{{ $category['percentage'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="h-2.5 rounded-full" style="width: {{ $category['percentage'] }}%; background-color: {{ $category['color'] }};"></div>
                                </div>
                            </li>
                        @empty
                            <li class="py-6 text-center text-gray-500">Belum ada pengeluaran bulan ini.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
