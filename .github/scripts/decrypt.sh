#!/bin/sh
gpg --quiet --batch --yes --decrypt --passphrase="$decryptKey" \
--output $PWD/.env  $PWD/environment/values/test/values.yml.gpg
