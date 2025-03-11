#! /bin/bash

if [ ! -f Dahlias$1.pdf ]
then
   echo Usage:  ./get-images.sh 2025
   exit
fi

mkdir -p img$1
cd img$1
echo This takes a minute...
# pdfimages ../Dahlias$1.pdf -png dahl
echo Converting to other DPIs...
mkdir -p 300
mkdir -p 150
mkdir -p 75
for i in *.png; do
    echo $i
    convert $i -resize 300x 300/$i
    convert $i -resize 150x 300/$i
    convert $i -resize 75x 300/$i
done
cd ..
