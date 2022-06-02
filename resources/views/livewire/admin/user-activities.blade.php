
<div>
    <div class="px-4 py-5 sm:px-6 mt-2 bg-white">
                        
        @if (session()->has('delete'))
        <div class="flex justify-end px-4 mt-3">
                <x-jet-label class="text-red-600"> {{ session('delete') }}</x-jet-label>
        </div>
        @endif 
        <div class="flex justify-between mb-4">
            <h3 class="text-2xl leading-6 font-medium text-gray-900">User Activities</h3>
            <x-jet-button class="ml-4" >
                <a href="{{ route('admin_panel') }}">
                    {{ __('Go Back') }}
                </a>
            </x-jet-button>
          </div>
          <h3 class="text-xl leading-6 font-medium text-gray-900">{{$userData->name}} activity history</h3>
          
        
        <table class="border-2 w-full md:table-fixed mt-4">
            <thead class="border hover:bg-gray-50">
            <tr class="border-2">
                <th class="border-2 p-2">Applicants Name</th>
                <th class="border-2 p-2" >Particular</th>
                <th class="border-2 p-2">Remarks</th>
                <th class="border-2 p-2">Date Created</th>
            </tr>
            </thead>
            @forelse ($userDataActivity as $data)
            <tbody>
               
                    <tr class="border-2 p-2">
                        @foreach ($data->applicants as $applicant)
                        <td class="border-2 p-2">{{$applicant->last_name }}, {{$applicant->first_name}}</td>
                        @endforeach
                        
                        <td class="border-2 p-2">{{$data->particular}}</td>
                        <td class="border-2 p-2">{{$data->remarks}}</td>
                        <td class="border-2 p-2 text-center">{{ $data->created_at->format('d M Y')}}</td>
                    </tr>
                @empty
                    
                    
                    <tr
                     class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-center">
                                <p class="text-sm leading-none text-gray-600">{{$userData->name}} has no activity yet.</p>  
                            </div>   
                        
                    </tr>
                
               
                
                
                
            </tbody>
            @endforelse
        </table>   
        <div class=" mt-4 px-6 py-4 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            
            <p>{{ $userDataActivity->links() }}</p>
        </div>
    </div>  
</div>
