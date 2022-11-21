import pytesseract
import PIL.Image
import cv2


myconfig = r"--psm 9 --oem 3"

text = pytesseract.image_to_string(PIL.Image.open("Opera(2).png"), config=myconfig)
print(text)

