<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <div class="card-header">
                        <h1>Edit Employee Detail</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employees.update', $employee) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group m-1 p-2">
                                <label>Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $employee->name) }}">
                                @error('name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label>Email</label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $employee->email) }}">
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label>Phone Number</label>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $employee->phone) }}">
                                @error('phone')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label>Date Of Birth</label>
                                <input type="date" name="date_of_birth"
                                    class="form-control @error('date_of_birth') is-invalid @enderror"
                                    value="{{ old('date_of_birth', $employee->date_of_birth) }}">
                                @error('date_of_birth')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label>New Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label>Password Confirmation</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label>Gender</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="male" id="male" name="gender"
                                        {{ $employee->gender === 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="female" id="female"
                                        name="gender" {{ $employee->gender === 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="other" id="other"
                                        name="gender" {{ $employee->gender === 'other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>

                            <div class="form-group m-1 p-2">
                                <label for="country">Country</label>
                                <select class="form-control" id="country" name="country">
                                    <option value="usa" {{ $employee->country === 'usa' ? 'selected' : '' }}>USA</option>
                                    <option value="india" {{ $employee->country === 'india' ? 'selected' : '' }}>India
                                    </option>
                                    <option value="nepal" {{ $employee->country === 'nepal' ? 'selected' : '' }}>Nepal
                                    </option>
                                    <option value="canada" {{ $employee->country === 'canada' ? 'selected' : '' }}>Canada
                                    </option>
                                </select>
                            </div>

                            <div class="form-group m-1 p-2">
                                <label>Salary</label>
                                <input type="number" name="salary"
                                    class="form-control @error('salary') is-invalid @enderror"
                                    value="{{ old('salary', $employee->salary) }}">
                                @error('salary')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label>Age</label>
                                <input type="number" name="age"
                                    class="form-control @error('age') is-invalid @enderror"
                                    value="{{ old('age', $employee->age) }}">
                                @error('age')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label for="hobby[]">Hobbies</label><br>
                                <label><input type="checkbox" name="hobby[]" value="playing"
                                        {{ in_array('playing', old('hobby', json_decode($employee->hobby) ?? [])) ? 'checked' : '' }}>
                                    Playing</label>
                                <label><input type="checkbox" name="hobby[]" value="singing"
                                        {{ in_array('singing', old('hobby', json_decode($employee->hobby) ?? [])) ? 'checked' : '' }}>
                                    Singing</label>
                                <label><input type="checkbox" name="hobby[]" value="dancing"
                                        {{ in_array('dancing', old('hobby', json_decode($employee->hobby) ?? [])) ? 'checked' : '' }}>
                                    Dancing</label>
                                <label><input type="checkbox" name="hobby[]" value="eating"
                                        {{ in_array('eating', old('hobby', json_decode($employee->hobby) ?? [])) ? 'checked' : '' }}>
                                    Eating</label>
                            </div>

                            <div class="form-group m-1 p-2">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="form-group m-1 p-2">
                                <label for="zipcode">Zip Code</label>
                                <input type="text" name="zipcode"
                                    class="form-control @error('zipcode') is-invalid @enderror"
                                    value="{{ old('zipcode', $employee->zipcode) }}">
                                @error('zipcode')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group m-1 p-2">
                                <label for="description">Employee Description</label><br>
                                <textarea name="description"
                                    class="form-control @error('description') is-invalid @enderror" id="description"
                                    rows="5" cols="20">{{ old('description', $employee->description) }}</textarea>
                            </div>

                            <div class="form-group m-1 p-2">
                                <label class="form-check-label" for="remember_me">Remember_me</label>
                                <input class="form-check-input" type="checkbox" id="remember_me" value="1"
                                    name="remember_me" {{ $employee->remember_me == '1' ? 'checked' : '' }}>
                            </div>

                            <div class="form-group m-1 p-2">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
