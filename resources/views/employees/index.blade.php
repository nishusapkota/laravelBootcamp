<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-12">
                <div class="card mt-3 p-3">
                    <div class="card-header">
                        @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
                        <h1>Employee Detail</h1>
                    </div>

                    <table class="table">
                        <div class="card-body">
                            <thead class="thead-dark">
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Birth Date</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Salary</th>
                                    <th>Age</th>
                                    <th>Hobby</th>
                                    <th>Zip Code</th>
                                    <th>Remember Me</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->date_of_birth }}</td>
                                        <td>{{ $employee->gender }}</td>
                                        <td>{{ $employee->country }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>{{ $employee->age }}</td>
                                        <td>
                                            @php
                                                $hobbies = json_decode($employee->hobby) ?? [];
                                            @endphp

                                            @if (!empty($hobbies))
                                                <ul>
                                                    @foreach ($hobbies as $hobby)
                                                        <li>{{ $hobby }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>No hobbies available.</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($employee->zipcode !== null)
                                                {{ $employee->zipcode }}
                                            @else
                                                no zipcode
                                            @endif
                                        </td>
                                        <td>
                                            @if ($employee->remember_me == '1')
                                                yes
                                            @else
                                                no
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $employee->image) }}" height="200px"
                                                width="200px">
                                        </td>
                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ route('employees.show', $employee) }}">Show</a>

                                            <a class="btn btn-success"
                                                href="{{ route('employees.edit', $employee) }}">Edit</a>
                                            <form class="inline-block"
                                                action="{{ route('employees.destroy', $employee) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>


                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
