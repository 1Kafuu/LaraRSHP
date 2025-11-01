@extends('layouts.sidebar')

@section('content')
<div>
    <h1>Halo, you are {{ session('user.name') }}</h1>
</div>
@endsection
