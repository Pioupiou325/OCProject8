const gallery = document.querySelector(".gallery");

content.forEach((element) => {
  const container_work = document.createElement("div");
  container_work.classList.add("container_work");

  const illustration = document.createElement("img");
  illustration.src = element.lien_picture;
  illustration.alt = element.workname;
  const nomProjet = document.createElement("p");
  nomProjet.innerHTML = element.workname;
  console.log(nomProjet);
  container_work.appendChild(illustration);
  container_work.appendChild(nomProjet);
  gallery.appendChild(container_work);
});
