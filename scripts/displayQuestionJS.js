displayTags();
hideComments();

function hideComments(){
    let comments = document.getElementById("showreplies");
    comments.style.display = "none";
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
