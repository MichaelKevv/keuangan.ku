<x-app-layout>
    <x-slot name="header">
        {{ __('Daftar Transaksi') }}
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">
                <i class="fas fa-list"></i> Semua Transaksi
            </h3>
            <a href="{{ route('transactions.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-plus mr-2"></i> Tambah Transaksi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table id="transactionsTable" class="w-full display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->transaction_date->format('d M Y') }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                    style="background-color: {{ $transaction->category->color }}20; color: {{ $transaction->category->color }};">
                                    <i class="{{ $transaction->category->icon }} mr-1"></i>
                                    {{ $transaction->category->name }}
                                </span>
                            </td>
                            <td
                                class="font-semibold {{ $transaction->type == 'income' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction->type == 'income' ? '+' : '-' }} Rp
                                {{ number_format($transaction->amount, 0, ',', '.') }}
                            </td>
                            <td>
                                <a href="{{ route('transactions.edit', $transaction) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('transactions.destroy', $transaction) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Anda yakin ingin menghapus transaksi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#transactionsTable').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
                    },
                    "columnDefs": [{
                        "orderable": false,
                        "targets": -1
                    }],
                    "pagingType": "simple_numbers",
                    "autoWidth": false,
                    "responsive": true
                });
            });
        </script>
    @endpush
</x-app-layout>
