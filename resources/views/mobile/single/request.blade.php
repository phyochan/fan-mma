<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Songs</title>
</head>
<body>



<form action="{{url('/api/songs/request/')}}" method="POST">

    <input type="text" name="songname" value="">

    <input type="text" name="name" value="">

    <input type="text" name="email" value="">

    <input type="text" name="singer" value="">

    <input type="submit" value="submit" name="request">

</form>




</body>
</html>