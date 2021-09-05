<div>
    <div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    {{__('JENIS PRODUK HUKUM')}}
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                </p>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    <div class="bg-white px-4 py-5 sm:gap-4 sm:px-6">
                                        @if($data->count())
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3 flex gap-4">
                                                <x-heroicon-o-document-duplicate class="flex-none w-16 h-10 w-10"/>
                                                <div class="flex-grow ">
                                                    <h3 class="text-lg font-bold text-blue-500">jenis + nomor +
                                                        tahun</h3>
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Blanditiis deleniti maiores totam? Atque beatae blanditiis
                                                        consectetur deleniti doloremque eius error expedita explicabo
                                                        impedit ipsam necessitatibus nemo, omnis quasi, quidem
                                                        veniam?</p>
                                                    <p class="font-bold my-3">{{__('Subjek')}} : </p>
                                                </div>
                                            </dd>
                                        @else
                                            {{__('Tidak data peraturan terbaru')}}
                                        @endif
                                    </div>
                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
