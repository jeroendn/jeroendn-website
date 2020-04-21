function menu_toggle() {
  if(document.getElementById("main-menu").classList == "menu-closed") {
    document.getElementById("main-menu").classList.remove("menu-closed");
  }
  else {
    document.getElementById("main-menu").classList.add("menu-closed");
  }
}
