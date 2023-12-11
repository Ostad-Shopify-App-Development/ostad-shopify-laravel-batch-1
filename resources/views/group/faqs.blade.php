@extends('layouts.master')

@section('title', 'FAQs')

@section('contents')
    <section class="bg-gray-100 hidden" id="create-group">
        <div class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
                <div class="gap-12 flex justify-between">
                    <div class="max-w-lg space-y-3">
                        <h3 class="text-indigo-600 font-semibold">FAQs</h3>
                        <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                            Create new FAQ for {{ $group->name }}
                        </p>
                        <p>
                            FAQs are the base of the FAQ system. You can create as many FAQs as you want and add them to a
                            group
                        </p>
                    </div>
                    <div>
                        <button onclick="hideCreateGroup()"
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </button>
                    </div>
                </div>

                <div class="flex-1 mt-12 sm:max-w-lg lg:max-w-md">
                    <form method="POST" action="{{ route('group.faqs.save', ['groupid' => $group->id]) }}"
                        class="space-y-5">
                        @sessionToken
                        <input type="hidden" id="groupid" name="groupid" value="{{ $group->id }}">
                        <input type="hidden" id="faqid" name="faqid" value="0">
                        <div>
                            <label class="font-medium"> Question </label>
                            <input type="text" id="question" name="question" required
                                class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" />
                        </div>
                        <div>
                            <label class="font-medium"> Answer </label>
                            <textarea rows="3" id="answer" name="answer"
                                class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150">
                            Save FAQ
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
                <div class=" mx-auto gap-12">
                    <div class="flex justify-between">
                        <div class="max-w-lg space-y-3">
                            <h3 class="text-indigo-600 font-semibold">FAQs</h3>
                            <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                                Available FAQs for {{ $group->name }}
                            </p>
                            <p>
                                Here are your available FAQs for {{ $group->name }}. You can edit or delete them.
                                <a href="{{ URL::tokenRoute('group.index') }}"
                                    class="text-indigo-500 hover:text-indigo-700 font-bold rounded">
                                    Go Back
                                </a>
                            </p>
                        </div>
                        <div>
                            <button onclick="showCreateGroup()"
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Create FAQs
                            </button>

                        </div>
                    </div>
                </div>
                <div class="max-w-screen-xl mx-auto px-4 py-4 md:px-8">
                    <div class="mt-12 relative h-max overflow-auto">
                        <table class="w-full table-auto text-sm text-left">
                            <thead class="text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 pr-6">name</th>
                                    <th class="py-3 pr-6">status</th>
                                    <th class="py-3 pr-6"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 divide-y">
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            {{ $faq->question }}
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap"><span
                                                class="px-3 py-2 rounded-full font-semibold text-xs text-green-600 bg-green-50">Active</span>
                                        </td>

                                        <td class="text-right whitespace-nowrap">
                                            <button onclick="editGroup(this)"
                                                class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg"
                                                data-id="{{ $faq->id }}" data-question="{{ $faq->question }}"
                                                data-answer="{{ $faq->answer }}">Edit</button>
                                            &nbsp;
                                            {{-- <a href="{{ URL::tokenRoute('group.faqs', ['id' => $group->id]) }}"
                                                class="py-1.5 px-3 text-red-600 hover:text-gray-500 duration-150 hover:bg-red-50 border rounded-lg">FAQs</a> --}}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



@endsection

@push('scripts')
    <script>
        function showCreateGroup() {
            document.getElementById('create-group').classList.remove('hidden');
        }

        function hideCreateGroup() {
            document.getElementById('create-group').classList.add('hidden');
            //clear the values
            document.getElementById('faqid').value = '';
            document.getElementById('question').value = '';
            document.getElementById('answer').value = '';

        }

        function editGroup(button) {
            console.log(button.dataset);
            document.getElementById('create-group').classList.remove('hidden');
            document.getElementById('faqid').value = button.dataset.id;
            document.getElementById('question').value = button.dataset.question;
            document.getElementById('answer').value = button.dataset.answer;
        }
    </script>
@endpush

