<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Create user</h2>
<form action="/issue/create" method="post">
    @csrf
    <label for="issueID">
        IssueID:
        <input type="number" name="issueID">
    </label><br><br>

    <label for="projectName">
        Project Name:
        <input type="text" name="projectName">
    </label><br><br>

    <label for="trackerName">
        Tracker Name:
        <input type="text" name="trackerName">
    </label><br><br>

    <label for="statusName">
        Status Name:
        <input type="text" name="statusName">
    </label><br><br>

    <label for="priorityName">
        Priority Name:
        <input type="text" name="priorityName">
    </label><br><br>

    <label for="authorName">
        Author Name:
        <input type="text" name="authorName">
    </label><br><br>

    <label for="assigneeName">
        Assignee Name:
        <input type="text" name="assigneeName">
    </label><br><br>

    <label for="subject">
        Subject:
        <input type="text" name="subject">
    </label><br><br>

    <label for="description">
        Description:
        <input type="text" name="description">
    </label><br><br>

    <label for="startDate">
        Start Date:
        <input type="date" name="startDate">
    </label><br><br>

    <label for="dueDate">
        Due Date:
        <input type="date" name="dueDate" >
    </label><br><br>

    <label for="doneRatio">
        Done Ratio:
        <input type="number" name="doneRatio">
    </label><br><br>

    <label for="isPrivate">
        Private
        <input type="number" name="isPrivate">
    </label><br><br>

    <label for="estimatedHours">
        Estimated Hours:
        <input type="number" name="estimatedHours">
    </label><br><br>

    <label for="PIC">
        PIC:
        <input type="text" name="PIC">
    </label><br><br>

    <label for="actualStartDate">
        Actual Start Date:
        <input type="date" name="actualStartDate">
    </label><br><br>

    <label for="actualEndDate">
        Actual End Date:
        <input type="date" name="actualEndDate">
    </label><br><br>

    <label for="closedOn">
        Closed Date:
        <input type="date" name="closedOn">
    </label><br><br>

    <button type="submit">Create issue</button>
    {{--    <form action="/users/delete/{{ $user->id }}">--}}
    {{--        <label for="ID">--}}
    {{--            Name:--}}
    {{--            <input type="number" name="id" value="{{ $user->id }}">--}}
    {{--        </label>--}}
    {{--        <button type="submit">Delete User</button>--}}
    {{--    </form>--}}
</form>
</body>
</html>
<?php
