<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Portal PMB</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= URL . 'assets/css/tailwind.output.css' ?>" />
  <link rel="stylesheet" href="https://tailwindui.com/css/components-v2.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <link rel="stylesheet" href="<?= URL . 'assets/css/app.css' ?>" />

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="<?= URL . 'assets/js/init-alpine.js' ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <div class="flex flex-col flex-1 w-full">

      <header class="flex z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div
          class="container flex items-center justify-between h-full px-3 mx-auto text-sp-primary-400 dark:text-sp-primary-400">
          <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-sp-primary"
            @click="toggleSideMenu" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="#A4D961" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
          <div class="flex justify-center flex-1 lg:mr-32">
            <div class="relative w-full max-w-xl mr-6 focus-within:text-sp-primary-400">
              <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="#6aaff1" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <input
                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-sp-primary-400 focus:outline-none focus:shadow-outline-sp-primary form-input"
                type="text" placeholder="Cari mahasiswa" aria-label="Search" />
            </div>
          </div>
          <ul class="flex items-center flex-shrink-0 space-x-6">
            <li class="relative z-10">
              <button class="align-middle rounded-full focus:shadow-outline-sp-primary focus:outline-none"
                @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                <img class="object-cover w-8 h-8 rounded-full"
                  src="https://cdn1-production-images-kly.akamaized.net/NpSkxEAUZsogHK1-HG4KlurfdSM=/0x248:2423x1613/640x360/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3412481/original/055674500_1616773504-115383249_m.jpeg"
                  alt="" aria-hidden="true" />
              </button>

              <template x-if="isProfileMenuOpen">
                <ul x-transition:leave="z-10 transition ease-in duration-150" x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                  class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-400 dark:bg-gray-700"
                  aria-label="submenu">
                  <li class="flex mt-2">
                    <form method="POST" action="" class="inline-flex items-center w-full">
                      <input name="logout" type="hidden">

                      <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="#6aaff1">
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                          </path>
                        </svg>
                        <span>Keluar</span>
                      </a>
                    </form>
                  </li>
                </ul>
              </template>

            </li>
          </ul>
        </div>
      </header>

      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="mt-6 text-3xl font-bold text-gray-900">
            Data Calon Mahasiswa
          </h2>
          <!-- CTA -->
          <a class="mt-6 flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-sp-primary-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
            href="#" id="add-student">
            <div class="flex items-center gap-2">
              <span><?php count($students); ?> Mahasiswa</span>
            </div>
            <span class="flex items-center gap-2">
              <p>Tambah Calon Mahasiswa</p>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
            </span>
          </a>

          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3 w-2/12">Nama</th>
                    <th class="px-4 py-3 w-3/12">Alamat</th>
                    <th class="px-4 py-3 w-2/12">Agama</th>
                    <th class="px-4 py-3 w-2/12">Asal</th>
                    <th class="px-4 py-3 w-2/12">Departemen</th>
                    <th class="px-4 py-3 w-1/12">Aksi</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                  <?php foreach ($students as $student) { ?>
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm cursor-pointer">
                        <?php if ($student['photo'] != "") { ?>
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block text-center">
                          <img class="object-cover w-full h-full rounded-full" src="<?= $student['photo'] ?>" alt=""
                            loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <?php } else { ?>
                        <div class="flex items-center justify-center w-8 h-8 mr-3"><svg
                            xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                          </svg>
                        </div>
                        <?php } ?>
                        <div>
                          <p class="font-semibold"><?= $student['name'] ?></p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            <?php if ($student['gender'] == 'L') { ?>
                            Laki-laki
                            <?php } else if ($student['gender'] == 'P') { ?>
                            Perempuan
                            <?php } ?>
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      <?= $student['address'] ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      <?= $student['religion'] ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      <?= $student['school'] ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      <?= $student['department'] ?>
                    </td>
                    <td class="px-4 py-3 text-sm flex gap-3">
                      <button
                        class="bg-sp-primary-400 px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        type="button" id="update-student" data-id="<?= $student['student_id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        </a>
                      </button>
                      <button
                        class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                        id="delete-student" data-id="<?= $student['student_id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </td>
                  </tr>

                  <div
                    class="fixed inset-0 z-30 hidden items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
                    id="modal-delete-student-<?= $student['student_id'] ?>">
                    <div
                      class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                      role="dialog" id="modal">
                      <header class="flex justify-end">
                        <button
                          class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                          aria-label="close" id="modal-close-button" data-id="<?= $student['student_id'] ?>">
                          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </button>
                      </header>

                      <div class="mt-4 mb-6">
                        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-400">
                          Hapus data Calon Mahasiswa
                        </p>
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                          Apakah Anda ingin menghapus data <?= $student['name'] ?>?
                        </p>
                      </div>

                      <footer
                        class="flex flex-col items-center justify-end gap-2 sm:flex-row bg-gray-50 dark:bg-gray-800">
                        <button id="modal-close-button" data-id="<?= $student['student_id'] ?>"
                          class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-400 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                          Batal
                        </button>

                        <form method="POST" action="">
                          <input type="hidden" name="student_id" value="<?= $student['student_id'] ?>">

                          <button name="delete_student"
                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red m-0">
                            Iya
                          </button>
                        </form>
                      </footer>
                    </div>
                  </div>

                  <div
                    class="fixed inset-0 z-30 hidden items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
                    id="modal-update-student-<?= $student['student_id'] ?>">
                    <div
                      class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                      role="dialog" id="modal">

                      <header class="flex justify-end">
                        <button
                          class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                          aria-label="close" id="update-student-close" data-id="<?= $student['student_id'] ?>">
                          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </button>
                      </header>

                      <div class="mt-4">

                        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-400">
                          Edit Data Calon Mahasiswa
                        </p>

                        <form method="POST" action="" enctype="multipart/form-data">
                          <input type="hidden" name="student_id" value="<?= $student['student_id'] ?>">

                          <input type="hidden" name="photo_ori" value="<?= $student['photo'] ?>">

                          <label class="block mt-4 text-sm w-1/2" id="image-item">
                            <span class="text-gray-700 dark:text-gray-400" id="image-name">
                              Foto
                            </span>

                            <input id="image-place" type="file" name="photo" class="form-control hidden">
                            <img class="mt-1 mb-2" style="height: 75px; width: 50%; object-fit: cover;" id="image-preview" src="<?= $student['photo'] ?>">

                            <button
                              class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-sp-primary-400 border border-transparent rounded active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                              id="insert-image" type="button">
                              Ubah Gambar
                            </button>
                          </label>

                          <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                              Nama
                            </span>
                            <input
                              class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                              name="name" value="<?= $student['name'] ?>" placeholder="Nama" required />
                          </label>

                          <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                              Alamat
                            </span>
                            <textarea
                              class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                              name="address" value="<?= $student['address'] ?>" rows="2" placeholder="Alamat"
                              required><?= $student['address'] ?></textarea>
                          </label>

                          <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                              Jenis Kelamin
                            </span>
                            <select
                              class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                              name="gender" placeholder="Jenis Kelamin" required value="<?= $student['gender'] ?>">
                              <?php if ($student['gender'] == 'L') { ?>
                              <option value="L" selected>Laki-laki</option>
                              <option value="P">Perempuan</option>
                              <?php } else if ($student['gender'] == 'P') { ?>
                              <option value="L">Laki-laki</option>
                              <option value="P" selected>Perempuan</option>
                              <?php } ?>
                            </select>
                          </label>

                          <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                              Agama
                            </span>
                            <input
                              class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                              name="religion" value="<?= $student['religion'] ?>" placeholder="Agama" required />
                          </label>

                          <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                              Asal Sekolah
                            </span>
                            <input
                              class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                              name="school" value="<?= $student['school'] ?>" placeholder="Asal Sekolah" required />
                          </label>

                          <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                              Departemen
                            </span>
                            <input
                              class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                              name="department" value="<?= $student['department'] ?>" placeholder="Departemen"
                              required />
                          </label>

                          <footer
                            class="flex flex-col items-center justify-end gap-2 sm:flex-row bg-white dark:bg-gray-800 mt-6">
                            <button id="update-student-close" data-id="<?= $student['student_id'] ?>" type="button"
                              class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-400 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                              Batal
                            </button>

                            <button type="submit" name="update_student"
                              class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-sp-primary-400 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-sp-primary-400 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple m-0">
                              Simpan
                            </button>
                          </footer>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php } ?>

                </tbody>
              </table>
            </div>

          </div>
        </div>

        <div class="fixed inset-0 z-30 hidden items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
          id="modal-add-student">
          <div
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">

            <header class="flex justify-end">
              <button
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                aria-label="close" id="add-student-close">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                  <path
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
              </button>
            </header>

            <div class="mt-4">

              <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-400">
                Tambah Daftar Calon Mahasiswa
              </p>

              <form method="POST" action="" enctype="multipart/form-data">

                <label class="block mt-4 text-sm w-1/2" id="image-item">
                  <span class="text-gray-700 dark:text-gray-400" id="image-name">
                    Foto
                  </span>

                  <input id="image-place" type="file" name="photo" class="form-control hidden">
                  <img class="mt-1 mb-2" id="image-preview" src="">

                  <button
                    class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-sp-primary-400 border border-transparent rounded active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    id="insert-image" type="button">
                    Upload Gambar
                  </button>
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Nama
                  </span>
                  <input
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="name" placeholder="Nama" required />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Alamat
                  </span>
                  <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="address" rows="2" placeholder="Alamat" required></textarea>
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Jenis Kelamin
                  </span>
                  <select
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="gender" placeholder="Jenis Kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Agama
                  </span>
                  <input
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="religion" placeholder="Agama" required />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Asal Sekolah
                  </span>
                  <input
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="school" placeholder="Asal Sekolah" required />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Departemen
                  </span>
                  <input
                    class="block w-full mt-1 text-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    name="department" placeholder="Departemen" required />
                </label>

                <footer class="flex flex-col items-center justify-end gap-2 sm:flex-row bg-white dark:bg-gray-800 mt-6">
                  <button id="add-student-close" type="button"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-400 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Batal
                  </button>

                  <button type="submit" name="add_student"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-sp-primary-400 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-sp-primary-400 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple m-0">
                    Tambah
                  </button>
                </footer>
              </form>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $("body").on('click', "#delete-student", function (e) {
        var studentId = $(this).data(("id"));
        $(`#modal-delete-student-${studentId}`).removeClass('hidden').addClass('flex');
      });

      $("body").on('click', "#modal-close-button", function (e) {
        var studentId = $(this).data(("id"));
        $(`#modal-delete-student-${studentId}`).removeClass('flex').addClass('hidden');
      });

      $("body").on('click', "#add-student", function (e) {
        $(`#modal-add-student`).removeClass('hidden').addClass('flex');
      });

      $("body").on('click', "#add-student-close", function (e) {
        $(`#modal-add-student`).removeClass('flex').addClass('hidden');
      });

      $("body").on('click', "#update-student", function (e) {
        var studentId = $(this).data(("id"));
        $(`#modal-update-student-${studentId}`).removeClass('hidden').addClass('flex');
      });

      $("body").on('click', "#update-student-close", function (e) {
        var studentId = $(this).data(("id"));
        $(`#modal-update-student-${studentId}`).removeClass('flex').addClass('hidden');
      });

      function readURL(target, input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            target.attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("body").on('change', "input[id*='image-place']", function (e) {
        readURL($("#image-item").children("img"), this);

        $("#image-item").children("#insert-image").html("Ubah Gambar");

        $("#image-item").children("img").css({
          "height": "75px",
          "width": "50%",
          "object-fit": "cover"
        });
      });

      $("body").on("click", "#insert-image", function () {
        var num = $(this).data("id");
        $("#image-place").click();
      });
    });
  </script>
</body>

</html>