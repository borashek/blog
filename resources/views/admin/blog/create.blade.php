<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform
        transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true"
             aria-labelledby="modal-headline">
            <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <div class="flex flex-row">
                                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                        Categories
                                    </a>
                                    <a href="#" class="mr-6 mt-1 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0
                                            111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Dropdown items -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Categories of the tutorials') }}
                                </div>
                                @foreach($categories as $category)
                                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-2">
                                        <a href="#" id="category" class="hover:bg-blue-200 px-4 py-2">
                                            {{ $category->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Upload picture:</label>
                        <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                        focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="pic">
                        @error('picture') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Upload schema:</label>
                        <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                        focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="schema2">
                        @error('schema') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormImageInput" placeholder="Enter Link to the Image"
                               wire:model="img">
                        @error('image')<span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Schema:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormImageInput" placeholder="Enter Link to the Schema"
                               wire:model="schema1">
                        @error('schema') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title"
                               wire:model="title">
                        @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">What is needed:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter materials"
                               wire:model="you_need">
                        @error('quote') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Text:</label>
                        <textarea rows="7" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                        focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="body"
                                  placeholder="Enter Body"></textarea>
                        @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                      <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full
                      rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium
                      text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700
                      focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Save
                      </button>
                </span>
                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                      <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full text-white
                      rounded-md border border-transparent px-4 py-2 bg-red text-base leading-6 font-medium text-white-700
                      shadow-sm hover:text-white-500 hover:bg-red-500 bg-red-600 focus:outline-none focus:border-red-700
                      focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Cancel
                      </button>
                </span>
            </div>
        </div>
    </div>
</div>


