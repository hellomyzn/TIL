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

      
COPY <<END_OF_COPY /app/package.json
{     
  "name": "sample",
  "volta": {
    "node": "18.13.0",
    "yarn": "3.3.1"
  }   
}
END_OF_COPY
  
SHELL ["/bin/bash", "-c"]
     
RUN <<END_OF_RUN
VOLTA_HOME=${HOME}/.volta
PATH=${VOLTA_HOME}/bin:${PATH}

for package in 'node' 'yarn'; do
  volta install ${package}
done
END_OF_RUN