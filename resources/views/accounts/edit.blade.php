<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Akun') }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <form action="{{ route('accounts.update', $account) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            @include('accounts.partials.form', ['account' => $account])
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

            // On page load, format the initial value if it exists
            if (balanceHidden.value) {
                balanceVisible.value = formatter.format(balanceHidden.value);
            }
        });
    </script>
    @endpush
</x-app-layout>
