@foreach($advertisements as $advertisement)
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-6">
        <a href="{{ $advertisement->link }}">
            <img src="{{ $advertisement->image }}" class="w-40" alt="{{ $advertisement->site_title }}">
        </a>
        <a href="{{ $advertisement->link }}">
            <h3 class="text-indigo-800 font-bold">{{ $advertisement->site_title }}</h3>
        </a>
    </div>
@endforeach
