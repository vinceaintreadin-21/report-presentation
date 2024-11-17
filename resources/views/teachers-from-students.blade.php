<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/Main.css')}}">
    <title>Document</title>
</head>
<body>
    
   <div class="student">
    <h1>{{$student->name}}'s Teachers</h1>
   </divc>
   <div class="list">
   
        @foreach ($student->teachers as $teacher)
            {{$teacher->name}}<br>
        @endforeach
    
   </div>
    
</body>
</html>
