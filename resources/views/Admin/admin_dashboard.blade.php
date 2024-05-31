<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pro</title>

    <!-- Include CSS -->
    @include('Admin.Layouts.css.main_css')
</head>
<body>
    
    
@include('Admin.Layouts.navbar')
    <!-- Sidebar -->
    @include('Admin.layouts.sidebar')

    <!-- Content Section -->
    <div class="content-wrapper">
        <!-- Main Content -->
        @yield('content')
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
    @include('Admin.layouts.footer')

    <!-- Include JavaScript -->
    @include('Admin.layouts.js.main_js')
</body>
</html>
