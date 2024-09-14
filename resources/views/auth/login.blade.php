<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url('/img/KU_blur.png') no-repeat center center;
    
}
.warpper {
    width: 420px;
    background: transparent;
    color: white;
    border-radius: 15px;
    padding:  60px 50px;
    border: 2px solid rgb(255, 255, 255,.2);
}

.warpper h1{
    font-size: 36px;
    text-align: center;
}
.warpper .input-box{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgb(255, 255, 255,.2);
    border-radius: 40px;
    font-size: 16px;
    color: white;
    padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
    color: #ffffff;
}

.input-box i{
    position: absolute;
    right: 20px;
    top: 30%;
    transform: translate(-50%);
    font-size: 20px;
}

.warpper .forgot{
    display: flex;
    justify-content:space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
}

.forgot a{
    color: white;
    text-decoration: none;
}

.forgot a:hover{
    text-decoration: underline;
}

.warpper .btn{
    width: 100%;
    height: 45px;
    border: none;
    outline: none;
    border-radius: 40px;
    cursor: pointer;
    color: #ffffff;
    font-size: 16px;
    font-weight: 600;
    transition: 0.2s;
    background: transparent;
    border: 2px solid rgb(255, 255, 255,.2);
}
button {
  --bg: #000;
  --hover-bg: #b9ff90;
  --hover-text: #000;
  color: #fff;
  cursor: pointer;
  border: 1px solid var(--bg);
  border-radius: 4px;
  padding: 0.8em 2em;
  background: var(--bg);
  transition: 0.2s;
}

.btn:hover {
  color: var(--hover-text);
  transform: translate(-0.25rem, -0.25rem);
  background: var(--hover-bg);
  box-shadow: 0.25rem 0.25rem var(--bg);
}

.btn:active {
  transform: translate(0);
  box-shadow: none;
}
.warpper .register-link{
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
}
.register-link p a {
    color: white;
    text-decoration: none;
    font-weight: 600;
}
.register-link p a:hover{
    text-decoration: underline;
}
</style>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="warpper">
                                <h1>login</h1>
                                <div class="input-box">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
                                        <i class='bx bxs-envelope' ></i>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-box">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password">
                                        <i class='bx bxs-lock-alt' ></i>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <i class='bx bxs-lock-alt' ></i>
                                    </div>
                            
                                <div class="forgot">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
    
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
    
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="register-link">
                                    <p>Don't have account? <a href="{{ route('register') }}" onclick="location.href='a'">Register</a></p>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
   

