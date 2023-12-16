@extends('layouts.sidebaradmin')

@section('content_admin')

<title>Users Data</title>
<div class="ml-72 p-12 flex-1 ">
        <!-- content here! -->
            <!-- header -->
            <div class="flex justify-between">
                <div class="flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 fill-red-500 stroke-1 animate-spin duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                      </svg>
                    <div class="ml-4 text-xl font-bold capitalize border-l-2 border-black border-solid border-spacing-4 px-4">Users table</div>
                </div>
            </div>
            <!-- table -->
            <div class="flex-1 p-2 shadow-md bg-white rounded-md mt-10">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 top-0">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User Account
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Detail</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach ($user as $users)
                            <tr class="bg-white border-b hover:bg-gray-100">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                                    {{ $i++ }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $users->name }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $users->email }}
                                </td>
                                <td class="px-6 py-4">
                                <td class="px-6 py-4 text-right">
                                    <a href="" class="font-medium text-red-600" title="Materials">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:animate-bounce">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>

            </div>
        <!-- end content -->
        </div>
