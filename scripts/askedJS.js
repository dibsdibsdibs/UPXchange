let basis;
let order;

const questions = document.querySelectorAll('.question-content');

$(function(){
    $(".question-content").click(function(){
        let qid = this.id;
        location.href = "retrieveAsked.php" + "?question_id=" + qid;
    });
});
