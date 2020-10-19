#!/bin/bash

set -e
. "`dirname "${0}"`/../source/brltty-prologue.sh"
shopt -s nullglob

defaultWebsiteRoot="${programDirectory}/.."
defaultDocumentRoot="home/doc"
defaultSourceRoot="source"

addOption_websiteRoot() {
   addProgramOption w string.directory websiteRoot "top-level of the website repository" "${defaultWebsiteRoot}"
}

checkOption_websiteRoot() {
   [ -n "${websiteRoot}" ] || websiteRoot="${defaultWebsiteRoot}"
   verifyInputDirectory "${websiteRoot}"
   websiteRoot="$(resolveDirectory "${websiteRoot}")"
}

addOption_documentRoot() {
   addProgramOption d string.directory documentRoot "top-level of the document hierarchy" "${defaultDocumentRoot}"
}

checkOption_documentRoot() {
   [ -n "${documentRoot}" ] || documentRoot="${websiteRoot}/${defaultDocumentRoot}"
   verifyInputDirectory "${documentRoot}"
   [ "${documentRoot#/}" != "${documentRoot}" ] || documentRoot="${websiteRoot}/${documentRoot}"
}

addOption_sourceRoot() {
   addProgramOption s string.directory sourceRoot "top-level of the source repository" "${defaultSourceRoot}"
}

checkOption_sourceRoot() {
   [ -n "${sourceRoot}" ] || sourceRoot="${websiteRoot}/${defaultSourceRoot}"
   verifyInputDirectory "${sourceRoot}"
   [ "${sourceRoot#/}" != "${sourceRoot}" ] || sourceRoot="${websiteRoot}/${sourceRoot}"
}

addOption_testMode() {
   addProgramOption t flag testMode "Echo (rather than execute) the commands"
}

executeHostCommand() {
   if "${testMode}"
   then
      programMessage "host command: ${*}"
   else
      "${@}"
   fi
}

