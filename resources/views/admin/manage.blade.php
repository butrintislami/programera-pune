<x-layouts>

    <x-card class="p-10">
        <header>
            <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
            >
                Menagjo te gjitha Publikimet
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
            @unless($jobs->isEmpty())
                @foreach($jobs as $job)
                    <tr class="border-gray-300">
                        <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="{{route('jobs.show',[$job->id])}}">
                                {{$job->title}}
                            </a>
                        </td>
                        <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="">
                                {{$job->user->name}}
                            </a>
                        </td>
                        <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                    class="text-blue-400 px-6 py-2 rounded-xl"
                                    href="{{route('jobs.edit',[$job->id])}}"
                            ><i
                                        class="fa-solid fa-pen-to-square"
                                ></i>
                                Edito</a
                            >
                        </td>
                        <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <form method="POST" action="{{route('jobs.destroy',[$job->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">
                                    <i
                                            class="fa-solid fa-trash-can"
                                    ></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">Nuk u gjet asnje pune</p>

                    </td>
                </tr>
            @endunless
            </tbody>
        </table>
    </x-card>




</x-layouts>
