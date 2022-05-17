    
    <div class="flex flex-col">
      
      <div class="sm:flex py-2 -my-2 lg:items-center bg-white border-b border-gray-200 sm:px-20 px-3 py-6 lg:justify-between">
        <div class="flex-1 min-w-0">
          <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Applicant Information</h2>
        </div>
        <span class="hidden sm:block mr-2">
          <div class="flex text-green-700 px-py ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <a href="{{ route('applicants') }}">Go Back </a>
          </div>
        </span>

          {{-- <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            Home
            </a>
            </li>
            <li>
            <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
            </div>
            </li>
            <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Flowbite</span>
            </div>
            </li>
            </ol>
            </nav>
   --}}
        
      </div>



        
    
      
        <div class="flex flex-col mt-4">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              
              <div class="flex bg-white justify-center px-6">
                
                <div class="px-0 py-6 ">
                    @if ($app_data->photo != null)
                    <div class=" pb-3 pt-4">
                      {{-- <div class="box-content h-30 w-30 p-4 border-4 hover:box-content">
                        <img class="w-full" style="width:200px;height:200px;"  src="{{asset('storage')}}/{{$app_data->photo}}" alt="IMG">
                      </div> --}}
                      
                      <div class="box-content h-30 w-30 p-4 overflow-hidden border border-gray-200 hover:box-content">
                        {{-- <img class="w-20 h-20 rounded" src="{{asset('storage')}}/{{$app_data->photo}}" alt="Large avatar"> --}}
                        <img style="max-width:auto; max-height:200px;" class="w-full object-cover" src="{{asset('storage')}}/{{$app_data->photo}}" alt="Extra large avatar">
                      
                      </div>
                    </div>
                    @else
                    <div class="relative bg-white rounded-lg overflow-hidden group-hover:opacity-75 lg:aspect-w-2 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-2">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="w-full h-full object-center object-cover">
                      <div class="flex -space-x-4">
                        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-5.jpg" alt="">
                        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-2.jpg" alt="">
                        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-3.jpg" alt="">
                        <a class="flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800" href="#">+99</a>
                    </div>
                    
                    </div>
                    @endif

                    
                  
                  
                  <div class="text-center mt-2 item-center">
                              
                    <x-jet-button wire:loading.attr="disabled" wire:click="editApplicant({{$app_data->id}})">
                      {{ __('Update Profile') }}
                    </x-jet-button>
                  </div>
                  
                  {{-- <div class="text-left mt-2 item-center">

                    <div class="flex mb-5 -space-x-4">
                      <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{asset('storage')}}/{{$app_data->photo}}" alt="">
                      <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{asset('storage')}}/{{$app_data->photo}}" alt="">
                      <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{asset('storage')}}/{{$app_data->photo}}" alt="">
                      <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{asset('storage')}}/{{$app_data->photo}}" alt="">
                  </div>
                  </div> --}}
                </div>
                <div class="px-0 py-5">

                  <div class="bg-white overflow-hidden mt-4">
                    {{-- <div class="px-4 py-5 sm:px-6">
                      <h1 class="text-lg leading-6 font-large text-gray-900">SN# {{ $app_data->sn_number}}</h1>
                    </div> --}}
                    <div class="">
                      <dl>
                        <div class="flex flex-nowrap px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-2xl text-green-700 font-extrabold uppercase">SN# {{ $app_data->sn_number}}</dt>
                        </div>
                        
                        <div class="flex px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-2xl font-extrabold uppercase">{{ $app_data->first_name }} {{ $app_data->middle_name }} {{ $app_data->last_name }}</dt>
                        </div>
                      
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Birthdate:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {!! date('F-d-Y', strtotime($app_data->birthdate)) !!}</dd>
                        </div>
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Email address:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $app_data->email_address }}</dd>
                        </div>
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Mobile Number:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $app_data->contact_number}}</dd>
                        </div>
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Home Address:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 truncate">{{ $app_data->home_address}}, {{ $app_data->city }}, {{ $app_data->province }}</dd>
                        </div>
                        <div class="flex bg-white px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="text-sm font-medium text-gray-500 uppercase">Class:</dt>
                          <dd class="mt-1 ml-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $app_data->class_name }}</dd>
                        </div>
                        <div class="flex mt-4 px-py sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          <dt class="px-3 py-2 text-sm text-white bg-indigo-600 font-medium text-gray-500 border rounded uppercase">{{ $app_data->status}}</dt>
                        </div>
                        
                        
                        
                      </dl>
                    </div>
                  </div>
                </div>
                <div class="px-0 py-5">
                  <div class="px-4 py-5 sm:px-6">
                    <h1 class="text-xl leading-6 font-extrabold text-gray-900">Progress Status</h1>
                    
               
                    <div class="text-center mt-2 item-center">
                              
                      @foreach ($applicants as $applicant)
                            
                        
                      <div class=" stepper-content ">
                        <div class=" mt-2 block px-3 py-4 rounded-lg shadow-lg bg-white max-w-sm">
                          <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            <h2 class="font-bold text-sm uppercase">{{ $applicant->particular }} </h2>
                          </div>

                          <div class="flex text-sm items-center ml-3 truncate">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p class="text-xsm ">{{ $applicant->remarks }}. <span >By:{{ $applicant->user_name }}</span> </p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      
                      
                    </div>
                  </div>
                </div>
               
            </div>
            @if (session()->has('update-success'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('update-success') }}</p>
                    </div>
                </div>
            </div>
            @endif
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
                                    <option value="For Recall">For Recall</option>
                                  </select>
                  
                                @error('particular') <span class="error">{{ $message }}</span> @enderror
                                {{-- <div class="col-span-6">
                                  <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                                  <input type="text" wire:model="app_data.remarks" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div> --}}

                                <div class="col-span-6 sm:col-span-6  mt-3">
                                  <x-jet-label for="remarks" value="{{ __('Remarks')}}" />
                                  <x-jet-input id="remarks" type="text" class="mt-1 block w-full" wire:model="app_data.remarks" />
                                  
                                  <x-jet-input-error for="remarks" class="mt-2" />
                                </div>
                                @error('remarks') <span class="error">{{ $message }}</span> @enderror
                  
                                
                              </div>
                              
                            </div>
                           
                            <div class=" px-4 py-3 bg-gray-50 text-right sm:px-6">
                             
                              <div class=" py-4 alert alert-success">
                                
                                 
                                 <div class="flex justify-between">
                                  @if (session()->has('message'))
                                    <x-jet-label> {{ session('message') }}</x-jet-label>
                                  @endif
                                 </div>
                                 <x-jet-button wire:loading.attr="disabled" wire:click="saveUserActivity({{ $app_data->id }})">
                                  {{ __('Save') }}
                                  </x-jet-button>
                              </div>
                             
                              
                            </div>
                          </div>
                    </div>

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
                                
                            </tbody>
                            
                            
                        </table>






                        <div class=" mt-4 px-6 py-4 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            
                            <p>{{ $applicants->links() }}</p>
                        </div>
                    </div>
                    <x-jet-dialog-modal wire:model="confirmingeditApplicant">
                                
                      <x-slot name="title" class="text-center">
                          {{ __('Create Applicant') }}
                      </x-slot>
                      
                      
                      <x-slot name="content">
                          <div class="col-span sm:col-span-4 mt-3">
                              <x-jet-label for="photo" value="{{ __('Applicant Picture')}}" />
                                  
                              <div class="flex justify-between ">
                                
                                      <x-jet-input wire:model="new_photo" name="new_photo" id="old_photo" class="mt-1 block w-full" type="file" />
                                     
                                      <x-jet-input-error for="new_photo" class="mt-2" />
                                      <div wire:loading wire:target="new_photo">
                                          <span class="text-green-600">Uploading Image..</span>
                                      </div>
                                  
                                  @if ($new_photo)
                                      <img src="{{ $new_photo->temporaryUrl() }}" width="100" class="mr-4">
                                  @else
                                      <img src="{{asset('storage')}}/{{$old_photo}}" width="100" class="mr-4">
                                  @endif
                              </div>
                          </div>

                          <div class="col-span sm:col-span-4  mt-6">
                              <x-jet-label for="sn_number" value="{{ __('#SN Number')}}" />
                              <x-jet-input id="sn_number" type="text" class="mt-1 block w-full" wire:model="sn_number" disabled />
                              <x-jet-input-error for="sn_number" class="mt-2" />
                          </div>

                          <div class="mt-4">
                              <x-jet-label for="class_name" value="{{ __('Class') }}" />
                              <select  wire:model="class_name" name="class_name" class="block mt-1 w-full">
                                  <option value="0" >{{ $app_data->class_name}}</option>
                                  @foreach ($class as $classes)
                                          <option value="{{$classes->class_name}}" > {{$classes->class_name}}</option>
                                  @endforeach
                              </select>
                              <x-jet-input-error for="class_name" class="mt-2" />
                          </div>
                          

                          <div class="col-span sm:col-span-4 mt-3">
                              <x-jet-label for="first_name" value="{{ __('First Name')}}" />
                              <x-jet-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" wire:model="first_name"/>
                              <x-jet-input-error for="first_name" class="mt-2" />
                          </div>

                          <div class="col-span sm:col-span-4 mt-3">
                              <x-jet-label for="middle_name" value="{{ __('Middle Name')}}" />
                              <x-jet-input id="middle_name" type="text" class="mt-1 block w-full" wire:model="middle_name"/>
                              <x-jet-input-error for="middle_name" class="mt-2" />
                             
                          </div>

                          <div class="col-span sm:col-span-4 mt-3">
                              <x-jet-label for="last_name" value="{{ __('Last Name')}}" />
                              <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model="last_name"/>
                              <x-jet-input-error for="last_name" class="mt-2" />
                              
                          </div>

                          <div class="col-span sm:col-span-4 mt-3">
                              <x-jet-label for="contact_number" value="{{ __('Contact Number')}}" />
                              <x-jet-input id="contact_number" type="number" class="mt-1 block w-full" wire:model="contact_number" placeholder="{{ $app_data->contact_number}}"/>
                              <x-jet-input-error for="contact_number" class="mt-2" />
                          </div>

                          <div class="col-span sm:col-span-4 mt-3">
                              <x-jet-label for="email_address" value="{{ __('Email Address')}}" />
                              <x-jet-input id="email_address" type="email" class="mt-1 block w-full" wire:model="email_address" placeholder="{{ $app_data->email_address}}" disabled/>
                              <x-jet-input-error for="email_address" class="mt-2" />
                             
                          </div>

                          <div class="col-span sm:col-span-4 mt-3">
                              <x-jet-label for="birthdate" value="{{ __('Birthdate')}}" />
                              <x-jet-input name="birthdate" type="date" class="mt-1 block w-full" wire:model="birthdate" value="{{ $app_data->birthdate}}" placeholder="date"/>
                              <i class="fas fa-calendar datepicker-toggle-icon"></i>   
                              <x-jet-input-error for="birthdate" class="mt-2" />
                          </div>

                          
                          <div class="col-span sm:col-span-4 mt-3">
                            <x-jet-label for="country" value="{{ __('Country')}}" />
                           
                            <select wire:model="selectedCountry" name="country" class="block mt-1 w-full">
                                <option value="" selected>--Select Country--</option>
                                
                                <option value="PH" >Philippines</option>
                                <option value="abroad" >Abroad</option>
                               
                            </select>
                            <x-jet-input-error for="applicant.country" class="mt-2" />
                        </div>

                        @if ($selectedCountry == 'PH')
                        <div class="col-span sm:col-span-4 mt-3">
                            <x-jet-label for="home_address" value="{{ __('Home Address')}}" />
                            <x-jet-input id="home_address" type="text" class="mt-1 block w-full" wire:model="home_address" placeholder="{{ $app_data->home_address}}"/>
                            <x-jet-input-error for="home_address" class="mt-2" />
                        </div>

                        <div class="col-span sm:col-span-4 mt-3">
                            <x-jet-label for="city" value="{{ __('City')}}" />
                            <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model="city" placeholder="{{ $app_data->city}}"/>
                            <x-jet-input-error for="city" class="mt-2" />
                        </div>

                        <div class="col-span sm:col-span-4 mt-3">
                            <x-jet-label for="province" value="{{ __('Province')}}" />
                            <x-jet-input id="province" type="text" class="mt-1 block w-full" wire:model="province" placeholder="{{ $app_data->province}}" />
                            <x-jet-input-error for="province" class="mt-2" />
                        </div>
                        
                        <div class="col-span sm:col-span-4  mt-3">
                            <x-jet-label for="zip_code" value="{{ __('Zip Code')}}" />
                            <x-jet-input id="zip_code" type="number" class="mt-1 block w-full" wire:model="zip_code" placeholder="{{ $app_data->zip_code}}"/>
                            <x-jet-input-error for="zip_code" class="mt-2" /> 
                        </div>
                        @endif
                        @if ($selectedCountry == 'abroad')
                        <div class="col-span sm:col-span-4 mt-3">
                            <x-jet-label for="abroad_address" value="{{ __('Abroad Address')}}" />
                            <x-jet-input id="abroad_address" type="text" class="mt-1 block w-full" wire:model="abroad_address" />
                            <x-jet-input-error for="abroad_address" class="mt-2" />
                        </div>

                        @endif
                     
                      </x-slot>
              
                      <x-slot name="footer">
                          <x-jet-secondary-button wire:click="$set('confirmingApplicantAdd', false)" wire:loading.attr="disabled" >
                              {{ __('Close') }}
                          </x-jet-secondary-button>
              
                          <x-jet-button class="ml-3" wire:click.prevent="saveEditApplicant({{ $app_data->id}})" wire:loading.attr="disabled">
                              {{ __('Save') }}
                          </x-jet-button>
                          
                      </x-slot>

                  </x-jet-dialog-modal>

        </div>
    </div>
