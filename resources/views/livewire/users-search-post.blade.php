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
                <button class="w-14 ml-2 focus:outline-none focus:shadow-outline bg-indigo-500 hover:bg-indigo-700
                    h-10 text-white font-bold py-1 px-4 rounded">
                    <svg class="w-4 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

