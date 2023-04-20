# Note

AWSの主要サービス一覧
![image](./images/32.png)

AWSのコンピューティング関連のサービス
![image](./images/33.png)

セキュリティグループ VS ネットワークACLs
![image](./images/01.png)

EC2インスタンスの購入オプション
![image](./images/02.png)

覚えておくべき移行関連のAWSサービス
![image](./images/03.png)

EBSのバックアップ方法
![image](./images/04.png)

AWSのデータサービス
![image](./images/05.png)

AWSのメッセージサービス系
![image](./images/06.png)

AWSのゲートウェイ系
![image](./images/07.png)

グローバルリージョン設置
![image](./images/08.png)

それぞれのストレージ
![image](./images/09.png)

S3のデータ容量制限
![image](./images/10.png)

Amazon Aurora
![image](./images/11.png)

Snowball
![image](./images/12.png)

S3タイプ
![image](./images/13.png)
![image](./images/14.png)
![image](./images/15.png)

AWSのリレーショナルデータベース
![image](./images/16.png)

AWSのNoSQL型データベース
![image](./images/17.png)

データベースにおけるアンマネージド VS マネージド
![image](./images/18.png)
![image](./images/19.png)

Sass vs Pass vs Iaas
![image](./images/20.png)

S3 MFA Delete
![image](./images/21.png)

Transfer Acceleration
![image](./images/22.png)

AWS WAF (ウェブアプリケーションファイアウォール)
![image](./images/23.png)

AWSのファイアーウォール関連のサービス
![image](./images/24.png)

Amazon EMR (Amazon Elastic MapReduce)
![image](./images/26.png)

セキュリティの自動検知系サービス
![image](./images/27.png)

分析サービス
![image](./images/28.png)

ロードバランサー
![image](./images/29.png)
![image](./images/30.png)
![image](./images/31.png)

ブロックレベルのストレージ
![image](./images/34.png)

AWS Config
![image](./images/35.png)

AWSのモニタリング系のサービス
![image](./images/36.png)

Amazon EFS
> Amazon Elastic File System (Amazon EFS) は、NASと同じ機能を提供するファイル形式のストレージサービスです。伸縮自在な完全マネージド型の NFS ファイルシステムを提供します。

![image](./images/37.png)


Amazon EC2インスタンスに接続
![image](./images/38.png)


## 用語
### カーブアウト
- 企業が事業の一部を切り出し、その事業を社外事業の1つとして独立させること。
- VPCを利用することで、AWSクラウドの一部をカーブアウトした仮想ネットワークにAWSリソースを起動することが可能
- VPCは、AWSクラウドのネットワークからユーザー専用の領域を切り出すことができる仮想ネットワークサービス

### フェイルオーバー
- 稼働中のシステムで問題が生じてシステムやサーバが停止した際、自動的に待機システムに切り替える仕組み
- RDSにおいてプライマリーデータベースが応答しない場合、RDSのマルチAZ構成によって自動フェイルオーバーが実行される

### リードレプリカ
- 更新用データベース（マスター）からレプリケーションされた参照専用のデータベース
- アプリケーション側で更新用DBと参照用DBを使い分けることで負荷分散可能
- 「リードレプリカのスケールアウト」とは、複数の参照専用DBを作成し、参照トラフィックを分散処理することでマスターDBの負荷を軽減し、DB全体の性能を向上させること
- Amazon RDSはリードレプリカを別リージョンに設置することで、DBの読み取り処理用データベースを冗長化して、コスト最適に災害復旧対応を実現することができます。リードレプリカは読取専用のDBインスタンスの複製です。この機能によって、1 つの DB インスタンスのキャパシティーを伸縮自在にスケールし、読み取り頻度の高いデータベースのワークロードを緩和できます。

![image](./images/25.png)

### プロビジョニング
- 事前に必要なリソース量を予測して準備しておくこと


