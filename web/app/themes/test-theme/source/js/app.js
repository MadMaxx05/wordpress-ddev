(async () => {
  if (document.querySelector("#menu-button")) {
    await import("./common/mobile-menu");
  }
})();
