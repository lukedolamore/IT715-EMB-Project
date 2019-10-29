import sys #sys module
from sense_hat import SenseHat #Sense Hat
sense = SenseHat()#Initialization
#Main method 
def main():
    if len(sys.argv) > 1:
        msg = sys.argv[1]
        sense.show_message(msg, text_colour=[255, 255, 255])#To sent a message to the Sense HAT
        temp = sense.get_temperature()-20#Getting the current tmp, -20 due to CPU AVG temp
        temp = round(temp, 1)#Rounding the value to 1 dp
        print(temp)

if __name__ == "__main__":
    main()
