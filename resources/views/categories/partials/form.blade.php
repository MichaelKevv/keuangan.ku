<div class="space-y-6 bg-white p-6 rounded-lg shadow">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-tag mr-2"></i>Nama Kategori
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}" class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white" required>
            @error('name')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-exchange-alt mr-2"></i>Tipe
            </label>
            <select name="type" id="type" class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white" required>
                <option value="income" {{ old('type', $category->type ?? '') == 'income' ? 'selected' : '' }}>Pemasukan</option>
                <option value="expense" {{ old('type', $category->type ?? '') == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
            @error('type')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="color" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-palette mr-2"></i>Warna
            </label>
            <input type="color" name="color" id="color" value="{{ old('color', $category->color ?? '#3B82F6') }}" class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white" style="height: 60px; width: 100%;">
            @error('color')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="icon" class="block text-sm font-medium text-gray-700">
                <i class="fas fa-icons mr-2"></i>Ikon
            </label>
            <input type="text" name="icon" id="icon" data-iconpicker-input="input#icon" value="{{ old('icon', $category->icon ?? 'fas fa-tag') }}" class="pl-12 pr-4 py-3 block w-full rounded-lg border-2 border-gray-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white icp icp-auto" required>
            @error('icon')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex items-center justify-end pt-4 mt-4">
        <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
            <i class="fas fa-times mr-1"></i>Batal
        </a>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            <i class="fas fa-save mr-2"></i>Simpan
        </button>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#icon').iconpicker();
    });
</script>
@endpush
