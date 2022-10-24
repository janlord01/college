@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
        <div class="text-sm border border-t-8 rounded text-red-700 border-red-600 bg-red-100 px-3 py-4 mb-4" role="alert">
            {{ session('error') }}
        </div>
        @endif
        {{-- @include('layouts.breadcrumbs') --}}
        {{-- @include('layouts.back') --}}


        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md relative">
                Choose Cashiering Transactions
                <form class="" method="GET"
                    action="{{ route('temp.cashier.student.search') }}" class="search_form">
                    <input id="search" type="text" class="bg-gray-100  text-gray-700 font-bold mb-0 h-9 border border-gray-500 rounded absolute right-28 mr-2 bottom-3 form-input @error('search')  border-red-500 @enderror search_input"
                    name="search" value="{{ old('search') }}"  autocomplete="search" placeholder="Search By: Name" autofocus>
                    
                    @error('search')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                    <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-3 border border-gray-500 rounded absolute xs:right-10  right-16 mr-2 bottom-3 search_btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg></button>
                </form> 
                {{-- <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 border border-green-500 rounded absolute right-7 bottom-3"><a href="{{ route('staff.create') }}"> Add Staff</a></button> --}}
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    
                    <table class="min-w-full w-full info-table table-auto border-collapse md:table mb-5">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-300 md:border-none sm:hidden block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative tabletr">
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Name</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell td_hide">Balance</th>
                                <th class="bg-gray-300 p-2 text-black font-bold md:border md:border-grey-700 text-sm text-left sm:hidden block md:table-cell">Breakdown</th>
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
                                        <span class="inline-block md:hidden font-bold pr-1 ">Email Address: </span>{{ $student->amount }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block md:hidden font-bold pr-1 ">Course: </span>{{ $student->breakdown }}
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block md:hidden font-bold">Actions</span>
                                        {{-- <form class="inline" method="POST"
                                        action="{{ route('student.qrcode.regenerate', $student->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                            <button type="submit" class="text-white hover:text-white font-bold p-1 rounded bg-purple-500 hover:bg-purple-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code-scan inline" viewBox="0 0 16 16">
                                                    <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"/>
                                                    <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"/>
                                                    <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"/>
                                                    <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"/>
                                                    <path d="M12 9h2V8h-2v1Z"/>
                                                </svg>
                                            </button>
                                        </form> --}}
                                        <a href="{{ route('temp.cashier.create', $student->id) }}" alt="Add">
                                            <button class="text-white hover:text-white font-bold p-1 rounded bg-green-500 hover:bg-green-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack ml-1 inline" viewBox="0 0 16 16">
                                                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                                                </svg> Make Payment
                                            </button>
                                        </a>
                                        {{-- <a href="{{ route('student.edit', $student->id) }}" alt="Edit">
                                            <button class="text-white hover:text-white font-bold p-1 rounded bg-blue-500 hover:bg-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square inline m-1" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        </a> --}}
                                        
                                        {{-- <a href="{{ route('student.requirement', $student->id) }}" alt="Update Requirements"><button class="text-white hover:text-white font-bold p-1 rounded bg-orange-400 hover:bg-orange-500">
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
                                        @endif  --}}
                                    </td>
                                    
                                </tr>
                                
                            
                            {{-- @include('students.deleteStudent') --}}
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}
                </p>
            </div>
        
            
        </section>

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg mt-10">
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md relative ">
                Payment Transactions
                

                <form class="" method="GET"
                    action="{{ route('temp.cashier.search') }}" class="search_form">
                    <input id="search" type="text" class="bg-gray-100  text-gray-700 font-bold mb-0 h-9 border border-gray-500 rounded absolute right-28 mr-2 bottom-3 form-input @error('search')  border-red-500 @enderror search_input"
                    name="search" value="{{ old('search') }}"  autocomplete="search" placeholder="Search By: Name" autofocus>
                    
                    @error('search')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                    <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-3 border border-gray-500 rounded absolute xs:right-10  right-16 mr-2 bottom-3 search_btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg></button>
                </form> 
                {{-- <a href="{{ route('payment.create') }}" alt="add new student"> 
                    <button class="bg-green-500 hover:bg-green-700 text-white hover:text-white font-bold py-2 px-3 border-green-500  border rounded absolute mr-1 right-6 bottom-3 add_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </button>
                </a> --}}
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    
                    <table class="min-w-full border-collapse block md:table mb-5">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Date</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                                {{-- <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Payment done</th> --}}
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Transaction ID</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Description</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Amount</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group">
                            @foreach ($payments as $payment)
                                <tr class="border border-grey-500 md:border-none block md:table-row">
                                    
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell   {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}">
                                        <div class="flex items-center text-sm">
                                            
                                            <div>
                                                <p class="font-semibold text-black">{{ date('F j, Y, g:i a', strtotime($payment->created_at)); }}</p>
                                            </div>
                                            </div>
                                    </td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell font-bold {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>{{ ($payment->name) ? $payment->name:"GUEST" }}</td>
                                    {{-- @if ($payment->type_of_transaction  == 'Online')
                                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}"><span class="inline-block w-1/3 md:hidden font-bold">Payment Done</span>
                                            <span class="bg-green-500 text-white font-bold py-1 px-2 border border-green-500 rounded mt-1">{{ $payment->type_of_transaction }}</span></td>
                                    @else --}}
                                        {{-- <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}"><span class="inline-block w-1/3 md:hidden font-bold">Payment Done</span>
                                            <span class="bg-blue-500  text-white font-bold py-1 px-2 border border-green-500 rounded mt-1">{{ $payment->type_of_transaction }}</span></td> --}}
                                    {{-- @endif --}}
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}"><span class="inline-block w-1/3 md:hidden font-bold">Transaction ID</span>{{ $payment->or_id }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}"><span class="inline-block w-1/3 md:hidden font-bold">Description</span>{{ $payment->description }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}"><span class="inline-block w-1/3 md:hidden font-bold">amount</span>P{{ $payment->total }}</td>
                                    {{-- <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}"><span class="inline-block w-1/3 md:hidden font-bold">Academic Year</span>{{ $payment->acad_year }}</td> --}}
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell {{ ($payment->name == "") ? "bg-blue-200 border-gray-900 ":'' }}">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                        {{-- <a href=""><button style="font-size: 10px;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search inline mr-1" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                              </svg>View Transaction</button></a> --}}
                                        {{-- <input type="text" id="delete_student_id" name="delete_student" class="delete_student_class" value="{{ $student->id }}"> --}}
                                        <button style="font-size: 10px;" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded deleteVoidBtn" id="{{ $payment->or_id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill inline mr-1" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                          </svg>Void</button>
                                        <a href="{{ route('payment.generatereceipt', $payment->or_id) }}" target="_blank"><button style="font-size: 10px;" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-1 px-2 border border-purple-500 rounded mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer inline mr-1" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                              </svg>Print</button>
                                        </a>
                                        @if ($payment->proof_image)
                                            <a href="{{ asset($payment->proof_image ? 'images/'.$payment->proof_image :'images/man-icon.png') }}" target="_blank"><button style="font-size: 10px;" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye inline mr-1" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>View Proof</button>
                                            </a>
                                        @endif
                                        

                                    </td>
                                </tr>
                            
                            @include('temp.delete-payment')
                            @endforeach
                        </tbody>
                    </table>
                    {{ $payments->links() }}
                </p>
            </div>
        </section>
    </div>

</main>
@endsection
