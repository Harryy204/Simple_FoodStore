chạy dự án
đầu tiên là clone git về máy
sau đó mở file trong vscode và bật terminal gõ các lệnh sau
1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. npm install
5. npm run dev
6. tạo cơ sở dữ liệu có tên food_db sau đó import file sql lên
7. php artisan serve

phía clients:
http://127.0.0.1:8000/
phía admin:
tài khoản: admin
mật khẩu: 1
http://127.0.0.1:8000/admin/login
