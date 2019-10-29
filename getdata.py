import mysql.connector
from sense_hat import SenseHat
from datetime import datetime
from time import sleep
sense = SenseHat()
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="sensor_data"
)
mycursor = mydb.cursor()
def readSensor():

    temp = sense.get_temperature()-20
    humi = sense.get_humidity()
    pres = sense.get_pressure()
    
    dt = get_timestamp()

    temp = round(temp, 1)
    humi = round(humi, 1)
    pres = round(pres, 1)
    
    #values = (temp,humi,pres,dt)

    #cursor.execute("INSERT INTO sense_data (temperature, humidity, pressure, dt) VALUES (%s, %s, %s, %s)", values)
    #db.commit()
    sql = "INSERT INTO sense_data(temperature, humidity, pressure, dt) VALUES (%s, %s, %s, %s)"
    val = (temp, humi, pres, dt)
    mycursor.execute(sql,val)
    mydb.commit()
    print(mycursor.rowcount, "record inserted")
def get_timestamp():
    dt = datetime.now()
    dt_date = str(dt.date())
    dt_time = str(dt.time())
    timestamp = "%s %s" % (dt_date, dt_time[:8])
    return timestamp

def main():
    while True:
        readSensor()
        sense.show_message("Recored Inserted", text_colour=[255, 255, 255])
        #time.sleep(30)
        sleep(3600)
 

if __name__ == '__main__':
    main()
