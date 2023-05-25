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