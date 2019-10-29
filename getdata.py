import mysql.connector
from sense_hat import SenseHat #Sense HAT 
from datetime import datetime
from time import sleep
sense = SenseHat() #Initialization
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="sensor_data"
)#Mysql db
mycursor = mydb.cursor()
#Method to read in data from the Sense HAT and store it in a database
def readSensor():

    temp = sense.get_temperature()-20#Avg CPU temp causing high readings
    humi = sense.get_humidity()
    pres = sense.get_pressure()
    
    dt = get_timestamp()#Get a time stamp with date and time removing the milliseconds

    temp = round(temp, 1)#Rounding the values to 1 dp
    humi = round(humi, 1)
    pres = round(pres, 1)
    if int(temp) >= 20:#If the temperature is higher or equal to 20 
        sense.show_message("Temp:"+str{temp)+"c", scroll_speed = 0.2, text_colour=[255, 0, 0])#Red
    else:
        sense.show_message("Temp:"+str{temp)+"c", scroll_speed = 0.2, text_colour=[0, 0, 255])#Blue
                                       
    sql = "INSERT INTO sense_data(temperature, humidity, pressure, dt) VALUES (%s, %s, %s, %s)"#SQL statement
    val = (temp, humi, pres, dt)#Values for SQL
    mycursor.execute(sql,val)#EXE SQL statement
    mydb.commit()#SQL
    print(mycursor.rowcount, "record inserted")#Notification 
def get_timestamp():
    dt = datetime.now()#Date time of now
    dt_date = str(dt.date())#spliting the string getting Date only
    dt_time = str(dt.time())#spliting the string getting Time only
    timestamp = "%s %s" % (dt_date, dt_time[:8])#Format time stamp removing ms
    return timestamp
#Main method calls the read sensor method, then displays a message on sense HAT, sleeps for one hour
def main():
    while True:
        readSensor()
        sense.show_message("Recored Inserted", text_colour=[255, 255, 255])
        #time.sleep(30)
        sleep(3600)#Sleep for one hour
 

if __name__ == '__main__':
    main()
