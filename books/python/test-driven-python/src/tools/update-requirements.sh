#!/bin/bash

PRJ_ROOT=$HOME/src

function main() {
    echo "Updating requirements.txt under ${PRJ_ROOT}"
    rm -f "${PRJ_ROOT}/requirements.txt"
    poetry export --without-hashes -o "${PRJ_ROOT}/requirements.txt"
}

main "${*}"
