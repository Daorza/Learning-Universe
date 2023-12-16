@extends('layouts.sidebar')

@section('content')

<title>My Class</title>
@auth
<div class="flex p-16 pt-36">
    <div class="shadow-md w-full bg-white rounded-md">
        <h1 class="w-full flex justify-center py-4 mb-4 text-xl font-medium">See all of your classes here!</h1>
        <div class="overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 top-0">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            class
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Progress
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 mr-4">
                            <span class="sr-only">Acion</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($classes as $class)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                            {{ $i++ }}
                        </th>
                        <td class="px-6 py-4 font-medium">
                            {{ $class->class_title }}
                        </td>
                        <td class="px-6 py-4 ">
                        {{ $categories->where('id', $class->category_id)->first()->category_name }}
                        </td>
                        <td class="px-6 py-4">
                            68 %
                        </td>
                        <td class="px-6 py-4">
                            Active
                        </td>
                        <td class="px-6 py-4 text-right">
                        <a href="{{ route('myclass.show', ['classId' => $class->id]) }}" class="font-medium text-red-600 mr-4" title="View Details">
                             <button class="px-12 py-2 rounded-md border-2 hover:text-white hover:bg-red-600 hover:border-0 hover:font-medium">
                                Details
                            </button>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>
@else
<div class="bg-gray-900 bg-opacity-50 fixed h-screen w-full">
    <div class="p-20 mt-40 shadow-md bg-white">
        <div class="p-8 flex justify-center">
            <div class="text-lg font-semibold">
                One step for you to get little bit closer<br>
                <span class="text-sm mx-auto font-light">After login to your accout, you can access this page!</span>
            </div>
        </div>
        <br>
        <a href="{{ route('acc') }}" class="px-8 py-3 rounded-lg flex justify-center border-2 border-gray-700 w-fit shadow-md mx-auto hover:border-0 hover:bg-gray-700 hover:text-lg hover:text-white hover:shadow-lg">
            Join with learning universe
        </a>
        <a href="{{ url('') }}" class="flex justify-center text-blue-600 mt-4 hover:underline text-sm">Back to home page</a>
    </div>
</div>
@endauth
@endsection
