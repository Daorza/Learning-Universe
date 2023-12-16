@extends('layouts.sidebaradmin')

@section('content_admin')

<title>Admin Dashboard</title>
    <div class="ml-72 p-12 flex-1">
        <div>
            <div class="text-2xl font-bold capitalize">Hello, {{ Auth::guard('admin')->user()->name }}!</div>
            <div class="text-sm font-normal capitalize mt-1">Welcome back!</div>
        </div>
        <br>
        <!-- container 1 -->
        <div class="rounded-md shadow bg-gray-50 p-8">
            <div>
                <div class="grid grid-cols-4 gap-8 p-4">
                    <div class="text-center">
                        <div class="rounded-full bg-gray-500 p-1 mb-3 text-white flex justify-center w-min items-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 p-2 shadow-md">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
</svg>
                        </div>
                        <div class="font-medium">Class</div>
                        <div>3</div>
                    </div>
                    <div class="text-center">
                        <div class="rounded-full bg-gray-500 p-1 mb-3 text-white flex justify-center w-min items-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 p-2 shadow-md">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
</svg>
                        </div>
                        <div class="font-medium">Student</div>
                        <div>5</div>
                    </div>
                    <div class="text-center">
                        <div class="rounded-full bg-gray-500 p-1 mb-3 text-white flex justify-center w-min items-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 p-2 shadow-md">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
                        </div>
                        <div class="font-medium">Completed</div>
                        <div>2</div>
                    </div>
                    <div class="text-center">
                        <div class="rounded-full bg-gray-500 p-1 mb-3 text-white flex justify-center w-min items-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 p-2 shadow-md">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
</svg>
                        </div>
                        <div class="font-medium">Ongoing Class</div>
                        <div>1</div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- container 2 -->
        <div class="grid grid-cols-2 gap-4">
        <div class="rounded-md shadow bg-gray-50 p-8 text-center">
    <div>Monthly Members</div>
    <div>
        {!! $monthlyMembersChart->container() !!}
    </div>
</div>

<div class="rounded-md shadow bg-gray-50 p-8 text-center">
    <div>Monthly Class Completed</div>
    <div>
        {!! $monthlyClassCompletedChart->container() !!}
    </div>
</div>

<!-- Include Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Include the chart scripts -->
{{ $monthlyMembersChart->script() }}
{{ $monthlyClassCompletedChart->script() }}


        </div>
    </div>
    @endsection
