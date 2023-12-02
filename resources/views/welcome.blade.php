@extends('layouts.master')

@section('title', 'Form Demo')

@section('contents')
    {{--<div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Information Group</h4>
            </div>
            <div class="bg-blue-500 text-white p-4 rounded">
                <p class="font-bold text-lg">Shop Name: {{ $shopDomain ?? Auth::user()->name }}</p>
                <p class="mt-2">Shop ID: {{ $shopId ?? Auth::user()->id }}</p>
            </div>
        </div>
    </div>--}}
    <div class="max-w-2xl mx-auto px-4">
        <div class="items-start justify-between sm:flex">
            <div>
                <h4 class="text-gray-800 text-xl font-semibold">{{ $shopDomain ?? Auth::user()->name }}(ShopNo#{{ $shopId ?? Auth::user()->id }})</h4>
                <p class="mt-2 text-gray-600 text-base sm:text-sm">{{ $shopEmail ?? Auth::user()->email }}</p>
            </div>
        </div>
       <br/>
        <div class="items-start justify-between">
            <a href="{{ URL::tokenRoute('collection.form') }}" class="inline-flex items-center justify-center gap-1 py-2 px-3 mt-2 font-medium text-sm text-center text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 rounded-lg sm:mt-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                </svg>
               Create Collection
            </a>
            <a href="{{ URL::tokenRoute('product.form') }}" class="inline-flex items-center justify-center gap-1 py-2 px-3 mt-2 font-medium text-sm text-center text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 rounded-lg sm:mt-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                </svg>
               Create Product
            </a>

        </div>
        <ul class="mt-12 divide-y">
            <template x-for="(item, idx) in members" :key="idx">
                <li class="py-5 flex items-start justify-between">
                    <div class="flex gap-3">
                        <img :src="item.avatar" class="flex-none w-12 h-12 rounded-full" />
                        <div>
                            <span class="block text-sm text-gray-700 font-semibold" x-text="item.name"></span>
                            <span class="block text-sm text-gray-600" x-text="item.email"></span>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="text-gray-700 text-sm border rounded-lg px-3 py-2 duration-150 bg-white hover:bg-gray-100">Manage</a>
                </li>
            </template>
        </ul>
    </div>
@endsection


@push('scripts')
    <script>
        function checkAuth(e) {
            //stop form submit
            console.log("checking")
            axios.get('/check')
                .then(function(response) {
                    console.log(response.data);
                })
                .catch(function(error) {
                    console.log(error);
                });
            return false;
        }
    </script>
@endpush
