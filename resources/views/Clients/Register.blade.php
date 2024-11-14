<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login_style.css') }}" rel="stylesheet">
</head>
<style>


.wraper {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 100%;
    max-width: 1000px;
    height: auto;
    background: rgba(0, 0, 0, 0.6);
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.form-row {
    display: flex;
    justify-content: space-between;
    gap: 20px; 
}

.form-column {
    width: 48%; 
}

</style>
<body>
    <div class="wraper register">
        <div class="form-box register">
            <form action="{{ route('postregister') }}" method="post">
                @csrf
                <h2>Đăng ký</h2>
                @if (session('success'))
                    <div class="alert alert-success" role="alert" style="background: none; color: rgb(31, 253, 31); border: none">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="form-row">
                    <div class="form-column">
                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" value="{{ old('email') }}">
                            <label for="">Email</label>
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-phone"></i></span>
                            <input type="text" name="phone" value="{{ old('phone') }}">
                            <label for="">Số điện thoại</label>
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        

                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="fullname" value="{{ old('fullname') }}">
                            <label for="">Tên đầy đủ</label>
                            @error('fullname')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="form-column">
                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password">
                            <label for="">Mật khẩu</label>
                            @error('password')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="repassword">
                            <label for="">Xác nhận mật khẩu</label>
                            @error('repassword')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-home"></i></span>
                            <input type="text" name="address" value="{{ old('address') }}">
                            <label for="">Địa chỉ</label>
                            @error('address')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                       
                    </div>
                </div>

                <div class="remember-forgot">
                    <label for=""><input type="checkbox"> Tôi chấp nhận chính sách và điều khoản người dùng</label>
                </div>

                <button type="submit" name="register">Đăng ký</button>

                <div class="register-link">
                    <p>Bạn đã có tài khoản? <a href="{{ route('client.login') }}">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
