<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-color: black;
        }

        .head{
            border-style:solid;
            text-align:center;
            border-style:dashed;
            background-color: gray;
        }
        form{
            border-style:solid;
            background-color: gray;
            border-style: dashed;
            text-align: center;
        }

    </style>
    <title>Document</title>
</head>
<body>
    <div class="head">
    <h1>Create New</h1>
    </div>
    

    <form action="{{Route('store')}}" method="POST">
        @csrf
        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name">

        <div id="teachers">
            <input type="text" name="teacher[0][name]" placeholder="Teacher Name">
        </div>

        <button type="button" onclick="addTeacher()">Add Another Teacher</button>
        <button type="submit">Create</button>
    </form>

    <Script>
        function addTeacher(){
            const teachersDiv = document.getElementById('teachers');
            const index = teachersDiv.getElementsByTagName('input').length; // Adjust index calculation
            const newTeacher = document.createElement('div');
            newTeacher.innerHTML = `<input type="text" name="teachers[${index}][name]" placeholder="Teacher Name">`;
            teachersDiv.appendChild(newTeacher);
        }
    </Script>
</body>
</html>
