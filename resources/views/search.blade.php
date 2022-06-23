<x-app-layout>
    @if($success)
    <div class="mt-4 flex flex-col gap-2">
        @foreach($result as $product)
            <div class="p-4 rounded-lg w-full bg-gray-200">
                <h1 class="text-xl text-gray-900">Product: {{ $product->name }}</h1>
                <h2 class="text-lg text-gray-800">By: {{$product->brand}}</h2>
                <span class="text-sm text-gray-600 text-opacity-80">{{ $product->barcode }}</span>
            </div>
        @endforeach
    </div>
    @else
        <div class="p-4 rounded-lg w-full bg-gray-200">
            <h1 class="text-xl text-gray-900">{{ $error_code }}</h1>
        </div>
    @endif
</x-app-layout>
