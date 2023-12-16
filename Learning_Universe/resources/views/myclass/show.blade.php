@extends('layouts.sidebar')

@section('content')
<title>My Class Details</title>
@auth
<div class="flex p-16 pt-36">
    <div class="shadow-md w-full bg-white rounded-md">
    <div class="flex justify-between py-6">
        <a href="javascript:window.history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-10 h-10 p-2 ml-12 rounded-full hover:bg-gray-900 hover:fill-white">
                <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
            </svg>
        </a>

        <h1 class="text-lg font-medium uppercase">My Class</h1>

        <div>

        </div>
    </div>
        <div class="shadow grid grid-cols-3 px-12 py-6">
            <!-- left section -->
            <div class="h-60 w-fit">
                <img src="{{ asset('uploads/onlineClasses/'.$class->class_picture) }}" alt="{{ $class->class_title }}" class="w-full  h-48 object-cover">
            </div>
            <!-- center section -->
            <div class="text-left">
                <div class="text-xs font-light tracking-wider">{{ $class->category->category_name }}</div>
                <div class="text-xl font-bold">{{ $class->class_title }}</div>
                <div class="grid grid-cols-3 text-sm mt-2">
                    <div>{{ number_format($averageRating, 1) }}</div>
                    <div>{{ $class->materials->count() }} lessons</div>
                    <div>25 students</div>
                </div>
                <br>
                <div class="text-sm">
                    {{ $class->class_description }}
                </div>
            </div>
            <!-- right sectionl -->
        </div>

        <div class="shadow px-12 py-6">
            <div class="font-semibold capitalize">
                peek what's inside:
            </div>
            <br>
            <div>
                @foreach($class->materials as $material)
                    <div class="hover:bg-gray-200 hover:shadow-md rounded-md p-2 pl-4">
                        @php
                            $detailMaterial = $material->detailMaterials->first();
                            $materialOpened = $detailMaterial && $detailMaterial->is_opened;
                        @endphp

                        <a href="{{ route('myclass.showDetail', ['classId' => $class->id, 'materialId' => $material->id, 'detailId' => optional($detailMaterial)->id]) }}">
                            <div class="list-item font-medium ml-4">{{ $material->material_title }}</div>
                            <div class="text-sm font-light mb-2 line-clamp-2 ml-4">{{ $material->material_description }}</div>
                        </a>
                    </div>
                @endforeach
                <div class="flex justify-center">
                    <button id="btnSelesai" class="mt-6 bg-gray-700 text-white py-2 px-8 rounded-md hover:bg-gray-900 hover:font-medium shadow-md capitalize">Finish This Course</button>
                </div>
            </div>

            <!-- Moved the modal content here -->
            <div id="ratingModal" class="fixed inset-0 overflow-y-auto bg-gray-800 bg-opacity-40 hidden">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="bg-white p-8 w-full md:w-1/2 lg:w-1/3 mx-4">
                    <form action="{{ route('myclass.rate', ['classId' => $class->id]) }}" method="POST" id="ratingForm">
                         @csrf
                                <div class="mb-6">
                                <label for="rating" class="block text-sm font-medium text-gray-700">Rating:</label>
                                <div class="flex items-center gap-2">
                                    <label for="rating" class="form-label"></label>
                                    <input type="hidden" name="rating" id="ratingInputModal" value="1">
                                    <div class="rating" id="rating">
                                        <span class="star" data-value="1" onclick="selectRating(1)">&#9733;</span>
                                        <span class="star" data-value="2" onclick="selectRating(2)">&#9733;</span>
                                        <span class="star" data-value="3" onclick="selectRating(3)">&#9733;</span>
                                        <span class="star" data-value="4" onclick="selectRating(4)">&#9733;</span>
                                        <span class="star" data-value="5" onclick="selectRating(5)">&#9733;</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="cancelModal" type="submit" class="text-red-600 px-4 py-2 mt-4 rounded outline-1 outline-red-600 hover:bg-red-700 hover:text-white focus:outline-none focus:shadow-outline-blue active:bg-red-800">Cancel</button>
                                <button id="submitRatingButton" type="submit" class="bg-gray-600 font-medium text-white px-4 py-2 mt-4 rounded-md hover:bg-gray-800 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var ratingModal = document.getElementById('ratingModal');
    var ratingForm = document.getElementById('ratingForm');
    var btnSelesai = document.getElementById('btnSelesai');
    var cancelModal = document.getElementById('cancelModal');
    var submitButton = document.getElementById('submitRatingButton');

    btnSelesai.addEventListener('click', function () {
        ratingModal.classList.remove('hidden');
        ratingModal.classList.add('opacity-100');
        ratingModal.classList.remove('opacity-0');
    });

    cancelModal.addEventListener('click', function () {
        ratingModal.classList.add('hidden');
        ratingModal.classList.remove('opacity-100');
        ratingModal.classList.add('opacity-0');
    });

    ratingForm.addEventListener('submit', function (event) {
        event.preventDefault();

        var formData = new FormData(ratingForm);

        const rateUrl = @json(route('myclass.rate', ['classId' => $class->id]));

   // Use rateUrl in your fetch request
   fetch(rateUrl, {
       method: 'POST',
       body: formData
   })

        .then(response => response.json())
        .then(data => {
            // Handle the response data as needed
            console.log(data);
            // Optionally, close the modal or perform other actions
            ratingModal.classList.add('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    submitButton.addEventListener('click', function () {
        ratingForm.submit(); // Use the submit() method of the form
        ratingModal.classList.add('hidden');
    });
});

function selectRating(value) {
    document.getElementById('ratingInputModal').value = value;
    updateStars(value);
}

function updateStars(value) {
    const stars = document.querySelectorAll('#ratingModal .flex span');
    stars.forEach((star, index) => {
        star.classList.toggle('text-yellow-500', index < value);
    });
}
</script>



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
