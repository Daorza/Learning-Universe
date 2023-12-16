@extends('layouts.sidebar')

@section('content')
<title>My Class Details</title>
@auth
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<style>
    .slider-container {
        max-width: 75%;
        margin: 0 auto;
        position: relative;
        overflow-y: auto;
    }

    .slick-slide {
        outline: none;
    }

    .slider-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .slider-prev,
    .slider-next {
        cursor: pointer;
    }

    .slick-dots {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }

    .slick-dots li {
        display: inline-block;
        margin: 0 5px;
    }

    .slick-dots li button {
        font-size: 0;
        line-height: 0;
        display: block;
        width: 15px;
        height: 15px;
        padding: 5px;
        border: 2px solid #000;
        border-radius: 50%;
        background: transparent;
        cursor: pointer;
        outline: none;
        opacity: 0.5;
    }

    .slick-dots li.slick-active button {
        background: #000;
        opacity: 1;
    }

    .slider-indicator {
        color: #ff0000;
        font-size: 18px;
        font-weight: bold;
        margin-right: 10px;
    }

    .hidden {
    display: none !important;
    }

</style>
<div class="flex p-16 pt-24">
    <div class="slider-container">
        <div class="slick-slider">
            @foreach ($relatedDetails as $relatedDetail)
            <div class="slick-slide" data-material="{{ json_encode($relatedMaterials[$loop->index] ?? null) }}">                <div class="shadow-lg w-full bg-white rounded-lg p-6 z-0">
                    <div class="flex justify-between py-6">
                        <a href="javascript:window.history.back()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-10 h-10 p-2 ml-12 rounded-full hover:bg-gray-900 hover:fill-white">
                                <path fill-rule="evenodd"
                                    d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <div>
                            <h1 class="text-lg font-medium uppercase">{{ $class->class_title }}</h1>
                            <h1 class="text-sm font-light capitalize tracking-widest text-center">{{
                                $material->material_title }}</h1>
                        </div>

                        <div>
                            <div class="next-material-status"></div>
                        </div>
                    </div>
                    <div class="h-80 w-full mx-auto">
                        <img src="{{ asset('uploads/detailMaterials/' . $relatedDetail->detail_image) }}"
                            alt="{{ $relatedDetail->detail_title }}" class="w-fit h-80 mx-auto rounded-lg object-cover">
                    </div>
                    <div class="slider-indicator p-2 text-red-600"></div>
                    <hr class="h-px my-6 w-4/5 mx-auto">
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold">{{ $relatedDetail->detail_title }}</h3>
                        <h4 class="text-sm font-light tracking-widest">{{ $relatedDetail->detail_subtitle }}</h4>
                        <div class="mt-2 pb-8">
                            <p class="list-item ml-6">{{ $relatedDetail->detail_text }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <div class="slider-controls mt-4 flex justify-between">
            <button class="slider-prev bg-red-600 text-white py-2 px-8 rounded-md hover:bg-red-800 hover:font-medium shadow-md">Previous</button>
            <button class="slider-next bg-red-600 text-white py-2 px-8 rounded-md hover:bg-red-800 hover:font-medium shadow-md">Next</button>
            <a href="{{ route('myclass.index') }}" class="next-material-btn hidden bg-red-600 text-white py-2 px-8 rounded-md hover:bg-red-800 hover:font-medium shadow-md ml-auto">Finish Material</a>
        </div>
    </div>
</div>

<script>
    var routeUrl = {
        'index': '{{ route("myclass.index") }}',
        'showDetail': '{{ route("myclass.showDetail", ["classId" => $class->id, "materialId" => 0, "detailId" => 0]) }}',
    };
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $(document).ready(function () {
        var slider = $('.slick-slider');

        slider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            infinite: false,
        });

        $('.slider-prev').click(function () {
            slider.slick('slickPrev');
            updateNextMaterialStatus();
        });

        $('.slider-next').click(function () {
            slider.slick('slickNext');
            updateNextMaterialStatus();
        });

        // Setelah slider selesai diinisialisasi
        slider.on('init', function () {
            updateNextMaterialStatus();
        });

        // Setelah setiap perubahan slide
        slider.on('afterChange', function (event, slick, currentSlide) {
            updateNextMaterialStatus();
        });


        function updateNextMaterialStatus() {
            var totalSlides = slider.slick('getSlick').slideCount;
            var currentSlide = slider.slick('slickCurrentSlide');

            if (currentSlide === totalSlides - 1) {
                showFinishMaterialButton();
                hideNextButton();
            } else {
                hideFinishMaterialButton();
                showNextButton();
            }
        };

        function showNextButton() {
            $('.slider-next').removeClass('hidden');
        }

        function hideNextButton() {
            $('.slider-next').addClass('hidden');
        }

        function showFinishMaterialButton() {
            var hasMoreMaterials = {{ $nextMaterial ? 'true' : 'false' }};

            if (!hasMoreMaterials) {
                $('.next-material-btn').removeClass('hidden');
                $('.next-material-btn').attr('href', '{{ route("myclass.index") }}');
                $('.next-material-status').text('Next Material: Finish');
            } else {
                var currentMaterialId = slider.find('.slick-current').attr('data-material-id');
                var nextMaterialId = {{ optional($nextMaterial)->id ?? 0 }};
                var nextDetail = {!! json_encode(optional($nextMaterial)->detailMaterials) !!};
                var nextDetailId = nextDetail && nextDetail.length > 0 ? nextDetail[0].id : 0;

                if (nextMaterialId && nextDetailId) {
                    $('.next-material-btn').removeClass('hidden');
                    var url = "{{ route('myclass.showDetail', ['classId' => $class->id, 'materialId' => ':materialId', 'detailId' => ':detailId']) }}" + '?currentMaterial=' + currentMaterialId;
                    url = url.replace(':materialId', nextMaterialId).replace(':detailId', nextDetailId);
                    $('.next-material-btn').attr('href', url);
                    $('.next-material-status').text('Next Material: Continue');
                } else {
                    $('.next-material-btn').addClass('hidden');
                    $('.next-material-status').text('Next Material: Locked');
                }
            }
        }

        function hideFinishMaterialButton() {
            $('.next-material-btn').addClass('hidden');
            $('.next-material-status').text('');
        }


        $('.next-material-btn').click(function () {
            var currentSlideId = slider.find('.slick-current').attr('data-slick-index');
            nextSlideId = parseInt(currentSlideId) + 1;

            if (nextSlideId >= 0 && nextSlideId < {{ count($relatedMaterials) }}) {
                var nextMaterial = JSON.parse(slider.find('.slick-slide[data-slick-index="' + (nextSlideId) + '"]').attr('data-material'));

                if (nextMaterial && nextMaterial.id) {
                    var detailId = optional(nextMaterial.detailMaterials.first()).id;

                    var route = routeUrl.showDetail.replace(/0/g, nextMaterial.id);
                    window.location.href = route + '?currentMaterial=' + nextMaterial.id;
                    return;
                }
            }
            window.location.href = routeUrl.index;
        });

        // Initial update
        updateNextMaterialStatus();
    });
</script>




<div class="bg-gray-900 bg-opacity-50 fixed h-screen w-full">
    <div class="p-20 mt-40 shadow-md bg-white">
        <div class="p-8 flex justify-center">
            <div class="text-lg font-semibold">
                One step for you to get little bit closer<br>
                <span class="text-sm mx-auto font-light">After login to your accout, you can access this page!</span>
            </div>
        </div>
        <br>
        <a href="{{ route('acc') }}"
            class="px-8 py-3 rounded-lg flex justify-center border-2 border-gray-700 w-fit shadow-md mx-auto hover:border-0 hover:bg-gray-700 hover:text-lg hover:text-white hover:shadow-lg">
            Join with learning universe
        </a>
        <a href="{{ url('') }}" class="flex justify-center text-blue-600 mt-4 hover:underline text-sm">Back to home
            page</a>
    </div>
</div>
@endauth
@endsection
