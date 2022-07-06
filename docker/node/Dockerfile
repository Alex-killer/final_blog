FROM node:14.2.0-alpine

ENV PATH=$PATH:/home/node/.npm-global/bin
ENV NPM_CONFIG_PREFIX=/home/node/.npm-global

RUN apk add --update --no-cache \
    libtool \
    bash \
    make \
    npm \
    automake \
    autoconf  \
    build-base \
    zlib \
    zlib-dev \
    libpng \
    libpng-dev \
    libwebp \
    libwebp-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    nasm \
    build-base \
  && rm -rf /tmp/* /var/cache/apk/*

CMD ["npm", "start"]
