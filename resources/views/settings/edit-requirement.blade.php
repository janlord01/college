@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto m:max-w-lg sm:mt-10 mx-4">
    <div class="flex">
        <div class="w-full">
            @if (session('status'))
                    <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if(session('error'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-red-600 bg-red-100 px-3 py-4 mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg pb-10">
                
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Update Student Requirement') }}
                </header>
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('setting.requirement.update', $requirement->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xl2 text-center">{{ $error }}</p>
                    @endforeach
                    {{-- Name --}}
                    <div class="grid grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs_div">
                        <div class="flex flex-wrap pr-2">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Title') }}:*
                            </label>
    
                            <input id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                                name="title" value="{{ $requirement->title }}"  autocomplete="title" placeholder="FORM 137" autofocus required>
    
                            @error('title')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                            
                        </div>
                        
                        
                        <div class="flex flex-wrap mt-10 w-1/3">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Update') }}
                            </button>
                            
                        </div>
                        
                    </div>
                    
                   
                </form>

            </section>
        </div>
    </div>
</main>
@endsection
