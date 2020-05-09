var modalBox = document.getElementById("myModal");
let modalContent = document.getElementById('modal-content')

const errModal = (err) => {
  modalBox.style.display = "block";
  modalContent.innerHTML = err;
}

const close = () => {
  modalBox.style.display = "none";
}

window.onclick = function (event) {
  if (event.target == modalBox) {
    close()
  }
}