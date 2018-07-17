#include <Ethernet.h>
#include <SPI.h>
#include <OneWire.h>                
#include <DallasTemperature.h>
#include <Wire.h>
#include "RTClib.h"

int pinLed1 = 4;
int pinLed2 = 5;
const int ldrPin = A0;
const int buzzerPin = 12;
RTC_DS3231 rtc; 

const int analogInPin = A1;
int sensorValue = 0; 
unsigned long int avgValue; 
float b;
int buf[10],temp;

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xEE, 0xFF}; // Direccion MAC
byte ip[] = { 192,168,1,150 }; // Direccion IP del Arduino
byte server[] = { 192,168,1,141};
EthernetClient client; 
 
OneWire ourWire1(2);                //Se establece el pin 2  como bus OneWire
OneWire ourWire2(3);                //Se establece el pin 3  como bus OneWire
 
DallasTemperature sensors1(&ourWire1); //Se declara una variable u objeto para nuestro sensor1
DallasTemperature sensors2(&ourWire2); //Se declara una variable u objeto para nuestro sensor2

void setup() {
  Ethernet.begin(mac, ip);
  pinMode(pinLed1, OUTPUT);
  pinMode(pinLed2, OUTPUT);
  pinMode(ldrPin, INPUT);
  pinMode(buzzerPin, OUTPUT);
  delay(1000);
  Serial.begin(9600);
  sensors1.begin();   //Se inicia el sensor 1
  sensors2.begin();   //Se inicia el sensor 2
  if (! rtc.begin()) {
      Serial.println("No hay un módulo RTC");
    while (1);
  }
}
 
void loop() {
    digitalWrite(pinLed1, LOW);
    sensors1.requestTemperatures();   //Se envía el comando para leer la temperatura
    sensors1.getTempCByIndex(0); //Se obtiene la temperatura en ºC del sensor 1

    sensors2.requestTemperatures();   //Se envía el comando para leer la temperatura
    sensors2.getTempCByIndex(0); //Se obtiene la temperatura en ºC del sensor 2

    Serial.print("t1 = "); Serial.println(sensors1.getTempCByIndex(0));
    Serial.print("t2 = "); Serial.println(sensors2.getTempCByIndex(0));
    if(sensors1.getTempCByIndex(0) && sensors2.getTempCByIndex(0) > 28){    
            digitalWrite(pinLed1, HIGH);  
    }
    ///////////////////////////////LDR y ALARMA////////////////////////////////////////////
    digitalWrite(pinLed2, LOW);
    int valorLDR= analogRead(ldrPin);
    Serial.print("LUMI = "); Serial.print(valorLDR); 
     if(valorLDR > 300){  
      tone(buzzerPin, 100); 
      digitalWrite(pinLed2, HIGH);
      delay(1000); 
      noTone(buzzerPin);
      digitalWrite(pinLed2, LOW);
      Serial.println(" ALARMA ACTIVADA ");
      }else{
        noTone(buzzerPin);
        digitalWrite(pinLed2, LOW);
        Serial.println("   ALARMA DESACTIVADA");
      }
    delay(5000); 
///////////////////////////////RELOJ////////////////////////////////////////////
       DateTime now = rtc.now();
       Serial.print(now.day()); Serial.print('/');
       Serial.print(now.month()); Serial.print('/');
       Serial.print(now.year()); Serial.print(" ");
       Serial.print(now.hour()); Serial.print(':');
       Serial.print(now.minute()); Serial.print(':');
       Serial.println(now.second());

////////////////////////// SENSOR PH ///////////////////////////////////////
for(int i=0;i<10;i++) { 
    buf[i]=analogRead(analogInPin);
    delay(10);
  }
    for(int i=0;i<9;i++){
      for(int j=i+1;j<10;j++){
        if(buf[i]>buf[j]) {
            temp=buf[i];
            buf[i]=buf[j];
            buf[j]=temp;
        }
      }
    }
            avgValue=0;
             for(int i=2;i<8;i++)
                avgValue+=buf[i];
                float pHVol=(float)avgValue*5.0/1024/6;
                float phValue = -5.70 * pHVol + 11.50;
                Serial.print("PH = ");Serial.println(phValue); 

//////////////////////////////////////////////////////////////////////////
////////////////////////// SENSOR ODA ///////////////////////////////////////
      float valorSensor;
        float voltajeSensor; 
        float Valor_O2;
        valorSensor = analogRead(A1);
        voltajeSensor =(valorSensor/1024)*5.0;
        Valor_O2 = voltajeSensor*10.94/2.47;
        Serial.print("ODA = "); Serial.println(Valor_O2,1); 
        delay(1000); //Se provoca un lapso de 1 segundo antes de la próxima lectura
  ///////////////////////// CONEXION ///////////////////////////////////////////
  Serial.println("Connecting...");
    if (client.connect(server, 80)>0) {  // Conexion con el servidor
        client.print("GET /Sarduino/models/servidor.php?t1="); // Enviamos los datos por GET
        client.print(sensors1.getTempCByIndex(0));
        client.print("&t2=");
        client.print(sensors2.getTempCByIndex(0));
        client.print("&ilumi=");
        client.print(valorLDR);
        client.print("&dia=");
        client.print(now.day());client.print('/');
        client.print("&mes=");
        client.print(now.month());client.print('/');
        client.print("&anio=");
        client.print(now.year());
        client.print("&ph=");
        client.print(phValue);
        client.print("&oda=");
        client.print(Valor_O2,1);

        client.println(" HTTP/1.0");
        client.println("User-Agent: Arduino 1.0");
        client.println();
        Serial.println("Conectado");
    } else {
        Serial.println("Fallo en la conexion");
    }
        if (!client.connected()) {
            Serial.println("Disconnected!");
        }
    client.stop();
    client.flush();
    delay(3000); // Espero un minuto antes de tomar otra muestra                    
}

