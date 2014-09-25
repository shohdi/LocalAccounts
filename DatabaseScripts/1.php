

<?php

	try 
	{
		echo ("connecting to db <br/>");
	
	

		
		$db = new PDO("mysql:host=localhost;dbname=local_accounts_db", "root", "p@ssw0rd" );
		echo "PDO connection object created <br/>";
		
		
		
		
		echo ('create db version<br/>') ;
	
		echo ('check for existing before<br/>' );
		
		$query = "select table_name 
		from information_schema.tables 
		where table_schema = 'local_accounts_db' and table_name='database_version'";
		
		echo ($query."<br/>");
		
		$stmt = $db->query($query);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$foundRows = $stmt->rowCount();
		echo "row count : ".$foundRows."<br />";
		//echo "result size : ".sizeof($result)."<br/>" ;
		
		//foreach ($result as $key=>$val)
		//{
		//	echo $key."   :     ".$val."<br/>";
		//}		
		
		
		
		if ($foundRows <= 0)
		{
			$query = "create table  database_version
						(
							id int not null 
							, sql_desc varchar(400) not null
							, created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
							, modified timestamp NULL
							,primary key (`id`)
						) ENGINE=InnoDB ;";
			$db->exec($query);
			$query = "insert into database_version (id,sql_desc) values (1,'create version table');";
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

