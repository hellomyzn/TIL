import logging
import logging.handlers

from email import message
from email.mime import multipart
from email.mime import text
import smtplib

smtp_host = "smtp.live.com"
smtp_port = 587
from_email = "xxxx@hotmail.com"
to_email = "xxxx@hotmail.com"
username = "test_user"
password = "jekljawid;sofj;alksjf"

logger = logging.getLogger('email')
logger.setLevel(logging.CRITICAL)

logger.addHandler(logging.handlers.SMTPHandler(
    (smtp_host, smtp_port), from_email, to_email,
    subject="Admin test log",
    credentials=(username, password),
    secure=(None, None, None),
    timeout=20
))

logger.info("test")
logger.critical("critical")
