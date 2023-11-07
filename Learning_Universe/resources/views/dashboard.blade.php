@extends('layouts.sidebar')

@section('content')

<title>dashboard</title>
        <!-- section 1 -->
        <div class="flex p-16 pt-36">
            <!-- 1.1 -->
            <div class="flex-auto">
                <!-- heading -->
                <h3 class="text-lg font-semibold text-red-950 mb-3">Start to new journey!</h3>
                <h1 class="text-4xl font-semibold">The Best <span class=" text-red-600">Online Courses</span> <br>
                    From Learning Universe
                </h1>
                <br>
                <!-- desc -->

                <hr class="h-px w-3/4 my-8 bg-gray-500">
                Determine successfull future with our classes <br>
                and gain knowledge as wide as the universe<br>
                <!-- CTA -->
                <button
                    class="px-12 capitalize tracking-wide py-2 mx-auto bg-gray-900 hover:font-semibold text-white my-8 rounded-2xl hover:text-black hover:bg-gray-300 shadow hover:shadow-md">
                    <a href="">
                        Get Started
                    </a>
                </button>
            </div>
            <!-- 1.2 -->
            <div class="flex-auto">
                <div class="bg-red-500 h-full pr-16 rounded-full">
                    <img src="" alt="">
                </div>
            </div>
        </div>

        <hr class="h-2 rounded-full mx-auto justify-center w-3/5 my-8 bg-gray-600">

        <!-- section 2 -->
        <div class="flex p-16">
            <!-- 2.1 -->
            <div class="flex-auto mt-20">
                <!-- heading -->
                <h4 class="text-md font-semibold text-red-950 mb-3">Get to know Us!</h4>
                <h1 class="text-4xl font-semibold">Grow your <span class=" text-red-600">Skills . . .</span><br>
                    learn with us from anywhere
                </h1>
                <br>
                <!-- desc -->
                Access our online courses anywhere & anytime <br>
                take a time to focus with your course<br>
                take the certificate later after completed it!
                <br>
                <br>
                <br>
                <!-- extras -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="font-semibold">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Expert Trainers
                        </div>
                    </div>
                    <div class="font-semibold">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Flexible Study Time
                        </div>
                    </div>
                    <div class="font-semibold">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Online Learning
                        </div>
                    </div>
                    <div class="font-semibold">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Affordable Price
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2.2 -->
            <div class="flex-auto">
                <div class="flex justify-end ml-8">
                    <img src="{{ asset('asset/Logo_Learning-Universe.png') }}" alt="Logo" class="h-3/4 w-3/4">
                </div>
            </div>
        </div>


        <!-- section 3 -->
        <div class="flex p-16">
            <!-- 3.1 -->
            <div class="flex-wrap w-full">
                <!-- heading -->
                <h4 class="uppercase tracking-wider text-sm font-semibold text-red-500 mb-3">Highlight Courses</h4>
                <h1 class="capitalize text-4xl font-semibold">Try our best courses for you to get started</h1>
                <br>

                <!-- carousel -->
                <div class="bg-gray-100 shadow-md rounded-lg">
                    <div class="container mx-auto py-12 px-4">
                        <div class="flex overflow-x-scroll py-2">
                            @foreach($onlineClasses as $onlineClass)
                                <div class="flex-none w-96 mr-4 overflow-hidden bg-white rounded shadow">
                                    <img src="{{ asset('storage/'. $onlineClass->class_picture) }}" alt="{{ $onlineClass->class_title }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h3 class="text-lg font-bold mb-2">{{ $onlineClass->class_title }}</h3>
                                        <p class="text-gray-600 text-sm mb-4">{{ $onlineClass->class_description }}</p>
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
                <div class="flex justify-center">
                    <button type="button" class="px-8 py-2 rounded-full mx-auto shadow-md border-2 font-medium capitalize border-red-700 hover:text-white hover:bg-red-700"><a href="">See All courses</a></button>
                </div>
            </div>
        </div>




        <!-- section 4 -->
        <div class="grid grid-rows-2 py-16 gap-4">
            <!-- 4.1 -->
            <div class="grid grid-cols-4 gap-4 mx-auto bg-red-600 w-full items-center justify-center p-16">
                <div class="flex space-x-4 text-red-50 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 p-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                      </svg>
                    Online <br> Certification</div>
                <div class="flex space-x-4 text-red-50 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 p-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                      </svg>
                    Top <br> Instructors</div>
                <div class="flex space-x-4 text-red-50 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 p-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                      </svg>
                    Unlimited <br> Online Courses</div>
                <div class="flex space-x-4 text-red-50 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 p-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                      </svg>
                    Experienced <br> Members</div>
            </div>
            <!-- 4.2 -->
            <div class="grid grid-cols-6 gap-8 mt-16 p-16">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mr-4 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                    </svg>
                    Business Management</div>
                <div><img src="" alt=""></div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mr-4 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                      </svg>
                      Computer <br> Science</div>
                <div><img src="" alt=""></div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mr-4 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                      </svg>
                      Business and Finance</div>
                <div><img src="" alt=""></div>
                <div><img src="" alt=""></div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mr-4 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                      </svg>
                      Arts <br>and Design</div>
                <div><img src="" alt=""></div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mr-4 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                      </svg>
                      Public <br>Speaking</div>
                <div><img src="" alt=""></div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mr-4 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                      </svg>
                      Video and Photography</div>
            </div>
        </div>


        <!-- section 5 -->
        <div class="grid grid-cols-2">
            <!-- 5.1 -->
            <div class="bg-red-600 p-16">
                <!-- heading -->
                <h5 class="uppercase tracking-wider text-xs font-semibold text-red-100 mb-3">Get to know your quality
                </h5>
                <h2
                    class="capitalize text-4xl font-semibold text-gray-950">
                    Skills certificate from <br> <span class="font-semibold text-red-50 pt-2">Learning Universe</span>
                </h2>
                <br>
                <!-- CTA -->
                <button
                    class="px-8 capitalize tracking-wide py-4 mx-auto bg-gray-900 hover:font-semibold text-white my-8 rounded-2xl hover:text-black hover:bg-transparent hover:border-2 hover:border-gray-900 hover:bg-gray-100  shadow hover:shadow-lg">
                    <a href="">
                        Start The Journey
                    </a>
                </button>
            </div>
            <!-- 5.2 -->
            <div class="bg-red-600 p-16">
                <div class="bg-red-500 h-full pr-16 rounded-full">
                    <img src="" alt="">
                </div>
            </div>
        </div>


        <!-- section 6 -->
        <div class="flex">
            <!-- 6.1 -->
            <div class="flex-wrap p-16">
                <!-- heading -->
                <h5 class="uppercase tracking-wider text-xs font-semibold text-red-950 mb-3">Our testimonials</h5>
                <h2 class="capitalize text-4xl text-gray-950 font-extrabold">What they say about <br> the courses from
                    Learning Universe</h2>
                <br>
                <h5>The best courses in the world and most popular in the world too</h5>
                <br>
                <div>
                    <button class="rounded-full w-3 h-3 bg-black text-transparent">1</button>
                    <button class="rounded-full w-3 h-3 bg-black text-transparent">2</button>
                    <button class="rounded-full w-3 h-3 bg-black text-transparent">3</button>
                </div>
            </div>
            <!-- 6.2 -->
            <div class="flex-wrap p-16 w-full">
                <!-- carousel -->

            </div>
        </div>


        <!-- section 7 -->
        <div class="flex bg-red-600 w-full text-white">
            <!-- 7.1 -->
            <div class="flex-wrap flex-1 p-16 ">
                <!-- Footer Logo -->
                <div>
                    <div class="pb-8 text-3xl font-semibold text-white font-sans">
                        Learning Universe
                    </div>
                    <div class="font-medium">Get a lot of best courses <br> from Learning Universe</div>
                    <div class="mt-8 gap-4">
                        <button class="rounded-full w-10 h-10 bg-black text-transparent">1</button>
                        <button class="rounded-full w-10 h-10 bg-black text-transparent">2</button>
                        <button class="rounded-full w-10 h-10 bg-black text-transparent">3</button>
                        <button class="rounded-full w-10 h-10 bg-black text-transparent">4</button>
                    </div>
                </div>
            </div>
            <!-- 7.2 -->
            <div class="flex-wrap flex-1 p-16 ">
                <!-- footer links -->
                <div>
                    <div class="grid  place-content-center">
                        <div class="font-semibold underline underline-offset-4">Links</div><br>
                        <div class="grid grid-rows-3 gap-3">
                            <div><a href="">Home</a></div>
                            <div><a href="">Class</a></div>
                            <div><a href="">My Class</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 7.2 -->
            <div class="flex-wrap flex-1 p-16 ">
                <!-- footer contact -->
                <div>
                    <div class="grid grid-rows-3 grid-cols-1 gap-4">
                        <div class="font-semibold underline underline-offset-4">Contact</div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                          <a href="" class="ml-4">+1 59800</a>
                        </div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                            </svg>
                          <a href="" class="ml-4">cslearninguniverse@gmail.com</a>
                        </div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                          <a href="" class="ml-4">Kabupaten Bogor, Jawa Barat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- section 8 -->
        <div class="flex bg-red-600 text-white">
            <div class="flex-auto">
                <hr class="h-px w-3/4 my-8 bg-gray-600 mx-auto">
                <div class="flex justify-center py-8 text-lg font-medium tracking-wide">@ Copyright 2023   <a href="" class="hover:underline hover:decoration-dotted px-1"> learninguniverse.com</a></div>
            </div>
        </div>
