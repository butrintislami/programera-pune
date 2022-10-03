<x-layouts>
    <x-card class="p-10 max-w-ld mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Regjistrohu
            </h2>
            <p class="mb-4">Regjistrohuni te postoni shpallje</p>
        </header>

        <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
                Emri
            </label>
            <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
            />

            @error('name')
            <p class="text-red-500 text-xs mt-1"></p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
            >Emaila</label
            >
            <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
            />
            @error('email')
            <p class="text-red-500 text-xs mt-1"></p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                    for="password"
                    class="inline-block text-lg mb-2"
            >
                Fjalekalimi
            </label>
            <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
            />
            @error('password')
            <p class="text-red-500 text-xs mt-1"></p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                    for="password2"
                    class="inline-block text-lg mb-2"
            >
                Konfirmoni Fjalekalimin
            </label>
            <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password_confirmation"
                    required autocomplete="new-password"
            />
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1"></p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Regjistrohuni
            </button>
        </div>

        <div class="mt-8">
            <p>
                Jeni te regjistruar?
                <a href="{{route('login')}}" class="text-laravel"
                >Kyquni</a
                >
            </p>
        </div>
        </form>
    </x-card>

</x-layouts>