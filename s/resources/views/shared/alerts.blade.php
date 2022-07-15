@if (Session::has('success'))
    <x-alert type="success" :dismissible="false">
        {{ Session::get('success') }}
    </x-alert>
@endif

@if (Session::has('errors'))
    <x-alert type="danger" :dismissible="false">
        @if ($errors->count() > 1)
            {{ trans_choice(':count error :|:count errors : ', $errors->count()) }}
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif
    </x-alert>
@endif
