    <div class="flex flex-col">
        <div class="flex flex-col mt-4">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">

              <div class="flex items-stretch bg-white justify-items-center">
                
                <div class="px-6 py-6 ">
                  <div class="box-content h-30 w-30 p-4 border-4 hover:box-content">
                    <img class="h-30 w-30"  src="https://source.unsplash.com/user/erondu" alt="">
                  </div>
                  
                  
                  <div class="text-center mt-2 item-center">
                              
                    <x-jet-button wire:loading.attr="disabled" wire:click="saveUserActivity({{ $app_data->id }})">
                      {{ __('Update Profile') }}
                    </x-jet-button>
                  </div>
                  <div class="text-left mt-2 item-center">
                              
                    
                  </div>
                </div>
                <div class="px-0 py-5">
                  <div class="bg-white overflow-hidden mt-4">
                    {{-- <div class="px-4 py-5 sm:px-6">
                      <h1 class="text-lg leading-6 font-large text-gray-900">SN# {{ $app_data->sn_number}}</h1>
                    </div> --}}
                    <div class="">
                      <dl>
                        <div class="flex px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-2xl text-green-700 font-extrabold uppercase">SN# {{ $app_data->sn_number}}</dt>
                        </div>
                        
                        <div class="flex px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-2xl font-extrabold uppercase">{{ $app_data->first_name }} {{ $app_data->middle_name }} {{ $app_data->last_name }}</dt>
                        </div>
                      
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Birthdate:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">12/12/1997</dd>
                        </div>
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Email address:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $app_data->email_address }}</dd>
                        </div>
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Mobile Number:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">09458418109</dd>
                        </div>
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Address:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 truncate">{{ $app_data->home_address}}, {{ $app_data->city }}, {{ $app_data->province }}</dd>
                        </div>
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Class:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $app_data->class_name }}</dd>
                        </div>
                        <div class="flex mt-4 px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          {{-- @foreach($stat as $applicant)
                          <dt class="px-3 py-2 text-sm text-white bg-indigo-600 font-medium text-gray-500 border rounded uppercase">{{ $applicant->particular}}</dt>
                          @endforeach --}}
                          <dt class="px-3 py-2 text-sm text-white bg-indigo-600 font-medium text-gray-500 border rounded uppercase">{{ $stat->particular}}</dt>
                         
                        </div>
                        
                        
                        {{-- <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                  <!-- Heroicon name: solid/paper-clip -->
                                  <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                  </svg>
                                  <span class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                  <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
                                </div>
                              </li>
                            
                            </ul>
                          </dd>
                        </div> --}}
                      </dl>
                    </div>
                  </div>
                </div>
                <div class="px-0 py-5">
                  <div class="px-4 py-5 sm:px-6">
                    <h1 class="text-2xl leading-6 font-extrabold text-gray-900">Step Process</h1>
                    <div class="text-center mt-2 item-center">
                              
                     
                      
                      <a href="{{ route('applicants') }}">
                      <button class="text-white px-3 py-2 bg-green-800 border rounded-lg hover:bg-green-700">
                        Go Back
                      </button>
                      </a>
                    </div>
                  </div>
                </div>

            </div>
            {{-- <div class="bg-white shadow overflow-hidden mt-4">
              <div class="px-2 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
              </div>
              <div class="border-t border-gray-200">
                <dl>
                  
                  
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Fullname</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $app_data->first_name }} {{ $app_data->middle_name }} {{ $app_data->last_name }}</dd>
                  </div>
                
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Application for</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Nurse</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $app_data->email_address }}</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Salary expectation</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">$120,000</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">About</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                          <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                          </div>
                          <div class="ml-4 flex-shrink-0">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
                          </div>
                        </li>
                      
                      </ul>
                    </dd>
                  </div>
                </dl>
              </div>
            </div> --}}

                <div class="max-w-2xl mx-auto mt-4">
                  
                  <div>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg ">
                      <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Status Update</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Update the status of this applicant.</p>
                      </div>
                          <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-1 bg-white sm:p-6">
                            
                              
                                <div class="">
                                  <x-jet-label for="particular" value="{{ __('Job Application Status') }}" />
                                  <select  wire:model="app_data.particular" name="particular" class="block mt-1 w-full">
                                    <option value="0">--Select Status--</option>
                                    <option value="Schedule for Pre Interview">Schedule for Pre Interview</option>
                                    <option value="Schedule for final">Schedule for Final</option>
                                    <option value="Selected">Selected</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Signed EL">Signed EL</option>
                                    <option value="Refused EL">Refused EL</option>
                                    <option value="Assigned to class">Assigned to class</option>
                                    <option value="Endorsed to processing">Endorsed to processing</option>
                                    <option value="Deployed">Deployed</option>
                                  </select>
                  
                                @error('particular') <span class="error">{{ $message }}</span> @enderror
                                {{-- <div class="col-span-6">
                                  <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                                  <input type="text" wire:model="app_data.remarks" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div> --}}

                                <div class="col-span-6 sm:col-span-6  mt-3">
                                  <x-jet-label for="remarks" value="{{ __('Remarks')}}" />
                                  <x-jet-input id="remarks" type="text" class="mt-1 block w-full" wire:model="app_data.remarks" />
                                  
                                  <x-jet-input-error for="app_data.remarks" class="mt-2" />
                                </div>
                                @error('remarks') <span class="error">{{ $message }}</span> @enderror
                  
                                
                              </div>
                              
                            </div>
                            @if (session()->has('message'))
                                    <div class="px-6 py-3  alert alert-success">
                                       <x-jet-label> {{ session('message') }}</x-jet-label>
                                      
                                    </div>
                                @endif
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                              
                              <x-jet-button wire:loading.attr="disabled" wire:click="saveUserActivity({{ $app_data->id }})">
                                {{ __('Save') }}
                              </x-jet-button>
                            </div>
                          </div>
                    </div>
                    
                    {{-- <x-jet-form-section submit="updateProfileInformation">
                      <x-slot name="title">
                        {{ __('Applicant Status Update') }}
                      </x-slot>
                  
                      <x-slot name="description">
                          {{ __('Update the status of this applicant.') }}
                      </x-slot>
                      <x-slot name="form">
                        <div class="col-span-6 sm:col-span-3">
                          <label for="country" class="block text-sm font-medium text-gray-700">Job Application Status</label>
                          <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Schedule for Pre</option>
                            <option>Schedule for Final</option>
                            <option>Selected</option>
                          </select>
                        </div>
          
                        <div class="col-span-6">
                          <label for="street-address" class="block text-sm font-medium text-gray-700">Remarks</label>
                          <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                      </x-slot>
                      <x-slot name="actions">
                        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                          {{ __('Save') }}
                        </x-jet-button>
                      </x-slot>
                    </x-jet-form-section> --}}
                    <div class=" mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">	
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DATE
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        PARTICULAR
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        REMARKS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Job Application Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        BY:
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach($applicants as $applicant)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">	
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $applicant->created_at->format('M d, Y') }}
                                    </th>
                                    <td class="px-6 py-4">
                                    
                                      @if ($applicant->role_id == '1' ) <span >Admin</span>
                                    @elseif ($applicant->role_id == '2') <span >Recruitment</span>
                                    @elseif ($applicant->role_id == '3') <span >Processing</span>
                          
                                    @endif  
                      
                                    </td>
                                    <td class="px-6 py-4">
                                      {{ $applicant->remarks}}
                                    </td>
                                    <td class="px-6 py-4">
                                      {{ $applicant->particular}}
                                    </td>
                                    <td class="px-6 py-4">
                                      {{ $applicant->user_name}}
                                    </td>
                                </tr>
                                @endforeach
                                {{-- @foreach($user_activity as $applicant)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">	
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $applicant->created_at->format('M d, Y') }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $applicant->user_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                      {{ $applicant->remarks}}
                                    </td>
                                    <td class="px-6 py-4">
                                      {{ $applicant->user_name}}
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                            
                            
                        </table>






                        <div class=" mt-4 px-6 py-4 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            
                            <p>{{ $applicants->links() }}</p>
                        </div>
                    </div>
                    

        </div>
    </div>
