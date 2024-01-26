# mogi_3

#環境構築

#アプリケーション名

メルカリ風アプリ

#目的

商品の出品及び購入

#アプリケーションURL

http://127.0.0.1

#機能一覧
会員登録
ログイン
ログアウト
商品一覧取得
商品詳細取得
ユーザ商品お気に入り一覧取得
ユーザ情報取得
ユーザ購入商品一覧取得
ユーザ出品商品一覧取得
プロフィール変更
商品お気に入り追加
商品お気に入り削除
商品コメント追加
商品コメント削除
出品
購入
配送先変更
メール送信
管理者機能
店舗代表者機能

#使用技術
laravel8.83.27


1 docker環境構築（docker-compose up -d --build）

２ vendorファイルインストール(composer update(phpコンテナ内） * エラー発生時は「--ignore-platform-req=ext-gd」追加して実行)

3 .envファイル作成（touch .envにてファイル作成後、以下項目を更新）

DB_DATABASE=laravel_db

DB_USERNAME=laravel_user

DB_PASSWORD=laravel_pass

MAIL_FROM_ADDRESS=info@example.com

4 migration(docker-compose php artisan migrate(phpコンテナ内）)

5 seeding(docker-compose php artisan db:seed(phpコンテナ内）)

6 storageリンク作成 (php artisan storage:link(phpコンテナ内）)

7 src/storage/app/publicに、以下URLの３フォルダを格納

https://drive.google.com/drive/folders/1SdU_ij84sd77fgcL6iNAKMYtQVPHKbuq?usp=sharing

#その他(サンプルID(パスワード))

ユーザー：shaftsbury_works@yahoo.co.jp(password)

店鋪代表者：CC_STORE(password)　*/master/loginからログイン

サイト管理者：admin(password)　*/admin/loginからログイン