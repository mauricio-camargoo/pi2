@if (session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700">
        {{ session('success') }}
    </div>
@endif
@if (session()->has('warning'))
    <div class="bg-yelow-100 border border-yelow-400 text-yelow-700">
        {{ session('warning') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700">
        {{ session('error') }}
    </div>
@endif
@if (session()->has('message'))
    <div class="bg-cyan-100 border border-cyan-400 text-cyan-700">
        {{ session('message') }}
    </div>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
@endif