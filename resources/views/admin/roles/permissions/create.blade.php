<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
{{--                            <x-jet-dropdown align="right" width="48">--}}
{{--                                <x-slot name="trigger">--}}
{{--                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none transition duration-150 ease-in-out">--}}
{{--                                            <div for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">--}}
{{--                                                Category:--}}
{{--                                            </div>--}}
{{--                                        <div class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none m-1 focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">--}}
{{--                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                            </svg>--}}
{{--                                        </div>--}}
{{--                                    </button>--}}
{{--                                </x-slot>--}}

{{--                                <x-slot name="content">--}}
{{--                                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                        {{ __('Choose category') }}--}}
{{--                                    </div>--}}
{{--                                    <label type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700--}}
{{--                                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Choose Category"--}}
{{--                                           wire:model="category">--}}
{{--                                    @error('title') <span class="text-red-500">{{ $message }}</span>@enderror--}}
{{--                                </x-slot>--}}
{{--                            </x-jet-dropdown>--}}
                        </div>




                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Permission:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Permission"
                               wire:model="name">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
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
<script>
    console.log(window)
    window.Livewire.on('fileChosen', () => {
        alert('An image is added')
        let inputField = document.getElementById('img')
        let file = inputField.files[0]
        let reader = new FileReader;
        reader.onloadend = () => {
            console.log(reader.result)
            window.Livewire.emit('imgUploaded', reader.result)
            // console.log(reader.result);
        }
        reader.readAsDataURL(file);
    })
</script>
</div>

