# syntax=docker/dockerfile:1-labs                                                                                                           
FROM debian:stable-slim

RUN <<END_OF_RUN
apt-get update
apt-get install -y --no-install-recommends \
  curl \
  ca-certificates \
  locales-all
apt-get clean
rm -rf /var/lib/apt/lists/*
END_OF_RUN

# 日本語を使用可能にするロケールの設定(Dockerfile)
ENV LANG ja_JP.UTF-8

# 作業ディレクトリの設定
WORKDIR /usr/src/app

# VoltaをインストールしてNode.js環境をセットアップ
RUN curl https://get.volta.sh | bash

# Volta環境変数を設定
ENV VOLTA_HOME=/root/.volta
ENV PATH=$VOLTA_HOME/bin:$PATH

# Node.js, npm, Yarnをインストール
RUN volta install node npm yarn

# 必要なポートを公開
EXPOSE 3000
