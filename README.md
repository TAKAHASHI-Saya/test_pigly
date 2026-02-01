# test_pigly（体重管理アプリ）

## 開発環境
**Dockerビルド**
1. `git clone git@github.com:TAKAHASHI-Saya/test_pigly.git`
2. DockerDesktopアプリを立ち上げる
3. `docker-compose up -d --build`

**Laravel環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. `cp .env.example .env`
4. .envに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=pigly_db
DB_USERNAME=pigly_user
DB_PASSWORD=pigly_pass
```
5. アプリケーションキーの作成
``` bash
php artisan key:generate
```
6. マイグレーションの実行
``` bash
php artisan migrate
```
7. シーディングの実行
``` bash
php artisan db:seed
```

## 使用技術
- PHP 8.1.34
- Laravel Framework 8.83.29
- MySQL 8.0.26

## ER図
![ER図](./er.drawio.png)
``` text
本アプリでは、目標体重は常に1つのみ保持する仕様のため、usersとweight_targetsは、「1対1」の関係としています。
```

## URL
- 新規会員登録画面：http://localhost/register
- ログイン画面：http://localhost/login

## テスト用ログイン情報（ダミーデータ）
以下のユーザーは `db:seed` 実行後に作成されます。
- メールアドレス：test@example.com
- パスワード：test1234
