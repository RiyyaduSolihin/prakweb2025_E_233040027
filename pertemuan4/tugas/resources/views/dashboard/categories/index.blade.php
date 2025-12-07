<x-dashboard-layout>
    <h1 class="text-xl font-bold mb-4">Data Categories</h1>

    <a href="/dashboard/categories/create"
       class="bg-blue-500 text-white px-3 py-2 rounded">
        + Tambah Category
    </a>

    @include('partials.alert-success')

    <table class="mt-4 w-full border">
        <tr class="bg-gray-100">
            <th class="border p-2">#</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Aksi</th>
        </tr>

        @foreach($categories as $cat)
        <tr>
            <td class="border p-2">{{ $loop->iteration }}</td>
            <td class="border p-2">{{ $cat->name }}</td>
            <td class="border p-2">
                <a href="/dashboard/categories/{{ $cat->id }}/edit" class="text-blue-500">Edit</a> |

                <form action="/dashboard/categories/{{ $cat->id }}" method="POST" class="inline">
                    @csrf
                    @method('delete')
                    <button class="text-red-500" onclick="return confirm('Hapus data?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-dashboard-layout>
