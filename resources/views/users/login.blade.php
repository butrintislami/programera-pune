<x-layouts>
    <x-card class="p-10 max-w-ld mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Kyqu
            </h2>
            <p class="mb-4">Kyquni te postoni dhe editoni shpallje</p>
        </header>

        <form method="POST" action="{{ route('login') }}">
            @csrf

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
                <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Kyquni
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Nuk keni llogari?
                    <a href="{{route('users.create')}}" class="text-laravel"
                    >Regjistrohuni</a
                    >
                </p>
            </div>
        </form>
    </x-card>

</x-layouts>