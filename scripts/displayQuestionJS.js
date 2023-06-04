displayTags();
hideElements();
checkBookmark();
checkQuestionPoster();

function hideElements(){
    let report = document.getElementById("bg-report");
    report.style.display = "none";
}

function displayTags(){
    const t = document.getElementById("question-tags");

    t.querySelectorAll("#question-tags li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag =>{
        let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
        t.insertAdjacentHTML("afterbegin", liTag);
    });
}

function showComments(){
    let comments = document.getElementById("showreplies");
    if(comments.style.display === "none"){
        comments.style.display = "block";
    }else{
        comments.style.display = "none";
    }
}

function checkBookmark(){
    let icon=document.getElementById("bookmark-icon");
    let label=document.getElementById("bookmark-label");

    if(bookmarked == 0){
        icon.src = "pics/bookmarked.png";
        label.innerHTML = "Bookmarked";
    }
}

function checkQuestionPoster(){
    let edit = document.getElementById("editQuestionOption");

    if(posted == 0){
        edit.style.display = "compact";
    }else{
        edit.style.display = "none";
    }
}

function bookmarkQuestion(){
    let icon=document.getElementById("bookmark-icon");
    let label=document.getElementById("bookmark-label");
    
    if(icon.src.match("pics/bookmark.png")){
        icon.src = "pics/bookmarked.png";
        label.innerHTML = "Bookmarked";
        location.href = "bookmarkQuestion.php";
    }else{
        icon.src = "pics/bookmark.png";
        label.innerHTML = "Bookmark";
        location.href = "removeBookmark.php";
    }
}

function submitReport(){
    let report = document.getElementById("bg-report");
    if(report.style.display === "none"){
        report.style.display = "block";
        report.style.height = "100%";
        report.style.overflow = "hidden";
    }else{
        report.style.display = "none";
    }
}

function exitReport(){
    let report = document.getElementById("bg-report");
    report.style.display = "none";
}

function editQuestion(){
    location.href = "editQuestion.php";
}

$('#storeReport').on('submit', function() {
    var inputReport = document.getElementById("title").value;
    if(inputReport == null || inputReport == ""){
        alert("Please enter concern.");
        return false;
    }else{
        return true;
    }
});

$('#storeReply').on('submit', function() {
    var inputReply = document.getElementById("compose-reply").value;
    if(inputReply == null || inputReply == ""){
        alert("Reply submission empty.");
        return false;
    }else{
        return true;
    }
});