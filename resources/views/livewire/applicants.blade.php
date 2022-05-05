<div>
    <div class="flex justify-items-between px-3 py-4 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-8 text-2xl">
            Applicant List
        </div>
      </div>
    <div class="container my-12 py-4 mx-auto px-4">

        <div class="bg-white py-2 md:py-7 px-4 md:px-8 xl:px-10">
                
            <div class="flex flex-col">
                <div class="flex flex-col mt-4">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                   
                            <div class="sm:flex items-center justify-between">
   
                            <div class="w-full flex justify-left">
                                <div class="w-1/4 mb-4 ">
                                  <label for="searchApplicant" class="form-label inline-block mb-2 text-gray-700">Search</label>
                                  <input
                                    wire:keydown.escape = ''
                                    type="search" wire:model="searchQuery"
                                    class="
                                      ml-4
                                      form-control
                                      px-3
                                      py-1.5
                                      text-base
                                      font-normal
                                      text-gray-700
                                      bg-white bg-clip-padding
                                      
                                      transition
                                      ease-in-out
                                      mt-1
                                      focus:text-gray-700 focus:bg-white focus:border-green-700 focus:outline-none
                                    "
                                
                                    placeholder="Seach Applicant..."
                                   {{ $isDisabled }}/>
                                </div>

                                <div class="relative ml-2 mt-0">
                                
                                    <select wire:model="orderBy" class="block mt-1 w-full border-green-400 focus:border-green-400 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="">All</option>
                                        <option value="Encoded">Encoded</option>
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
                                </div>
                                <div class="relative ml-2 mt-0">
                                
                                    <select wire:model="perPage" class="block mt-1 w-full">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                    </div>   
                                    <x-jet-button class="block" wire:click="confirmApplicantAdd()">
                                        {{ __('Add Applicant') }}
                                    </x-jet-button>
                                </div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                       <x-jet-label> {{ session('message') }}</x-jet-label>
                                       <x-jet-banner>{{ session('message') }}</x-jet-banner>
                                    </div>
                                @endif
                            
                            <table class="w-full whitespace-nowrap mt-4" >
                                <thead>
                                    <tr class="" sortable>
                                        <th
                                            class="px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50">
                                            DATE</th>
                                        <th
                                            class="flex px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50">
                                            <p class="mt-1 ml-2">#SN</p> 
                                            <span class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                                  </svg>
                                            </span>
                                            
                                        </th>
                                        
                                        <th
                                            class="px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50 text-left">
                                            FULLNAME</th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50 text-center">
                                            CLASS</th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50">
                                            STATUS</th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50">
                                            VIEW</th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50">
                                            EDIT</th>

                                        
                                        @if (auth()->user()->role_id == 1)
                                            <th
                                            class="px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50">
                                            DELETE</th>
                                        @else
                                            @can('delete')
                                            <th
                                                class="px-6 py-3 text-sm font-medium leading-4  text-gray-900 bg-gray-50">
                                                DELETE</th>
                                            @endcan
                                            
                                        @endif
                                       
                                    </tr>
                                </thead>
                                <tbody>

                             @foreach($applicants as $applicant)
                                        
                                   
                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-center">
                                                <p class="text-sm leading-none text-gray-600">{{ $applicant->created_at->format('d M Y') }}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-center">
                                                <p class="text-sm leading-none text-gray-600">{{ $applicant->sn_number }}</p>  
                                            </div>   
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex text-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full" src="{{asset('storage')}}/{{$applicant->photo}}" alt="profile">
                                                </div>
                        
                                                <div class="px-3 py-4 text-center">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                                        {{ $applicant->first_name }}, {{ $applicant->last_name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td class="pl-24 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-center">
                                            
                                                <p class="text-sm font-medium leading-5 text-gray-900">{{ $applicant->class_name }}</p>
                                            </div>
                                        </td>
                                        <td class="whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-center">
                                                {{-- @forelse ($applicants as $status)
                                                    <p class="text-sm font-medium leading-5 text-gray-900">{{ $status }}</p>
                                                @empty
                                                    <p class="text-sm font-medium leading-5 text-gray-900">Encoded</p>
                                                @endforelse --}}
                                                <p class="text-sm font-medium leading-5 text-gray-900">{{ $applicant->status }}</p>
                                            </div>
                                        </td>
                                    
                                        {{-- <td
                                            class="px-3 py-6 text-sm leading-5 text-red-500 whitespace-no-wrap border-b border-gray-200">
                                        
                                            <x-jet-secondary-button wire:click="viewApplicant( {{ $applicant->id }} )" wire:loading.attr="disabled">
                                                <svg class="-ml-1 mr-2 h-5 w-5 text-white-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                  </svg>
                                            
                                            </x-jet-secondary-button>
                                        </td> --}}
                                        <div class="ml-4">
                                        <td
                                            class="text-center leading-5 text-red-500 whitespace-no-wrap border-b border-gray-200">
                                        
                                            {{-- <x-jet-secondary-button wire:click="viewApplicant({{ $applicant->id }})">
                                                <svg class="-ml-1 mr-2 h-5 w-5 text-white-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                  </svg>
                                                
                                            </x-jet-secondary-button> --}}
                                            
                                                
                                                <a href="{{ route('applicantinfo',$applicant->id)}}">
                                                <x-jet-secondary-button >
                                                    <svg class="-ml-1 mr-2 h-5 w-5 text-white-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                </x-jet-secondary-button>
                                                </a>
                                            
                                        </td>
                                        <td class="text-center leading-5 text-red-500 whitespace-no-wrap border-b border-gray-200">
                                        
                                            <x-jet-button wire:click="confirmApplicantDelete( {{ $applicant->id }} )" wire:loading.attr="disabled">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            
                                            </x-jet-button>
                                        </td>
                                        @if(auth()->user()->role_id == 1)
                                            
                                            <td class="text-center leading-5 text-red-500 whitespace-no-wrap border-b border-gray-200">
                                                
                                                <x-jet-danger-button wire:click="confirmApplicantDelete( {{ $applicant->id }} )" wire:loading.attr="disabled">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                
                                                </x-jet-danger-button>
                                            </td>
                                          
                                        @else
                                           @can('cannot delete applicant')
                                            <td class="text-center leading-5 text-red-500 whitespace-no-wrap border-b border-gray-200">
                                            
                                                <x-jet-danger-button wire:click="confirmApplicantDelete( {{ $applicant->id }} )" wire:loading.attr="disabled">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                
                                                </x-jet-danger-button>
                                            </td>
                                            
                                            @endcan
                                        @endif
                                        
                                        </div>
                                        
                                        
                                    </tr>
                                @endforeach
                                    
                                
                                   
                                </tbody>
                            </table>
                            <div class="mt-4">
                                <p>{{ $applicants->links() }}</p>
                            </div>
                           
                            <x-jet-dialog-modal wire:model="confirmingApplicantAdd">
                                
                                <x-slot name="title" class="text-center">
                                    {{ __('Create Applicant') }}
                                </x-slot>
                                <form enctype="multipart/form-data">
                                
                                <x-slot name="content">
                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="photo" value="{{ __('Applicant Picture')}}" />
                                        {{-- <x-jet-label for="photo" value="{{ __('Applicant Picture')}}" /> --}}
                                        
                                        {{-- <x-jet-input name="photo" type="file" class="mt-1 block w-full" model:model="photo"/>
                                        <img src="{{ $photo->temporaryUrl() }}" alt="">
                                        <x-jet-button wire:click="upload" >Upload</x-button>
                                        <x-jet-input-error for="photo" class="mt-2" /> --}}
                                        {{-- <form wire:submit.prevent="saveApplicant" class="flex justify-between">
                                            
                                         
                                            <input class=" py-3" type="file" wire:model="applicant.photo">
                                         
                                            @error('photo') <span class="error">{{ $message }}</span> @enderror
                                         
                                            <button type="submit">Save Photo</button>
                                            @if ($photo)
                                                <img src="{{ $photo->temporaryUrl() }}" width="100">
                                            @endif
                                            
                                        </form> --}}

                                            
                                        <div class="flex justify-between ">
                                            
                                               
                                                <x-jet-input wire:model="photo" id="photo" class="mt-1 block w-full" type="file" />
                                                <x-jet-input-error for="photo" class="mt-2" />
                                                <div wire:loading wire:target="photo">
                                                    <span class="text-green-600">Uploading Image..</span>
                                                </div>
                                            
                                            @if ($photo)
                                                <img src="{{ $photo->temporaryUrl() }}" width="100" class="mr-4">
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="customFile">Profile Photo</label>
                                        <div class="custom-file">
                                            <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                <input wire:model="photo" type="file" class="custom-file-input" id="customFile">
                                                <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="custom-file-label" for="customFile">
                                                @if ($photo)
                                                {{ $photo->getClientOriginalName() }}
                                                @else
                                                Choose Image
                                                @endif
                                            </label>
                                        </div> --}}
                                    {{-- <div class="col-span sm:col-span-4  mt-6">
                                        <x-jet-label for="user_id" value="{{ __('User ID ')}}" />
                                        <x-jet-input id="user_id" type="number" class="mt-1 block w-full" wire:model="applicant.user_id" required />
                                        @error('photo')<x-jet-input-error for="applicant.user_id" class="mt-2" />@enderror
                                        
                                    </div> --}}
                                    <div class="col-span sm:col-span-4  mt-6">
                                        <x-jet-label for="sn_number" value="{{ __('#SN Number')}}" />
                                        <x-jet-input id="sn_number" type="text" class="mt-1 block w-full" wire:model="applicant.sn_number" required />
                                        <x-jet-input-error for="applicant.sn_number" class="mt-2" />
                                    </div>
                                    <div class="mt-4">
                                        <x-jet-label for="class_name" value="{{ __('Class') }}" />
                                        <select  wire:model="applicant.class_name" name="class_name" class="block mt-1 w-full">
                                            <option value="0" >--Select Class--</option>
                                            @foreach ($class as $classes)
                                                    <option value="{{$classes->class_name}}" > {{$classes->class_name}}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for="applicant.class_name" class="mt-2" />
                                       
                                    </div>
                                    

                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="first_name" value="{{ __('First Name')}}" />
                                        <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model="applicant.first_name" />
                                        <x-jet-input-error for="applicant.first_name" class="mt-2" />
                                        
                                    </div>
                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="middle_name" value="{{ __('Middle Name')}}" />
                                        <x-jet-input id="middle_name" type="text" class="mt-1 block w-full" wire:model="applicant.middle_name" />
                                        <x-jet-input-error for="applicant.middle_name" class="mt-2" />
                                       
                                    </div>

                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="last_name" value="{{ __('Last Name')}}" />
                                        <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model="applicant.last_name" />
                                        <x-jet-input-error for="applicant.last_name" class="mt-2" />
                                        
                                    </div>

                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="contact_number" value="{{ __('Contact Number')}}" />
                                        <x-jet-input id="contact_number" type="number" class="mt-1 block w-full" wire:model="applicant.contact_number" />
                                        <x-jet-input-error for="applicant.last_name" class="mt-2" />
                                    </div>

                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="email_address" value="{{ __('Email Address')}}" />
                                        <x-jet-input id="email_address" type="email" class="mt-1 block w-full" wire:model="applicant.email_address" />
                                        <x-jet-input-error for="applicant.email_address" class="mt-2" />
                                       
                                    </div>

                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="birthdate" value="{{ __('Birthdate')}}" />
                                        <x-jet-input name="birthdate" type="date" class="mt-1 block w-full" wire:model="applicant.birthdate" />
                                        <i class="fas fa-calendar datepicker-toggle-icon"></i>   
                                        <x-jet-input-error for="applicant.birthdate" class="mt-2" />
                                    </div>

                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="home_address" value="{{ __('Home Address')}}" />
                                        <x-jet-input id="home_address" type="text" class="mt-1 block w-full" wire:model="applicant.home_address" />
                                        <x-jet-input-error for="applicant.home_address" class="mt-2" />
                                    </div>

                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="city" value="{{ __('City')}}" />
                                        <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model="applicant.city" />
                                        <x-jet-input-error for="applicant.city" class="mt-2" />
                                    </div>

                                    <div class="col-span sm:col-span-4 mt-3">
                                        <x-jet-label for="province" value="{{ __('Province')}}" />
                                        <x-jet-input id="province" type="text" class="mt-1 block w-full" wire:model="applicant.province" />
                                        <x-jet-input-error for="applicant.province" class="mt-2" />
                                    </div>
                                    
                                    <div class="col-span sm:col-span-4  mt-3">
                                        <x-jet-label for="zip_code" value="{{ __('Zip Code')}}" />
                                        <x-jet-input id="zip_code" type="number" class="mt-1 block w-full" wire:model="applicant.zip_code" />
                                        <x-jet-input-error for="applicant.zip_code" class="mt-2" /> 
                                    </div>
                                     
                               
                                </x-slot>
                        
                                <x-slot name="footer">
                                    <x-jet-secondary-button wire:click="$set('confirmingApplicantAdd', false)" wire:loading.attr="disabled">
                                        {{ __('Close') }}
                                    </x-jet-secondary-button>
                        
                                    <x-jet-button class="ml-3" wire:click.prevent="saveApplicant" wire:loading.attr="disabled">
                                        {{ __('Save') }}
                                    </x-jet-button>
                                </x-slot>
                            </form>
                            </x-jet-dialog-modal>

                        <x-jet-dialog-modal wire:model="confirmingApplicantDeletion">
                            <x-slot name="title">
                               Delete
                            </x-slot>
                            <x-slot name="content">
                                Are you sure, you want to delete this applicant?
                             </x-slot>
                            <x-slot name="footer">
                                <x-jet-secondary-button wire:click="$set('confirmingApplicantDeletion', 'false')" wire:loading.attr="disabled">
                                    {{ __('Close') }}
                                </x-jet-secondary-button>
                    
                                <x-jet-danger-button class="ml-3" wire:click="DeleteApplicant( {{ $confirmingApplicantDeletion }} )" wire:loading.attr="disabled">
                                    {{ __('Delete') }}
                                </x-jet-danger-button>
                            </x-slot>
                        </x-jet-dialog-modal>
                    
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
    
   

    
  
</div>
