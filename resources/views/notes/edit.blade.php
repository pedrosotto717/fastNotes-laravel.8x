@extends('layouts/main')

@section('title', 'Edit')

@section('content')
	@include('partials.form-note', ['note' => $note, 'tags' => $tags, 'submit_btn' => 'Save', 'method' => 'PUT'])
@endsection