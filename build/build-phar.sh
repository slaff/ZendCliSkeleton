#!/bin/bash

# Build script that automates the clean compilation of new phar file.

CWD=`dirname $0`
PWD=`pwd`
cd $CWD

BRANCH=`git rev-parse --abbrev-ref HEAD`
GIT_URL=`git remote -v | awk {'print $2'} | head -n 1`
if [ "$BRANCH" == "" ]; then
	read -p "Which branch to use(master or ...)?" BRANCH
fi

echo "Using branch: $BRANCH";

cd /tmp
TMP_DIR=`mktemp -d`
echo "Created temp directory $TMP_DIR."
cd $TMP_DIR

echo "Cloning code from $GIT_URL"
git clone $GIT_URL zf-cli
cd zf-cli/
git checkout $BRANCH
wget http://getcomposer.org/composer.phar
php composer.phar install --no-dev
# Update the library to the latest git version from master
php build/phar.php cli

read -p "Do you want to commit-n-push the newly compiled phar file (Y/n)?" RESULT
if [ "$RESULT" != "n" ]; then
	git commit -a -m "Compiled new phar file."
	if [ $? -eq 0 ]; then
		git push origin $BRANCH
	else 
		echo "Nothing to commit" 	 
	fi	
fi

read -p "Do you want to delete the temp directory '$TMP_DIR' (Y/n)?" RESULT
if [ "$RESULT" != "n" ]; then
	rm -rf "$TMP_DIR"	
fi 
cd $PWD
