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

curl https://get.volta.sh | bash
END_OF_RUN

# 日本語を使用可能にするロケールの設定(Dockerfile)
ENV LANG ja_JP.UTF-8

# 作業ディレクトリの設定
WORKDIR /app

# Volta環境変数を設定
ENV VOLTA_HOME=/root/.volta
ENV PATH=$VOLTA_HOME/bin:$PATH
     
RUN  volta install node \
  npm \
  yarn
