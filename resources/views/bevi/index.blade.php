@extends('layouts.app')



@section('content_body')

    <livewire:dashboard />


@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
   
@endpush

{{-- Push extra scripts --}}

@push('js')

@endpush
