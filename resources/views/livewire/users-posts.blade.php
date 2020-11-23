@foreach($posts as $post)
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <h2 class="text-5xl m-4">{{ $post->title }}</h2>
            <h4 class="text-indigo-800 mb-4 font-bold">Category:</h4>
            <div class="flex md:flex-row flex-wrap p-4">
                <img src="{{ $post->img }}" class="w-60 mr-4" alt="">
                <img src="{{ $post->schema1 }}" class="w-40" alt="">
            </div>
            <h4 class="text-indigo-800 mt-4 font-bold">You need:</h4>
            <h4>{{ $post->you_need }}</h4>
            <a href="{{ route('post', $post->id) }}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 m-2 rounded">
                    Description
                </button>
            </a>
        </div>
    </div>
@endforeach
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-6">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        {{ $posts->links('livewire.custom-pagination-links-view') }}
    </div>
</div>



