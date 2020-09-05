#!/bin/sh
gpg --quiet --batch --yes --decrypt --passphrase="$decryptKey" \
--output $PWD/.env  $PWD/environment/values/env-testing-stage/values.yml.gpg
