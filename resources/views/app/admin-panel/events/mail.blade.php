<!DOCTYPE html>
<html>
<head>

</head>
<body>
   <h3>New Member Joined</h3>
   Name : {{$mail_data['name'] ?? ''}}.<br>
   Email : {{$mail_data['email'] ?? ''}}.<br>
   Message : {{$mail_data['message'] ?? ''}}.<br>
   Service : {{$mail_data['service'] ?? ''}}.<br>
   Event : {{$mail_data['event'] ?? ''}}.<br>
   Joined At : {{$mail_data['joined_at'] ?? ''}}.<br>
</body>
</html>
