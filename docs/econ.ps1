

class EconData {
    
    $input_data

    EconData()
    {
        $This.input_data = @{
            "О Р" = 0;
            "Т РПР" = 0;
            "К д" = 0;
            "К у" = 0
        }
    }

    [void]Input()
    {
        $This.input_data = Read-Host -AsSecureString "Заработная плата работника: "

    }

}

$EconData = [EconData]::new()

Write-Host $EconData.Input()

write-host $EconData.input_data['О Р']