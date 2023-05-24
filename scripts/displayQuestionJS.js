displayTags();

function displayTags(){
    const t = document.getElementById("question-tags");

    t.querySelectorAll("#question-tags li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag =>{
        let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
        t.insertAdjacentHTML("afterbegin", liTag);
    });
}

