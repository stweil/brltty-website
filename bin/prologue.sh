#!/bin/bash
. "`dirname "${0}"`/../source/brltty-prologue.sh"
shopt -s nullglob

defaultWebsiteRoot="${programDirectory}/.."
defaultSourceRoot="source"

addOption_websiteRoot() {
   addProgramOption w string.directory websiteRoot "top-level of website repository" "${defaultWebsiteRoot}"
}

checkOption_websiteRoot() {
   [ -n "${websiteRoot}" ] || websiteRoot="${defaultWebsiteRoot}"
   verifyInputDirectory "${websiteRoot}"
   websiteRoot="$(resolveDirectory "${websiteRoot}")"
}

addOption_sourceRoot() {
   addProgramOption s string.directory sourceRoot "top-level of source repository" "${defaultSourceRoot}"
}

checkOption_sourceRoot() {
   [ -n "${sourceRoot}" ] || sourceRoot="${websiteRoot}/${defaultSourceRoot}"
   verifyInputDirectory "${sourceRoot}"
   [ "${sourceRoot#/}" != "${sourceRoot}" ] || sourceRoot="${websiteRoot}/${sourceRoot}"
}

