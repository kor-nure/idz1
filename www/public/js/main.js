const menuItems = document.querySelectorAll(".menu-item");
const sidebar = document.querySelector(".sidebar");

if (menuItems) {
  for (const item of menuItems)
    if (item.querySelector("a").getAttribute("href") === location.pathname)
      item.classList.add("current-menu-item");
}

if (sidebar) {
  const button = sidebar.querySelector(".sidebar-button");

  button.addEventListener("click", () => {
    sidebar.classList.toggle("_open");
  })

  document.addEventListener("click", (e) => {
    if (sidebar.classList.contains("_open") && !e.target.closest(".sidebar"))
      sidebar.classList.remove("_open");
  })
}