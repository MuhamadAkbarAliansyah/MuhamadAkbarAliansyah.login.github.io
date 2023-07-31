async function fetchAndDisplayUsers() {
    try {
      const response = await fetch("https://jsonplaceholder.typicode.com/users");
      const data = await response.json();
  
      const users = data.slice(0, 5);
  
      const usersDiv = document.getElementById("users");
  
      users.forEach((user) => {
        const name = user.name;
        const phone = user.phone;
        const imageSrc = "img/slebew.jpg.png";
  
        const userCard = document.createElement("div");
        userCard.classList.add("user-card");
  
        const userImage = document.createElement("img");
        userImage.src = imageSrc;
        userImage.alt = name;
        userImage.style.maxWidth = "100px";
        userCard.appendChild(userImage);
        userCard.innerHTML = `
            <img src="${imageSrc}" alt="${name}" style="max-width: 100px;">
              <h2>${name}</h2>
              <p>Phone: ${phone}</p>
            `;
  
        usersDiv.appendChild(userCard);
      });
    } catch (error) {
      console.error("Error fetching data:", error);
      const nameElement = document.getElementById("name");
      nameElement.textContent = "Error fetching data:";
    }
  }
  
  fetchAndDisplayUsers();
  