<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download Count</title>
</head>
<body>

<form action="{{url('/backend/admin/mobile/songs/api/getcount',$singlemusic -> id)}}" method="post">



    <input type="submit" name="download" value="count">



</form>

</body>
</html>