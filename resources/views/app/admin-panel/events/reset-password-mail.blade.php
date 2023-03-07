<!DOCTYPE html>
<html>
<head>
<style>
    .reset-btn{
        background-color: #3d7cf4;
        border-radius: 3px;
        border: 0!important;
        width: 193px;
        height: 48px;
        color: white !important;
        text-decoration: none;
        padding: 10px;
    }
</style>
</head>
<body>

    <img src="https://joinbayn.com/assets/images/logo-black.png" alt="">

   <h3>Dear {{ $mail_data['name'] }},</h3>
   <p>Click on the following link to reset your password:</p>
   <br>
   <h3>،{{ $mail_data['name'] }} عزيزي</h3>
   <p>:انقر على الرابط التالي لإعادة تعيين كلمة المرور الخاصة بك</p>
   <br>

   <a class="reset-btn" href="{{ route('password-reset-link', ['key'=>$mail_data['key']]) }}">Reset Password</a>

   <br>
   <br>

   <p>***If you have not requested to reset your password, we recommend you ignore the above link and change your password immediately. <br>

    .إذا لم تطلب إعادة تعيين كلمة المرور الخاصة بك، نوصيك بتجاهل الرابط أعلاه وتغيير كلمة المرور الخاصة بك على الفور***</p>

    <br>

    <img src="https://joinbayn.com/assets/images/logo-black.png" alt="">
    <h2>The Bayn Team / فريق بين  </h2>
</body>
</html>
