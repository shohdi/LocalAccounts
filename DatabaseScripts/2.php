

<?php

	try 
	{
		echo ("connecting to db <br/>");
	
	

		
		$db = new PDO("mysql:host=localhost;dbname=local_accounts_db", "root", "p@ssw0rd" );
		echo "PDO connection object created <br/>";
		
		
		
		
		echo ('create global admins table admin_user table<br/>') ;
	
		echo ('check for current version<br/>' );
		
		$query = "select max(id) as last_version
		from database_version  ;
		";
						
		$stmt = $db->query($query);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$foundRows = $stmt->rowCount();
		
		//foreach ($result as $key=>$val)
		//{
		//	echo $key."   :     ".$val."<br/>";
		//}	
		
		//echo print_r($result)."<br/>";
		
		$version = $result['last_version'][0];
		echo "version : ".$version."<br />";
		
		$exepectedVersion = 1;	
		
		if ($foundRows <= 0)
		{
			echo "not executed no rows.<br/>";
		}
		else if ($version == $exepectedVersion)
		{
			echo "start execute : <br />";
			$query = "create table  admin_users
						(
							id int not null AUTO_INCREMENT primary key
							, username varchar(400) not null
							, password varchar(400) not null
							, full_name varchar(400) not null
							, created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
							, modified timestamp NULL
							
						) ENGINE=InnoDB ;";
			$db->exec($query);
			$query = "insert into database_version (id,sql_desc) values ($exepectedVersion + 1,'create admin_users table');";
			$db->exec($query);
		}
		else
		{
			echo "not executed<br/>";
		}
		
					
		
		
		echo('closing connection<br/>');
		$db = null;
		
		
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	
	
	
		
?>

