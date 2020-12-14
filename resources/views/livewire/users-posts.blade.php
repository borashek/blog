<div class="pt-6">
    <div class="mb-2">
        <div class="flex md:flex-row w-full">
            <div class="w-full md:w-5/6 pl-12 center">
                <input wire:model="search" type="text" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700
                       leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                       placeholder="What tutorial do You look For:)"
                       name="search">
                @error('search') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="w-full md:w-1/6">
                <svg class="w-8 h-8 mt-2 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
</div>
@foreach($posts as $post)
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <h2 class="text-5xl m-4">{{ $post->title }}</h2>
            <a href="{{ route('one-cat', $post->category->id) }}" class="text-indigo-800 mb-4 font-bold">
                Category: {{ $post->category->name }}
            </a>
            <p>{{ $post->created_at->diffForHumans() }}</p>
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
{{ $posts->links('livewire.custom-pagination-links-view') }}




