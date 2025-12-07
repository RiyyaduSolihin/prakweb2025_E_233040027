@if(session('success'))
<div class="flex items-center p-4 mb-4 text-sm text-green-600 rounded-lg bg-green-50 border border-green-300" role="alert">
    <p><strong>Success!</strong> {{ session('success') }}</p>
</div>
@endif
