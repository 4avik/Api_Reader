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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <form action="{{ route('plant.store') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 space-y-4">
            @csrf
            @foreach (['name', 'description', 'species', 'family', 'origin', 'bloom_time'] as $field)
                <div class="flex flex-col space-y-2">
                    <label class="text-black dark:text-white" for="{{ $field }}">{{ ucfirst($field) }}:</label>
                    @if ($field == 'description')
                        <textarea class="form-control @error($field) is-invalid @enderror text-black focus:outline-none focus:ring-2 focus:ring-blue-500" id="{{ $field }}" name="{{ $field }}" rows="5">{{ old($field) }}</textarea>
                    @else
                        <input type="text" class="form-control @error($field) is-invalid @enderror text-black focus:outline-none focus:ring-2 focus:ring-blue-500" id="{{ $field }}" name="{{ $field }}" value="{{ old($field) }}">
                    @endif
                    @error($field)
                        <span class="invalid-feedback text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endforeach
            <div class="flex justify-end mt-3">
                <button type="submit" class="btn btn-primary text-white bg-green-500 p-3 rounded-lg hover:bg-green-600 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Create Plant</button>
            </div>
        </form>
    </div>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
            @foreach ($plants as $plant)
                    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                        <div class="font-bold text-lg">Plant Information:</div>
                        <div class="mt-2">
                            <div><span class="font-semibold">ID:</span> {{ $plant->id }}</div>
                            <div><span class="font-semibold">Name:</span> {{ $plant->name }}</div>
                            <div><span class="font-semibold">Description:</span> {{ $plant->description }}</div>
                            <div><span class="font-semibold">Species:</span> {{ $plant->species }}</div>
                            <div><span class="font-semibold">Family:</span> {{ $plant->family }}</div>
                            <div><span class="font-semibold">Origin:</span> {{ $plant->origin }}</div>
                            <div><span class="font-semibold">Bloom Time:</span> {{ $plant->bloom_time }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="p-6 text-gray-900 dark:text-gray-100 bg-gray-200 rounded-lg">
            <h3 class="text-lg font-bold">Mätliku kassi API</h3>
            @foreach ($cats as $cat)
                @for ($i = 0; $i < count($cat); $i++)
                    <div class="bg-white dark:bg-gray-800 w-full rounded-xl mt-4 p-4">
                        <div class="flex text-center justify-center font-bold underline mb-2">
                            {{ $cat[$i]['name'] }}
                        </div>
                        <div class="flex justify-between px-2">
                            <div>Birth Date:</div>
                            <div>{{ $cat[$i]['birth_date'] }}</div>
                        </div>
                        <div class="flex justify-between px-2">
                            <div>Color:</div>
                            <div>{{ $cat[$i]['color'] }}</div>
                        </div>
                        <div class="flex justify-between px-2">
                            <div>Status:</div>
                            <div>{{ $cat[$i]['status'] }}</div>
                        </div>
                        <div class="flex justify-between px-2">
                            <div>Tests:</div>
                            <div>{{ $cat[$i]['tests'] }}</div>
                        </div>
                        <div class="flex justify-between px-2">
                            <div>Dilution:</div>
                            <div>{{ $cat[$i]['dilution'] }}</div>
                        </div>
                        <div class="flex justify-between px-2">
                            <div>Category:</div>
                            <div>{{ $cat[$i]['cathegory'] }}</div>
                        </div>
                        <div class="flex justify-between px-2 mb-2">
                            <div>Sex:</div>
                            <div>{{ $cat[$i]['cathegory_display'] }}</div>
                        </div>
                    </div>
                @endfor
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                <h3 class="text-lg font-bold">Krisoto lennuki info</h3>
                @foreach ($friendPlanes as $friendPlane)
                    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                        <div class="font-bold text-lg">Plane Information:</div>
                        <div class="mt-2">
                            <div><span class="font-semibold">ID:</span> {{ $friendPlane['id'] }}</div>
                            <div><span class="font-semibold">Name:</span> {{ $friendPlane['name'] }}</div>
                            <div><span class="font-semibold">Description:</span> {{ $friendPlane['description'] }}</div>
                            <div><span class="font-semibold">Year:</span> {{ $friendPlane['year'] }}</div>
                            <div><span class="font-semibold">Type:</span> {{ $friendPlane['type'] }}</div>
                            <div><span class="font-semibold">Country:</span> {{ $friendPlane['country'] }}</div>
                            <div><span class="font-semibold">Speed:</span> {{ $friendPlane['speed'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <form action="{{ route('plant.other') }}" method="GET" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 flex flex-col space-y-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <label class="text-black dark:text-white" for="url">URL:</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror text-black" id="url" name="url" value="{{ old('url') }}">
                @error('url')
                    <span class="invalid-feedback text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary text-black dark:text-white bg-green-500 p-3 rounded-lg">Show another API</button>
            </div>
        </form>
    </div>
</x-app-layout>
