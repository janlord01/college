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
                <p class="header-title">Course List</p>
                
                <a href="{{ route('course.create') }}" alt="add new course"> 
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
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Course</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell td_hide">Code</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Description</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Actions</th>
                            </tr> 
                        </thead>
                        <tbody class="md:table-row-group">
                            @foreach ($courses as $course)
                                <tr class="border border-grey-500 md:border-none block md:table-row">
                                    
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold text-sm sm:inline block text-black pr-1">{{ $course->course_name }}</p>
                                            </div>
                                            </div>
                                    </td>
                                    <td class="p-2 block md:border md:border-grey-500 text-left md:table-cell td_hide">
                                        <span class="inline-block md:hidden font-bold pr-1 ">Code </span>{{ $course->course_code }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block md:hidden font-bold pr-1 ">Course Description: </span>{{ $course->course_description  }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block md:hidden font-bold">Actions</span>
                                        <a href="{{ route('course.edit', $course->id) }}" alt="Edit Course">
                                            <button class="text-black hover:text-white font-bold p-1 rounded bg-gray-300 hover:bg-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square inline mr-1" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="{{ route('course.edit', $course->id) }}" alt="Edit Course">
                                            <button class="text-black hover:text-white font-bold p-1 rounded bg-gray-300 hover:bg-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square inline" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                                                </svg>
                                            </button>
                                        </a>
                                        
                                    </td>
                                    
                                </tr>
                                
                            
                            {{-- @include('students.deleteStudent') --}}
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $students->links() }} --}}
                </p>
            </div>
        </section>
    </div>

</main>
@endsection
