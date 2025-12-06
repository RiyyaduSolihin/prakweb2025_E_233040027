@props(['categories'])

{{-- Form Body --}}
<form action="{{ route('dashboard.store') }}" method="POST">
    @csrf

    <div class="grid gap-4 grid-cols-2">
        {{-- Title --}}
        <div class="col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="bg-neutral-secondary-medium border border-default-max rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Enter post title">
        </div>

        {{-- Category --}}
        <div class="col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Category</label>
            <select name="category_id" id="category_id" class="bg-neutral-secondary-medium border border-default-max rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Excerpt --}}
        <div class="col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-heading">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="3" class="block bg-neutral-secondary-medium border border-default-max rounded-base focus:ring-brand focus:border-brand w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Write a short excerpt"></textarea>
        </div>

        {{-- Body --}}
        <div class="col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-heading">Body</label>
            <textarea name="body" id="body" rows="6" class="block bg-neutral-secondary-medium border border-default-max rounded-base focus:ring-brand focus:border-brand w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Write your post content"></textarea>
        </div>
    </div>

    {{-- Form Footer --}}
    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 mt-4 md:mt-6">
        <button type="submit" class="inline-flex items-center justify-center bg-brand text-white font-medium rounded-base px-4 py-2.5 shadow-xs">
            Submit
        </button>

        <a href="{{ route('dashboard.index') }}" class="text-body hover:text-brand transition">
            Cancel
        </a>
    </div>
</form>
