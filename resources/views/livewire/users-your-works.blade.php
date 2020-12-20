<div class="bg-indigo-50 p-10">
    <div class="w-full md:w-3/5 text-center">

        <div class="w-full md:w-3/10 text-left">
            <button wire:click="create()" class="w-60 ml-2 focus:outline-none focus:shadow-outline bg-indigo-500 hover:bg-indigo-700
                                            h-10 text-white font-bold py-1 px-4 rounded">
                Send me your work
            </button>
            @if($isOpen)
                @include('livewire.users-works')
            @endif
        </div>

        <h4 class="mt-6 text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-lg sm:leading-none md:text-lg">
            Photographs of your works
        </h4>

        <table class="table-fixed w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2 w-2">No.</th>
                <th class="border px-4 py-2 w-10">Дата</th>
                <th class="border px-4 py-2 w-20">Документ/Фото</th>
                <th class="border px-4 py-2 w-10">Название</th>
                <th class="border px-4 py-2 w-24">Текст</th>
                <th class="border px-4 py-2 w-16">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($worksOfUsers as $workOfUsers)
                <tr>
                    <td class="border px-4 py-2">{{ $workOfUsers->id }}</td>
                    <td class="border px-4 py-2">{{ $workOfUsers->created_at }}</td>
                    <td class="border px-4 py-2">
                        <img src="{{ url('/storage/docs/' . $workOfUsers->img) }}" class="w-60" alt="{{ $workOfUsers->title }}" />
                    </td>
                    <td class="border px-4 py-2">{{ $workOfUsers->title }}</td>
                    <td class="border px-4 py-2">{{ $workOfUsers->body }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $workOfUsers->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Редактировать</button>
                        <button wire:click="delete({{ $workOfUsers->id }})" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Удалить</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
