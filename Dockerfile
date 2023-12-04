FROM php:7.0.33-fpm

# 소프트웨어 소스 리스트 변경
RUN echo "deb http://archive.debian.org/debian stretch main" > /etc/apt/sources.list

# 필요한 추가 패키지 및 라이브러리 설치
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    webp

# PHP 확장 모듈 설치
RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ --with-freetype-dir=/usr/include/ --with-webp-dir=/usr/include/  # WebP 지원 추가
RUN docker-php-ext-install mysqli zip gd

# PHP
CMD ["php-fpm"]
