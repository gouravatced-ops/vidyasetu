@extends('layouts.app')
@section('title', 'Request a Demo - VidyaSetu')
@section('content')
<x-page-hero
    title="Request a Personalized Demo"
    breadcrumb-title="Demo Request"
/>
<x-demorequest></x-demorequest>
<x-testimonial></x-testimonial>
@endsection