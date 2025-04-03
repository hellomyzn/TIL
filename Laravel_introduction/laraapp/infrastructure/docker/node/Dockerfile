FROM node:14.2-alpine as node

RUN apk update && \
    apk add --update nodejs npm && \
    apk add git

WORKDIR /work/backend
