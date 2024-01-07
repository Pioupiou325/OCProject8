const projectsSection = document.getElementById("projets");
const projectsGallery = document.getElementById("gallery");
const user = "Pioupiou325";
const headers = {
  Authorization:
    "Bearer ",
  "Content-Type": "application/json",
};
let content_affiche = 0;

async function afficherStatsGit(nameGit) {
  const url = `https://api.github.com/repos/${user}/${nameGit}/languages`;
  try {
    const response = await fetch(url, {
      method: "GET",
      headers: headers,
    });
    if (!response.ok) {
      throw new Error("La requête a échouée");
    }
    return await response.json();
  } catch (error) {
    console.error("Erreur :", error);
  }
}

// récupere le nom du projet dans la lien github
function searchGitName(gitName) {
  const git = gitName.split(".com/" + user + "/")[1];
  return git;
}

// vérifie le numéro du work à afficher
function verif_content_affiche() {
  if (content_affiche > content.length - 1) {
    content_affiche = 0;
  }
  if (content_affiche < 0) {
    content_affiche = content.length - 1;
  }
}

async function affiche_element() {
  // effacer le containerWork
  containerWork.innerHTML = "";

  // on récupère l 'élément à afficher
  element = content[content_affiche];

  // on crée l' image du site à afficher
  const illustration = document.createElement("img");
  illustration.src = element.lien_picture;
  illustration.alt = element.workname;
  illustration.classList.add("illustration_gallery");

  // creation nom du site
  const nomProjet = document.createElement("h2");
  nomProjet.innerHTML = element.workname;

  // affichage nom du site
  containerWork.appendChild(nomProjet);

  // création d' un container_illustration
  container_illustration = document.createElement("div");
  container_illustration.classList.add("container_illustration");

  //  on ajoute le container pour le bloc illustration
  const bloc_illustration = document.createElement("div");
  bloc_illustration.classList.add("bloc_illustration");
  container_illustration.appendChild(bloc_illustration);
  bloc_illustration.appendChild(illustration);
  containerWork.addEventListener("mouseover", mouseover);
  // affichage de l image du site
  container_illustration.appendChild(bloc_illustration);

  containerWork.appendChild(container_illustration);

  //  on ajoute le container pour les commentaires
  const comments = document.createElement("div");
  comments.classList.add("bloc_comments");
  container_illustration.appendChild(comments);
  const contenu = document.createElement("p");

  contenu.innerHTML = element.comments.replace(/\./g, ".<br><br>");
  comments.appendChild(contenu);
}

//  observateur de div
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      // alert("La section 'projets' est visible !");
      projectsGallery.classList.add("animate-projects");
    } else {
      projectsGallery.classList.remove("animate-projects");
      observer.observe(projectsSection);
    }
  });
});

function skeleton_gallery() {
  // création des flèches du carrousel
  const arrow_left = document.createElement("img");
  arrow_left.src = "./datas/back.svg";
  arrow_left.alt = "back";
  arrow_left.classList.add("arrows_caroussel_left");
  const arrow_right = document.createElement("img");
  arrow_right.src = "./datas/forward.svg";
  arrow_right.alt = "forward";
  arrow_right.classList.add("arrows_caroussel_right");

  // mise en place de la flèche gauche dans la gallery
  gallery.appendChild(arrow_left);

  // création et mise en place du containerWork dans la gallery
  containerWork = document.createElement("div");
  containerWork.classList.add("containerWork");
  gallery.appendChild(containerWork);

  // mise en place de la flèche droite dans la gallery
  gallery.appendChild(arrow_right);

  // mise en route des écouteurs d évenements pour les 2 flèches de la galerie
  arrow_left.addEventListener("click", () => {
    content_affiche -= 1;
    verif_content_affiche();
    affiche_element();
  });
  arrow_right.addEventListener("click", () => {
    content_affiche += 1;
    verif_content_affiche();
    affiche_element();
  });
}

function show_overlay() {
  const gallery = document.getElementById("gallery");
  gallery.classList.add("gallery_fit_content");
  containerWork.addEventListener("mouseleave", mouseleave);
  const division = document.querySelector(".bloc_illustration");
  division.classList.add("animate-illustration");
  container_illustration.classList.add("animate-container_illustration");
  const commentaires = document.querySelector(".bloc_comments");
  commentaires.classList.add("animate-comments");

  recup_stats();

  container_liens = document.createElement("div");
  container_liens.classList.add("container_liens");

  lien_git = document.createElement("a");
  lien_git.href = element.lien_github;
  logo_git = document.createElement("img");
  logo_git.src = "./datas/logo_git.png";
  lien_git.appendChild(logo_git);
  container_liens.appendChild(lien_git);

  lien_site = document.createElement("a");
  lien_site.href = element.lien_site;
  logo_site = document.createElement("img");
  logo_site.src = "./datas/logo_lien.png";
  lien_site.appendChild(logo_site);
  container_liens.appendChild(lien_site);

  commentaires.appendChild(container_liens);
}

async function recup_stats() {
  const gitname = searchGitName(element.lien_github);
  if (gitname) {
    const stats = await afficherStatsGit(gitname);
    let total = 0;

    for (const key in stats) {
      if (Object.prototype.hasOwnProperty.call(stats, key)) {
        const value = stats[key];
        total += value;
      }
    }
    container_stats = document.createElement("div");
    container_stats.classList.add("container_stats");
    for (const key in stats) {
      if (Object.prototype.hasOwnProperty.call(stats, key)) {
        tag_stats = document.createElement("div");
        tag_stats.classList.add("stats");
        const value = stats[key];
        const percentage = ((value / total) * 100).toFixed(0);
        if (key === "HTML") {
          const logo = document.createElement("img");
          logo.src = "./datas/logo_html.png";
          logo.classList.add("logo_in_work");
          tag_stats.appendChild(logo);
        } else if (key === "CSS") {
          const logo = document.createElement("img");
          logo.src = "./datas/logo_css.png";
          logo.classList.add("logo_in_work");
          tag_stats.appendChild(logo);
        } else if (key === "SCSS") {
          const logo = document.createElement("img");
          logo.src = "./datas/logo_sass.png";
          logo.classList.add("logo_in_work");
          tag_stats.appendChild(logo);
        } else if (key === "JavaScript") {
          const logo = document.createElement("img");
          logo.src = "./datas/logo_js.webp";
          logo.classList.add("logo_in_work");
          tag_stats.appendChild(logo);
        } else {
          const stat = document.createElement("p");
          stat.innerHTML += `${key} ${percentage}%`;
          tag_stats.appendChild(stat);
        }
        const stat = document.createElement("p");
        stat.innerHTML += `  ${percentage}%`;
        tag_stats.appendChild(stat);
        container_stats.appendChild(tag_stats);
      }
      containerWork.appendChild(container_stats);
    }
  }
}

// création d un ecouteur d evenement pour l'effet au hover
function mouseover() {
  containerWork.removeEventListener("mouseover", mouseover);
  show_overlay();
}
// création d un ecouteur d evenement pour sortir de la div
function mouseleave() {
  gallery.classList.remove("gallery_fit_content");
  containerWork.classList.remove("animate-illustration");
  containerWork.removeEventListener("mouseleave", mouseleave);
  affiche_element();
}

observer.observe(projectsSection);
skeleton_gallery();
affiche_element();
