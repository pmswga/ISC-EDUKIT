<#
  Script for join all sql files
#>

$path = read-host -Prompt "Enter path to sql files"

if ((test-path -path $path) -eq 1) {
    set-location $path
    
    if (test-path install.sql) {
      write-host "File is exsits, then it's was removed"
      remove-item install.sql
    } else {

        $sql_files = get-childitem *.sql
        
        $files = @(
          $sql_files[5], 
          $sql_files[0], 
          $sql_files[1], 
          $sql_files[4], 
          $sql_files[2], 
          $sql_files[3], 
          $sql_files[6], 
          $sql_files[7], 
          $sql_files[8]
        )

        foreach ($file in $files) {
          
          $str = "`n/*----------------[" + $file.name + "]----------------*/`n"
          
          add-content -path install.sql -value $str
          add-content -path install.sql -value (get-content $file.name)
          
        }

        $sql_files = get-childitem procedures/*.sql

        foreach ($file in $sql_files) {
          $str = "`n/*----------------[" + $file.name + "]----------------*/`n"
          $path = "procedures/" + $file.name
          
          add-content -path install.sql -value $str
          add-content -path install.sql -value (get-content $path)
        }
        
    }
    
}
