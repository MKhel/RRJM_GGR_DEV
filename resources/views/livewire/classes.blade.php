<div>
    <div class="flex justify-items-between px-3 py-4 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-8 text-2xl">
            Class List
        </div>
      </div>
    <div class="container my-12 py-4 mx-auto px-4">
        
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                  
            <div class="flex flex-col">
                <div class="flex flex-col mt-4">
                    
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div class="px-6 py-3 sm:flex items-center justify-between">
                            <div class="flex items-center">
                                        
                            <div class="mb-4 xl:w-96">
                                <label for="searchApplicant" class="form-label inline-block mb-2 text-gray-700">Search</label>
                                <input
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
                              
                                  placeholder="Seach Applicant"
                                />
                              </div>
                     
                            </div>

                            @if (auth()->user()->role_id == 1)
                                <x-jet-button class="ml-4" wire:click="confirmClassAdd">
                                    {{ __('Create Class') }}
                                </x-jet-button>
                            @else
                                @can('cannot add class')
                                <x-jet-button class="ml-4" wire:click="confirmClassAdd">
                                    {{ __('Create Class') }}
                                </x-jet-button>
                                @endcan
                            @endif
                            
                        </div>
        @foreach ($clients as $class)
            
        
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="flex-1 min-w-0">
                <x-jet-applicant-heading >
                    <x-slot name="title" class="text-center">
                       <p>{{ $class->class_name }} </p>
                    </x-slot>
                    {{-- <x-slot name="content1" class="text-center">
                        <p>{{ $class->class_name }} </p>
                    </x-slot> --}}
                    <x-slot name="content1" class="text-center">
                        <p> {{ $class->target_number}} </p>
                    </x-slot>
                    
                    <x-slot name="content2" class="text-center">
                        <p> {{ $class->target_number - $class->applicant_count }} </p>
                    </x-slot>
                    <x-slot name="startClass" class="text-center">
                      <p> {{ $class->start_class}} </p>
                    </x-slot>
                    <x-slot name="content3" class="text-center">
                        <p>{{ $class->created_at->format('d M Y') }} </p>
                    </x-slot>
                    
                    <x-slot name="content4" class="text-center">
                            <p class="px-2 py-2 font-bold text-2xl text-green-700">{{ $class->applicant_count }}</p>
                    </x-slot>
                    <x-slot name="content5" class="text-center">
                        {{-- number_format((float)$subtotal, 2, '.', ''); --}}
                        <p class="px-2 py-2"> % {{ number_format((float)$class->applicant_count / $class->target_number * 100)}}</p>
                    </x-slot>
                    <x-slot name="content6">
                  
                        {{-- <span class="hidden sm:block mr-2">
                          <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray bg-white-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            {{ $content4}}
                          </button>
                        </span> --}}
                        <span class="hidden sm:block">
                          <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                            </svg>
                            View
                          </button>
                        </span>
                    
                        <span class="hidden sm:block ml-3">
                          <button type="button" wire:click="confirmClassUpdate({{$class->id}})" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                          </button>
                        </span>
                    
                        <span class="sm:ml-3">
                          <button type="button" wire:click="confirmClassDelete({{$class->id}})" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray bg-white-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white-400" fill="none"
                              viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                            Delete
                          </button>
                        </span>
                        
                    
                        <!-- Dropdown -->
                        <span class="ml-3 relative sm:hidden">
                          <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                            More
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                          </button>
                    
                          
                          <div class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="mobile-menu-item-0">Edit</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="mobile-menu-item-1">View</a>
                          </div>
                        </span>
                   
                    </x-slot>
                    
                </x-jet-applicant-heading>
            </div>
        </div>

        @endforeach


        <x-jet-dialog-modal wire:model="confirmingClassAdd">
                                
            <x-slot name="title" class="text-center">
                {{ __('Create Applicant') }}
            </x-slot>
            
            
            <x-slot name="content">
            
                 
            <form class="w-full max-w-lg">
                <div class="mb-6">
                  
                  <div class="mt-3">
                    <x-jet-label for="class_name" value="{{ __('Class Name')}}" />
                    <x-jet-input id="class_name" type="text" class="appearance-none mt-1 block w-full" wire:model.def="Classes.class_name" />
                    <x-jet-input-error for="Classes.class_name" class="mt-2" />
                  </div>
                  

                  <div class="mt-3">
                    <x-jet-label for="Target Number" value="{{ __('Target Number')}}" />
                    <x-jet-input name="target_number" id="Target Number" type="number" class="appearance-none mt-1 block w-full" wire:model.def="Classes.target_number" />
                    <x-jet-input-error for="Classes.target_number" class="mt-2" />
                  </div>

                  <div class="col-span sm:col-span-4 mt-3">
                    <x-jet-label for="start_class" value="{{ __('Date Start')}}" />
                    <x-jet-input name="start_class" type="date" class="mt-1 block w-full" wire:model="Classes.start_class" />
                    <i class="fas fa-calendar datepicker-toggle-icon"></i>   
                    <x-jet-input-error for="applicant.start_class" class="mt-2" />
                  </div>

                </div>
                
              </form>
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('confirmingClassAdd', false)" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-jet-secondary-button>
    
                <x-jet-button class="ml-3" wire:click="saveClass()" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
        <x-jet-dialog-modal wire:model="confirmingClassDeletion">
          <x-slot name="title">
             Delete
          </x-slot>
          <x-slot name="content">
              Are you sure, you want to delete this class?
           </x-slot>
          <x-slot name="footer">
              <x-jet-secondary-button wire:click="$set('confirmingClassDeletion', false)" wire:loading.attr="disabled">
                  {{ __('Close') }}
              </x-jet-secondary-button>

              <x-jet-danger-button class="ml-3" wire:click="DeleteClass()" wire:loading.attr="disabled">
                  {{ __('Delete') }}
              </x-jet-danger-button>
          </x-slot>
          </x-jet-dialog-modal>
          <x-jet-dialog-modal wire:model="confirmingClassUpdate">                      
              <x-slot name="title" class="text-center">
                  {{ __('Update Applicant') }}
              </x-slot>
              
              
              <x-slot name="content">
              
                  
              <form class="w-full max-w-lg">
                  <div class="mb-6">
                    
                    <div class="mt-3">
                      <x-jet-label for="class_name" value="{{ __('Class Name')}}" />
                        <x-jet-input id="class_name" type="text" class="appearance-none mt-1 block w-full" wire:model="class_name" />
                        <x-jet-input-error for="Classes.class_name" class="mt-2" />
                    </div>
                   
                    <div class="mt-3">
                      <x-jet-label for="Target Number" value="{{ __('Target Number')}}" />
                      <x-jet-input name="target_number" id="Target Number" type="number" class="appearance-none mt-1 block w-full" wire:model="target_number" />
                      <x-jet-input-error for="Classes.target_number" class="mt-2" />
                    </div>

                    <div class="col-span sm:col-span-4 mt-3">
                      <x-jet-label for="start_class" value="{{ __('Date Start')}}" />
                      <x-jet-input name="start_class" type="date" class="mt-1 block w-full" wire:model="start_class" />
                      <i class="fas fa-calendar datepicker-toggle-icon"></i>   
                      <x-jet-input-error for="start_class" class="mt-2" />
                    </div>

                  </div>
                  
                </form>
              </x-slot>

              <x-slot name="footer">
                  <x-jet-secondary-button wire:click="$set('confirmingClassUpdate', false)" wire:loading.attr="disabled">
                      {{ __('Close') }}
                  </x-jet-secondary-button>

                  <x-jet-button class="ml-3" wire:click="UpdateClass({{$client_id}})" wire:loading.attr="disabled">
                      {{ __('Update') }}
                  </x-jet-button>
              </x-slot>
              </x-jet-dialog-modal>
             
    </div>   
</div>
</div>
</div>   
</div>
