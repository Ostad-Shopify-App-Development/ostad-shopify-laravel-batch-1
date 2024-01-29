@extends('layouts.master')

@section('title', 'Create Group')

@section('contents')
    <div class="w-full md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6 mx-auto mt-5">
        @foreach($plans as $plan)
            <div class="shadow p-5 rounded-lg border-t-4 border-green-400 bg-white">
                <p class="uppercase text-sm font-medium text-gray-500">
                    {{ $plan->name }}
                </p>

                <p class="mt-4 text-3xl text-gray-700 font-medium">
                    {{ $plan->price }} <span class="text-base font-normal">/monthly</span>
                </p>

                <p class="mt-4 font-medium text-gray-700">
                    {{ $plan->terms }}
                </p>

                <div class="mt-8">
                    <ul class="grid grid-cols-1 gap-4">
                        <li class="inline-flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2 fill-current text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM371.8 211.8l-128 128C238.3 345.3 231.2 348 224 348s-14.34-2.719-19.81-8.188l-64-64c-10.91-10.94-10.91-28.69 0-39.63c10.94-10.94 28.69-10.94 39.63 0L224 280.4l108.2-108.2c10.94-10.94 28.69-10.94 39.63 0C382.7 183.1 382.7 200.9 371.8 211.8z"></path>
                            </svg>

                            30 days only
                        </li>

                        <li class="inline-flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2 fill-current text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM371.8 211.8l-128 128C238.3 345.3 231.2 348 224 348s-14.34-2.719-19.81-8.188l-64-64c-10.91-10.94-10.91-28.69 0-39.63c10.94-10.94 28.69-10.94 39.63 0L224 280.4l108.2-108.2c10.94-10.94 28.69-10.94 39.63 0C382.7 183.1 382.7 200.9 371.8 211.8z"></path>
                            </svg>

                            Twice weekly email newsletter
                        </li>

                        <li class="inline-flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2 fill-current text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM371.8 211.8l-128 128C238.3 345.3 231.2 348 224 348s-14.34-2.719-19.81-8.188l-64-64c-10.91-10.94-10.91-28.69 0-39.63c10.94-10.94 28.69-10.94 39.63 0L224 280.4l108.2-108.2c10.94-10.94 28.69-10.94 39.63 0C382.7 183.1 382.7 200.9 371.8 211.8z"></path>
                            </svg>

                            Social feed share (3 platforms)
                        </li>
                    </ul>
                </div>

                <div class="mt-8">
                    <a href="{{ URL::tokenRoute('billing', ['plan' => $plan->id]) }}" class="bg-gray-400 hover:bg-gray-500 px-3 py-2 rounded-lg w-full text-white">
                        Upgrade
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
@endpush
