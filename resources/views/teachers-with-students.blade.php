<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Students and Their Teachers</h1>

    @foreach($students as $student)
        <h2>{{$student->name}}'s Teachers</h2>
        <ul>
            @foreach ($student->teachers as $teacher)
                <li style="margin-top: 10px">{{$teacher->name}}</li>
            @endforeach
        </ul>
        <hr>
    @endforeach

    <form action="{{Route('create')}}" method="GET">
        <button type="submit">Create</button>
    </form>
</body>
</html>
