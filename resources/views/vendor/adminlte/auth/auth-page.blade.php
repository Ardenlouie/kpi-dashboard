@extends('adminlte::master')



 <style>
        body, html {
            height: 100%;
            margin: auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('/images/kpidashboardlogo.png') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0); /* optional dark overlay */
        }

        .login-container {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            display: flex;
            width: 800px;
            max-width: 95%;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .login-image {
            width: 50%;
            background: url('/images/kpidashboardlogo3.png') no-repeat center center;
            background-size: cover;
        }

        .login-form {
            width: 50%;
            padding: 40px;
        }

        .login-form h2 {
            margin-bottom: 30px;
            font-size: 28px;
            text-align: center;
        }

        .login-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .login-form button {
            width: 100%;
            padding: 12px;
            background-color: #3490dc;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #2779bd;
        }

        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
            }

            .login-image {
                display: none;
            }

            .login-form {
                width: 100%;
            }
        }
    </style>


@section('body')

    <div class="overlay"></div>
    <div class="login-container">
        <div class="login-card">
            <div class="login-image"></div>
            <div class="login-form">
                <img src="{{asset('images/kpi-logo-nobg2.png')}}" alt="product photo" class="product-img" height="100" width="300">
                <h2>Login</h2>
                <form action="{{ $login_url }}" method="post">

                    @csrf
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
