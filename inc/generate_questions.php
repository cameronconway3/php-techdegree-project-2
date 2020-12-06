<?php
// Generate random questions
$numberOfQuestionsTest = 10;
$questions = array();

// Generate a random incorrect score
function randomIncorrectScore($num, $operator, $answer) {
    if($operator == 'add') {
        $incorrectScore = $answer+$num;
    } else {
        $incorrectScore = $answer-$num;
    }
    return $incorrectScore;
}

// Loop for required number of questions
for($i = 0; $i < $numberOfQuestionsTest; $i++) {
    
    // Add question and answer to questions array
    $question = array();

    $leftAdder = rand(5, 100);
    $rightAdder = rand(5, 100);

    // Calculate correct answer
    $correctAnswer = $leftAdder + $rightAdder;

    // Get incorrect answers within 10 numbers either way of correct answer
    // The lowest number $correctAnswer can be is 10, do not want to get 0 or minus number so highest range of subtraction is 9.
    $randRange1 = rand(1, 10);
    $randRange2 = rand(1, 10);
    $operator1 = array('add', 'sub');
    $operator2 = array('add', 'sub');
    $randomOperator1 = $operator1[array_rand($operator1)];
    $randomOperator2 = $operator2[array_rand($operator2)];

    $firstIncorrectAnswer = randomIncorrectScore($randRange1, $randomOperator1, $correctAnswer);
    $secondIncorrectAnswer = randomIncorrectScore($randRange2, $randomOperator2, $correctAnswer);

    $question += ['leftAdder' => $leftAdder];
    $question += ['rightAdder' => $rightAdder];
    $question += ['correctAnswer' => $correctAnswer];
    $question += ['firstIncorrectAnswer' => $firstIncorrectAnswer];
    $question += ['secondIncorrectAnswer' => $secondIncorrectAnswer];

    array_push($questions, $question);
}