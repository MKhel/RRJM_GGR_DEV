<div>
    <div class="flex justify-items-between px-3 py-4 sm:px-20 bg-white ">
        <div class="mt-8 text-2xl">
           Announcements
        </div>
    </div>

    <div class="px-4 py-4 sm:px-20 border-gray-200">
        <div class="flex justify-items-between">
            <div class="bg-white px-3 py-4 w-1/2 h-1/2 mr-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Create Announcement</h3>
                    @if (session()->has('message'))
                        <div class="flex justify-end px-4 mt-3">
                                <x-jet-label class="text-green-400"> {{ session('message') }}</x-jet-label>
                        </div>
                    @endif  
                    
                
                <div class="mt-4 bg-white">
                    <label for="about" class="block text-sm font-medium text-gray-700"> Announcement </label>
                    <div class="mt-1">
                      <textarea id="about" wire:model="post" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                      placeholder="{{auth()->user()->name}}, What you would to announce today?"></textarea>
                    </div>
                    <x-jet-input-error for="post" class="mt-2" />
                    
                    <div class="flex justify-end">
                        <div class="flex ">
                        <button class="mt-4 success border-2 rounded-lg px-4 py-2" wire:click="saveAnnouncement()" wire:loading.attr="disabled">
                            {{ __('Post') }}
                        </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="ml-4 w-full">
            <div class="relative bg-white px-6 py-6 pt-10 pb-8 shadow-sm ">
                <h3 class="text-2xl leading-6 font-medium text-gray-900">Latest Announcements</h3>
            </div>
                    @if (session()->has('delete'))
                        <div class="flex justify-end px-4 mt-3">
                                <x-jet-label class="text-red-600"> {{ session('delete') }}</x-jet-label>
                        </div>
                    @endif 
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
                @foreach ($posts as $post)
                    <div class="px-4 py-5 sm:px-6 mt-2 bg-white">
                        <div class="mt-3 px-4 py-4 bg-gray-100 rounded-md">
                            <div class="flex justify-between">
                                
                                <div class="text-sm text-gray-500">
                                    Last Posted: {{ $post->created_at->diffForHumans()}}
                                </div>
                                <div class="" wire:click="deleteAnnouncement({{$post->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            
                            <div class="mt-6 font-bold">
                                {{ $post->announcement_post }}
                            </div>
                            <div class="mt-6 text-gray-500 text-right">
                                Posted By: {{ $post->posted_by }}
                            </div>
                        </div>
                    </div>                        
                @endforeach
            </div>
        </div>
    </div>
</div>
