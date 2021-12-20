<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin PMB</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/app.css" />

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>
  <script src="./js/app.js"></script>
</head>

<body>
  <div class="font-sans antialiased text-gray-900">
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full" src="./img/bg-card.jpg" alt="Office" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Selamat Datang pada Portal Penerimaan Mahasiswa Baru ITS
              </h1>
              <form method="POST" action="">
                <label class="block text-sm">
                  <span class="block text-sm font-medium text-gray-700">Email address</span>
                  <div class="mt-1">
                    <input id="email" name="email" type="email" autocomplete="email" required="" class="
                      appearance-none
                      block
                      w-full
                      px-3
                      py-2
                      border border-gray-300
                      rounded-md
                      shadow-sm
                      placeholder-gray-400
                      focus:outline-none
                      focus:ring-sp-primary-400
                      focus:border-sp-primary-400
                      sm:text-sm
                    " />
                  </div>
                </label>
                <label class="block mt-4 text-sm">
                  <span class="block text-sm font-medium text-gray-700">Password</span>
                  <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required="" class="
                      appearance-none
                      block
                      w-full
                      px-3
                      py-2
                      border border-gray-300
                      rounded-md
                      shadow-sm
                      placeholder-gray-400
                      focus:outline-none
                      focus:ring-sp-primary-400
                      focus:border-sp-primary-400
                      sm:text-sm
                    " />
                  </div>
                </label>
                <div class="flex items-center mt-4">
                  <input id="remember_me" name="remember_me" type="checkbox" class="
                      h-4
                      w-4
                      text-sp-primary-400
                      focus:ring-sp-primary-400
                      border-gray-300
                      rounded
                    " />
                  <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                    Ingat saya
                  </label>
                </div>
                <button type="submit" class="
                    w-full
                    flex
                    justify-center
                    py-2
                    px-4
                    border border-transparent
                    rounded-md
                    shadow-sm
                    text-sm
                    font-medium
                    text-white
                    bg-sp-primary-400
                    hover:bg-sp-primary-300
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-sp-primary-400
                    mt-4
                  ">
                  Masuk
                </button>
              </form>

              <p class="mt-4">
              <div class="text-sm">
                <a href="./register.php" class="
                    font-medium
                    text-sp-primary-400
                    hover:text-sp-primary-300
                  ">
                  Belum punya Akun? Daftar
                </a>
              </div>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>