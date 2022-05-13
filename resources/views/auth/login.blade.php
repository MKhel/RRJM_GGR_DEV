<x-guest-layout>
    <x-jet-authentication-card>
       
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
           
            
            
            <div class="mt-4">
                <x-slot name="logo">
                    <x-jet-authentication-card-logo  class="w-20"/>
                </x-slot>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center text-green-600">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="items-center t-4">
                
                <x-jet-button class="mt-6 w-full">
                    {{ __('Log in') }}
                </x-jet-button>
               

            </div>
            <div class="flex justify-end px-3 py-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm  text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
            </div>
            <div class="flex pt-8 text-center justify-center text-sm font-semibold leading-2">
                
                <p>
                  <p class="text-gray-90 text-xs mr-2">Not register yet?</p>
                  <a href="{{ route('register') }}" class="text-xs text-green-600 hover:text-sky-600">Register &rarr;</a>
                </p>
              </div>
        </form>
    </x-jet-authentication-card>
    
    {{-- <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
        <div class="absolute inset-0 bg-[url(/img/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
        <div class="relative border-t-8 border-green-600 bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
          <div class="mx-auto max-w-md">
            <div class="flex justify-center p-6">
                <a href="/">

                    <img class="w-20" src="{{ asset('images/rrjmlogo.svg') }}" alt="RRJM">
                  
                  </a>
            </div>
  
            <div class="">
              
              <div class="py-3">
                <div class="mt-4">
                    <x-slot name="logo">
                        <x-jet-authentication-card-logo  class="w-20"/>
                    </x-slot>
                    <x-jet-label for="email" value="{{ __('Email / Username') }}" class="text-left"/>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
    
                <div class="col-span-3 sm:col-span-3 mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" class="text-left" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
    
                <div class="col-span-3 sm:col-span-3 mt-2">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="items-center justify-end mt-4">
                    
    
                    <x-jet-button class="w-full justify-center rounded-md sm:text-3xl">
                        {{ __('Log in') }}
                    </x-jet-button>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 " href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
              </div>
              <div class="flex pt-8 text-center justify-end text-base font-semibold leading-2">
                
                <p>
                  <p class="text-gray-90 text-xs mr-2">Not register yet?</p>
                  <a href="{{ route('register') }}" class="text-xs text-green-600 hover:text-sky-600">Sign Up &rarr;</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
</x-guest-layout>
