<script>
    window.addEventListener("DOMContentLoaded", () => {
        const services = JSON.parse(localStorage.getItem("services")) || [];
        showServices(services);

        const deleteButtons = document.querySelectorAll(".delete-favorite");
        
        deleteButtons.forEach(button => {
            button.addEventListener("click", (e) => {
                e.preventDefault();
                const index = e.target.getAttribute("data-index");
                deleteFavorite(index);
            });
            
        });
    });

    function showServices(services) {
        const container = document.querySelector(".favorite-services-container");
        
        container.innerHTML = '';

        services.forEach((service, index) => {
            console.log();
            const serviceElement = document.createElement("div");
            serviceElement.className = "service-item";

            serviceElement.innerHTML = `
                <h2>${service.nombre}</h2>
                <p class="description">Descripción: ${service.descripcion}</p>
                <p class="price">$${service.precio}</p>
                <a href="" class="" title="Eliminar de favoritos">
                    <svg class="delete-favorite" data-index="${index}" xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M3 3l18 18"></path>
                        <path d="M19.5 12.572l-1.5 1.428m-2 2l-4 4l-7.5 -7.428a5 5 0 0 1 -1.288 -5.068a4.976 4.976 0 0 1 1.788 -2.504m3 -1c1.56 0 3.05 .727 4 2a5 5 0 1 1 7.5 6.572"></path>
                    </svg>
                </a>
            `;

            container.appendChild(serviceElement);
        });
    }

    function deleteFavorite(index){
        let services = JSON.parse(localStorage.getItem("services")) || [];
        services.splice(index, 1);
        localStorage.setItem("services", JSON.stringify(services));
        showServices(services);
    }
</script>


<?php include("layouts/header.php") ?>

<div class="favoritos-container">
    <h1>Tus favoritos</h1>

    <div class="favorite-services-container"></div>
</div>

<?php include("layouts/footer.php") ?>