@extends('layouts.sidebaradmin')

@section('content_admin')

<title>admin-dashboard</title>
    <div class="ml-72 p-12 flex-1">
        <div>
            <div class="text-2xl font-bold capitalize">Hello, Minerva</div>
            <div class="text-sm font-normal capitalize mt-1">Welcome back!</div>
        </div>
        <br>
        <!-- container 1 -->
        <div class="rounded-md shadow bg-gray-50 p-8">
            <div>
                <div class="grid grid-cols-4 gap-8 p-4">
                    <div class="text-center">
                        <div class="rounded-full bg-gray-500 p-1 mb-3 text-white">A</div>
                        <div class="font-medium">Class</div>
                        <div>40</div>
                    </div>
                    <div class="text-center">
                        <div class="rounded-full bg-gray-500 p-1 mb-3 text-white">A</div>
                        <div class="font-medium">Student</div>
                        <div>265</div>
                    </div>
                    <div class="text-center">
                        <div class="rounded-full bg-gray-500 p-1 mb-3 text-white">A</div>
                        <div class="font-medium">Completed</div>
                        <div>79</div>
                    </div>
                    <div class="text-center">
                        <div class="rounded-full bg-gray-500 p-1 mb-3 text-white">A</div>
                        <div class="font-medium">Ongoing Class</div>
                        <div>18</div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- container 2 -->
        <div class="grid grid-cols-2 gap-4">
            <div class="rounded-md shadow bg-gray-50 p-8 text-center">
                <div>Monthly Members</div>
                <div></div>
            </div>
            <div class="rounded-md shadow bg-gray-50 p-8 text-center">
                <div>Monthly Class Completed</div>
                <div></div>
            </div>
        </div>
    </div>
