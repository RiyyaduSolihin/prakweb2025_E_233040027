<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
</head>
<body>
    <h1>Daftar Kategori</h1>

    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }} (slug: {{ $category->slug }})</li>
        @endforeach
    </ul>
</body>
</html>