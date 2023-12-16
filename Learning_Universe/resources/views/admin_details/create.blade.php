@extends('layouts.sidebaradmin')

@section('content_admin')

<title>Material Detail Data | Create</title>
<div class="ml-72 p-12 flex-1">
     <!-- content here! -->
                <!-- header -->
                <div class="flex justify-start mx-auto ml-32">
                    <div class="flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 fill-red-500 stroke-1 animate-spin duration-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                        </svg>
                        <div class="ml-4 text-xl font-bold capitalize border-l-2 border-black border-solid border-spacing-4 px-4">Material Detail table</div>
                        <div class="ml-1 text-xl font-bold capitalize border-l-2 border-black border-solid border-spacing-4 px-4">Add Data</div>
                    </div>

                </div>
                <!-- table -->
                <div class="flex-1 p-2 shadow-md bg-white rounded-md mt-10 w-4/5 mx-auto">
                    <div class="relative overflow-x-auto sm:rounded-lg px-20">
                        <!-- form -->
                        <h1 class="flex justify-center text-xl font-bold uppercase mt-8">Material Form</h1>
                        <h2 class="flex justify-center text-md capitalize">Please input the correct data into this form</h2><br>
                        <form action="{{ route('detail-material.store', ['class_id' => $onlineClass->id, 'material_id' => $material_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="class_id" value="{{ $onlineClass->id }}">
                            <input type="hidden" name="material_id" value="{{ $material_id }}">

                            <div class="space-y-2">
                                <label for="detail_image" class="font-medium">Image</label>
                                <input type="file" name="detail_image" id="detail_image" required autofocus
                                    class="block w-full p-2 mt-2 shadow rounded-md text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>
                            <div class="space-y-2">
                                <label for="detail_title" class="font-medium">Title</label>
                                <input type="text" name="detail_title" id="detail_title" required autofocus value="{{ old('detail_title') }}"
                                    class="block w-full p-2 mt-2 shadow rounded-md text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>
                            <div class="space-y-2">
                                <label for="detail_subtitle" class="font-medium">Subtitle</label>
                                <input type="text" name="detail_subtitle" id="detail_subtitle" required autofocus value="{{ old('detail_subtitle') }}"
                                    class="block w-full p-2 mt-2 shadow rounded-md text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>
                            <div class="space-y-2">
                                <label for="detail_text" class="font-medium">Text</label>
                                <input type="text" name="detail_text" id="detail_text" required autofocus value="{{ old('detail_text') }}"
                                    class="block w-full p-2 mt-2 shadow rounded-md text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>

                            <div class="flex justify-center">
                                <button type="submit"
                                    class="px-8 py-2 mt-2 font-medium tracking-wide text-white uppercase rounded-md shadow-md bg-gray-700 focus:outline-none hover:bg-gray-900 hover:text-lg">
                                    Add data
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>
             </div>
        <!-- content ends -->
</div>

@endsection
