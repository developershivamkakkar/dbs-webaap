<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers | Dass and Brown Experiential Learning School</title>
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/assets/dbs.ico') }}">
    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .application-form {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

        }

        .form-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #333333;

        }
    </style>
</head>

<body>
    <div class="container">
        <form class="application-form shadow-lg" method="POST" action="{{ route('job.store') }}"
            enctype="multipart/form-data">
            <a href="{{ route('home.get') }}" class="btn btn-primary mb-2 ">Go Back</a>
            @csrf
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a href="/"><img class="img-fluid" src="{{ asset('storage/assets/dbs-chd.webp') }}"
                    alt="dbs-chd" /></a>
            <h2 class="form-title mt-3">Job Enquiry Form</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name"
                    placeholder="Enter your full name" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="Enter your email address" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="phone" name="phone_number"
                    placeholder="Enter your phone number" value="{{ old('phone_number') }}" required>
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="qualification" class="form-label">Qualification <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="qualification" value="{{ old('qualification') }}"
                    placeholder="Enter your Qualification" required>
                @error('qualification')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Post Applied For <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ old('position_applied') }}"
                    name="position_applied" placeholder="Enter here" required>
                @error('position_applied')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="resume" class="form-label">Upload Resume</label>
                <input type="file" class="form-control" name="resume_file" accept=".pdf">
                @error('resume_file_path')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Add details here" required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="mt-3 text-muted">
                <small>Note: Please fill out this form. We will contact you</small>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>
