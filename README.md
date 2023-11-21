# mogi_3




環境構築
1 docker環境構築(docker-compose up -d --build)
2 composer create-project "laravel/laravel=8.*" . --prefer-dist
3 .envファイル作成
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
MAIL_FROM_ADDRESS=info@example.com
STRIPE_PUBLIC_KEY=pk_test_51OB9QSJlNFTbQ7nRiRRyrwrK4aapNZaGa5NsfBEL0TWHBW0smd24c4p4jzWvFduiULuvPS5Kgf7AMiUdDlhpLOUr00BLogQjZQ
STRIPE_SECRET_KEY=sk_test_51OB9QSJlNFTbQ7nRoCF7ZoekDi4zMhqFVS62vtgaIw29gY2aOURubB9TAPdYRWO2Sp60RgOrWAaE86U4VqdhOnlc00HuYt0KCa
