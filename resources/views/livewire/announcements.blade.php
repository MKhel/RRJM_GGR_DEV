<div>
    <div class="flex justify-items-between px-3 py-4 sm:px-20 bg-white ">
        <div class="mt-8 text-2xl">
           Announcements
        </div>
    </div>

    <div class="flex px-3 py-4 sm:px-20 border-gray-200">
        <div class="bg-white pt-10 pb-8 shadow-xl sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Create Announcement</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Announcement details.</p>

                <div class="mt-4">
                    <label for="about" class="block text-sm font-medium text-gray-700"> Announcement </label>
                    <div class="mt-1">
                      <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                      placeholder="{{auth()->user()->name}}, What you would to announce today?"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Latest Announcements</h3>
                
              </div>
        </div>
    </div>
</div>
