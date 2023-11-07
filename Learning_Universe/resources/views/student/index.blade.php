<DOCTYPE html>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>weyaweyoooo
                        <a href="{{ url('add-student') }}" class="btn btn-primary float-end">Add Student</a>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
                    </h4>
                </div>
                <div class="card-body">

             <center>   <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->course }}</td>
                                <td>
                                    <img src="{{ asset('uploads/students/'.$item->profile_image) }}" width="70px" height="70px" alt="Image">
                                </td>
                                <td>
                                    <a href="{{ url('edit-student/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    {{-- <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-student/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </center>
                @foreach($student as $item)
                                <div class="flex-none w-96 mr-4 overflow-hidden bg-white rounded shadow">
                                <img src="{{ asset('uploads/students/'.$item->profile_image) }}" width="500px" height="500px" alt="Image" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h3 class="text-lg font-bold mb-2">{{ $item->name }}</h3>
                                        <p class="text-gray-600 text-sm mb-4">{{ $item->email }}</p>
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="text-gray-600">Price: </div>
                                            <div class="text-gray-600">Lessons: {{ $item->course }}</div>
                                        </div>
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="text-gray-600">Members: </div>
                                            <div class="text-gray-600">Ratings: </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
</html>
