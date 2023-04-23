// document.addEventListener('DOMContentLoaded', function () {
//     const cont = document.getElementById("phoneContainer");
//     if(cont) {
//         document.getElementById('addPhoneBtn').addEventListener('click', function () {
//             const input = document.createElement('input');
//             input.setAttribute('type', 'text');
//             input.setAttribute('class', 'form-control mt-2');
//             input.setAttribute('name', 'phone[]');
//             cont.append(input);
//         });
//     }
// });


const startEditing = (e) => {
    const id = e.target.parentElement.parentElement.children[0].textContent;
    const title = e.target.parentElement.parentElement.children[1].textContent;
    const price = e.target.parentElement.parentElement.children[2].textContent;
    e.preventDefault();
    const form = document.getElementById('edit');
    form.className = "";

    document.getElementById("id").value = id;
    document.getElementById("title").value = title;
    document.getElementById("price").value = price;
}

const cancel = () => {
    const form = document.getElementById('edit');
    form.className = "d-none";
}