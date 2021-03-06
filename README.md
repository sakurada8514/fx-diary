# FX日記
![fxdiary](https://user-images.githubusercontent.com/64678118/99176009-6e83dd00-274e-11eb-87c6-cd208a93bfcc.gif)

## 概要
FXトレーダーの為の日記アプリです。  
誰でも簡単にトレード日記をつけることができ
自分の勝率、合計損益、取引通貨・ポジション割合を日記を書くだけで自動で算出してくれます。<br>
記入した日記を共有することでアドバイスをもらったり他のトレーダーの日記を参考にして
さらなるレベルアップにつなげることができます。

## URL
### https://fx-diary.net/ 
上記現在公開しておりません。

## 使用技術
### フロントエンド
- HTML/CSS
- Sass
- JavaScript
- vue.js 2.6.11
  - vue-router 3.4.8
  - vuex 3.5.1
  - axios 0.19
### バックエンド
- PHP 7.3.11
- Laravel 6.18.40
### テスト
- PHPUnit
### 開発環境
- Docker
- Docker-compose
### CICDパイプライン
- GitHub
- CircleCi
- AWS
  - CodePipeline
  - CodeCommit
  - CodeBuild
  - CodeDeploy
  - S3
#### CICDパイプライン構成図
![CICD](https://user-images.githubusercontent.com/64678118/99177637-fe298b80-274e-11eb-8e1a-222aab7e7fca.jpg)

### 本番環境
- AWS
  - VPC
  - EC2
    - Nginx
  - RDS
    - MySQL
  - Route53
  - ACM
  - ALB
  - S3
#### AWS構成図
![AWSインフラ構成図-Page-1](https://user-images.githubusercontent.com/64678118/99177671-4cd72580-274f-11eb-9789-5db473539ab0.jpg)

## 機能一覧
### 認証機能
- 新規登録、ログイン、ログアウト
- googleアカウント登録、ログイン
  - googleAPI使用
- 管理ユーザー機能（Laravel-admin）
  - 全てのユーザー、共有日記を削除、編集可能

### 日記機能
- 日記CRUD機能
  - 画像投稿（AWS S3）
- 日記検索機能
- カレンダー機能

### 分析機能
- トレード勝率、合計損益、取引通貨割合、ポジション割合を日記から自動算出
- 円グラフ描画（vue-chartjs）

### 日記共有機能
- 共有日記CRUD機能
- いいね機能
- コメント機能
- いいね数ランキング表示機能
- プロフィール画像変更機能（AWS S3）

### その他
- シングルページアプリケーション（vue-router）
- 非同期処理（axios）
- ページローデイング表示（vue-loading-template）
- 無限スクロール
- レスポンシブ対応

## 今後実装したい事
- カレンダー機能...ひと目でいつ日記を書いたのか分かるようにカレンダー内に記入数を表示する（追加済）
- 分析機能追加...期間選択や取引通貨別の勝率等表示
- 詳細なテスト、フロント側テスト
