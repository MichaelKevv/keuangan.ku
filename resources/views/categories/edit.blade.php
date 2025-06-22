<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Kategori') }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            @include('categories.partials.form', ['category' => $category])
        </form>
    </div>
</x-app-layout>
