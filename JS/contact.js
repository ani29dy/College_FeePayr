const inputs = document.querySelectorAll(".input");

function focusFunc(){
    let parent = this.parentNode;
    parent.classList.add("focus");
}

function blurFunc(){
    let parent = this.parentNode;
    if(this.value == "")
    {
        parent.classList.remove("focus");
    }
}

inputs.forEach((input) => {
    input.addEventListener("focus", focusFunc);
    input.addEventListener("blur", blurFunc);
});

// const label = document.querySelectorAll("label");

// label.forEach((label) => {
//     label.addEventListener("click", function() {
//         inputs.classList.toggle("focus");
//     });
// });