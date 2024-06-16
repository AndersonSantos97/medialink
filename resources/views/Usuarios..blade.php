<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

  <section>
    <div class="px-8 py-24 mx-auto md:px-12 lg:px-32 max-w-7xl">
      <div class="text-center">
        <h1 class="text-4xl font-semibold tracking-tighter text-gray-900 lg:text-5xl text-balance">
          Bienvenido al Proyecto de Enlace Biometrico,
          <span class="text-gray-600">Haciendo las Consultas mas facil y seguras</span>
        </h1>
        <p class="w-1/2 mx-auto mt-4 text-base font-medium text-gray-500 text-balance">
         Seccion para Agregar , Modifica y eliminar Usarios, quienes podran ingresar al Sistema de Enlace        
        
      </div>

                          

      <div class="p-8 bg-white shadow-lg rounded-lg w-full max-w-7xl">

        <div class="mb-4">
          <label for="device-name" class="block text-sm font-medium text-gray-700">Nombre de Usario</label>
          <input type="text" id="device-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="device-name" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="text" id="device-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
      
      
    <div class="mb-4">
      <label for="role" class="block text-sm font-medium text-gray-700">ROL</label>
      <select id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <option value="" disabled selected>Selecciona un rol</option>
        <option value="admin">Admin</option>
        <option value="moderator">Moderador</option>
        <option value="viewer">Visor</option>
       
      </select>
    </div>
       
      
        <div class="flex justify-between mb-4">
          
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Agregar
          </button>
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Modificar
          </button>
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Eliminar
          </button>
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium duration-200 bg-gray-100 md:w-auto rounded-xl hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-label="Secondary action">
            Salir
          </button>
    
        </div>
        <div class="text-center">
          <table class="min-w-full bg-white border border-gray-300">
            <thead>
              <tr>
                <th class="px-4 py-2 border-b border-gray-300">ID</th>
                <th class="px-4 py-2 border-b border-gray-300">Nombre De Usuario</th>
                <th class="px-4 py-2 border-b border-gray-300">Contraseña</th>
                <th class="px-4 py-2 border-b border-gray-300">Rol</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 py-2 border-b border-gray-300">01</td>
                <td class="px-4 py-2 border-b border-gray-300">Moderador1</td>
                <td class="px-4 py-2 border-b border-gray-300">Tempo2024#1</td>
                <td class="px-4 py-2 border-b border-gray-300">Moderador</td>
              </tr>
            </tbody>
          </table>
        </div>
    
        </div>
    </div>

   
    
  </section>


  
    
</body>
</html>
