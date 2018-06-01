<!DOCTYPE html>
<html lang="en">

<head>
    <title>{$title}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/semantic/semantic.js"></script>
</head>
<body>
    <div class="ui stackable grid">
        <div class="row">
            <div class="sixteen wide column">
                <table id="passing_test_info" class="ui table striped">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <h1 align="center">{$test->getCaption()}</h1>
                            </th>
                        </tr>
                        <tr>
                            <th><h4>Предмет</h4></th>
                            <th><h4>Автор</h4></th>
                            <th><h4>Кол-во вопросов</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{$test->getSubject()->getDescription()}</td>
                            <td>{$test->getAuthor()}</td>
                            <td>
                                {count($test->getQuestions())}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <fieldset>
                    <legend><h1>Вопросы</h1></legend>
                    <form name="completeTestForm" method="POST" class="ui form">
                        <div class="field">
                            <div class="ui accordion">
                                {$question_n = 1}
                                {$questions = $test->getQuestions()}
                                {if shuffle($questions) == true} 
                                    {foreach from=$questions item=question}
                                        <div class="title">
                                            <i class="dropdown icon"></i>
                                            <label>{$question->getQuestion()}</label>
                                        </div>
                                        <div class="content">
                                            <input type="hidden" name="questions[]" value="{$question->getQuestion()}">
                                            <div class="ui vertical ordered steps">
                                                {$answers = $question->getAnswers()} 
                                                {if shuffle($answers) == true} 
                                                    {foreach from=$answers item=answer}
                                                        <div class="step">
                                                            <div class="ui checkbox">
                                                                <input type="radio" name="answer_{$question_n}" value="{$answer['answer']}" class="form-control">
                                                                <label></label>
                                                            </div>
                                                            <div class="content">
                                                                {$answer['answer']}
                                                            </div>
                                                        </div>
                                                    {/foreach} 
                                                {else}
                                                    <h2 align="center">Произошла ошибка при перемещивании вариантов ответов</h2>
                                                {/if}
                                            </div>
                                        </div>
                                        {$question_n =$question_n + 1} 
                                    {/foreach} 
                                {else}
                                <h2 align="center">Произошла ошибка при перемещивании вопросов, повторите попытку позже</h2>
                                {/if}
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <a href="../user.php" class="ui orange button" style="width: 100%">Назад</a>
                            </div>
                            <div class="field">
                                <input type="submit" name="completeTestButton" value="Звершить" class="ui primary button" style="width: 100%">
                            </div> 
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('.ui.accordion').accordion();
    </script>

</body>

</html>
{*

<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
</div>
{include file="html/end.tpl"} *}