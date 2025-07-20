@extends('layouts.error')

@section('title', 'Page Not Found - Alumni Connect')

@section('content')
<div class="error-container">
    <div class="error-content">
        <div class="error-animation">
            <div class="astro-container">
                <div class="astronaut">
                    <div class="helmet">
                        <div class="visor"></div>
                    </div>
                    <div class="pack"></div>
                    <div class="body">
                        <div class="arm left"></div>
                        <div class="arm right"></div>
                    </div>
                    <div class="leg left"></div>
                    <div class="leg right"></div>
                </div>
                <div class="stars">
                    @for($i = 1; $i <= 8; $i++)
                    <div class="star" style="--i:{{ $i }}"></div>
                    @endfor
                </div>
                <div class="planet"></div>
                <div class="four">4</div>
                <div class="zero">0</div>
                <div class="four">4</div>
            </div>
        </div>
        
        <div class="error-text">
            <h1>Lost in Space?</h1>
            <p>The page you're looking for doesn't exist or has been moved.</p>
            <div class="error-actions">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fas fa-home"></i> Return Home
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-tachometer-alt"></i> Go to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection