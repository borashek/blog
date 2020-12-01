@foreach($works as $work)
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-6">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <h2 class="text-5xl m-4">{{ $work->title }}</h2>
            <h4 class="text-indigo-800 mb-4 font-bold">Category:</h4>
            <div class="flex md:flex-row flex-wrap p-4">
                <img src="{{ $work->img }}" class="w-60 mr-4" alt="">
                <img src="{{ $work->schema1 }}" class="w-40" alt="">
            </div>
            <h4 class="text-indigo-800 mt-4 font-bold">You need:</h4>
            <h4>{{ $work->you_need }}</h4>
            <a href="{{ route('my-works', $work->id) }}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 m-2 rounded">
                    Description
                </button>
            </a>
        </div>
    </div>
@endforeach
