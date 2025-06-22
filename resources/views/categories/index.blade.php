<x-app-layout>
    <x-slot name="header">
        {{ __('Daftar Kategori') }}
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">
                <i class="fas fa-folder"></i> Semua Kategori
            </h3>
            <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-plus mr-2"></i> Tambah Kategori
            </a>
        </div>

        <div class="overflow-x-auto">
            <table id="categoriesTable" class="w-full display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" style="background-color: {{ $category->color }}20; color: {{ $category->color }};">
                                    <i class="{{ $category->icon }} mr-1"></i>
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $category->type == 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <i class="fas fa-{{ $category->type == 'income' ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                                    {{ ucfirst($category->type) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500">
                                Belum ada kategori.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#categoriesTable').DataTable({
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
