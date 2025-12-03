<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
   <nav class="flex gap-6 bg-gray-100 p-4">
    <a href="/welcome" class="text-gray-700 font-semibold hover:text-blue-600">welcome</a>
  <a href="/home" class="text-gray-700 font-semibold hover:text-blue-600">Home</a>
  <a href="/about" class="text-gray-700 font-semibold hover:text-blue-600">About</a>
  <a href="/posts" class="text-gray-700 font-semibold hover:text-blue-600">Posts</a>
  <a href="/categories" class="text-gray-700 font-semibold hover:text-blue-600">Categori</a>
</nav>

    {{ $slot }}
</body>
</html>