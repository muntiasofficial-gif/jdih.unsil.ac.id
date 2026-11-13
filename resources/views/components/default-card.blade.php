@props(['content','title','icon'])
<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg h-[300px]">
                        @if($title->toHtml())
                            <div class="py-5 px-3 flex">
                                {{$icon}}
                                <h3 class="text-lg font-bold leading-6 font-medium text-gray-900">
                                    {{$title}}
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                </p>
                            </div>
                        @endif
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white sm:gap-4">
                                    {{$content}}
                                </div>
                            </dl>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

