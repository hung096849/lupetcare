Chào {{$customer['name']}}
<br><br>
Cảm ơn bạn đã ủng hộ 
<br>
Xin hãy click vào link dưới để hoàn tất quá trình đăng kí!
<br><br>
<a href="{{ env('APP_URL') }}/xac-thuc?code={{$customer['verification_code']}}">Click Here!</a>

<br><br>
Thank you!
<br>
