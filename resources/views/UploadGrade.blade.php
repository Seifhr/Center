<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

echo "<table class = 'table'>
<tr>
<th>Student Name</th>
<th>Student Id</th>
<th>Student Year</th>
<th>Course Id</th>
<th>Day</th>
<th>Starts</th>
<th>Ends</th>
<th>Quiz week</th>
<th>Grade</th>
</tr>";
foreach ($uploadgrade as $uploadgrade) {
    echo "<form method='GET' action='/insertgrades'>";
    echo "<tr>";
    echo "<td>" . $uploadgrade->name . "</td>";
    echo "<td>" . $uploadgrade->studentId . "</td>";
    echo "<td>" . $uploadgrade->selected . "</td>";
    echo "<td>" . $uploadgrade->id . "</td>";
    echo "<td>" . $uploadgrade->day . "</td>";
    echo "<td>" . $uploadgrade->starts . "</td>";
    echo "<td>" . $uploadgrade->ends . "</td>";
    echo "<td>" . "<input type='text' name='QuizWeek' id='QuizWeek'>" . "</td>";
    echo "<td>" . "<input type='text' name='Grade' id='Grade'>" . "</td>";
    echo "<td>" . "<input type='hidden' name='id' id='id' value='$uploadgrade->studentId'>" . "</td>";
    echo "<td>" . "<button type='submit'>add</button>" . "</td>";
    echo "<td>" . "<button type='submit' formaction='/updategrades'>edit</button>" . "</td>";
    echo "</tr>";
    echo "</form>";
}
echo "</table>";

