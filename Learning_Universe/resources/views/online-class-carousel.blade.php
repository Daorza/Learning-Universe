<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
    </head>
    <body>
    <div class="shadow-md rounded-md">
        <div class="container mx-auto py-12 px-4">
            <h2 class="text-3xl font-bold mb-6">Online Classes</h2>
            <div class="flex overflow-x-scroll py-2">
                @foreach($onlineClasses as $onlineClass)
                    <div class="flex-none w-96 mr-4 overflow-hidden bg-white rounded shadow">
                        <img src="{{ asset('storage/'. $onlineClass->class_picture) }}" alt="{{ $onlineClass->class_title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">{{ $onlineClass->class_title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $onlineClass->class_description }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <div class="text-gray-600">Price: {{ $onlineClass->class_price }}</div>
                                <div class="text-gray-600">Lessons: {{ $onlineClass->class_lessons }}</div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="text-gray-600">Members: {{ $onlineClass->class_members }}</div>
                                <div class="text-gray-600">Ratings: {{ $onlineClass->class_ratings }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<br>
<br>
<br>
<div class="container mx-auto py-12 px-4">
    <h2 class="text-3xl font-bold mb-6">Online Classes</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach($onlineClasses as $onlineClass)
            <div class="w-full overflow-hidden bg-white rounded shadow">
                <img src="{{ asset('storage/'. $onlineClass->class_picture) }}" alt="{{ $onlineClass->class_title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">{{ $onlineClass->class_title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $onlineClass->class_description }}</p>
                    <div class="flex justify-between items-center mb-2">
                        <div class="text-gray-600">Price: {{ $onlineClass->class_price }}</div>
                        <div class="text-gray-600">Lessons: {{ $onlineClass->class_lessons }}</div>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <div class="text-gray-600">Members: {{ $onlineClass->class_members }}</div>
                        <div class="text-gray-600">Ratings: {{ $onlineClass->class_ratings }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    </body>
</html>
