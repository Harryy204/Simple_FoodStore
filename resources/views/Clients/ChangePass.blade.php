<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login_style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wraper">
        <div class="form-box login">
            <form action="{{ route('postChangePass') }}" method="POST">
                <h2>Đổi mật khẩu</h2>
                
                @if (session('error'))
                    <div class="alert alert-danger" style="background: none; color: red; border: none">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" style="background: none; color: rgb(31, 253, 31); border: none">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif

                @csrf

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="old_password" placeholder="Nhập mật khẩu cũ">
                    @error('old_password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="new_password" placeholder="Nhập mật khẩu mới">
                    @error('new_password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="new_password_confirmation" placeholder="Xác nhận mật khẩu mới">
                    @error('new_password_confirmation')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="remember-forgot">
                    <a href="{{ route('thongTinUser') }}">Về trang thông tin</a>
                </div>

                <button type="submit" name="change_password">Cập nhật mật khẩu</button>
            </form>
        </div>
    </div>
</body>

</html>
