<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form>
      <input type="text" name="nam1" placeholder="Number 1">
      <input type="text" name="nam2" placeholder="Number 2">
      <select name="operators">
        <option>None</option>
        <option>Add</option>
        <option>Subtract</option>
        <option>Multiplay</option>
        <option>Devide</option>
        <option>Power</option>
        <option>Factorial</option>
      </select>
      <br>
      <button type="submit" name="submit" value="submit">Calculate</button>

    </form>
    <p>The answer is: </p>
    <?php
      if (isset($_GET['submit'])){
        $result1 = $_GET['nam1'];
        $result2 = $_GET['nam2'];
        $operator = $_GET['operators'];
        switch ($operator) {
          case 'None':
            echo "Error! You need to select a method!";
            break;
          case 'Add':
            echo $result1 + $result2;
            break;
          case 'Subtract':
            echo $result1-$result2;
            break;
          case 'Multiplay':
            echo $result1*$result2;
            break;
          case 'Devide':
            echo $result1/$result2;
            break;
          case 'Power':
            echo $result1**$result2;
            break;
          case 'Factorial':
            echo "This is impossible for now!";
            break;
        }
      }
     ?>
  </body>
</html>
