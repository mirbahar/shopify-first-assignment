@extends('layouts.master')

@section('title', 'Collection  Form')

@section('contents')
    <div x-data="{ tableItems: [
    {
        name: 'Solo learn app',
        date: 'Oct 9, 2023',
        status: 'Active',
        price: '$35.000',
        plan: 'Monthly subscription'
    },
    {
        name: 'Window wrapper',
        date: 'Oct 12, 2023',
        status: 'Active',
        price: '$12.000',
        plan: 'Monthly subscription'
    },
    {
        name: 'Unity loroin',
        date: 'Oct 22, 2023',
        status: 'Archived',
        price: '$20.000',
        plan: 'Annually subscription'
    },
    {
        name: 'Background remover',
        date: 'Jan 5, 2023',
        status: 'Active',
        price: '$5.000',
        plan: 'Monthly subscription'
    },
    {
        name: 'Colon tiger',
        date: 'Jan 6, 2023',
        status: 'Active',
        price: '$9.000',
        plan: 'Annually subscription'
    }
] }" class="max-w-screen-xl mx-auto px-4 md:px-8">

        <div class="items-start justify-between md:flex">
            <div class="max-w-lg">
                <h3 class="text-gray-800 text-xl font-bold sm:text-2xl">All Collections</h3>
                <p class="text-gray-600 mt-2">Collection Details in here!</p>
            </div>
            <div class="mt-3 md:mt-0">
                <a href="javascript:void(0)" class="inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm">Add product</a>
            </div>
        </div>
        <div class="mt-12 relative h-max overflow-auto">
            <table class="w-full table-auto text-sm text-left">
                <thead class="text-gray-600 font-medium border-b">
                <tr>
                    <th class="py-3 pr-6">name</th>
                    <th class="py-3 pr-6">description</th>
                    <th class="py-3 pr-6">status</th>
                    <th class="py-3 pr-6">Action</th>
{{--                    <th class="py-3 pr-6"></th>--}}
                </tr>
                </thead>
                <tbody class="text-gray-600 divide-y">
                    @foreach($collections['data'] as $collection)
                        <tr>
                            <td class="pr-6 py-4 whitespace-nowrap">{{ $collection['name'] }}</td>
                            <td class="pr-6 py-4 whitespace-nowrap">{{ $collection['description'] }}</td>
                            <td class="pr-6 py-4 whitespace-nowrap">
                                <span :class="`px-3 py-2 rounded-full font-semibold text-xs ${$collection['status']  === 1 ? 'text-green-600 bg-green-50' : 'text-blue-600 bg-blue-50'}`" x-text="item.status">{{ $collection['status_id']== 1 ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td class="text-right whitespace-nowrap">

{{--                                <a href="{{ url('/collections/edit') .'/'. $collection['id'] }}" class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg">Edit</a>--}}
                                <a href="{{ URL::tokenRoute('collection.edit-form', ['id' => $collection['id']]) }}" class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg">Edit</a>
                            </td>
                            <td class="text-right whitespace-nowrap">
                                <a href="{{ URL::tokenRoute('collection.edit-form', ['id' => $collection['id']]) }}" class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg">Products</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{--<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Collection List</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($collections['data'] as $collection)

            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold mb-2">{{ $collection['name'] }}</h2>
                <p class="text-gray-600 mb-4">{{ $collection['description'] }}</p>

                <div class="flex space-x-2">
                    <a href="{{ route('collection.edit-form', $collection['id']) }}"
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
</div>--}}
@endsection
