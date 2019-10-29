import sys
from sense_hat import SenseHat
sense = SenseHat()

def main():
    if len(sys.argv) > 1:
        msg = sys.argv[1]
        sense.show_message(msg, text_colour=[255, 255, 255])
        temp = sense.get_temperature()-20
        temp = round(temp, 1)
        print(temp)

if __name__ == "__main__":
    main()