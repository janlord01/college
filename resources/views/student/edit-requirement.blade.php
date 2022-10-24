<form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 relative z-20" method="POST"
    action="{{ route('student.requirement.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden editModal z-20"  aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
        Background overlay, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="fixed inset-0 bg-gray-500 bg-opacity-50 transition-opacity bgStudentModal" aria-hidden="true"></div>
  
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
      <!--
        Modal panel, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
              <!-- Heroicon name: outline/exclamation -->
              <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-lightbulb h-6 w-6 text-yellow-500" viewBox="0 0 16 16">
                <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Update Student File
                <p class="block bg-red-500 text-white edit_error">ERROR! Please Refresh the page!</p>
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                    <input type="hidden" class="editStudentFile" id="editStudentFile" name="editStudentFile" >
                    <input type="hidden" class="user_id" id="user_id" name="user_id" >
                  <div class="grid grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 xs_div">
                    <div class="flex flex-wrap pr-2">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Select Requirements') }}:*
                        </label>

                        <select id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                            name="title" value="{{ old('title') }}"  autocomplete="title" placeholder="FORM 137" autofocus required>
                            <option class="edit_id"></option>
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
                    <div class="flex flex-wrap pr-2 mt-4">
                        <label for="notes" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Notes') }}:
                        </label>

                        <input id="notes" type="text" class="form-input w-full @error('notes')  border-red-500 @enderror edit_notes"
                            name="notes" value="{{ old('notes') }}"  autocomplete="notes" placeholder="Any..." autofocus>

                        @error('notes')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                    <div class="flex flex-wrap pr-2 mt-4">
                        <label for="file" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Upload New File') }}:*
                        </label>

                        <input id="file" type="file" class="form-input w-full @error('file')  border-red-500 @enderror"
                            name="file" value="{{ old('file') }}"  autocomplete="file"  autofocus >

                        @error('file')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                        
                    </div>
                    
                </div>
                </p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="Update" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Update
            </button>
            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cancelBtn">
            Cancel
            </button>
        </div>
      </div>
    </div>
  </div>
</form>