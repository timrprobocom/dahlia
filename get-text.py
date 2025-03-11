import sys
from PyPDF2 import PdfReader

reader = PdfReader(sys.argv[1])
for i,page in enumerate(reader.pages):
    print(f"Page {i}:")
    print(page.extract_text())
