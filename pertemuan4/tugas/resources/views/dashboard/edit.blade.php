<x-dashboard-layout>
    <h1 class="text-xl font-bold mb-4">Edit Post</h1>

    <form action="/dashboard/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="title"
               value="{{ old('title', $post->title) }}"
               class="border p-2 w-full mb-2">

        @error('title')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <textarea name="body"
                  class="border p-2 w-full mb-2">{{ old('body', $post->body) }}</textarea>

        @error('body')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <button class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">
            Update
        </button>
    </form>
</x-dashboard-layout>
