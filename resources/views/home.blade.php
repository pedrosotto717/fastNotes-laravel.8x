@extends('layouts/main')

@section('title', 'Home')

@section('content')
    <div class="container note__container">
    	<x-notes :notes='$notes'/>
    </div>

		{{ $notes->links('partials.pagination') }}

    <a href="{{ route('notes.create') }}" title="add Note" class="add-note">+</a>

@endsection


