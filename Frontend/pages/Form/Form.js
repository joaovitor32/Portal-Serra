window.addEventListener("beforeunload", () => {
    activateLoader();
});
document.addEventListener("DOMContentLoaded", () => {
    deactivateLoader();
});