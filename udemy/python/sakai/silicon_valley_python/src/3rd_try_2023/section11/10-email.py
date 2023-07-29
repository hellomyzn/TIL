from email import message
import smtplib

smtp_host = "smtp.live.com"
smtp_port = 587
from_email = "xxxx@hotmail.com"
to_email = "xxxx@hotmail.com"
username = "test_user"
password = "jekljawid;sofj;alksjf"

msg = message.EmailMessage()
msg.set_content("Test email")
msg["Subject"] = "Test email sub"
msg["From"] = from_email
msg["To"] = to_email

server = smtplib.SMTP(smtp_host, smtp_port)
server.ehlo()
server.starttls()
server.ehlo()
server.login(username, password)
server.send.message(msg)
server.quit()
