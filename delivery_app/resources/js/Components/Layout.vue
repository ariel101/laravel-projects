<template>
    <div class="flex h-screen">
      <!-- Sidebar -->
      <Sidebar />
      <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Navbar -->
        <Navbar />
        <StatisticGrid />
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto p-6 rounded-md mt-2">
          <slot />
          <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet earum unde tempora beatae, ad temporibus impedit consectetur illo, delectus deleniti hic dolorem accusamus ducimus et asperiores minima animi iusto molestiae?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum neque ea illum! Voluptatibus possimus repellendus tempore veniam voluptate doloribus modi exercitationem dicta consequuntur sint. Nam dolore illum nostrum doloremque odit!
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, esse possimus? Iure earum optio deleniti molestiae iusto dolorem, inventore non aliquam fuga! Labore voluptate magnam quasi voluptatem odit a et?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore eos vel, fugiat reprehenderit fuga nostrum obcaecati delectus quidem accusantium iure laborum, dolores optio ratione non quisquam culpa quaerat. Eius, vero.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo necessitatibus nihil consequuntur nostrum blanditiis reprehenderit quos autem in omnis doloremque, vero voluptatum itaque, nam commodi voluptate ad. Corrupti, eligendi ut.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum nobis officiis molestias in, iure et. Incidunt quibusdam illo quisquam alias. Veritatis fugit deserunt, a explicabo animi ipsum molestiae ipsam tenetur.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi qui sed deleniti nam, incidunt voluptate distinctio necessitatibus consequatur? Corrupti consectetur perferendis, error voluptatem accusantium architecto neque autem necessitatibus adipisci repellat.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed minus, aliquam veritatis id commodi dolore quas, quo ratione libero labore deserunt. Incidunt eveniet repellat sunt explicabo, recusandae fuga? Illum, minus.
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam in ab qui fuga consectetur nam ratione, maxime ex. Nulla at optio voluptas nobis. Distinctio obcaecati facere delectus quos labore voluptatum.
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis id ipsum amet debitis nulla, nesciunt magnam ad voluptas soluta similique ducimus quam nisi doloribus unde placeat eveniet minus distinctio repudiandae.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio porro expedita debitis animi aut deleniti voluptates quo laborum distinctio quam maiores exercitationem tempora sint omnis, placeat corporis, facilis, incidunt ipsam.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam magnam velit quibusdam accusantium modi consequatur, beatae quisquam unde officia? Cum ipsum sit tempora repellat sed, dolorum reiciendis est praesentium numquam.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum autem numquam deleniti. Voluptate dolorum nostrum repellat amet dignissimos eaque? Velit, iusto. Et odit animi commodi rerum ipsa veniam itaque nostrum?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum debitis, tempore saepe nemo dicta unde placeat distinctio assumenda fuga? Blanditiis ratione dignissimos dolor aliquam sed veniam aliquid officia quibusdam animi!
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui voluptate enim commodi tempora ab tenetur voluptatum temporibus exercitationem autem, provident numquam asperiores! Voluptatem culpa repellat nam animi deserunt nihil voluptatibus.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati quia sint debitis repellat voluptatibus, error dolor adipisci alias non suscipit voluptatum eum esse quam? Iusto at repellendus dolore quibusdam neque.
          </p>
          </div>
        </main>
      </div>
    </div>
  </template>
  
  <script>
  import Sidebar from './Sidebar.vue'
  import Navbar from './NavBar.vue';
  import StatisticGrid from './StatisticGrid.vue';
  
  export default {
    components: {
      Sidebar,
      Navbar,
      StatisticGrid
    },
  }
  </script>
  
  <style scoped>
  /* Puedes agregar estilos personalizados aquí */
  </style>
  