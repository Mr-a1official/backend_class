<?php
function required($user_input, $input_name)
{
   if (empty($user_input)) {
      throw new Exception("$input_name cannot be empty", 1);
   } else {
      return true;
   }
}
