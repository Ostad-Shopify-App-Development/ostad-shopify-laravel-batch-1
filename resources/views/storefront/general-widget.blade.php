@extends('layouts.storefront')

@section('title', 'FAQs')

@section('contents')
    <section>
        <!-- component -->
        <div class="mx-auto px-5 bg-white py-10">
            <div class="flex flex-col items-center">
                <h2 class="font-bold text-5xl mt-5 tracking-tight">
                    FAQ
                </h2>
                <p class="text-neutral-500 text-xl mt-3">
                    Frequently asked questions
                </p>
            </div>

            <div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">
                @foreach ($faqs as $faq)
                    <div class="py-5">
                        <details class="group">
                            <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                                <span> {{ $faq->question }}</span>
                                <span class="transition group-open:rotate-180">
                                    <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </summary>
                            <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                {{ $faq->answer }}
                            </p>
                        </details>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        actions.TitleBar.create(app, {
            title: 'UI Components'
        });
    </script>
@endsection
