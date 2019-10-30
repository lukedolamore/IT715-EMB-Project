import sys #sys module
from sense_hat import SenseHat #Sense Hat
sense = SenseHat()#Initialization
#Main method 
def main():
    if len(sys.argv) > 1:
        msg = sys.argv[1]
        sense.show_message(msg, text_colour=[255, 255, 255])#To sent a message to the Sense HAT

if __name__ == "__main__":
    main()
