<x-layouts>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Ndryshoni Shpalljen Tuaj</h2>
      <p class="mb-4">Ndrysho: {{$job->title}}</p>
    </header>

    <form method="POST" action="/listings/{{$job->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Emri i Kompanise</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
          value="{{$job->company}}" />

        @error('company')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Titulli i Pozites</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
          placeholder="Example: Senior Laravel Developer" value="{{$job->title}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="location" class="inline-block text-lg mb-2">Lokacioni i Kompanise</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
          placeholder="Example: Remote, Boston MA, etc" value="{{$job->location}}" />

        @error('location')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">
          Email i Kompanise
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$job->email}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="website" class="inline-block text-lg mb-2">
          Linku i Webfaqes/Aplikacionit
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
          value="{{$job->website}}" />

        @error('website')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Tags (Ndani me presje)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$job->tags}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
          Logoja e Kompanise
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
        <img
                class="w-48 mr-6 mb-6"
                src="{{$job->logo? '/'.$job->logo : asset('images/no-image.png')}}"
                alt=""
        />

        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Pershkrimi i Punes
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Perfshin">{{$job->description}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Ndryshoni Shpalljen
        </button>

        <a href="/" class="text-black ml-4"> Kthehuni </a>
      </div>
    </form>
  </x-card>
</x-layouts>
