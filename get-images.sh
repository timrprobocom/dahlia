#! /bin/bash

if [ ! -f Dahlias$1.pdf ]
then
   echo Usage:  ./get-images.sh 2025
   exit
fi

mkdir -p img$1
cd img$1
echo This takes a minute...
pdfimages ../Dahlias$1.pdf -png dahl

echo Converting to other DPIs...
mkdir -p 300
mkdir -p 150
mkdir -p 75
for i in *.png; do
    echo $i
    convert $i -resize 300x 300/$i
    convert $i -resize 150x 150/$i
    convert $i -resize  75x  75/$i
done

# Could make a zip file, I guess.
echo Copying to server...
scp -C     *.png timrprobocom@timr.probo.com:timr.4roberts.us/dahlia/full
scp -C 300/*.png timrprobocom@timr.probo.com:timr.4roberts.us/dahlia/300
scp -C 150/*.png timrprobocom@timr.probo.com:timr.4roberts.us/dahlia/150
scp -C  75/*.png timrprobocom@timr.probo.com:timr.4roberts.us/dahlia/75

cd ..
