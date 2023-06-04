$(".question-content").click(function(){
    let qid = this.id;
    location.href = "retrieveQuestion.php" + "?question_id=" + qid;
});