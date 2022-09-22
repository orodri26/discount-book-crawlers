<?php

  	function adminRegister($dbconn, $input) {

			$hash = $input['pword'];

			$stmt = $dbconn->prepare("INSERT INTO admin(firstName, lastName, email, hash) VALUES(:f, :l, :em, :ha)");

			$data = [
				':f' => $input['fname'],
				':l' => $input['lname'],
				':em' => $input['email'],
				':ha' => $hash
			];

			if(doesEmailexist($dbconn, $email)){
				$stmt->execute($data);
			}

			
	}

	function doesEmailexist($dbconn, $email){
			$result = false;

			$stmt = $dbconn -> prepare("SELECT * FROM admin WHERE :e= email");

			$stmt->bindParam(':e', $email);

			$stmt->execute();

			$count = $stmt->rowCount();

			if ($count > 0) {
				$result = true;
			}
			return $result;
	}

  	function reDirect($loc, $msg){

  			header('location: '.$loc.$msg);

  	}
  	function displayErrors($err, $name){

		  	$result = "";

		  	if (isset($err[$name])) {

		  		$result = '<span class="err">'.$err[$name].'</span>';

		  	}
		  	return $result;
  	}

  	function doAdminlogin($dbconn, $login){
  		  $result = [];

  		  $stmt = $dbconn -> prepare("SELECT * FROM admin WHERE :e= email");

  		  $stmt -> bindParam(':e', $login['email']);
		// var_dump($login);

  		  $stmt -> execute();

  		  $user = $stmt->fetch(PDO::FETCH_ASSOC);

		//   var_dump($user);

  		  if ($stmt -> rowCount() !== 1 || $login['password'] != $user['hash']) {

  		  	$result[] = false;

  		  }else{
  		  	$result[] = true;
  		  	$result[] = $user;
  		  }

  		  return $result;

  	}

  	function addCategory($dbconn, $input){

  		$stmt = $dbconn -> prepare("INSERT INTO categories(category_name, date_added) VALUES(:c, NOW())");

  		$stmt->bindParam(":c", $input['category_name']);

  		$stmt->execute();

  	}

  	function viewCategory($dbconn){

  		$result = '';

  		$stmt = $dbconn -> prepare("SELECT * FROM categories");

  		$stmt->execute();

  		while ($user = $stmt->fetch(PDO::FETCH_BOTH)) {

  			echo '<tr>
								<td>'.$user[1].'</td>
								<td>'.$user[2].'</td>
								<td><a href="edit_category.php?category_id='.$user[0].'">edit</a></td>
								<td><a href="delete.php?category_id='.$user[0].'">delete</a></td>
							</tr>';
  		}

  		return $result;
  	}

  	function editCategory($dbconn, $data){

  		$stmt = $dbconn -> prepare("UPDATE categories SET category_name=:nc, date_added=NOW() WHERE category_id=:c");

  		$data = [ 
  		           ':nc'=>$data['new_category'],
  		           ':c'=>$data['old_category']
  		       ];

  		$stmt->execute($data);
  	}

  	function delete($dbconn, $input){

  		$stmt = $dbconn -> prepare("DELETE FROM categories WHERE category_id=:c");

  		$stmt->bindParam(':c', $input);

  		$stmt->execute();
  	}

  	function fetchCategories($dbconn){

  		$result = '';

  		$stmt = $dbconn -> prepare("SELECT * FROM categories");

  		$stmt->execute();

  		while ($user = $stmt->fetch(PDO::FETCH_BOTH)) {

  			$result .= '<option value="'.$user[1].'">'.$user[1].'</option>';
  		}


  		return $result;
  	}

  	function uploadFiles($file, $name, $location){

  		$result = [];

  		$rnd = rand(000000000, 999999999);

  		$stripname = str_replace(' ', '_', $file[$name]['name']);

  		$filename = $rnd.$stripname;

  		$destination = $location.$filename;

  		if (move_uploaded_file($file[$name]['tmp_name'], $destination)) {
  			
  			$result[] = true;

  			$result[] = $destination;
  		}else{
  			$result = false;
  		}
  		return $result;

  	}

  	function addBooks($dbconn, $data){

  		$stmt = $dbconn->prepare("INSERT INTO bookstore_books(title, author, price, year, category_name, flag, book_img) VALUES(:t, :a, :p, :y, :c, :f, :bi)");

  		$data = [':t'=>$data['title'],
  		':a'=>$data['author'],
  	  	':p'=>$data['price'],
  		':y'=>$data['year'],
  		':c'=>$data['category_name'],
  		':f'=>$data['flag'],
  		':bi'=>$data['location']
  	    ];

  		$stmt->execute($data);
  	            
  	}

  	function viewBooks($dbconn){

  		$result = '';

  		$stmt = $dbconn->prepare("SELECT * FROM bookstore_books");

  		$stmt->execute();

  		while ($user = $stmt->fetch(PDO::FETCH_BOTH)) {
  			
  			echo '<tr>
  			        <td>'.$user[1].'</td>
  			        <td>'.$user[2].'</td>
  			        <td>'.$user[3].'</td>
  			        <td>'.$user[4].'</td>
  			        <td>'.$user[5].'</td>
  			        <td><img src="./'.$user['book_img'].'" width="40px"; height="50px"/></td>
  			        <td><a href="edit_books.php?book_id='.$user[0].'">edit</a></td>
					<td><a href="deletebooks.php?book_id='.$user[0].'">delete</a></td>
  			</tr>';
  		}

  		return $result;
  	}

	  function viewUserBooks($dbconn){

		$result = '';

		$stmt = $dbconn->prepare("SELECT * FROM bookstore_books");

		$stmt->execute();

		while ($user = $stmt->fetch(PDO::FETCH_BOTH)) {			
			echo '<tr>
					<td>'.$user[1].'</td>
					<td>'.$user[2].'</td>
					<td>'.$user[3].'</td>
					<td>'.$user[4].'</td>
					<td>'.$user[5].'</td>
					<td><img src="./'.$user['book_img'].'" width="40px"; height="50px"/></td>
			</tr>';
		}

		return $result;
	}

  	function deleteBooks($dbconn, $input){

  		$stmt = $dbconn -> prepare("DELETE FROM bookstore_books WHERE book_id=:id");

  		$stmt->bindParam(':id', $input['book_id']);

  		$stmt -> execute();

  	}

  	function getBookdetail($dbconn, $input){

  		$result = "";

  		$stmt = $dbconn->prepare("SELECT * FROM bookstore_books WHERE book_id=:id");

  		$stmt->bindParam(':id', $input);

  		$stmt->execute();

  		$result = $stmt->fetch(PDO::FETCH_BOTH);

  		return $result;
  	}

  	function updateBooks($dbconn, $data){

  		$stmt = $dbconn->prepare("UPDATE bookstore_books SET title=:t, author=:a, price=:p, year=:y, category_name=:c, flag=:fl WHERE book_id=:id");

  		$data = [
        ':t'=>$data['title'],
  		  ':a'=>$data['author'],
  	  	':p'=>$data['price'],
    		':y'=>$data['year'],
    		':c'=>$data['category_name'],
    		':fl'=>$data['flag'],
        'id'=>$data['book_id']
  	    ];

  		$stmt->execute($data);
  	}

    function getCategorybyid($dbconn, $data){
      $result="";

      $stmt=$dbconn->prepare("SELECT * FROM categories WHERE category_name=:c");

      $stmt->bindParam(':c', $data);

      $stmt->execute();

      $result=$stmt->fetch(PDO::FETCH_BOTH);

      return $result;
    }

    function logout(){
      unset($_SESSION['email']);
      unset($_SESSION['id']);
    }

    function authentication($authentication){

      if (!isset($_SESSION['email'])||!isset($_SESSION['id'])) {
        
        reDirect('adminlogin.php', '');
      }
    }

    function curNav($page){

      $curPage = basename($_SERVER['SCRIPT_NAME']);

      if ($page == $curPage) {
        echo 'class="selected"';
      }

    }

    function editImage($dbconn, $data){

      $stmt = $dbconn->prepare("UPDATE bookstore_books SET book_img=:img WHERE book_id=:id");

      $data = [ 
                ':img' => $data['location'],
                ':id' => $data['book_id']
              ];

      $stmt -> execute($data);

    }

?>