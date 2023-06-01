const questions = document.querySelectorAll('.question-content');

$(function(){
    $(".question-content").click(function(){
        let qid = this.id;
        location.href = "retrieveQuestion.php" + "?question_id=" + qid;
    });
});