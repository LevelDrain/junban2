### フロントエンドのビルド用ステージ ###
FROM node:18 AS frontend

WORKDIR /app

# package.jsonとvite.config.jsなどをコピー
COPY package*.json vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
COPY public ./public

RUN npm install
RUN npm run build


### Laravel アプリ本体ステージ ###
FROM php:8.2-fpm

# システム依存パッケージをインストール
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libzip-dev libpq-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl bcmath gd

# Composerをコピー（別ステージから）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリ
WORKDIR /var/www

# Laravel本体をコピー
COPY . .

# フロントエンドのビルド成果物を上書き
COPY --from=frontend /app/public/build /var/www/public/build

# Composer install（envはRenderで注入されるので.env不要）
RUN composer install --no-dev --optimize-autoloader

# Laravelのキャッシュディレクトリの準備
RUN mkdir -p storage/framework/{cache,sessions,views} storage/logs \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data .

# 起動コマンド（migrate含める場合）
CMD php artisan config:clear \
    && php artisan route:clear \
    # && php artisan migrate --force \
    && php artisan serve --host=0.0.0.0 --port=8080
