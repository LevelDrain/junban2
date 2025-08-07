# 病院の順番待ちアプリ

### 概要
診察等の受診希望日時を患者様がスマホから予約できるシステム「JunNavi」（株式会社アイソル）を再現してみた、自作アプリ。

### 本番実装について
さくらのレンタルサーバーを契約していたので、ビルドしたフロントエンドを使用してデプロイを試みた。
しかしながら、node.jsを使えない制約、自由に公開フォルダを替えられない、CSRFの送信先がバックエンドとフロントエンドでずれるなど、
制約が多くてデプロイに詰んだまま一旦停止している。

### フロントエンドパッケージ：
vue ^3.4.0：Vue 3本体
@inertiajs/vue3 ^1.0.0：Vue 3用のInertiaアダプタ
axios ^1.6.4：Inertiaの通信で使用
ziggy-js ^2.5.3：Laravelのルート情報をJS側から使えるようにする
tailwindcss ^3.2.1, @tailwindcss/forms ^0.5.3：スタイリング

### ビルドツール関連：
vite ^5.0：ビルドツール本体
@vitejs/plugin-vue ^5.0.0：Vueファイルを扱うためのViteプラグイン
laravel-vite-plugin ^1.0：LaravelとViteを統合する公式プラグイン
postcss ^8.4.31：TailwindやCSSの構文処理に必要

### Dockerコンテナ内：
Docker ^28.1.1
Docker Desktop ^4.41.2
Laravel本体： ^11.0
Laravel Sanctum： ^4.0
Laravel breeze：^2.0
Laravel Sail ^8.3
MySQL ^8.0
