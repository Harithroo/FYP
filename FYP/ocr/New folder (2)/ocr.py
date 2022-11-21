import cv2
import numpy as np
import pytesseract

pytesseract.tesseract_cmd = r'C:\Users\Harithroo\AppData\Local\Programs\Tesseract-OCR\tesseract.exe'

def extract_num():
    myconfig = r"--psm 9 --oem 3"
    img = cv2.imread("Opera(2).png")
    text = pytesseract.image_to_string(img, config=myconfig)
    print(text)
    cv2.imshow("img", img)
    cv2.waitKey(0)

extract_num()

