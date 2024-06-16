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
        <form action="{{ route('plane.store') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 space-y-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <label class="text-black dark:text-white" for="name">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror text-black" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="text-black dark:text-white" for="description">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror text-black" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="text-black dark:text-white" for="year">Year:</label>
                <input type="text" class="form-control @error('year') is-invalid @enderror text-black" id="year" name="year" value="{{ old('year') }}">
                @error('year')
                    <span class="invalid-feedback text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="text-black dark:text-white" for="type">Type:</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror text-black" id="type" name="type" value="{{ old('type') }}">
                @error('type')
                    <span class="invalid-feedback text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="text-black dark:text-white" for="country">Country:</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror text-black" id="country" name="country" value="{{ old('country') }}">
                @error('country')
                    <span class="invalid-feedback text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="text-black dark:text-white" for="speed">Speed:</label>
                <input type="text" class="form-control @error('speed') is-invalid @enderror text-black" id="speed" name="speed" value="{{ old('speed') }}">
                @error('speed')
                    <span class="invalid-feedback text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex justify-end mt-3">
                <button type="submit" class="btn btn-primary text-black dark:text-white bg-green-500 p-3 rounded-lg">Create Item</button>
            </div>
        </form>
    </div>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @foreach ($planes as $plane)
                    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg mb-4">
                        <div class="font-bold">Plane Information:</div>
                        <div>id='{{ $plane->id }}'</div>
                        <div>name='{{ $plane->name }}'</div>
                        <div>description='{{ $plane->description }}'</div>
                        <div>year='{{ $plane->year }}'</div>
                        <div>type='{{ $plane->type }}'</div>
                        <div>country='{{ $plane->country }}'</div>
                        <div>speed='{{ $plane->speed }}'</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="p-6 text-gray-900 dark:text-gray-100 bg-gray-700 rounded-lg">
            <h3 class="text-lg font-bold">MÄTLIK (kassid)</h3>
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
        <form action="{{ route('plane.other') }}" method="GET" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 flex flex-col space-y-4">
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
