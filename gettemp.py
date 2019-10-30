import sys
from sense_hat import SenseHat
sense = SenseHat()
def main():
    temp = sense.get_temperature()-20#Temp -20 for avg CPU temp
    temp = round(temp, 1)
    print(temp)

if __name__ == "__main__":
    main()