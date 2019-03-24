# インスタグラムもどき

---------

### 概要  

インスタグラムのような画像投稿型SNSです。  
ログインするには、GitHubアカウントが必要です。  
ログイン後、投稿ページから投稿することができます。  
投稿時、画像は60MB以下、キャプションは200文字以下で投稿できます。  

heroku url: https://like-insta.herokuapp.com  
コードのGitHub url:https://github.com/hyora2/like-instagram  

----------

### 実装できたもの

・共通ヘッダー  
・ログイン画面  
・ホーム画面  
  ユーザ名、投稿画像、キャプション、いいねしたユーザー、投稿削除ボタン  
  いいねボタン（未ログイン時ではボタン自体を表示させない、ログイン時では「いいね」の文字表示が切り替わる）  
  投稿が１０件以上あれば前へ、次へのページネーション機能  
・投稿画面  
・プロフィール画面  
・いいねしたユーザー一覧画面  

---------

### 実装できなかったもの

・投稿ページでの画像選択時、選択した画像がプレビュー表示される機能  
・ログイン済の状態でアクセスした場合のホーム画面へのリダイレクト機能  
  （ログイン済状態時に/welcomeにアクセスしても/homeへリダイレクトされない）  
・https時スタイルシートが反映されてない点  

----------

### 工夫した部分

・投稿画像が真ん中になるようにしてあります。  
・画像の比率が変わらずに拡大、縮小するようにしました。  
・ログイン中のユーザーのプロフィール画面へ行く「マイページ」ボタンをヘッダーバーに追加しました。未ログイン時はログイン画面にリダイレクトします。  
・プロフィール画面で、投稿画像の表示が3*n表示になるようにしました。  

----------

### 難しかったところ

・画像を中央に表示させる点、元画像の比率を保ったまま表示させることが難しかったです。  
・LaravelのコントローラーとModelの使い分けが難しいと感じました。  
