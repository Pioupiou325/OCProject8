const user = "Pioupiou325"; 

async function afficherStatsGit(nameGit) {
  const url = `https://api.github.com/repos/${user}/${nameGit}/languages`;
  
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error('La requête non aboutie');
    }
    
    return await response.json();   
  } catch (error) {
    console.error('Erreur :', error);
  }
}

function searchGitName(gitName) {
  const git = gitName.split(".com/" + user + "/")[1];
  return git;
}

async function affiche_element() {
  const gallery = document.querySelector(".gallery");
  
  for (const element of content) {
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
          const percentage = (value / total * 100).toFixed(0);          
          const stat = document.createElement("p");
          stat.innerHTML += `${key}: ${percentage}%`;
          containerWork.appendChild(stat);
         
        }
      }
    }
    lienBox.appendChild(containerWork);
    gallery.appendChild(lienBox);
  }
}
affiche_element();
