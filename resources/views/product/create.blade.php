@extends('layouts.master')

@section('title', 'Collection  Form')

@section('contents')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Create Product</h2>

        <form action="{{ url('/products') }}" method="post" class="w-1/2">
            <!-- Other form fields go here -->
            @sessionToken
            <div class="mb-4">
                <label for="collection" class="block text-gray-700 text-sm font-bold mb-2">Select Collection</label>
                <select name="collection_id" id="collection" class="form-select w-full @error('collection_id') border-red-500 @enderror">
                    <option value="" selected disabled>Select a Collection</option>
                    <!-- Loop through your collections and create an option for each one -->
                    @foreach ($collections as $collection)
                        <option value="{{ $collection['id'] }}" {{ old('collection_id') == $collection['id'] ? 'selected' : '' }}>
                            {{ $collection['name'] }}
                        </option>
                    @endforeach
                </select>
                @error('collection_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" class="form-input w-full @error('name') border-red-500 @enderror"
                       value="{{ old('name') }}">
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <input type="text" name="description" id="name" class="form-input w-full @error('description') border-red-500 @enderror"
                       value="{{ old('description') }}">
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Add other form fields here -->

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection
