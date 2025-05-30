<div class="flex items-center justify-center h-screen">
    <div class="flex flex-row space-x-10 shadow-2xl offset-x-10 rounded-4xl">
        <div class="bg-[#16302B] text-white w-2/5 flex flex-col items-start justify-center px-10 py-30 rounded-4xl">
            <h3 class="text-xl font-bold">Hello, Kaum Skena!</h3>
            <p class="text-3lg">Masuk dan akses koleksi dan fitur fashion terbaru dari District.</p>
        </div>
        <div class="w-full text-[#16302B] flex flex-col items-center justify-center pr-15 py-30 rounded-4xl space-y-5">
            <h3 class="text-3xl font-bold">Login</h3>
            <x-button-primary width="full" rounded="xl">
                <span class="mr-2">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                    </svg>
                </span>
                Lanjutkan Dengan Google
            </x-button-primary>
            <div class="inline-flex items-center justify-center w-full">
                <hr class="w-full h-px bg-[#0000005b] border-0">
                <span class="absolute px-3 text-[#16302B] -translate-x-50% bg-white left-50%">or</span>
            </div>

            <form class="flex flex-col space-y-3 w-full" wire:submit="login">
                <x-form-input wire="email" type="email" id="email" width="full" name="email" placeholder="Email" border="dark" required/>
                <x-form-input wire="password" type="password" id="password" width="full" name="password" placeholder="Password" border="dark" required/>
                @error('email')
                <p class="text-red-500 text-sm italic">{{ $message }}</p>
                @enderror
                <div class="flex items-start justify-between space-x-2">
                    <a href="/create-new-account">Belum punya akun? daftar disini.</a>
                    <x-form-input-btn type="submit" width="1/3" :isLoading="$isLoading">Login</x-form-input-btn>
                </div>
            </form>

        </div>
    </div>
</div>