#include<WiFi.h>
#include<HTTPClient.h>

int trig=26;
int echo=27;
int red=14;
int b=12;

const char* ssid="CANALBOX-B82B-2G";
const char* password="RybPFZCSDCDE";

String serverName="HTTP://192.168.1.99/giggs/save.php";

void setup(){
  Serial.begin(9600);
  WiFi.begin(ssid,password);
  Serial.print("connecting");
  while(WiFi.status() != WL_CONNECTED){
    delay(500);
    Serial.print(".");    
  }
  Serial.print(WiFi.localIP());
  Serial.print("connected");

  pinMode(red,OUTPUT);
  pinMode(b,OUTPUT);
  pinMode(trig,OUTPUT);
  pinMode(echo,INPUT);
} 
void loop() {

  digitalWrite(trig,LOW);
  delayMicroseconds(2);
  digitalWrite(trig,HIGH);
  delayMicroseconds(10);
  digitalWrite(trig,LOW);

  int distance=pulseIn(echo,HIGH) * 0.034/2;

  Serial.print("distance: ");
  Serial.print(distance );
  Serial.println(" cm ");

  if(distance<10){
  digitalWrite(red,HIGH);
  digitalWrite(b,HIGH);
  
}else{
  digitalWrite(red,LOW);
  digitalWrite(b,LOW);
}

if(WiFi.status() == WL_CONNECTED){
  HTTPClient http;
  String url= serverName+ "?distance=" +String(distance);
  http.begin(url);
  int httpResponseCode=http.GET();
  Serial.print("ResponseCode: ");
  Serial.println(httpResponseCode);
  http.end();

}
delay(2000);
}


