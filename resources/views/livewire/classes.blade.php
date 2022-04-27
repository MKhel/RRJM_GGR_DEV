<div>

    <div class="container my-12 py-12 mx-auto px-4">
        
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
                        
                            <x-jet-button class="ml-4" wire:click="confirmClassAdd">
                                {{ __('Create Class') }}
                            </x-jet-button>
                        </div>
        @foreach ($client as $class)
            
        
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="flex-1 min-w-0">
                <x-jet-applicant-heading >
                    <x-slot name="title" class="text-center">
                       <p>{{ $class->class_name }} </p>
                    </x-slot>
                    {{-- <x-slot name="content1" class="text-center">
                        <p>{{ $class->class_name }} </p>
                    </x-slot> --}}
                    <x-slot name="content2" class="text-center">
                        <p> {{ $class->target_number }} </p>
                    </x-slot>
                    <x-slot name="content3" class="text-center">
                        <p>{{ $class->created_at }} </p>
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
                <div class="flex flex-wrap -mx-5 mb-6">
                  
                  <div class=" sm:col-span-4 mt-3">
                    <x-jet-label for="class_name" value="{{ __('Class Name')}}" />
                    <x-jet-input id="class_name" type="text" class="appearance-none mt-1 block w-full" wire:model.def="Classes.class_name" />
                    <x-jet-input-error for="Classes.name" class="mt-2" />
                  </div>

                  <div class=" sm:col-span-4 mt-3">
                    <x-jet-label for="Target Number" value="{{ __('Target Number')}}" />
                    <x-jet-input id="Target Number" type="text" class="appearance-none mt-1 block w-full" wire:model.def="Classes.target_number" />
                    <x-jet-input-error for="Target Number" class="mt-2" />
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
    </div>   
</div>
</div>
</div>   
</div>
