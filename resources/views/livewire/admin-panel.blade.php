<div>
    <div class="justify-items-between px-3 py-4 sm:px-20 bg-white ">
        <div class="mt-8 text-2xl">
           Admin Panel
        </div>
    </div>

    <div class="px-4 py-4 sm:px-10 border-gray-200">
        <div class=" justify-items-between">
            <div class="bg-white px-3 py-4 w-full mb-4">
                    @if ($isEdit === false)
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Create New Status</h3>
                    @else
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Update New Status</h3>
                    @endif
                <div class="mt-4 bg-white">
                    <label for="new_status" class="text-sm font-medium text-gray-700"> New Status </label>
                    <div class="mt-1">
                        <textarea id="new_status" wire:model="new_status" name="new_status" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                        placeholder="Input your new status"></textarea>
                    </div>

                    <x-jet-input-error for="new_status" class="mt-2" />

                    @if ($isEdit === false)
                    <div class="flex justify-end">
                        <div class="flex ">
                        <button class="mt-4 success border-2 rounded-lg px-4 py-2" wire:click="savedNewStatus()" wire:loading.attr="disabled">
                            {{ __('Post') }}
                        </button>
                        </div>
                    </div>
                    @else
                    <div class="flex justify-end">
                        <div class="flex ">
                        <button class="mt-4 success border-2 rounded-lg px-4 py-2" wire:click="updateNewStatus({{$status_id}})" wire:loading.attr="disabled">
                            {{ __('Update') }}
                        </button>
                        </div>
                    </div>
                    @endif

                    @if (session()->has('add-status'))
                        <div class="flex justify-end px-4 mt-3">
                                <x-jet-label class="text-green-600"> {{ session('add-status') }}</x-jet-label>
                        </div>
                    @endif  
                    @if (session()->has('update-status'))
                        <div class="flex justify-end px-4 mt-3">
                                <x-jet-label class="text-green-600"> {{ session('update-status') }}</x-jet-label>
                        </div>
                    @endif  
                </div>
            </div>
            
            <div class="py-auto w-full">
                    @if(Session::has('success'))
                    <script type="text/javascript">
                        swal({
                            title:'Success!',
                            text:"{{Session::get('success')}}",
                            timer:5000,
                            type:'success'
                        }).then((value) => {
                        //location.reload();
                        }).catch(swal.noop);
                    </script>
                    @endif

                    <div class="px-4 py-5 sm:px-6 mt-2 bg-white">
                        
                        @if (session()->has('delete'))
                        <div class="flex justify-end px-4 mt-3">
                                <x-jet-label class="text-red-600"> {{ session('delete') }}</x-jet-label>
                        </div>
                        @endif 
                        <h3 class="text-2xl leading-6 font-medium text-gray-900">New Status</h3>
                        <table class="border-2 w-full md:table-fixed mt-4">
                            <thead class="border hover:bg-gray-50">
                            <tr class="border-2">
                                <th class="border-2 p-2">#</th>
                                <th class="border-2 p-2" >User Name</th>
                                <th class="border-2 p-2">Status</th>
                                <th class="border-2 p-2">Date Created</th>
                                <th class="border-2 p-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr class="border-2 p-2">
                                        <td class="border-2 p-2">{{$post->id}}</td>
                                        <td class="border-2 p-2">{{$post->user_name}}</td>
                                        <td class="border-2 p-2">{{$post->new_status}}</td>
                                        <td class="border-2 p-2 text-center">{{ $post->created_at->format('d M Y')}}</td>
                                        <td class="items-center border-2 p-2 text-center">
                        
                                                <button type="button" wire:click="editStatus({{$post->id}})" class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                                
                                                </button>
                                            
                                                <button type="button" wire:click="deleteNewStatus({{$post->id}})" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                
                                                </button>
                                    
                                        </td>
                                    
                                @empty
                                    <td
                                     class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-center">
                                                <p class="text-sm leading-none text-gray-600">Record not Found</p>  
                                            </div>   
                                        
                                    </td>
                                    </tr>
                                @endforelse
                               
                                
                                
                                
                            </tbody>
                        </table>   
                        <div class=" mt-4 px-6 py-4 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            
                            <p>{{ $posts->links() }}</p>
                        </div>
                    </div>  

                    <div class="px-4 py-5 sm:px-6 mt-2 bg-white">
                        
                        
                        
                        
                        <div class="flex items-center justify-between">
                            
                            <h3 class="text-2xl leading-6 font-medium text-gray-900">Users</h3>
                            {{-- <a href="{{ route('register') }}"> --}}
                            <button class="mt-4 success border-2 rounded-lg px-4 py-2" wire:click="openRegistration">
                            ADD NEW USER
                            </button>
                            {{-- </a> --}}
                        </div>
                        
                        <table class="border-2 w-full md:table-fixed mt-4">
                            <thead class="border hover:bg-gray-50">
                            <tr class="border-2">
                                <th class="border-2 p-2">#</th>
                                <th class="border-2 p-2" >User Name</th>
                                <th class="border-2 p-2">Role</th>
                                <th class="border-2 p-2">Status</th>
                                <th class="border-2 p-2">Date Created</th>
                                <th class="border-2 p-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="border-2 p-2">
                                        <td class="border-2 p-2">{{$user->id}}</td>
                                        <td class="border-2 p-2">{{$user->name}}</td>
                                        <td class="border-2 p-2">
                                            @if ($user->role_id == '1' ) <span >Admin</span>
                                            @elseif ($user->role_id == '2') <span >Recruitment</span>
                                            @elseif ($user->role_id == '3') <span >Processing</span>
                                  
                                            @endif  
                                        </td>
                                        <td class="border-2 p-2 text-center">{{$user->active}} Active</td>
                                        <td class="border-2 p-2 text-center">{{ $user->created_at->format('d M Y')}}</td>
                                        
                                        <td class="items-center border-2 p-2 text-center">
                        
                                                <button type="button" wire:click="editUser({{$user->id}})" class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                                
                                                </button>
                                            
                                                <button type="button" wire:click="deleteConfirmation({{$user->id}})" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                
                                                </button>
                                    
                                        </td>
                                    
                                @empty
                                    <td
                                     class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-center">
                                                <p class="text-sm leading-none text-gray-600">Record not Found</p>  
                                            </div>   
                                        
                                    </td>
                                    </tr>
                                @endforelse
                               
                                @if (session()->has('user-delete'))
                                    <div class="flex justify-end px-4 mt-3">
                                            <x-jet-label class="text-red-600"> {{ session('user-delete') }}</x-jet-label>
                                    </div>
                                @endif  
                                
                                @if (session()->has('user-register'))
                                    <div class="flex justify-end px-4 mt-3">
                                            <x-jet-label class="text-green-600"> {{ session('user-register') }}</x-jet-label>
                                    </div>
                                @endif  

                                @if (session()->has('user-update'))
                                <div class="flex justify-end px-4 mt-3">
                                        <x-jet-label class="text-green-600"> {{ session('user-update') }}</x-jet-label>
                                </div>
                                @endif     
                                
                            </tbody>
                        </table>   
                        <div class=" mt-4 px-6 py-4 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            
                            <p>{{ $users->links() }}</p>
                        </div>
                    </div>  

                    <x-jet-dialog-modal wire:model="userdeleteConfirmation">
                        <x-slot name="title">
                           Delete
                        </x-slot>
                        <x-slot name="content">
                            Are you sure, you want to delete this applicant?
                         </x-slot>
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="closedeleteConfirmation" wire:loading.attr="disabled">
                                {{ __('Close') }}
                            </x-jet-secondary-button>

                            <x-jet-danger-button class="ml-3" wire:click="deleteUser({{$user_id}})" wire:loading.attr="disabled">
                                {{ __('Delete') }}
                            </x-jet-danger-button>
                        </x-slot>
                    
                    </x-jet-dialog-modal>

                    <x-jet-dialog-modal wire:model="userRegistrationConfirmation">
                        
                        <x-slot name="title">
                            Register New User
                         </x-slot>
                         <x-slot name="content">
                            <form method="POST">
                                @csrf
                    
                                <div>
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="role_id" value="{{ __('Register as:') }}" />
                                    <select wire:model="role_id" name="role_id" class="block mt-1 w-full">
                                        <option value="">Select Role</option>
                                        <option value="3">Processing</option>
                                        <option value="2">Recruitment</option>
                                        <option value="1">Admin</option>
                                    </select>
                                    <x-jet-input-error for="role_id" class="mt-2" />
                                </div>
                    
                                <div class="mt-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" />
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>
                    
                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" />
                                    <x-jet-input-error for="password" class="mt-2" />
                                </div>
                    
                                <div class="mt-4">
                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input wire:model="confirm_password" d="password_confirmation" class="block mt-1 w-full" type="password"/>
                                    <x-jet-input-error for="confirm_password" class="mt-2" />
                                </div>
                                
                                <x-slot name="footer">
                                    <div class="flex items-center justify-end mt-4">
                                       <x-jet-danger-button class="ml-3" wire:click="closeRegistration" wire:loading.attr="disabled">
                                           {{ __('Cancel') }}
                                       </x-jet-danger-button>
                                       <x-jet-button class="ml-4 " wire:click="userRegister">
                                           {{ __('Register') }}
                                       </x-jet-button>
                                   </div>
                                </x-slot>
                               </form>
                          </x-slot>
                        
                     
                    </x-jet-dialog-modal> 

                    <x-jet-dialog-modal wire:model="userEditConfirmation">
                        
                        <x-slot name="title">
                            Update User
                         </x-slot>
                         <x-slot name="content">
                            {{-- <form method="POST" action="{{ route('register') }}">
                                @csrf --}}
                    
                                <div>
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-jet-label for="role_id" value="{{ __('Register as:') }}" />
                                    <select wire:model="role_id" name="role_id" class="block mt-1 w-full">
                                        <option value="">Select Role</option>
                                        <option value="3">Processing</option>
                                        <option value="2">Recruitment</option>
                                        <option value="1">Admin</option>
                                    </select>
                                    <x-jet-input-error for="role_id" class="mt-2" />
                                </div>
                    
                                <div class="mt-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required />
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>
                    
                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                    <x-jet-input-error for="password" class="mt-2" />
                                </div>
                
                                <x-slot name="footer">
                                    <div class="flex items-center justify-end mt-4">
                                       <x-jet-danger-button class="ml-3" wire:click="closeUpdate" wire:loading.attr="disabled">
                                           {{ __('Cancel') }}
                                       </x-jet-danger-button>
                                       <x-jet-button class="ml-4 " wire:click="updateUser({{$user_id}})">
                                           {{ __('Update') }}
                                       </x-jet-button>
                                   </div>
                                </x-slot>
                          </x-slot>
                        
                     
                    </x-jet-dialog-modal> 

                   
            </div>
        </div>
    </div>
</div>
