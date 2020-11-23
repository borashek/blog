<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Categories
    </h2>
</x-slot>
<div class="py-2 m-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button wire:click="create()" class="mb-8 bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded my-3">Create New Advertisement</button>
        @if($isOpen)
            @include('admin.advertising.create')
        @endif
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
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
                        <th class="border px-4 py-2 w-20">No.</th>
                        <th class="border px-4 py-2">Image</th>
                        <th class="border px-4 py-2 w-80">Link</th>
                        <th class="border px-4 py-2 w-28">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($advertisements as $advertisement)
                    <tr>
                        <td class="border px-4 py-2">{{ $advertisement->id }}</td>
                        <td class="border px-4 py-2 w-1/2">{{ $advertisement->image }}</td>
                        <td class="border px-4 py-2 w-1/2">{{ $advertisement->link }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $advertisement->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded">
                                Edit
                            </button>
                            <button wire:click="delete({{ $advertisement->id }})" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
