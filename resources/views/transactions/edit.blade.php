<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Transaksi') }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <form action="{{ route('transactions.update', $transaction) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            @include('transactions.partials.form', ['transaction' => $transaction])
        </form>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = document.getElementById('type');
            const categorySelect = document.getElementById('category_id');
            const categories = @json($categories);
            const oldCategoryId = '{{ old('category_id', $transaction->category_id ?? '') }}';

            function updateCategoryOptions(shouldRetainSelection) {
                const selectedType = typeSelect.value;

                categorySelect.innerHTML = '';

                const placeholder = document.createElement('option');
                placeholder.value = '';

                if (!selectedType) {
                    placeholder.textContent = 'Pilih Tipe Transaksi Terlebih Dahulu';
                    categorySelect.appendChild(placeholder);
                    categorySelect.disabled = true;
                    return;
                }

                placeholder.textContent = 'Pilih Kategori';
                categorySelect.appendChild(placeholder);
                categorySelect.disabled = false;

                const filteredCategories = categories.filter(category => category.type === selectedType);

                filteredCategories.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    if (shouldRetainSelection && category.id == oldCategoryId) {
                        option.selected = true;
                    }
                    categorySelect.appendChild(option);
                });
            }

            typeSelect.addEventListener('change', () => updateCategoryOptions(false));

            // Initial call to set state on page load
            updateCategoryOptions(true);

            // --- CURRENCY FORMATTING SCRIPT ---
            const amountVisible = document.getElementById('amount_visible');
            const amountHidden = document.getElementById('amount');
            const formatter = new Intl.NumberFormat('id-ID');

            // On page load, format the initial value if it exists
            if (amountHidden.value) {
                amountVisible.value = formatter.format(amountHidden.value);
            }

            // On input, update both fields
            amountVisible.addEventListener('input', function(e) {
                const rawValue = e.target.value.replace(/\D/g, '') || '0';
                amountHidden.value = rawValue;
                amountVisible.value = formatter.format(rawValue);
            });
        });
    </script>
    @endpush
</x-app-layout>
