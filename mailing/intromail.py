#! /usr/bin/python3

import os
import csv
import sys
import argparse
import smtplib
import email.utils
import datetime
import pytz

# Usage:
#   ./intromail.py -t xxx.tmpl -n names


DEBUG = False

def get_rfc822():
    tz = pytz.timezone(open('/etc/timezone').read().strip())
    return email.utils.format_datetime(tz.localize(datetime.datetime.now()))

def sendit( tmpl, smtp, row ):
    head['To'] = row
    hdr = '\n'.join( [f'{k}: {v}' for k,v in head.items()] ) + '\n\n'

    msg = hdr + tmpl.format(row)
    if DEBUG:
        print(msg)
        print("------")
    else:
#        recips = [row, FROM]
        recips = [row]
#        smtp.set_debuglevel( 1 )
        smtp.sendmail( FROM, recips, msg )

# Process arguments.

parser = argparse.ArgumentParser( prog='intromail.py' )
parser.add_argument( '-d', '--debug', action='store_true', 
                        help='Enable debug mode')
parser.add_argument( '-g', '--smtp2go', action='store_true', 
                        help='Use smtp2go instead of probo')
parser.add_argument( '-n', '--names', required=True,
                        help='List of email addresses')
parser.add_argument( '-t', '--template', required=True,
                        help='File containing email template to use')

args = parser.parse_args()

# Must specify either list of ids or -a but not both.

DEBUG = args.debug
text = open(args.template).read()
args.john = 'partner' in text

# This could be a mail.rfc822 object...

head = {
    'To': '',
    'From': 'Tim Roberts <timr@probo.com>',
    'Subject': 'Dahlia Duke-Out 2025',
    'Date': get_rfc822(),
}

FROM = "timr@probo.com"

if args.john:
    FROM = "johnp@probo.com"
    head['From'] = 'John Providenza <johnp@probo.com>'
#    FROM = "jprovidenza@yahoo.com"
#    head['From'] = 'John Providenza <jprovidenza@yahoo.com>'

if DEBUG:
    smtp = None
else:
    if args.smtp2go:
        smtp = smtplib.SMTP('mail.smtp2go.com', 587)
    else:
        smtp = smtplib.SMTP('mail.probo.com',587)
    smtp.set_debuglevel(DEBUG)
    smtp.starttls()
    if args.smtp2go:
        smtp.login( 'probo.com', 'pr0b0$c0m' )
    else:
        smtp.login( 'relay', 'S3ndM@1l' )

for row in open(args.names).readlines():
    row = row.strip()
    print("Sent to ", row)
    sendit( text, smtp, row )

if smtp:
    smtp.quit()

