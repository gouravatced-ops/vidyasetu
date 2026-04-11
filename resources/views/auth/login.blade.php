@extends('layouts.auth')

@section('title', 'Login - VidyaSetu')

@section('content')
    <div id="mainForm">
        <div class="card-head">
            <div class="card-title">Sign In</div>
            <div class="card-sub">Enter your credentials to access the portal</div>
        </div>

        @if($errors->any())
            <div class="form-error" style="margin:0 0 18px;padding:14px 18px;border:1px solid rgba(220,38,38,.22);background:rgba(254,226,226,.9);color:#b91c1c;border-radius:12px;">
                {{ implode(' ', $errors->all()) }}
            </div>
        @endif

        <!-- TABS -->
        <div class="tabs" data-t="pw" id="tabBar">
            <div class="tab-gl"></div>
            <button class="tbtn" id="t1" onclick="swTab('pw')">
                <i class="fas fa-lock"></i> Email & Password
            </button>
            <button class="tbtn on" id="t2" onclick="swTab('otp')">
                <i class="fas fa-mobile-alt"></i> Login with OTP
            </button>
        </div>

        <!-- ══════════ PASSWORD PANEL ══════════ -->
        <form id="pwPanel" method="POST" action="{{ route('login.post') }}" class="pnl">
            @csrf
            <input type="hidden" name="login_type" value="password">

            <!-- Step indicator -->
            <div class="steps" id="pwSteps">
                <div class="sdot act" id="pd1">1</div>
                <div class="slbl act" id="pl1">Email</div>
                <div class="sline" id="pline1"></div>
                <div class="sdot" id="pd2">2</div>
                <div class="slbl" id="pl2">Password</div>
                <div class="sline" id="pline2"></div>
                <div class="sdot" id="pd3">3</div>
                <div class="slbl" id="pl3">Verify</div>
            </div>

            <!-- Step 1: Email -->
            <div id="pwS1">
                <div class="fg">
                    <label class="lbl"><i class="fas fa-envelope"></i> Email Address</label>
                    <div class="iw">
                        <input class="inp" id="pwEmail" name="email" type="email" placeholder="yourname@school.edu" autocomplete="email"
                            oninput="onEmailType()">
                        <span class="inp-icon" id="emailIcn"><i class="fas fa-envelope"></i></span>
                    </div>
                    <div class="et" id="emailEt"><i class="fas fa-exclamation-circle"></i> Enter a valid email address
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="contBtn" onclick="stepContinue()">
                    <span class="blbl">Continue &nbsp;<i class="fas fa-arrow-right"></i></span>
                    <div class="spin"></div>
                </button>
            </div>

            <!-- Step 2: Password + Captcha (revealed) -->
            <div class="reveal" id="pwS2">
                <div class="fg">
                    <label class="lbl"><i class="fas fa-lock"></i> Password</label>
                    <div class="iw">
                        <input class="inp pw" id="pwIn" name="password" type="password" placeholder="Enter your password"
                            autocomplete="current-password" oninput="onPwType()">
                        <button class="eye" onclick="togEye()"><i class="fas fa-eye" id="eyeIc"></i></button>
                    </div>
                    <div class="et" id="pwEt"><i class="fas fa-exclamation-circle"></i> Password must be at least 6
                        characters</div>
                </div>

                <!-- Captcha -->
                <div class="fg">
                    <label class="lbl"><i class="fas fa-shield-halved"></i> Security Verification</label>
                    <div class="cap-row">
                        <div class="cap-box">
                            <div class="cap-noise"></div>
                            <span id="capCode" style="position:relative;z-index:1;letter-spacing:6px;"></span>
                        </div>
                        <button class="cap-refresh" onclick="genCap(true)" title="Refresh captcha"><i
                                class="fas fa-rotate-right" id="capRefreshIc"></i></button>
                    </div>
                    <div class="iw">
                        <input class="inp" id="capIn" type="text" placeholder="Enter code above" maxlength="6"
                            autocomplete="off" oninput="onCapType()">
                        <span class="inp-icon" id="capIcn"><i class="fas fa-shield-halved"></i></span>
                    </div>
                    <div class="et" id="capEt"><i class="fas fa-exclamation-circle"></i> Captcha code does not match</div>
                </div>

                <div class="reveal show" id="pwS3">
                    <button type="button" class="btn btn-primary" id="signInBtn" onclick="handleSignIn()">
                        <span class="blbl"><i class="fas fa-sign-in-alt"></i> Sign In to Portal</span>
                        <div class="spin"></div>
                    </button>
                </div>

                <div style="margin-top:12px;">
                    <button type="button" class="btn btn-ghost" onclick="stepBack()"><i class="fas fa-arrow-left"></i> Use a different
                        email</button>
                </div>
            </div>
        </form>

        <!-- ══════════ OTP PANEL ══════════ -->
        <div class="pnl on" id="otpPanel">
            <form id="otpVerifyForm" method="POST" action="{{ route('login.post') }}" style="display:none;">
                @csrf
                <input type="hidden" name="login_type" value="otp">
                <input type="hidden" name="phone" id="otpPhone">
                <input type="hidden" name="otp" id="otpHidden">
            </form>

            <!-- Step indicator -->
            <div class="steps">
                <div class="sdot act" id="od1">1</div>
                <div class="slbl act" id="ol1">Mobile</div>
                <div class="sline" id="oline1"></div>
                <div class="sdot" id="od2">2</div>
                <div class="slbl" id="ol2">OTP</div>
                <div class="sline" id="oline2"></div>
                <div class="sdot" id="od3">3</div>
                <div class="slbl" id="ol3">Done</div>
            </div>

            <!-- Mobile input -->
            <div class="fg" id="mobGrp">
                <label class="lbl"><i class="fas fa-mobile-alt"></i> Mobile Number</label>
                <div class="iw" style="display:flex;gap:0;">
                    <span
                        style="position:absolute;left:14px;top:50%;transform:translateY(-50%);font-size:.82rem;font-weight:600;color:#94a3b8;border-right:1px solid var(--border);padding-right:8px;pointer-events:none;z-index:1;">+91</span>
                    <input class="inp" id="mobIn" type="tel" maxlength="10" placeholder="10-digit mobile number"
                        style="padding-left:52px;padding-right:96px;"
                        oninput="this.value=this.value.replace(/\D/g,'');onMobType()">
                    <button
                        style="position:absolute;right:9px;top:50%;transform:translateY(-50%);background:linear-gradient(135deg,var(--blue),var(--navy2));color:#fff;border:none;border-radius:6px;padding:7px 12px;font-family:'Sora',sans-serif;font-size:.72rem;font-weight:800;cursor:pointer;transition:opacity .2s;box-shadow:0 2px 8px rgba(30,64,175,.25);"
                        id="getOtpBtn" onclick="doSendOTP()" disabled>
                        <span id="getOtpLbl">Get OTP</span>
                    </button>
                </div>
                <div class="et" id="mobEt"><i class="fas fa-exclamation-circle"></i> Enter a valid 10-digit number</div>
            </div>

            <!-- OTP input step -->
            <div class="reveal" id="otpStep">
                <p class="sent-note">OTP sent to <strong id="sentTo"></strong> &nbsp;<span
                        style="font-size:.72rem;color:#94a3b8;cursor:pointer;" onclick="chgNum()">(Change)</span></p>
                <div class="otp-hint"><i class="fas fa-info-circle"></i> Demo OTP: &nbsp;<strong>1 2 3 4 5 6</strong>
                </div>

                <div class="fg">
                    <label class="lbl"><i class="fas fa-key"></i> Enter 6-digit OTP</label>
                    <div class="orow">
                        <input class="ob" id="o1" type="text" inputmode="numeric" maxlength="1" oninput="oi(this,1)"
                            onkeydown="ok(event,1)">
                        <input class="ob" id="o2" type="text" inputmode="numeric" maxlength="1" oninput="oi(this,2)"
                            onkeydown="ok(event,2)">
                        <input class="ob" id="o3" type="text" inputmode="numeric" maxlength="1" oninput="oi(this,3)"
                            onkeydown="ok(event,3)">
                        <input class="ob" id="o4" type="text" inputmode="numeric" maxlength="1" oninput="oi(this,4)"
                            onkeydown="ok(event,4)">
                        <input class="ob" id="o5" type="text" inputmode="numeric" maxlength="1" oninput="oi(this,5)"
                            onkeydown="ok(event,5)">
                        <input class="ob" id="o6" type="text" inputmode="numeric" maxlength="1" oninput="oi(this,6)"
                            onkeydown="ok(event,6)">
                    </div>
                    <div class="et" id="otpEt"><i class="fas fa-exclamation-circle"></i> Incorrect OTP. Please try again.
                    </div>
                </div>

                <div class="ometa">
                    <span class="otimer" id="timerEl"></span>
                    <button class="rsnd" id="rsndBtn" onclick="doResend()">Resend OTP</button>
                </div>

                <button class="btn btn-primary" id="otpVerifyBtn" onclick="handleOTPVerify()" disabled>
                    <span class="blbl"><i class="fas fa-check-circle"></i> Verify & Login</span>
                    <div class="spin"></div>
                </button>
            </div>

            <!-- initial continue btn for otp -->
            <button class="btn btn-primary" id="otpContBtn" onclick="otpContinue()" style="margin-top:4px;">
                <span class="blbl">Continue &nbsp;<i class="fas fa-arrow-right"></i></span>
                <div class="spin"></div>
            </button>

        </div>

    </div>

    <!-- Card Footer -->
    <div class="card-foot" id="cardFoot">
        <a href="#" class="cf-link"><i class="fas fa-question-circle"></i> Need Help?</a>
        <a href="#" class="cf-link"><i class="fas fa-key"></i> Forgot Password?</a>
    </div>
@endsection