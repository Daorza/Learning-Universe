<div class="fixed inset-0 overflow-y-auto bg-gray-800 bg-opacity-40 hidden" id="ratingModal">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 w-full md:w-1/2 lg:w-1/3 mx-4">
            <form onsubmit="return" id="ratingForm">
                @csrf
                <div class="mb-6">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating:</label>
                    <input type="hidden" name="rating" id="ratingInput" value="1">
                    <div class="flex items-center gap-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="cursor-pointer text-xl" data-value="{{ $i }}" onclick="selectRating({{ $i }})">&#9733;</span>
                        @endfor
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
   function selectRating(value) {
        document.getElementById('ratingInput').value = value;
        const stars = document.querySelectorAll('#ratingModal .flex span');
        stars.forEach((star, index) => {
            star.classList.toggle('text-yellow-500', index < value);
        });
    }
</script>
