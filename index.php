<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
    <link rel="stylesheet" href="style.css">
    <?php
    // dito sa unang part dapat maayos ang paggawa nang calculator//
    ?>
    </head>
<body>
    <div class="container">
        <h1>Student Grade Calculator</h1>
        <p class="note">Weights → Quiz (30%), Assignment (30%), Exam (40%)</p>
        
        <form method="POST">
            <div class="form-group">
                <label for="quiz">Quiz Score:</label>
                <input type="number" id="quiz" name="quiz" min="0" max="100" step="0.01" required 
                       value="<?php echo isset($_POST['quiz']) ? htmlspecialchars($_POST['quiz']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="assignment">Assignment Score:</label>
                <input type="number" id="assignment" name="assignment" min="0" max="100" step="0.01" required
                       value="<?php echo isset($_POST['assignment']) ? htmlspecialchars($_POST['assignment']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="exam">Exam Score:</label>
                <input type="number" id="exam" name="exam" min="0" max="100" step="0.01" required 
                       value="<?php echo isset($_POST['exam']) ? htmlspecialchars($_POST['exam']) : ''; ?>">
            </div>
            <button type="submit" name="calculate">Compute Grade</button>
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $quiz = $_POST['quiz'];
            $assignment = $_POST['assignment'];
            $exam = $_POST['exam'];
            $error = "";

            
            if (!is_numeric($quiz) || $quiz < 0 || $quiz > 100) {
                $error = " Quiz score must be between 0 and 100.";
            } elseif (!is_numeric($assignment) || $assignment < 0 || $assignment > 100) {
                $error = " Assignment score must be between 0 and 100.";
            } elseif (!is_numeric($exam) || $exam < 0 || $exam > 100) {
                $error = " Exam score must be between 0 and 100.";
            }

            if (empty($error)) {
                
                $quiz_weight = 0.30;
                $assignment_weight = 0.30;
                $exam_weight = 0.40;

                
                $average = ($quiz * $quiz_weight) + ($assignment * $assignment_weight) + ($exam * $exam_weight);

                
                if ($average >= 90) {
                    $grade = "A";
                    $remark = "Excellent! ";
                } elseif ($average >= 80) {
                    $grade = "B";
                    $remark = "Good job ";
                } elseif ($average >= 70) {
                    $grade = "C";
                    $remark = "Fair, keep improving ";
                } elseif ($average >= 60) {
                    $grade = "D";
                    $remark = "Needs more effort ";
                } else {
                    $grade = "F";
                    $remark = "Failed ";
                }

                echo "<div class='result'>";
                echo "<h2>Result</h2>";
                echo "<p><strong>Weighted Average:</strong> " . number_format($average, 2) . "</p>";
                echo "<p><strong>Letter Grade:</strong> $grade</p>";
                echo "<p><em>$remark</em></p>";
                echo "</div>";
            } else {
                echo "<p class='error'>$error</p>";
            }
        }
            // sa last part dito makikita ang nakuhang marka nang studyante
        ?>
    </div>
</body>
</html>
  