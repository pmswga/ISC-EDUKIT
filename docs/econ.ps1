clear

<#
    Расчёт экономической части ВКР

#>

class EconEvaluator
{

    <#
        $evaluate_code - код вычисления формулы
            1 - Расчёт общего фонда оплаты труда разработчиков ПП,
            2 - 
    #>
    
    EconEvaluator()
    {

    }

    [double]evaluate([Int32]$evaluate_code, [double[]]$data)
    {

        switch ($evaluate_code)
        {

            1 {
                return ($data[0] * $data[1] * (1 + $data[2]) * (1 + $data[3]))
            }
            2 {
                return 0.00
            }

        }

        return 0.00
    }

}

class EconData
{
    
    [double[]]$input_data
    [double[]]$out_data

    EconData()
    {
        $This.input_data = @{
            "О р" = 0;
            "Т РПР" = 0;
            "К д" = 0;
            "К у" = 0
        }

        
        $This.out_data = @{
            "З ФОТР" = 0;
        }
    }

    [void]InputInfo()
    {
        
    }

    [void]Input()
    {
        $This.input_data['О р']   = Read-Host "Заработная плата сотрудника"
        $This.input_data['Т РПР'] = Read-Host -Prompt "Общее время работы над ПП (в месяцах)"
        $This.input_data['К д']   = Read-Host -Prompt "Коэффициент дополнительной зарплаты"
        $This.input_data['К у']   = Read-Host -Prompt "Районный коэффициент"

        
    }

}



$EconData = [EconData]::new()
$EconEvaluator = [EconEvaluator]::new()

$EconData.Input()

$EconData.out_data['З ФОТР'] = $EconEvaluator.evaluate(1, @( 
    $EconData.input_data['О р'], 
    $EconData.input_data['Т РПР'], 
    $EconData.input_data['К д'], 
    $EconData.input_data['К у']
))

Write-Host $EconData.out_data['З ФОТР']


