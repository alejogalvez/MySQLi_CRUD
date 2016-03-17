<?php
include_once 'crud.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="form">
  	<form method="post">
    	<table width="100%" cellpadding="15">
      	<tr>
        	<td><input type="text" name="fn" placeholder="Nombre" value="<?php if(isset($_GET['edit'])) echo $getROW['fn']; ?>"></td>
        </tr>
        <tr>
        	<td><input type="text" name="ln" placeholder="Apellido" value="<?php if(isset($_GET['edit'])) echo $getROW['ln']; ?>"></td>
        </tr>
        <tr>
        	<td>
          	<?php
            	if(isset($_GET['edit']))
							{
						?>
            	<button type="submit" name="update">update</button>
						<?php
							}
							else
							{
						?>
            	<button type="submit" name="save">save</button>
            <?php
							}
						?>
          </td>
        </tr>
      </table>
      <table width="100%" border=1 cellpadding="15" align="center">
      	<?php
					$res = $MySQLi->query("SELECT * FROM data");
					while($row=$res->fetch_array())
					{
				?>
        		<tr>
            	<td><?php echo $row['id']; ?></td>
              <td><?php echo $row['fn']; ?></td>
              <td><?php echo $row['ln']; ?></td>
              <td><a href="?edit=<?php echo $row['id']; ?>" onClick="return confirm('Asegúrese de editar !'); ">edit</a></td>
              <td><a href="?del=<?php echo $row['id']; ?>" onClick="return confirm('Asegúrese de eliminar !'); ">delete</a></td>
            </tr>
        <?php
					}
				?>
      </table>
    </form>
  </div>
</body>
</html>
