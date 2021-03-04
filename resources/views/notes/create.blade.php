@extends('layouts/main')

@section('title', 'Create')

@section('content')
	@include('partials.form-note', ['note' => null, 'tags' => $tags])
@endsection