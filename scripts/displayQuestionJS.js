displayTags();
hideElements();
checkBookmark();

function hideElements(){
    let comments = document.getElementById("showreplies");
    comments.style.display = "none";
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

function upVote(){
    let upvotes = document.getElementsByClassName("upvote");

    for (const upvote of upvotes) {
        upvote.addEventListener("click", e => {
            if(upvote.src.match("pics/upvote.png")){
                upvote.src = "pics/upvoted.png";
            }else{
                upvote.src = "pics/upvote.png";
            }
        })
    }
}

function downVote(){
    let downvotes = document.getElementsByClassName("downvote");

    for (const downvote of downvotes) {
        downvote.addEventListener("click", e => {
            if(downvote.src.match("pics/downvote.png")){
                downvote.src = "pics/downvoted.png";
            }else{
                downvote.src = "pics/downvote.png";
            }
        })
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

$('#storeReport').on('submit', function() {
    var inputReport = document.getElementById("title").value;
    if(inputReport == null || inputReport == ""){
        alert("Please enter concern.");
        return false;
    }else{
        return true;
    }
});
