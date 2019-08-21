@extends('layouts.main')

@section('content')
    <div id="application"></div>
@endsection

@push('js')
    <script type="application/javascript" src="{{ mix('/js/main.js') }}"></script>
@endpush
