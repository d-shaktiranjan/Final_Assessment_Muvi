## Go to C:\xampp\php and open the php.ini file.

```ini
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = name@domain.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
```

## Now, go to C:\xampp\sendmail and open the sendmail.ini file.

```ini
smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=name@domain.com
auth_password=PASSWORD_HERE
force_sender=name@domain.com(optional)
```