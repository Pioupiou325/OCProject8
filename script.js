const gallery = document.querySelector(".gallery");
console.log(gallery)
content.forEach(element => {
   console.table(element);
   console.log(element.lien_picture);
   console.log(element.workname);
   

   const illustration = document.createElement('img');
   illustration.src = element.lien_picture;
   illustration.alt = element.workname;
   gallery.appendChild(illustration);
});
