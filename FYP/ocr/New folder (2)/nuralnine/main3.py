import pytesseract
import PIL.Image
import cv2


myconfig = r"--psm 9 --oem 3"


img = cv2.imread("Opera(2).png")
# gray = cv2.cvtColor(img.cv2.COLOR_BGR2GRAY)
height, width, _ = img.shape

boxes = pytesseract.image_to_boxes(img, config=myconfig)

for box in boxes.splitlines():
    box = box.split(" ")
    img = cv2.rectangle(img, (int(box[1]), height - int(box[2])), (int(box[3]), height - int(box[4])), (0, 255, 0), 2)

cv2.imshow("img", img)
cv2.waitKey(0)