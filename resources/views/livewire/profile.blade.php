@php
    use App\Models\User;

    $user = User::where('id', auth()->user()->id)->first();
    $username = auth()->user()->name;
    $email = auth()->user()->email;
    $profilePicture = auth()->user()->profile_picture;

@endphp

<div>
    <div class="flex flex-col items-center justify-center">
        <div class="flex flex-col items-center justify-center space-y-5 my-5 w-[70%]">
            <h3 class="text-3xl text-[#16302B] font-bold">Profile</h3>
            <div class="w-[200px] h-[200px] relative">
                @if (auth()->user()->profile_picture == null)
                    <img class="bg-white absolute w-[200px] h-[200px] rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profile picture">
                @else
                    <img class="bg-white absolute w-[200px] h-[200px] rounded-full" src="{{ $profilePicture }}" alt="Profile picture">
                @endif

                <div class="absolute bottom-0 right-0">
                    <x-button-primary-icon>
                        <svg width="20" height="auto" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0649 7.61596C11.5356 6.9622 12.2968 6.57031 13.0943 6.57031H15.9057C16.7032 6.57031 17.4644 6.9622 17.9351 7.61596C18.8213 8.84683 20.2545 9.59115 21.7793 9.59115C23.1395 9.59115 24.2422 10.6938 24.2422 12.054V19.9375C24.2422 21.3139 23.1264 22.4297 21.75 22.4297H7.25C5.8736 22.4297 4.75781 21.3139 4.75781 19.9375V12.054C4.75781 10.6938 5.86047 9.59115 7.22067 9.59115C8.74548 9.59115 10.1787 8.84683 11.0649 7.61596ZM13.0943 4.30469C11.5601 4.30469 10.118 5.05362 9.22627 6.29214C8.76107 6.93825 8.00875 7.32552 7.22067 7.32552C4.6092 7.32552 2.49219 9.44254 2.49219 12.054V19.9375C2.49219 22.5652 4.62233 24.6953 7.25 24.6953H21.75C24.3777 24.6953 26.5078 22.5652 26.5078 19.9375V12.054C26.5078 9.44254 24.3908 7.32552 21.7793 7.32552C20.9913 7.32552 20.2389 6.93825 19.7737 6.29214C18.882 5.05361 17.4399 4.30469 15.9057 4.30469H13.0943ZM11.1016 15.4062C11.1016 13.5293 12.6231 12.0078 14.5 12.0078C16.3769 12.0078 17.8984 13.5293 17.8984 15.4062C17.8984 17.2832 16.3769 18.8047 14.5 18.8047C12.6231 18.8047 11.1016 17.2832 11.1016 15.4062ZM14.5 9.74219C11.3718 9.74219 8.83594 12.2781 8.83594 15.4062C8.83594 18.5344 11.3718 21.0703 14.5 21.0703C17.6282 21.0703 20.1641 18.5344 20.1641 15.4062C20.1641 12.2781 17.6282 9.74219 14.5 9.74219Z" fill="#16302B"/>
                        </svg>
                    </x-button-primary-icon>
                </div>
            </div>
            
            <hr class="w-[30%] h-1 mx-auto my-4 bg-[#0000005b] border-0 rounded-sm md:my-10">
            
            <div>
                <x-form-input-btn wire:click="logout">Logout</x-form-input-btn>
            </div>
        </div>
    </div>
</div>
