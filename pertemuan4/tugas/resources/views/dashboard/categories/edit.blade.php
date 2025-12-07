<x-dashboard-layout>
    <h1 class="text-xl font-bold mb-4">Edit Category</h1>

    <form action="/dashboard/categories/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name"
               value="{{ old('name', $category->name) }}"
               class="border p-2 w-full mb-2">

        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <button class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">
            Update
        </button>
    </form>
</x-dashboard-layout>
