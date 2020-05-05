var modal = document.getElementById("myModal");

const errModal = (err) => {
  let modalContent = document.getElementById('modal-content')
  modal.style.display = "block";
  modalContent.innerHTML = err;
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}