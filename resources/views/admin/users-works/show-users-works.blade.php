<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Users' Works
    </h2>
</x-slot>
<div class="py-2 m-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-2">
            <div class="mb-2">
                <div class="flex md:flex-row w-full">
                    <div class="w-full md:w-3/10 text-left">
{{--                        <button wire:click="create()" class="w-40 ml-2 focus:outline-none focus:shadow-outline bg-indigo-500 hover:bg-indigo-700--}}
{{--                            h-10 text-white font-bold py-1 px-4 rounded">--}}
{{--                            Edit User's Work--}}
{{--                        </button>--}}
                        @if($isOpen)
                            @include('admin.users-works.edit')
                        @endif
                    </div>
                    <div class="w-full md:w-8/10 text-center">
                        <input wire:model="search" type="text" class="w-full shadow appearance-none border rounded py-2
                        px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                               placeholder="Search posts:" name="search">
                        @error('search')<span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="w-full md:w-1/10">
                        <svg class="w-8 h-8 ml-2 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-indigo-200 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <table class="space-y-48 table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2 w-4">No.</th>
{{--                    <th class="border px-4 py-2 w-10">User name</th>--}}
                    <th class="border px-4 py-2 w-10">Title</th>
                    <th class="border px-4 py-2 w-16">Description</th>
                    <th class="border px-4 py-2 w-16">Img</th>
                    <th class="border px-4 py-2 w-8">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($worksOfUsers as $workOfUsers)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ $workOfUsers->id }}
                        </td>
{{--                        <td class="border px-4 py-2">{{ $workOfUsers->user->name }}</td>--}}
                        <td class="border px-4 py-2">
                            {{ $workOfUsers->title }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $workOfUsers->body }}
                        </td>
                        <td class="border px-4 py-2 w-1/2">
                            <div class="flex md:flex-row flex-wrap p-4">
{{--                                @if($workOfUsers->img)--}}
{{--                                    <img src="{{ $workOfUsers->img }}" class="w-20 mr-2" alt="">--}}
{{--                                @endif--}}
{{--                                @if($workOfUsers->schema1)--}}
{{--                                    <img src="{{ $workOfUsers->schema1 }}" class="w-12" alt="">--}}
{{--                                @endif--}}
                                @if($workOfUsers->img)
                                    <img src="{{ url('/storage/docs/' . $workOfUsers->img) }}"
                                         class="w-60" alt="{{ $workOfUsers->title }}" />
                                @endif
{{--                                @if($workOfUsers->schema2)--}}
{{--                                    <img src="{{ url('/storage/photos_users_works/' . $workOfUsers->schema2) }}"--}}
{{--                                         class="w-60" alt="{{ $workOfUsers->title }}" />--}}
{{--                                @endif--}}
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $workOfUsers->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded">
                                Edit
                            </button>
                            <button wire:click="delete({{ $workOfUsers->id }})" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                Delete
                            </button>
                            <button wire:click="delete({{ $workOfUsers->id }})" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                Publish
                            </button>
{{--                            <a href="{{ route('post', $post->id) }}">--}}
{{--                                <button class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">--}}
{{--                                    Show--}}
{{--                                </button>--}}
{{--                            </a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $worksOfUsers->links() }}
        </div>
    </div>
</div>

