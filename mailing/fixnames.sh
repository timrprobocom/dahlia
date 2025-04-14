#! /bin/bash

# This script produces on stdout the list of email addresses in the NEW file that
# are not present in the LAST file.

LAST=names2024.txt
NEW=club-mailing.txt

tr "[A-Z]" "[a-z]" < $LAST | grep -o  "<.*>" | tr -d "<>" | sort > temp1
tr "[A-Z]" "[a-z]" < $NEW | sort | uniq > temp2
diff temp1 temp2 | grep "^>" | cut -c 3- 
rm temp1 temp2


# Now run
# python intromail.py -t mail-last.tmpl -n names2024.txt
# python intromail.py -t mail-new.tmpl -n club-not-2024.txt
