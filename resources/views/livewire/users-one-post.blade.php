<div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-6">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        <h2 class="text-5xl m-4">{{ $post->title }}</h2>
        <a href="{{ route('one-cat', $post->category->id) }}" class="text-indigo-800 mb-4 font-bold">
            Category: {{ $post->category->name }}
        </a>
        <p>{{ $post->created_at->diffForHumans() }}</p>
        <div class="flex md:flex-row flex-wrap p-4">
            <img src="{{ $post->img }}" class="w-80 mr-4" alt="Image">
            <img src="{{ $post->schema1 }}" class="w-60" alt="Image">
        </div>
        <h4 class="text-indigo-800 mt-4 font-bold">You need:</h4>
        <h4>{{ $post->you_need }}</h4>
        <h4 class="text-indigo-800 mt-4 font-bold">Work description:</h4>
        <p>{{ $post->body }}</p>
{{--        <img src="{{ $post->schema2 }}" class="w-80" alt="Image">--}}
    </div>
</div>
