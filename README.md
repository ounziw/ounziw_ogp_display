# ounziw_ogp_display
指定したURLのhtmlデータからOGP情報を取得して、ホームページにタイトル・画像・概要を表示する  ([concrete5](https://www.concrete5.org/r/-/12635) 用)

自分のホームページ以外の記事でも取得可能。

## 導入方法
このリポジトリをダウンロードし、concrete5 の packages フォルダに置く。
concrete5 管理画面で有効化する

## 設定
Ogp Display ブロックが追加されるので、ページへのリンクを表示したい箇所にブロックを置く。
ブロックの設定画面で、ページのURLを設定する。
取得対象のページは、OGPがヘッダーに設定されており、かつUTF-8でエンコードされている必要がある。

## 見た目の調整
標準では、bootstrap系のスタイルシートを想定して、htmlクラスなどを設定している。
blocks/ogp_display/view.php をオーバーライドする、カスタムテンプレートを作成する、などで、見た目の変更が可能。

## target="_blank"
リンクに target="_blank" 属性を付けることができる。target="_blank" を設定する場合は、 rel="nofollow noopener noreferrer" も付与する。(view.phpを編集すれば変更可能)

## キャッシュ
Ogp Display ブロックは、6時間キャッシュする。(キャッシュ設定を変更したい場合は、blocks/ogp_display/controller.phpを編集してください)

## 活用事例
このアドオンを使用している例: [月70万ＰＶホームページ制作会社 レスキューワーク株式会社](https://my-mitsu.com/company)

## 対応バージョン
concrete5.8.4.2以降に対応。(8.4.1以前でも、8系なら動く可能性は高いですが、未検証)

## ライセンス
MIT
