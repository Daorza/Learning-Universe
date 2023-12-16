@extends('layouts.sidebaradmin')

@section('content_admin')

<title>Category Data</title>
<div class="ml-72 p-12 flex-1">
        <!-- content here! -->
            <!-- header -->
            <div class="flex justify-between">
                <div class="flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 fill-red-500 stroke-1 animate-spin duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                      </svg>
                    <div class="ml-4 text-xl font-bold capitalize border-l-2 border-black border-solid border-spacing-4 px-4">Category table</div>
                </div>
                <div class="justify-end">
                    <a href="{{ url('category/create') }}">
                        <button class="px-4 py-2 bg-gray-700 hover:bg-gray-900 hover:font-medium text-white mr-2 rounded-md shadow-md">
                            Add Data
                        </button>
                    </a>
                </div>
            </div>
            <!-- table -->
            <div class="flex-1 p-2 shadow-md bg-white rounded-md mt-10">
            <br>
                @if (Session::has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                    role="alert">
                    <span class="font-medium">Data added successfully!</span>
                    {{Session::get('success')}}
                </div>
                @endif
                @if (Session::has('successe'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                    role="alert">
                    <span class="font-medium">Data edited successfully!</span>
                    {{Session::get('successe')}}
                </div>
                @endif
                @if (Session::has('successd'))
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50"
                    role="alert">
                    <span class="font-medium">Data deleted successfully!</span>
                    {{Session::get('successd')}}
                </div>
                @endif
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 top-0">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach ($categories as $c)
                            <tr class="bg-white border-b hover:bg-gray-100">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                                    {{ $i++ }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $c->category_name }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ url('category/'.$c->id.'/edit') }}" class="font-medium text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:animate-bounce">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form onsubmit="return confirm('Are you sure wanna delete this data?')"
                                        action="{{ url('category/'.$c->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="font-medium text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:animate-bounce">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                          </svg>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div></div>
                </div>

            </div>
        <!-- end content -->
        </div>
@endsection
