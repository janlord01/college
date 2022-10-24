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
                <p class="header-title">Student Requirements</p>
                
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    
                    <table class="min-w-full w-full info-table table-auto border-collapse md:table mb-5">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-300 md:border-none sm:hidden block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative tabletr">
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Title</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell td_hide">Notes</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Type</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Actions</th>
                            </tr> 
                        </thead>
                        <tbody class="md:table-row-group">
                            @foreach ($students as $student)
                                <tr class="border border-grey-500 md:border-none block md:table-row">
                                    
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold text-sm sm:inline block text-black pr-1">{{ $student->title }}</p>
                                            </div>
                                            </div>
                                    </td>
                                    <td class="p-2 block md:border md:border-grey-500 text-left md:table-cell td_hide">
                                        <span class="inline-block md:hidden font-bold pr-1 ">Notes </span>{{ $student->notes }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block md:hidden font-bold pr-1 ">Type: </span>
                                        @if (pathinfo($student->file, PATHINFO_EXTENSION) == 'pdf')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-pdf text-red-500" viewBox="0 0 16 16">
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                            <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                          </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-image text-blue-700" viewBox="0 0 16 16">
                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                        </svg>
                                        @endif
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block md:hidden font-bold">Actions</span>
                                        <a href="{{  asset($student->file ? 'files/'.$student->file :'files/man-icon.png')  }}" target="_blank" alt="View File">
                                            <button class="text-white hover:text-white font-bold p-1 rounded bg-green-500 hover:bg-green-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye inline" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                            </button>
                                        </a>
                                        
                                        {{-- <a href="{{ route('student.edit', $student->id) }}" alt="Edit Requirement"> --}}
                                            <button class="text-white hover:text-white font-bold p-1 rounded bg-blue-500 hover:bg-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="{{ $student->csrID }}" class="bi bi-pencil-square inline mr-1 editStudentFileBtn" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        {{-- </a> --}}
                                        {{-- <a href="#"  alt="Delete Requirement"> --}}
                                            <button class="text-white hover:text-white font-bold p-1 rounded bg-red-500 hover:bg-red-700 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="{{ $student->csrID }}" class="bi bi-trash inline deleteStudentFileBtn" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </button>
                                        {{-- </a> --}}
                                        
                                    </td>
                                
                                </tr>
                                
                            @include('student.edit-requirement')
                            @include('student.delete-requirement')
                            
                            @endforeach

                        </tbody>
                    </table>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('student.requirement.store', $user_id) }}" enctype="multipart/form-data">
                    @csrf
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xl2 text-center">{{ $error }}</p>
                    @endforeach
                    {{-- Name --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap pr-2">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Select Requirements') }}:*
                            </label>
    
                            <select id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                                name="title" value="{{ old('title') }}"  autocomplete="title" placeholder="FORM 137" autofocus required>
                                <option>Select Requirements</option>
                                @foreach ($requirements as $requirement)
                                <option value="{{ $requirement->id }}">{{ $requirement->title }}</option>
                                    
                                @endforeach
                            </select>
    
                            @error('title')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="notes" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Notes') }}:
                            </label>
    
                            <input id="notes" type="text" class="form-input w-full @error('notes')  border-red-500 @enderror"
                                name="notes" value="{{ old('notes') }}"  autocomplete="notes" placeholder="Any..." autofocus>
    
                            @error('notes')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        <div class="flex flex-wrap pr-2">
                            <label for="file" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('File') }}:*
                            </label>
    
                            <input id="file" type="file" class="form-input w-full @error('file')  border-red-500 @enderror"
                                name="file" value="{{ old('file') }}"  autocomplete="file"  autofocus required>
    
                            @error('file')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        
                        <div class="grid grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 xs_div">
                            <div class="flex flex-wrap mt-10">
                                <button type="submit"
                                    class="w-full select-none font-bold whitespace-no-wrap rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    
                   
                </form>
                </p>
            </div>
        </section>
    </div>

</main>
@endsection
