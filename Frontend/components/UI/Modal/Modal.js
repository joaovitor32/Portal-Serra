var modalBox = document.getElementById("myModal");
let modalContent = document.getElementById('modal-content')

export const errModal = (err) => {
  modalBox.style.display = "block";
  modalContent.innerHTML = err;
}

export const close = () => {
  modalBox.style.display = "none";
}

window.onclick = function (event) {
  if (event.target == modalBox) {
    close()
  }
}