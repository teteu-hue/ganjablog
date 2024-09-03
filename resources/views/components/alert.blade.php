@if (session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('warning'))
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4">
        {{ session('warning') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4">
        {{ session('error') }}
    </div>
@endif

@if (session()->has('notAllow'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4">
        {{ session('notAllow') }}
    </div>
@endif


@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
@endif