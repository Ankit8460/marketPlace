<p>Hello {{$data["customer"]["customer_fname"]}}</p>
<p>You have requested password reset.</p>
<p>Please click <a href="{{$data["emailLink"]}}">here</a> to reset password</p>
<p>If above link dosen't work Please copy below url to browser</p>
<a href="{{$data["emailLink"]}}">{{$data["emailLink"]}}</a>