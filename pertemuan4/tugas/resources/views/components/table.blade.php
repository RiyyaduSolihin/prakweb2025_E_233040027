{{-- Pagination --}}
@if ($posts->hasPages())
    <div class="px-4 py-4 border-t border-gray-200">
        <nav aria-label="Page navigation">
            <ul class="flex space-x-2 text-sm">

                {{-- Previous Button --}}
                @if ($posts->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center text-body bg-neutral-secondary-soft border-default-medium text-neutral-tertiary-medium cursor-not-allowed font-medium rounded-s-base text-sm px-3 h-10 focus:outline-none">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $posts->previousPageUrl() }}"
                           class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-10 focus:outline-none">Previous</a>
                    </li>
                @endif

                {{-- Page Numbers --}}
                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                    @if ($page == $posts->currentPage())
                        <li>
                            <span aria-current="page" class="flex items-center justify-center text-primary-strong bg-brand-tertiary-soft box-border border border-primary-strong font-medium rounded-base text-sm px-3 h-10 focus:outline-none">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                               class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-base text-sm px-3 h-10 focus:outline-none">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if ($posts->hasMorePages())
                    <li>
                        <a href="{{ $posts->nextPageUrl() }}"
                           class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-10 focus:outline-none">Next</a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center text-body bg-neutral-secondary-soft border border-gray-100 cursor-not-allowed font-medium rounded-e-base text-sm px-3 h-10">Next</span>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
@endif


{{-- Header with Search and Add Post button --}}
<div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center gap-4 bg-gradient-to-r from-blue-500 to-indigo-500">

    {{-- Search --}}
    <form method="GET" action="{{ route('dashboard.index') }}" class="flex-1 max-w-md">
        <label for="search" class="block mb-2 text-sm text-white">Search</label>
        <div class="flex items-center">
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                class="block w-full px-3 py-2 bg-neutral-secondary-medium border border-default-medium text-body placeholder:text-content-tertiary rounded-md focus:ring-primary-medium focus:border-primary-medium"
                placeholder="Search posts...">
            <button type="submit"
                class="ml-2 px-4 py-2 bg-primary-medium text-white rounded-md hover:bg-primary-strong transition-all">
                Search
            </button>
        </div>
    </form>

    {{-- Add Post Button --}}
    <a href="{{ route('dashboard.create') }}"
        class="inline-flex items-center px-4 py-2 bg-blue-700 text-white font-medium rounded-md shadow hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 whitespace-nowrap transition-all">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 4v16m8-8H4" />
        </svg>
        Add Post
    </a>
</div>


{{-- Table --}}
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">No</th>
                <th scope="col" class="px-6 py-3 font-medium">Title</th>
                <th scope="col" class="px-6 py-3 font-medium">Author</th>
                <th scope="col" class="px-6 py-3 font-medium">Category</th>
                <th scope="col" class="px-6 py-3 font-medium">Published At</th>
                <th scope="col" class="px-6 py-3 font-medium">Actions</th>
                <th scope="col" class="px-6 py-3 font-medium">Image</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($posts as $post)
            <tr class="bg-neutral-primary border-b border-default">
                <td class="px-6 py-4">
                    {{ $posts->firstItem() + $loop->index }}
                </td>

                <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{ $post->title }}
                </td>

                <td class="px-6 py-4">
                    {{ $post->author->name ?? 'Unknown' }}
                </td>

                <td class="px-6 py-4">
                    {{ $post->category->name ?? 'Uncategorized' }}
                </td>

                <td class="px-6 py-4">
                    {{ $post->created_at->format('d M Y') }}
                </td>

                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('dashboard.show', $post->slug) }}"
                       class="text-blue-600 hover:underline">
                       View
                    </a>
                </td>
                <td class="px-6 py-4">
                    @if($post->image)
                        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded">
                    @else
                        <img src="{{ asset('images/preview.jpg') }}" alt="Image preview" class="w-16 h-16 object-cover rounded">
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                    No posts yet,
                    <a href="{{ route('dashboard.create') }}" class="text-blue-600 hover:underline">
                        Create one
                    </a>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
