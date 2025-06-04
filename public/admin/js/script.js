document.addEventListener("DOMContentLoaded", () => {
  // Sidebar toggle functionality
  const sidebar = document.getElementById("sidebar")
  const sidebarCollapse = document.getElementById("sidebarCollapse")

  if (sidebarCollapse) {
    sidebarCollapse.addEventListener("click", () => {
      sidebar.classList.toggle("active")
    })
  }

  // Close sidebar when clicking outside on mobile
  document.addEventListener("click", (event) => {
    const windowWidth = window.innerWidth
    if (windowWidth <= 768 && !sidebar.contains(event.target) && !sidebarCollapse.contains(event.target)) {
      if (!sidebar.classList.contains("active")) {
        return
      }
      sidebar.classList.remove("active")
    }
  })

  // Handle window resize
  window.addEventListener("resize", () => {
    const windowWidth = window.innerWidth
    if (windowWidth > 768) {
      sidebar.classList.remove("active")
    }
  })
})
