const ul = document.querySelector("ul"),
input = ul.querySelector("input"),
tagcount = document.querySelector(".tag-count span");

let maxTags = 5;
let tags = [];

countTag();

function countTag(){
    tagcount.innerText = maxTags - tags.length;
}

function createTag(){
    ul.querySelectorAll("li").forEach(li => li.remove());       // removes duplicates
    tags.slice().reverse().forEach(tag =>{
        let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
        ul.insertAdjacentHTML("afterbegin", liTag);
    });
    countTag();
}

function addTag(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags.includes(tag)){
            if(tags.length < 5){
                tag.split(',').forEach(tag =>{      // split tag by comma
                    tags.push(tag);                 // add tag
                    createTag();
                });
            }
        }
        e.target.value = "";
    }
}

function remove(element, tag){
    let index = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    countTag();
}

input.addEventListener("keyup", addTag);
