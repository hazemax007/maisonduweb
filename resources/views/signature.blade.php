@extends('inner')
@section('content')
<div id="app">
    <upload-component>
</upload-component>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
@endsection
