@extends('layouts.auth')

@section('title', 'Forgot Password - VidyaSetu')

@section('content')
    <div id="mainForm">
        <div class="card-head">
            <div class="card-title">Forgot Password</div>
            <div class="card-sub">Enter your email or username to receive a secure OTP and reset your password.</div>
        </div>

        @if(session('status'))
            <div class="form-success" style="margin:0 0 18px;padding:14px 18px;border:1px solid rgba(22, 163, 74, .22);background:rgba(220, 252, 231, .9);color:#166534;border-radius:12px;">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="form-error" style="margin:0 0 18px;padding:14px 18px;border:1px solid rgba(220,38,38,.22);background:rgba(254,226,226,.9);color:#b91c1c;border-radius:12px;">
                {{ implode(' ', $errors->all()) }}
            </div>
        @endif

        @php
            $showResetFields = session('showResetFields') || old('otp') || old('password') || old('password_confirmation');
        @endphp

        <form method="POST" action="{{ route('password.reset') }}" class="pnl on">
            @csrf
            <div class="fg">
                <label class="lbl"><i class="fas fa-user"></i> Email or Username</label>
                <div class="iw">
                    <input class="inp" id="identifier" name="identifier" type="text" placeholder="Email or username"
                        value="{{ old('identifier') }}" autocomplete="username">
                    <span class="inp-icon" id="identifierIcn"><i class="fas fa-user"></i></span>
                </div>
                @error('identifier')
                    <div class="et on"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            @if($showResetFields)
                <div class="fg">
                    <label class="lbl"><i class="fas fa-key"></i> OTP</label>
                    <div class="iw">
                        <input class="inp" name="otp" type="text" maxlength="6" placeholder="6-digit OTP"
                            value="{{ old('otp') }}" autocomplete="one-time-code">
                        <span class="inp-icon"><i class="fas fa-key"></i></span>
                    </div>
                    @error('otp')
                        <div class="et on"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="fg">
                    <label class="lbl"><i class="fas fa-lock"></i> New Password</label>
                    <div class="iw">
                        <input class="inp pw" name="password" type="password" placeholder="Enter new password"
                            autocomplete="new-password">
                        <button type="button" class="eye" onclick="togEye()"><i class="fas fa-eye" id="eyeIc"></i></button>
                    </div>
                    @error('password')
                        <div class="et on"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="fg">
                    <label class="lbl"><i class="fas fa-lock"></i> Confirm Password</label>
                    <div class="iw">
                        <input class="inp pw" name="password_confirmation" type="password" placeholder="Confirm new password"
                            autocomplete="new-password">
                    </div>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">
                <span class="blbl">{{ $showResetFields ? 'Reset Password' : 'Send OTP' }} &nbsp;<i class="fas fa-arrow-right"></i></span>
                <div class="spin"></div>
            </button>
        </form>

        <div style="margin-top:12px;">
            <a href="{{ route('login') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Back to Login</a>
        </div>
    </div>
@endsection
