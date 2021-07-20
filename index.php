<!DOCTYPE html>
<html lang="en">

<?php require_once 'header.php' ?>

<body>
  <main class="w-6/12 m-auto p-2">
    <div class="text-center border-2 border-gray-300 rounded-md m-5 p-3">
      <h2 class="text-xl my-7">
        Clinical Laboratory Administrative Panel
      </h2>

      <h3 class="text-xl my-4">
        <strong>Available Exams</strong>
      </h3>

      <button class="bg-gray-400 hover:bg-gray-500 text-white p-3 rounded-md">
        <a href='register_exam.php?type=urine'>Urine Test</a>
      </button>
      <button class="bg-gray-400 hover:bg-gray-500 text-white p-3 rounded-md">
        <a href='register_exam.php?type=renal'>Renal Profile</a>
      </button>
      <button class="bg-gray-400 hover:bg-gray-500 text-white p-3 rounded-md">
        <a href='register_exam.php?type=lipidic'>Lipidic Profile</a>
      </button>
      <p class="italic opacity-75 my-6">Manuel Zapata - 27.971.134 - N1013</p>
    </div>
  </main>
</body>

</html>