  const user = "Pioupiou325";
  const headers = {
    Authorization: "Bearer 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",
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
  const gallery = document.querySelector(".gallery");
  gallery.innerHTML = "";

  // for (const element of content) {
  const arrow_left = document.createElement("img");
  arrow_left.src = "./datas/back.svg";
  arrow_left.classList.add("arrows_caroussel");
  const arrow_right = document.createElement("img");
  arrow_right.src = "./datas/forward.svg";
  arrow_right.classList.add("arrows_caroussel");
  gallery.appendChild(arrow_left);

  element = content[content_affiche];
    const lienBox = document.createElement("a");
    lienBox.href = element.lien_github;
    const containerWork = document.createElement("div");
    containerWork.classList = "container_work";

  
  
    const illustration = document.createElement("img");
    illustration.src = element.lien_picture;
    illustration.alt = element.workname;
    const nomProjet = document.createElement("h4");
    nomProjet.innerHTML = element.workname;

    containerWork.appendChild(illustration);
    containerWork.appendChild(nomProjet);

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
      for (const key in stats) {
        if (Object.prototype.hasOwnProperty.call(stats, key)) {
          const value = stats[key];
          console.log(key);
          const percentage = ((value / total) * 100).toFixed(0);
          if (key === "HTML") {
            console.log("dans boucle");
            const logo = document.createElement("img");
            logo.src = "./datas/logo_js.webp";
            logo.classList.add("logo_in_work");

            containerWork.appendChild(logo);

            const stat = document.createElement("p");
            stat.innerHTML += `${percentage}%`;
            containerWork.appendChild(stat);
          } else {
            const stat = document.createElement("p");
            stat.innerHTML += `${key}: ${percentage}%`;
            containerWork.appendChild(stat);
          }
        }
      }
    }
    lienBox.appendChild(containerWork);
    gallery.appendChild(lienBox);

    siteweb = document.createElement("a");
    siteweb.href = element.lien_site;
    siteweb.innerHTML = element.lien_site;

  containerWork.appendChild(siteweb);
  gallery.appendChild(arrow_right);


  arrow_left.addEventListener("click", () => {
    console.log("gauche");
    content_affiche -= 1;
    verif_content_affiche();
    affiche_element();
  })
  
  arrow_right.addEventListener("click", () => {
    console.log("droit");
    content_affiche += 1;
    verif_content_affiche();
    affiche_element();
    
  })
  }


const projectsSection = document.getElementById("projets");
const projectsGallery = document.getElementById("gallery");
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


observer.observe(projectsSection);
affiche_element();
