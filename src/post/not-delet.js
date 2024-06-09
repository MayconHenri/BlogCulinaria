function confirmarExclusao(id) {
  if (confirm("Tem certeza que deseja excluir esta postagem?")) {
    window.location.href = "post/delet.php?id=" + id;
  }
}
