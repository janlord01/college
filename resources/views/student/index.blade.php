@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if(session('error'))
        <div class="text-sm border border-t-8 rounded text-red-700 border-red-600 bg-red-100 px-3 py-4 mb-4" role="alert">
            {{ session('error') }}
        </div>
        @endif
        {{-- @include('layouts.breadcrumbs') --}}
        {{-- @include('layouts.back') --}}

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg content-header">

            <header class="font-semibold bg-gray-200 text-gray-700  py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md relative ">
                <p class="header-title">Student List</p>
                {{-- <a href="{{ route('student.download') }}"> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 border border-blue-500 rounded absolute left-36 bottom-3 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill inline" viewBox="0 0 16 16">
                    <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
                  </svg> Excel Template</button></a>
                <a href="{{ route('student.import') }}"> <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-3 border border-purple-500 rounded absolute left-80 bottom-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill inline mr-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
                  </svg>Import File</button></a>
                  --}}
                <form class="" method="GET"
                    action="{{ route('student.search') }}" class="search_form">
                    <input id="search" type="text" class="bg-gray-100  text-gray-700 font-bold mb-0 h-9 border border-gray-500 rounded absolute right-56 mr-2 bottom-3 form-input @error('search')  border-red-500 @enderror search_input"
                    name="search" value="{{ old('search') }}"  autocomplete="search" placeholder="Search By: Name" autofocus>
                    
                    @error('search')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                    <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-3 border border-gray-500 rounded absolute xs:right-10  right-44 mr-2 bottom-3 search_btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg></button>
                </form> 
                
                <a href="{{ route('student.import') }}" alt="import student file" class="export"> 
                    <button class="bg-gray-300 hover:bg-gray-400 text-black hover:text-white font-bold py-2 px-3 border-gray-500  border rounded absolute mr-5 right-28 bottom-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                        </svg>
                    </button>
                </a>
                <a href="{{ route('student.export') }}" alt="export student file" class="import"> 
                    <button class="bg-gray-300 hover:bg-gray-400 text-black hover:text-white font-bold py-2 px-3 border-gray-500  border rounded absolute right-20 bottom-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                        </svg>
                    </button>
                </a>
                <a href="{{ route('student.create') }}" alt="add new student"> 
                    <button class="bg-gray-300 hover:bg-gray-400 text-black hover:text-white font-bold py-2 px-3 border-gray-500  border rounded absolute mr-1 right-6 bottom-3 add_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </button>
                </a>
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    
                    <table class="min-w-full w-full info-table table-auto border-collapse md:table mb-5">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-300 md:border-none sm:hidden block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative tabletr">
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Name</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell td_hide">Email Address</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Course</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Actions</th>
                            </tr> 
                        </thead>
                        <tbody class="md:table-row-group">
                            @foreach ($students as $student)
                                <tr class="border border-grey-500 md:border-none block md:table-row">
                                    
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="{{ asset($student->image_path ? 'images/'.$student->image_path :'images/man-icon.png') }}" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-sm sm:inline block text-black pr-1">{{ $student->name }}</p>
                                            </div>
                                            </div>
                                    </td>
                                    <td class="p-2 block md:border md:border-grey-500 text-left md:table-cell td_hide">
                                        <span class="inline-block md:hidden font-bold pr-1 ">Email Address: </span>{{ $student->email }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block md:hidden font-bold pr-1 ">Course: </span>{{ $student->email }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block md:hidden font-bold">Actions</span>
                                        <form class="inline" method="POST"
                                        action="{{ route('student.qrcode.regenerate', $student->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        {{-- <a href="" alt="Generate QR-Cpde"> --}}
                                            <button type="submit" class="text-white hover:text-white font-bold p-1 rounded bg-purple-500 hover:bg-purple-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code-scan inline" viewBox="0 0 16 16">
                                                    <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"/>
                                                    <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"/>
                                                    <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"/>
                                                    <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"/>
                                                    <path d="M12 9h2V8h-2v1Z"/>
                                                </svg>
                                            </button>
                                        {{-- </a> --}}
                                        </form>
                                        <a href="{{ route('student.edit', $student->id) }}" alt="Edit Student">
                                            <button class="text-white hover:text-white font-bold p-1 rounded bg-blue-500 hover:bg-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square inline mr-1" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        </a>
                                        
                                        <a href="{{ route('student.requirement', $student->id) }}" alt="Update Requirements"><button class="text-white hover:text-white font-bold p-1 rounded bg-orange-400 hover:bg-orange-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check inline" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                              </svg>
                                            </button>
                                        </a>
                                        @if ($student->status == 1)
                                        <a href="{{ route('user.updateStatus',['user_id'=> $student->id, 'status_code'=>0]) }}" alt="Deactivate Student"><button class="text-white hover:text-white font-bold p-1 rounded bg-red-500 hover:bg-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle inline" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                            </button>
                                        </a>
                                        @else
                                        <a href="{{ route('user.updateStatus',['user_id'=> $student->id, 'status_code'=>1]) }}"><button class="text-white hover:text-white font-bold p-1 rounded bg-green-500 hover:bg-green-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle inline" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                              </svg></button></a>
                                        @endif 
                                    </td>
                                    
                                </tr>
                                
                            
                            
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}
                </p>
            </div>
        </section>
    </div>

</main>
@endsection
