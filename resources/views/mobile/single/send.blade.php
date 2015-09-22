<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Underground Send</title>
</head>
<body>

<form action="{{url('/api/songs/send/')}}" method="POST" enctype="multipart/form-data">

    <input type="text" name="name" value="">

    <input type="text" name="songname" value="">

    <input type="file" name="mp3">

    <input type="text" name="singer" value="">

    <input type="file" name="image">

    <input type="email" name="email">

    <input type="submit" name="send" value="submit">

</form>

</body>
</html>