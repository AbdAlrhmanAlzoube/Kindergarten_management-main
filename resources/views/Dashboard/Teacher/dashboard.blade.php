<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pro</title>

    <!-- Include CSS -->
    @include('Dashboard.Teacher.Layouts.css.main_css')
</head>
<body>
    
@include('Dashboard.Teacher.Layouts.navbar')
    <!-- Sidebar -->
    @include('Dashboard.Teacher.layouts.sidebar')

    <!-- Content Section -->
    <div class="content-wrapper">
        @yield('teacher_content')

        <!-- Main Content -->
            <!-- Data Display Section -->
            <div class="w-full block mt-8">
                <div class="flex flex-wrap sm:flex-no-wrap justify-between">
                    <div class="w-full bg-gray-200 text-center border border-gray-300 px-8 py-6 rounded">
                        <h3 class="text-gray-700 uppercase font-bold">
                           
                        </h3>
                    </div>
                    <!-- Repeat the similar structure for other data -->
                </div>
            </div>
        </div>
    </div>
   
    <!-- Footer Section -->
    @include('Dashboard.Teacher.layouts.footer')

    <!-- Include JavaScript -->
    @include('Dashboard.Teacher.layouts.js.main_js')
</body>
</html>
