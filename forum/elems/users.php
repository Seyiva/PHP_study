<?php
include 'init.php' ;

	if (!empty($_SESSION['auth']))  {
      echo  'Вы зашли как ' . $_SESSION['name_user'] . '<br>';

			function showUserTable($link)
			{
				$query = "SELECT id,name,surname FROM users WHERE id>0 ";
				$result = mysqli_query($link, $query) or die(mysqli_error($link));
				for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
				//var_dump($data) ;
				$content = '<table>
							<tr>
								<th>name</th>
								<th>surname</th>
								<th>profile</th>
							</tr>' ;
				foreach ($data as $user) {
					$content .= " <tr>
								<td>{$user['name']} </td>
								<td>{$user['surname']} </td>
								<td><a href=\"?profile={$user['id']}\"> profile </a></td>
							</tr>" ;
				}
				$content .= '</table>' ;

				include "layout.php" ;
			}

			function showProfileTable($link) {
				if(isset($_GET['profile'])) {
					$id = $_GET['profile'] ;
					$query = "SELECT id,name,surname,login,birth_date,email FROM `users` WHERE id='$id' ";
					//echo $query;
					$result = mysqli_query($link, $query) or die(mysqli_error($link));
					for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

					$content = '<table>
								<tr>
									<th>name</th>
									<th>surname</th>
									<th>login</th>
									<th>birth_date</th>
									<th>email</th>
								</tr>' ;
					foreach ($data as $user) {
						$content .= " <tr>
									<td>{$user['name']} </td>
									<td>{$user['surname']} </td>
										<td>{$user['login']} </td>
										<td>{$user['birth_date']} </td>
										<td>{$user['email']} </td>
								</tr>" ;
					}
					$content .= '</table>' ;

					include "layout.php" ;

				}
			}

			showUserTable($link) ;
			showProfileTable($link) ;


  }
