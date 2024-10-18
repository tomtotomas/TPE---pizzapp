function toggleDeleteOptions() {
    const deleteType = document.getElementById("delete_type").value;
    document.getElementById("pizza_delete").style.display = deleteType === "pizza" ? "block" : "none";
    document.getElementById("category_delete").style.display = deleteType === "category" ? "block" : "none";
}
