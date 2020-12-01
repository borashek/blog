@foreach($categories as $category)
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-6">
        <a class="px-4 py-4" href="{{ route('one-cat', $category->id) }}">
            {{ $category->name }}
        </a>
    </div>
@endforeach
