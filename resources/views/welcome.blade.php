<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <img src='/images/library.jfif'>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://en.wikipedia.org/wiki/Library" class="underline text-gray-900 dark:text-white">Library</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    A library is a collection of materials, books or media that are easily accessible for use and not just for display purposes. It is responsible for housing updated information in order to meet the user's needs on a daily basis. A library provides physical (hard copies documents) or digital access (soft copies) materials, and may be a physical location or a virtual space, or both. A library's collection can include printed materials and other physical resources in many formats such as DVD, CD and Cassette as well as access to information, music or other content held on bibliographic databases.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path class="cls-1" d="M5.48,43.81,61.3,0l56.1,43.81ZM43.12,89.86l.12-20.45H41.17V95.19a37.37,37.37,0,0,1,9.32-1.12,27,27,0,0,1,8.89,1.4,19.14,19.14,0,0,0-6.09-3.31,22.29,22.29,0,0,0-8.81-.94,1.25,1.25,0,0,1-1.36-1.14.81.81,0,0,1,0-.22Zm33.41-25.8a17.13,17.13,0,0,0-8,1,11.76,11.76,0,0,0-5.92,4.63V92.84a29.4,29.4,0,0,1,6.55-3.39,16.74,16.74,0,0,1,7.41-1.13V64.06Zm3,2.83h3.41a1.26,1.26,0,0,1,1.25,1.26V97.07a1.25,1.25,0,0,1-1.25,1.26,1.1,1.1,0,0,1-.41-.07,39,39,0,0,0-10.43-1.69A24.15,24.15,0,0,0,62,98.63a1.38,1.38,0,0,1-1.43,0,24.19,24.19,0,0,0-10.09-2.06,39,39,0,0,0-10.42,1.69,1.14,1.14,0,0,1-.41.07,1.26,1.26,0,0,1-1.25-1.25V68.15a1.27,1.27,0,0,1,1.26-1.26h3.58l0-4.19a1.25,1.25,0,0,1,1-1.22h0a19.9,19.9,0,0,1,10.84.83,13.93,13.93,0,0,1,6.25,4.56,14.54,14.54,0,0,1,6.25-4.36,21.91,21.91,0,0,1,10.83-1,1.26,1.26,0,0,1,1.08,1.24h0v4.19ZM63.79,95.28a26.87,26.87,0,0,1,8.32-1.21,37,37,0,0,1,9.32,1.12V69.41H79.52V90a1.25,1.25,0,0,1-1.25,1.26,1.36,1.36,0,0,1-.29,0,16,16,0,0,0-8,.85,27.88,27.88,0,0,0-6.17,3.23Zm-3.73-2.69V69.69a11.07,11.07,0,0,0-5.84-4.8,15.52,15.52,0,0,0-8-.89l-.14,24.4a21.84,21.84,0,0,1,8,1.14,21.51,21.51,0,0,1,6,3ZM61.44,21a5.68,5.68,0,1,1-5.68,5.68A5.68,5.68,0,0,1,61.44,21Zm0-6.05A11.73,11.73,0,1,1,49.71,26.69,11.73,11.73,0,0,1,61.44,15ZM6.63,103.73h6v-1a3.79,3.79,0,0,1,3.78-3.78V58.19H8.89V49.93h104.8v8.26h-7.48V98.9h0a3.79,3.79,0,0,1,3.78,3.78v1h6.24a2.42,2.42,0,0,1,2.4,2.41v5.53h1.82a2.42,2.42,0,0,1,2.41,2.4v3a2.44,2.44,0,0,1-2.41,2.41H2.41A2.43,2.43,0,0,1,0,117.08v-3a2.41,2.41,0,0,1,2.41-2.4H4.23v-5.53a2.42,2.42,0,0,1,2.41-2.41Zm27.24,0H88.74v-1c0-.15,0-.3,0-.45v0h0a3.79,3.79,0,0,1,3.66-3.28V58.19H30.18V98.9a3.78,3.78,0,0,1,3.69,3.78v1Z"/></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="#" class="underline text-gray-900 dark:text-white">LMS</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Library Management System,offers to view the available books in library,As an user acan able to view and subscribe the books,As an admin can manage the books and view the subscriber 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </body>
</html>
