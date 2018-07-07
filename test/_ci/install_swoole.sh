#!/usr/bin/env bash

CURRENT_DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
TRAVIS_BUILD_DIR="${TRAVIS_BUILD_DIR:-$(dirname $(dirname $CURRENT_DIR))}"

wget https://github.com/swoole/swoole-src/archive/v4.0.1.zip
unzip v4.0.1.zip
cd swoole-src-4.0.1
phpize
./configure --enable-async-redis
make && make install