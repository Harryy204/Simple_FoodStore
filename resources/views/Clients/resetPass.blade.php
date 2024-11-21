<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login_style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wraper">
        <div class="form-box login">
            <form action="{{ route('postResetPass') }}" method="post">
                <h2>Đặt lại mật khẩu</h2>
                
                @if ($errors->has('error'))
                    <div class="alert alert-danger" style="background: none; color: red; border: none">
                        <strong>{{ $errors->first('error') }}</strong>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" style="background: none; color: rgb(31, 253, 31); border: none">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif

                @csrf
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" value="{{ old('email') }}" >
                    <label for="">Email của bạn</label>
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" >
                    <label for="">Mật khẩu mới</label>
                    @error('password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password_confirmation" >
                    <label for="">Xác nhận mật khẩu</label>
                    @error('password_confirmation')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" name="reset">Cập nhật mật khẩu</button>

                <div class="register-link">
                    <p>Đã có tài khoản? <a href="{{ route('client.login') }}">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
