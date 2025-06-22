<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Akun Baru') }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <form action="{{ route('accounts.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @include('accounts.partials.form')
        </form>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#icon').iconpicker();

            // --- CURRENCY FORMATTING SCRIPT ---
            const balanceVisible = document.getElementById('balance_visible');
            const balanceHidden = document.getElementById('balance');
            const formatter = new Intl.NumberFormat('id-ID');

            if (balanceHidden.value) {
                balanceVisible.value = formatter.format(balanceHidden.value);
            }

            balanceVisible.addEventListener('input', function(e) {
                const rawValue = e.target.value.replace(/\D/g, '') || '0';
                balanceHidden.value = rawValue;
                balanceVisible.value = formatter.format(rawValue);
            });
        });
    </script>
    @endpush
</x-app-layout>
