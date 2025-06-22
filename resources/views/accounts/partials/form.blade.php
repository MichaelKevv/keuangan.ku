<div class="space-y-6 bg-white p-6 rounded-lg shadow">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Account Name -->
        <div class="space-y-2 mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-signature mr-2"></i>Nama Akun
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $account->name ?? '') }}"
                class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                placeholder="Contoh: Dompet Utama, Rekening Bank" required>
            @error('name')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Initial Balance -->
        <div class="space-y-2 mb-6">
            <label for="balance_visible" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-balance-scale mr-2"></i>Saldo Awal
            </label>
            <div class="relative">
                <input type="text" id="balance_visible"
                    class="pl-4 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                    placeholder="0" required {{ isset($account) ? 'disabled' : '' }}>
                <input type="hidden" name="balance" id="balance" value="{{ old('balance', $account->balance ?? 0) }}">
            </div>
            @if(isset($account))
                <p class="mt-2 text-xs text-gray-500">Saldo awal tidak dapat diubah. Saldo diperbarui otomatis oleh transaksi.</p>
            @endif
            @error('balance')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Icon -->
        <div class="space-y-2 mb-6">
            <label for="icon" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-icons mr-2"></i>Ikon
            </label>
            <div class="input-group">
                <input type="text" name="icon" id="icon" data-iconpicker-input="input#icon"
                    value="{{ old('icon', $account->icon ?? 'fas fa-wallet') }}"
                    class="iconpicker-input pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                    placeholder="Pilih ikon" required>
            </div>
            @error('icon')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Color -->
        <div class="space-y-2 mb-6">
            <label for="color" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-palette mr-2"></i>Warna
            </label>
            <input type="color" name="color" id="color" value="{{ old('color', $account->color ?? '#000000') }}"
                class="w-full h-12 rounded-lg border-2 border-gray-200 shadow-sm cursor-pointer">
            @error('color')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex items-center justify-end pt-4 mt-4">
        <a href="{{ route('accounts.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
            <i class="fas fa-times mr-1"></i>Batal
        </a>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            <i class="fas fa-save mr-2"></i>Simpan
        </button>
    </div>
</div>
