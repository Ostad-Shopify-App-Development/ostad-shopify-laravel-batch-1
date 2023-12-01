@extends('layouts.master')

@section('title', 'Settings')

@section('contents')
    <section class="bg-gray-100" id="settings">
        <div class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">

                <div class="flex-1 mt-12 sm:max-w-lg lg:max-w-md">
                    <form method="POST" action="{{ route('setting.store') }}" class="space-y-5">
                        @sessionToken
                        <div>
                            <label class="font-medium">General FAQ</label>
                            <div class="flex items-center mb-1 mt-2">
                                <input id="general-faq-enable" type="radio" value="1" name="general-faq" class="w-4 h-4 text-black">
                                <label for="general-faq-enable" class="ms-2 text-sm font-medium text-gray-900">Enable</label>
                            </div>
                            <div class="flex items-center">
                                <input id="general-faq-disable" type="radio" value="0" name="general-faq" class="w-4 h-4 text-black">
                                <label for="general-faq-disable" class="ms-2 text-sm font-medium text-gray-900">Disable</label>
                            </div>
                        </div>
                        <div>
                            <label class="font-medium">Product FAQ</label>
                            <div class="flex items-center mb-1 mt-2">
                                <input id="product-faq-enable" type="radio" value="1" name="product-faq" class="w-4 h-4 text-black">
                                <label for="product-faq-enable" class="ms-2 text-sm font-medium text-gray-900">Enable</label>
                            </div>
                            <div class="flex items-center">
                                <input id="product-faq-disable" type="radio" value="0" name="product-faq" class="w-4 h-4 text-black">
                                <label for="product-faq-disable" class="ms-2 text-sm font-medium text-gray-900">Disable</label>
                            </div>
                        </div>
                        <button type="submit"
                                class="w-full px-4 py-2 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150">
                            Save Group
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection
