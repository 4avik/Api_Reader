<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('plane.store') }}" method="POST" enctype="multipart/form-data" class="mt-3 flex flex-col">
            @csrf
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-tl-lg sm:rounded-tr-lg pt-3 p-1 flex justify-between items-center px-5">
                <label class="text-black dark:text-white" for="title">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror text-black" id="name"
                    name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-1 flex justify-between items-center px-5">
                <label class="text-black dark:text-white" for="description">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror text-black" id="description" name="description"
                    rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-1 flex justify-between items-center px-5">
                <label class="text-black dark:text-white" for="year">Year:</label>
                <input type="text" class="form-control @error('year') is-invalid @enderror text-black"
                    id="year" name="year" value="{{ old('year') }}">
                @error('year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-1 flex justify-between items-center px-5">
                <label class="text-black dark:text-white" for="type">Type:</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror text-black"
                    id="type" name="type" value="{{ old('type') }}">
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-1 flex justify-between items-center px-5">
                <label class="text-black dark:text-white" for="country">Country:</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror text-black"
                    id="country" name="country" value="{{ old('country') }}">
                @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-1 flex justify-between items-center px-5">
                <label class="text-black dark:text-white" for="speed">Speed:</label>
                <input type="speed" class="form-control @error('speed') is-invalid @enderror text-black" id="mass"
                    name="speed" value="{{ old('speed') }}">
                @error('speed')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex justify-end mt-3">
                <button type="submit" class="btn btn-primary text-black dark:text-white bg-green-500 p-3 rounded-lg">Create
                    Item</button>
            </div>
        </form>
    </div>
    
    <div class="min-h-48 mt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($planes as $plane)
                    <div>
                        {
                            <div class="flex flex-col">
                                <div>id='{{ $plane->id }}',</div>
                                <div>name='{{ $plane->name }}',</div>
                                <div>description='{{ $plane->description }}',</div>
                                <div>year='{{ $plane->year }}',</div>
                                <div>type='{{ $plane->type }}',</div>
                                <div>country='{{ $plane->country }}',</div>
                                <div>speed='{{ $plane->speed }}'</div>
                            <div>
                        },
                    </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('plane.other') }}" method="GET" enctype="multipart/form-data" class="mt-6 flex">
            @csrf
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-tl-lg sm:rounded-tr-lg pt-3 p-1 flex justify-between items-center px-5">
                <label class="text-black dark:text-white" for="url">url:</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror text-black" id="url"
                    name="url" value="{{ old('url') }}">
                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex justify-end mt-3">
                <button type="submit" class="btn btn-primary text-black dark:text-white bg-green-500 p-3 rounded-lg">Show another API</button>
            </div>
        </form>
    </div>


</x-app-layout>
