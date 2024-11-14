<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login_style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wraper">
        <div class="form-box login">
            <form action="{{ route('postlogin') }}" method="post">
                <h2>Đăng nhập</h2>
                @if ($errors->has('error'))
                    <div class="alert alert-danger" style="background: none; color: red; border: none">
                        <strong>{{ $errors->first('error') }}</strong>
                    </div>
                @endif
                @csrf
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="email"  value="{{ old('email') }}">
                    <label for="">Tên đăng nhập</label>
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" >
                    <label for="">Mật khẩu</label>
                    @error('password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="remember-forgot">
                    <label for=""><input type="checkbox"> Ghi nhớ mật khẩu</label>
                    <a href="#">Quên mật khẩu?</a>
                </div>

                <button type="submit" name="login">Đăng nhập</button>
                <div class="register-link">
                    <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
