@extends('layouts.index')

@section('title', 'Welcome to Hotel Pasha')

@section('content')
    <x-landingpage_hero></x-landingpage_hero>
    <x-landingpage_services></x-landingpage_services>
    <x-landingpage_whyus></x-landingpage_whyus>
    <script src="{{ asset('js/swiper.js') }}"></script>
@endsection
