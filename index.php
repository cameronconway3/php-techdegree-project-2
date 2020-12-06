<?php 
include './inc/quiz.php';

// Array of colours that work with white text
$colours = array(
    '#2E4E0C', 
    '#99446A', 
    '#610AA3', 
    '#3031B5', 
    '#0F9FA9', 
    '#012952', 
    '#4D2D7B', 
    '#3A0950', 
    '#3564FC', 
    '#654A30', 
    '#DD14EB', 
    '#D35161', 
    '#4047EC', 
    '#FF0817', 
    '#D64266', 
    '#0A977F', 
    '#370707'
);
shuffle($colours);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">

            <?php
                if($show_score === false) {
                    ?>
                        <p style="color: <?php echo $colours[0] ?>"><?php 
            
                            if($toast) {
                                echo $toast;
                            }
            
                        ?></p>
                        <p class="breadcrumbs" style="color: <?php echo $colours[1] ?>">Question <?php echo count($_SESSION['used_indexes']) ?> of <?php echo $totalQuestions ?></p>
                        <p class="quiz" style="color: <?php echo $colours[2] ?>">What is <?php echo $question['leftAdder'] ?> + <?php echo $question['rightAdder'] ?>?</p>
                        <form action="index.php" method="post">
                            <input type="hidden" name="index" value="<?php echo $index ?>" />
                            <input type="submit" class="btn" name="answer" value="<?php echo $answers[0] ?>" />
                            <input type="submit" class="btn" name="answer" value="<?php echo $answers[1] ?>" />
                            <input type="submit" class="btn" name="answer" value="<?php echo $answers[2] ?>" />
                        </form>
                    <?php
                }
            ?>

            <?php
                if($show_score === true) {
                    ?> 
                        <!-- Display Final Score -->
                        <p style="color: <?php echo $colours[3] ?>"> <?php echo "You got " . $_SESSION['totalCorrect'] . " of " . $totalQuestions;?></p> 
                        
                        <!-- Option to play again -->
                        <form action="index.php" method="post">
                            <input type="submit" class="btn" name="restart" value="restart" />
                        </form>
                    
                    <?php
                }
            ?>

        </div>
    </div>
</body>
</html>