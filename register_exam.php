<!DOCTYPE html>
<html lang="en">

<?php
require_once 'header.php';

$examType = $_GET['type'];

$inputClasses = 'border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-600 mx-4 my-2
p-3 hover:ring-1 hover:ring-gray-400 w-1/2 text-sm text-black';

$formFields = array(
  'renal' => array(
    0 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Sodium" type="number" required />',
    1 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Chloride" type="number" required />',
    2 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Itrogen" type="number" required />',
    3 => '<input name="fields" value="sodium-chloride-itrogen" type="hidden" />',
  ),
  'lipidic' => array(
    0 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Cholesterol" type="number" required />',
    1 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Triglycerides" type="number" required />',
    2 => '<input name="fields" value="cholesterol-triglycerides" type="hidden" />',
  ),
  'urine' => array(
    0 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Ph" type="number" required />',
    1 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Glucose" type="number" required />',
    2 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Leukocytes" type="number" required />',
    3 => '<input name="exam_data[]" class=" ' . $inputClasses . ' " placeholder="Color" type="text" required />',
    4 => '<input name="fields" value="ph-glucose-leukocytes-color" type="hidden" />',
  )
);

?>

<body>
  <main class="w-6/12 m-auto p-2">
    <div class="text-center border-2 border-gray-300 rounded-md m-5 p-3">
      <h2 class="text-xl my-4">
        Exam Type: <strong><?php echo strtoupper($examType); ?></strong>
      </h2>

      <form method='POST' , action='exam_results.php'>
        <p class='my-3'>Patient Information</p>
        <input name='full_name' class="<?php echo $inputClasses; ?>" placeholder='Full Name' type='text' required />
        <input name='id_card' class="<?php echo $inputClasses; ?>" placeholder='ID Card (Cédula)' type='number' required />
        <input name='email' class="<?php echo $inputClasses; ?>" placeholder='Email' type='email' required />
        <p class="my-3">Exam Results Fields</p>
        <?php
        foreach ($formFields[$examType] as $field) {
          echo $field;
        }
        ?>

        <div>
          <button class='bg-gray-400 hover:bg-gray-500 text-white py-3 px-6 rounded-md my-3' type='submit' name='submit'>Send</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>