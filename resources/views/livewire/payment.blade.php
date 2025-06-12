@php
    
    $user = auth()->user();
    $subtotal = 0; 

@endphp

<div class="px-50 py-20 flex flex-col gap-5">
    @foreach ($cartItems as $item)
        <div class="grid grid-cols-2 gap-6">
            <div class="rounded-lg bg-[#16302B] text-white p-8 shadow-lg">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        {{-- Gambar Sementaraa --}}
                        <img src="{{ asset('images/home-shirts.webp') }}" alt="{{ $item->product->name }}">
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="relative">
                            <div class="absolute top-0 right-0">
                                <x-button-primary-icon bgColor="transparent" width="full" rounded="md" inverted="true" wire:click.live="removeFromCart({{ $item->id }})">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </x-button-primary-icon>
                            </div>
                        </div>
                        <div class="text-end">
                            <h3 class="text-3xl font-semibold">{{ $item->product->brand ?? 'Brand' }}</h3>
                            <p class="text-2xl font-semibold">{{ $item->product->name }}</p>
                            <p>{{ $item->color ?? '-' }}, {{ $item->size ?? '-' }}</p>
                            <p class="text-3xl font-bold mt-2">Rp. {{ number_format($item->product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="space-y-7">
                <p class="text-[#A38560]">*This is a limited edition item, please check size and style.</p>
    
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center gap-4">
                        <div class="p-2 bg-[#16302B] rounded-md text-white flex items-center justify-center">
                            <p class="text-lg font-bold">{{ $item->quantity }}<span class="text-xs">pcs</span> </p>
                        </div>
                        <div>
                            <p class="font-semibold">Color: {{ $item->color ?? '-' }}</p>
                            <p class="font-semibold">Size:  {{ $item->size ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-3xl font-bold">Rp. {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500">Subtotal: {{ number_format($subtotal += $item->product->price * $item->quantity, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    <div class="mt-10 space-y-6">
        {{-- Voucher Selection --}}
        <div class="grid grid-cols-2 gap-4 p-4 bg-[#16302B] text-white shadow-lg rounded-lg">
            <div class="flex items-center gap-4">
                <p>%</p>
                <p>Apply available vouchers</p>
            </div>
            <div class="justify-self-end">
                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>

        {{-- Order Summary --}}
        <div class="grid grid-cols-2">
            <div class="space-y-1 font-semibold">
                <div class="flex items-center gap-2">
                    <p>Order Fees</p>
                    <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </div>
                <p class="font-bold">Total Payment</p>
            </div>
            <div class="space-y-1 justify-self-end text-right font-semibold">
                <p>Rp. 0</p>
                <p class="font-bold text-lg">Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
            </div>
        </div>
    
        {{-- Payment Method --}}
        <div class="grid grid-cols-2 gap-4 p-4 bg-[#16302B] text-white shadow-lg rounded-lg">
            <div class="flex items-center gap-4">
                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
                <p>Select Payment Method</p>
            </div>
            <div class="justify-self-end">
                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>
    
        {{-- Checkout Button --}}
        <div class="justify-items-end">
            <x-form-input-btn fontColor="text-white" bgColor="bg-[#A38560]" width="35" wire:click="checkout">
                Buy Now!
            </x-form-input-btn>
        </div>
    </div>
</div>
