<div class="space-y-6 bg-white p-6 rounded-lg shadow">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Transaction Type -->
        <div class="space-y-2 mb-6">
            <label for="type" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-exchange-alt mr-2"></i>Tipe Transaksi
            </label>
            <select name="type" id="type"
                class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                required>
                <option value="">Pilih Tipe</option>
                <option value="income" {{ old('type', $transaction->type ?? '') == 'income' ? 'selected' : '' }}>
                    <i class="fas fa-arrow-up"></i> Pemasukan
                </option>
                <option value="expense" {{ old('type', $transaction->type ?? '') == 'expense' ? 'selected' : '' }}>
                    <i class="fas fa-arrow-down"></i> Pengeluaran
                </option>
            </select>
            @error('type')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Account -->
        <div class="space-y-2 mb-6">
            <label for="account_id" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-wallet mr-2"></i>Akun
            </label>
            <select name="account_id" id="account_id" class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white" required>
                <option value="">Pilih Akun</option>
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}" {{ old('account_id', $transaction->account_id ?? '') == $account->id ? 'selected' : '' }}>
                        {{ $account->name }} (Rp {{ number_format($account->balance, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
            @error('account_id')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div class="space-y-2 mb-6">
            <label for="category_id" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-folder mr-2"></i>Kategori
            </label>
            <select name="category_id" id="category_id"
                class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                required>
                <option value="">Pilih Tipe Transaksi Terlebih Dahulu</option>
            </select>
            @error('category_id')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Amount -->
        <div class="space-y-2 mb-6">
            <label for="amount_visible" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-money-bill-wave mr-2"></i>Jumlah
            </label>
            <div class="relative">
                <input type="text" id="amount_visible"
                    class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                    placeholder="0" required>
                <input type="hidden" name="amount" id="amount" value="{{ old('amount', $transaction->amount ?? '') }}">
            </div>
            @error('amount')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Transaction Date -->
        <div class="space-y-2 mb-6">
            <label for="transaction_date" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-calendar-alt mr-2"></i>Tanggal Transaksi
            </label>
            <input type="date" name="transaction_date" id="transaction_date"
                value="{{ old('transaction_date', isset($transaction) ? $transaction->transaction_date->format('Y-m-d') : date('Y-m-d')) }}"
                class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                required>
            @error('transaction_date')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="space-y-2 mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-sticky-note mr-2"></i>Deskripsi (Opsional)
            </label>
            <textarea name="description" id="description" rows="4"
                class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                placeholder="Contoh: Beli Kopi">{{ old('description', $transaction->description ?? '') }}</textarea>
            @error('description')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex items-center justify-end pt-4 mt-4">
        <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
            <i class="fas fa-times mr-1"></i>Batal
        </a>
        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            <i class="fas fa-save mr-2"></i>Simpan
        </button>
    </div>
</div>
