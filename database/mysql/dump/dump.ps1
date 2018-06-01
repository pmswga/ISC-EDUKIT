try
{

  set-location "C:\OpenServer\domains\EDUKIT\sql\dump"

  $current_date = (get-date).toString("dd_MM_yyyy___h_m")
  $filename = "backup_by_" + $current_date + ".sql"
  
  mysqldump -u root --databases iep | out-file -filePath $filename

  write-host "Backup write in '" $filename "'" -foregroundColor green 
}
catch [System.Management.Automation.ItemNotFoundException]
{
  write-host "Item not found" -foregroundColor red
}
catch [System.Exception]
{
  write-host "File wasn't created" -foregroundColor red
}