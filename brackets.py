import os
import sys
import sqlite3

db = sqlite3.connect("dahlias.db")
db.row_factory = sqlite3.Row

cursor = db.cursor()
qry = cursor.execute("SELECT * FROM dahlias WHERE division IS NOT NULL ORDER BY division, seed;")
teams = qry.fetchall()

# Sort them by pairings.
mapping = [ -1, 0, 2, 4, 6, 7, 5, 3, 1 ]
teams.sort( key=lambda rec: (rec['division'],mapping[int(rec['seed'])]) )
#for i in teams:
#    print(dict(i))

from reportlab.pdfgen import canvas
from reportlab.lib.units import inch
from reportlab.lib.pagesizes import LETTER,landscape
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.ttfonts import TTFont

pdfmetrics.registerFont( TTFont( 'Arial', 'arial.ttf'))
#pdfmetrics.registerFont( TTFont( 'Narrow', 'arialn.ttf'))
#pdfmetrics.registerFont( TTFont( 'ArialBlack', 'ariblk.ttf'))

pagesize = landscape(LETTER)

WIDTH,HEIGHT = pagesize

# Print a dahlias.  Origin should be set to the lower left of the box.
# We have 7 box columns and 6 bracket columns.

BOXW = (pagesize[0] - 72 - 6 * 24) / 7
UNITH = (pagesize[1]-72) / 15

columns = [0]
for i in range(3):
    columns.append( columns[-1] + BOXW )
    columns.append( columns[-1] + 24 )

# Bottom of the box.

rows = [pagesize[1] - 36 - UNITH]
for i in range( 15 ):
    rows.append( rows[-1] - UNITH )




def drawteam(canvas, data):
    canvas.rect( 0, 0, BOXW, UNITH )
    canvas.setFont('Arial', 7 )

    if data:
        canvas.drawString( 2, 26, data['name'] )
        canvas.drawString( 2, 15, data['originator'] )
    canvas.drawString( 2,  4, "Score: _______" )

def drawbracket( canvas, x, y, h, lr='l' ):
    y += UNITH/2
    dx = 12 if lr == 'l' else -12
    midy = h/2
    if h == 8*UNITH:
        midy += UNITH if lr == 'l' else -UNITH
    canvas.line( x-dx, y,     x,    y )
    canvas.line( x,    y,     x,    y+h )
    canvas.line( x-dx, y+h,   x,    y+h )
    canvas.line( x,    y+midy,x+dx, y+midy )

# Draw a bracket, left-to-right.

def bracket( canvas, lr, x, y, teams, region ):

    mycols = columns[:] if lr == 'l' else columns[::-1]
    canvas.setFont('Arial',11)
    canvas.drawString( x+mycols[3]-36, 16*UNITH, region + " Region" )

    # Column 1.

    myteams = [t for t in teams if t['division'] == region]
    x0 = x + mycols[0]

    for i, team in enumerate(myteams):
        y0 = y + (14 - i - i) * UNITH
        canvas.saveState()
        canvas.translate( x0, y0 )
        drawteam( canvas, team )
        canvas.restoreState()

    # Column 2.

    x0 = x + mycols[1]+12
    drawbracket( canvas, x0, y+ 0*UNITH, 2*UNITH, lr )
    drawbracket( canvas, x0, y+ 4*UNITH, 2*UNITH, lr )
    drawbracket( canvas, x0, y+ 8*UNITH, 2*UNITH, lr )
    drawbracket( canvas, x0, y+12*UNITH, 2*UNITH, lr )

    # Column 3.

    x0 = x + mycols[2]
    for i in range(4):
        y0 = y + (13 - i * 4) * UNITH
        canvas.saveState()
        canvas.translate( x0, y0 )
        drawteam( canvas, None )
        canvas.restoreState()

    # Column 4.

    x0 = x + mycols[3]+12
    drawbracket( canvas, x0, y+ 1*UNITH, 4*UNITH, lr )
    drawbracket( canvas, x0, y+ 9*UNITH, 4*UNITH, lr )

    # Column 5.

    x0 = x + mycols[4]
    for i in range(2):
        y0 = y + (11 - i * 8) * UNITH
        canvas.saveState()
        canvas.translate( x0, y0 )
        drawteam( canvas, None )
        canvas.restoreState()

    # Column 6.

    x0 = x + mycols[5]+12
    drawbracket( canvas, x0, y+ 3*UNITH, 8*UNITH, lr )


# Set up the output pdf.

canvas = canvas.Canvas( 'brackets.pdf', pagesize=pagesize )
canvas.setPageCompression( 0 )
canvas.setLineJoin(1)
canvas.setLineCap(1)

bracket( canvas, 'l', 36, 36, teams, "North" )
bracket( canvas, 'r', pagesize[0]/2-40, 36, teams, "West" )
canvas.saveState()
canvas.translate( 36+columns[6], 36+UNITH*6 )
drawteam( canvas, None )
canvas.translate( 0, UNITH*2 )
drawteam( canvas, None )
canvas.restoreState()
canvas.showPage()

bracket( canvas, 'l', 36, 36, teams, "South" )
bracket( canvas, 'r', pagesize[0]/2-40, 36, teams, "East" )
canvas.saveState()
canvas.translate( 36+columns[6], 36+UNITH*6 )
drawteam( canvas, None )
canvas.translate( 0, UNITH*2 )
drawteam( canvas, None )
canvas.restoreState()
canvas.showPage()

canvas.save()

#os.system('brackets.pdf')
