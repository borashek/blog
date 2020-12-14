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
            <form action="{{ route('send') }}" wire:submit.prevent="sendWork()" method="POST" class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
                <h4 class="text-2xl mb-4 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-lg sm:leading-none md:text-lg">
                    You are welcome to send me your work:)
                </h4>
                @if (session()->has('success'))
                    <div class="bg-indigo-200 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="">
                    <div class="mb-4">
                        <label for="exampleFormNameInput" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input wire:model="name" type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormNameInput" placeholder="Enter your Name">
                        @error('name')<span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormEmailInput1" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input wire:model="email" type="text" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormEmailInput" placeholder="Enter your Email">
                        @error('email')<span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormTitleInput" name="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input wire:model="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormTitleInput" placeholder="Enter a Title">
                        @error('title')<span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormDescriptionInput" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                        <input wire:model="description" name="description" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormDescriptionInput" placeholder="Enter a Description">
                        @error('description')<span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
{{--                        <a href="{{ route('send-works') }}">--}}
                          <button type="submit" class="inline-flex justify-center w-full
                          rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium
                          text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700
                          focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Send
                          </button>
{{--                        </a>--}}
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <a href="{{ route('blog') }}">
                          <button type="button" class="inline-flex justify-center w-full text-white
                          rounded-md border border-transparent px-4 py-2 bg-red text-base leading-6 font-medium text-white-700
                          shadow-sm hover:text-white-500 hover:bg-red-500 bg-red-600 focus:outline-none focus:border-red-700
                          focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                          </button>
                        </a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
