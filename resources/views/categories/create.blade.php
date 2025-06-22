<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Kategori Baru') }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            @include('categories.partials.form')
        </form>
    </div>
</x-app-layout>
