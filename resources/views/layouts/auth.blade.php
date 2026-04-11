<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'VidyaSetu - School Management System')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .auth-bg {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- ══ ANIMATED BACKGROUND ══ -->
    <div class="bg-wrap">
        <div class="bg-grid"></div>
        <div class="blob b1"></div>
        <div class="blob b2"></div>
        <div class="blob b3"></div>
        <!-- Floating education SVG icons injected by JS -->
        <div class="floats" id="floats"></div>
    </div>

    <!-- ══ PAGE ══ -->
    <div style="display:flex;flex-direction:column;min-height:100vh;position:relative;z-index:1;">
        <div class="page" style="flex:1;">
            <div class="wrap">

                <!-- ══ LEFT ══ -->
                <div class="left">
                    <div class="logo-row">
                        <div class="logo-box">
                            <svg viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <div>
                            <div class="logo-name">Vidya<em>setu</em></div>
                            <div class="logo-tagline">School Management Portal</div>
                        </div>
                    </div>

                    <div>
                        <h2 class="left-headline">Welcome to Your<br><mark>Secure Portal</mark></h2>
                        <p class="left-sub" style="margin-top:14px;">Access your school management dashboard with enterprise-grade
                            security and a seamless experience — from admissions to results.</p>
                    </div>

                    <div class="feature-grid">
                        <div class="feat">
                            <div class="feat-icon fi-blue"><i class="fas fa-shield-halved"></i></div>
                            <div>
                                <div class="feat-title">Secure Access</div>
                                <div class="feat-sub">256-bit SSL encryption</div>
                            </div>
                        </div>
                        <div class="feat">
                            <div class="feat-icon fi-orange"><i class="fas fa-lock"></i></div>
                            <div>
                                <div class="feat-title">Data Privacy</div>
                                <div class="feat-sub">Your data is protected</div>
                            </div>
                        </div>
                        <div class="feat">
                            <div class="feat-icon fi-green"><i class="fas fa-check-circle"></i></div>
                            <div>
                                <div class="feat-title">Verified Platform</div>
                                <div class="feat-sub">Government certified</div>
                            </div>
                        </div>
                        <div class="feat">
                            <div class="feat-icon fi-purple"><i class="fas fa-clock"></i></div>
                            <div>
                                <div class="feat-title">24/7 Available</div>
                                <div class="feat-sub">Access anytime</div>
                            </div>
                        </div>
                    </div>

                    <div class="left-links">
                        <a href="#"><i class="fas fa-user-shield"></i> Privacy Policy</a>
                        <a href="#"><i class="fas fa-file-contract"></i> Terms of Service</a>
                    </div>
                </div>

                <!-- ══ CARD ══ -->
                <div class="card">

                    <!-- SUCCESS -->
                    <div class="suc" id="sucScreen">
                        <div class="tick-ring"><i class="fas fa-check"></i></div>
                        <h2 class="suc-title">Login Successful!</h2>
                        <p class="suc-sub">Welcome back! Your dashboard is ready and waiting.</p>
                        <div class="u-pill">
                            <div class="u-av" id="uAv">RS</div>
                            <div>
                                <div class="u-name">Rajesh Singh</div>
                                <div class="u-info"><i class="fas fa-envelope" style="font-size:.68rem"></i> &nbsp;<span
                                        id="uEmail"></span></div>
                                <div class="u-sch"><i class="fas fa-school" style="font-size:.68rem"></i> &nbsp;DAV Public School, Patna
                                </div>
                            </div>
                        </div>
                        <button class="btn-dash" onclick="goDash()"><i class="fas fa-tachometer-alt"></i> Go to Dashboard</button>
                        <p class="redir">Auto-redirecting in <strong id="cdwn">5</strong>s...</p>
                    </div>

                    <!-- MAIN FORM -->
                    @yield('content')

                </div><!-- /card -->

            </div><!-- /wrap -->
        </div><!-- /page -->

        <!-- PAGE FOOTER -->
        <!-- <footer class="pg-footer">
        <div>© 2024 <strong>Vidyasetu</strong> School Management System. All rights reserved.</div>
        <div style="display:flex;gap:16px;">
            <a href="#"><i class="fas fa-user-shield" style="margin-right:4px;"></i>Privacy</a>
            <a href="#"><i class="fas fa-file-contract" style="margin-right:4px;"></i>Terms</a>
            <a href="#" style="color:var(--orange);font-weight:600;">Technology: Computer Ed.</a>
        </div>
    </footer> -->
    </div><!-- /flex wrapper -->

    <!-- NOTIFICATION -->
    <div class="notif" id="notif">
        <div id="nIcon"></div>
        <div class="ntxt">
            <h4 id="nTitle"></h4>
            <p id="nMsg"></p>
        </div>
    </div>

    @stack('scripts')
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>