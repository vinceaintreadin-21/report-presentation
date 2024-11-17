<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('styles/Main.css')}}">
</head>
<body>
    <div class="head">
    <h1>Students and Their Teachers</h1>
    </div>
    <div>
    @foreach($students as $student)
        <h2>{{$student->name}}'s Teachers</h2>
            @foreach ($student->teachers as $teacher)
                <li style="margin-top: 10px">{{$teacher->name}}</li>
            @endforeach
        <hr>
    @endforeach
    </div>
    <div>
    <form action="{{Route('create')}}" method="GET">
        <button type="submit">Create</button>
    </form>
    </div>
</body>
</html>
